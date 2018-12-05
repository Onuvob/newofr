<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Journal;
use App\Conference;
use App\Book;
use App\BookChapter;
use App\Research;

use App\Mail\AcceptedClaimMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        //
        $user = User::where('email', '=', $email)->first();

        return $user;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($email)
    {
        //

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
        //If the user is admin then it will update according to the input of rewards
        if(Auth::user()->is_admin)
        {

            $cashRewards = $request->input('cashRewards');
            $rewardPoints = $request->input('rewardPoints');
            $remarks = $request->input('remarks');


            $numCoAuthors = $request->input('numCoAuthors');


            //getting main author
            $mainAuthor = $this->show($email);

            if($request->input('journal_ID'))
            {

                $journalID = $request->input('journal_ID');

                $journal = Journal::find($journalID);


                $journal->pub_status = 'Accepted';

                $journal->cash_rewards = $cashRewards;
                $journal->reward_points = $rewardPoints;
                $journal->remarks = $remarks;

                $journal->save();

                $points = NULL;

                if($journal->journal_type == "Web of Science Indexed")
                {
                    $points = 200;
    
                }
                elseif($journal->journal_type == "Scopus Indexed")
                {
                    $points = 150;

                }
                elseif($journal->journal_type == "Non-Indexed Peer Reviewed")
                {
                    $points = 25;
                }


                if( $numCoAuthors == 1 )
                {
                    $mainAuthor = $this->divide1($mainAuthor, $points, $request, $journal);
                }
                
                elseif( $numCoAuthors == 2)
                {

                    $mainAuthor = $this->divide2($mainAuthor, $points, $request, $journal);
        
                }
                elseif( $numCoAuthors == 3)
                {

                    $mainAuthor = $this->divide3($mainAuthor, $points, $request, $journal);
                            
                }
                else
                {

                    $mainAuthor = $this->divideAll($mainAuthor, $points, $request, $journal);

                }


                $mainAuthor->save();
                
                return $mainAuthor;

                return redirect('publication/journals')->with('success', 'Publication has benn accepted');

            }



            else if($request->input('conference_ID'))
            {

                $conferenceID = $request->input('conference_ID');

                $conference = Conference::find($conferenceID);

                $conference->pub_status = 'Accepted';
                $conference->cash_rewards = $cashRewards;
                $conference->reward_points = $rewardPoints;

                $conference->remarks = $remarks;

                $conference->save();

                $points = NULL;

                if($conference->conference_type == "ISI/Scopus Indexed")
                {
                    $points = 25;                    
                }
                elseif($conference->conference_type == "Non-Indexed")
                {
                    $points = 10;
                }


                if( $numCoAuthors == 1 )
                {
                    $mainAuthor = $this->divide1($mainAuthor, $points, $request, $conference);
                }
                
                elseif( $numCoAuthors == 2)
                {

                    $mainAuthor = $this->divide2($mainAuthor, $points, $request, $conference);
        
                }
                elseif( $numCoAuthors == 3)
                {

                    $mainAuthor = $this->divide3($mainAuthor, $points, $request, $conference);
                            
                }
                else
                {

                    $mainAuthor = $this->divideAll($mainAuthor, $points, $request, $conference);

                }

                $mainAuthor->save();
            
                return redirect('publication/conferences')->with('success', 'Publication has benn accepted');

            }

            else if($request->input('book_ID'))
            {

                $bookID = $request->input('book_ID');

                $book = Book::find($bookID);

                $book->pub_status = 'Accepted';
                $book->cash_rewards = $cashRewards;
                $book->reward_points = $rewardPoints;

                $book->remarks = $remarks;

                $book->save();

                $points = NULL;

                if($book->book_type == "Local/Non-recognized Publisher")
                {
                    $points = 50;
                }
                elseif($book->book_type == "International Publisher")
                {
                    $points = 150;
                }



                if( $numCoAuthors == 1 )
                {
                    $mainAuthor = $this->divide1($mainAuthor, $points, $request, $book);
                }
                
                elseif( $numCoAuthors == 2)
                {

                    $mainAuthor = $this->divide2($mainAuthor, $points, $request, $book);
        
                }
                elseif( $numCoAuthors == 3)
                {

                    $mainAuthor = $this->divide3($mainAuthor, $points, $request, $book);
                            
                }
                else
                {

                    $mainAuthor = $this->divideAll($mainAuthor, $points, $request, $book);

                }

                

                $mainAuthor->save();
                

                return redirect('publication/books')->with('success', 'Publication has benn accepted');

            }

            else if($request->input('bookchapter_ID'))
            {

                $bookchapterID = $request->input('bookchapter_ID');

                $bookChapter = BookChapter::find($bookchapterID);

                $bookChapter->pub_status = 'Accepted';
                $bookChapter->cash_rewards = $cashRewards;
                $bookChapter->reward_points = $rewardPoints;

                $bookChapter->remarks = $remarks;

                $bookChapter->save();

                $points = NULL;

                if($bookChapter->chapter_type == "Publisher Indexed in Clarivate(Web of Science)")
                {
                    $points = 200;
                    
                }
                elseif($bookChapter->chapter_type == "Local/Non-recognized Publisher")
                {
                    $points = 25;
                    
                }
                elseif($bookChapter->chapter_type == "International Publisher")
                {
                    $points = 50;
                    
                }


                if( $numCoAuthors == 1 )
                {
                    return $mainAuthor = $this->divide1($mainAuthor, $points, $request, $bookChapter);
                }
                
                elseif( $numCoAuthors == 2)
                {

                    $mainAuthor = $this->divide2($mainAuthor, $points, $request, $bookChapter);
        
                }
                elseif( $numCoAuthors == 3)
                {

                    $mainAuthor = $this->divide3($mainAuthor, $points, $request, $bookChapter);
                            
                }
                else
                {

                    $mainAuthor = $this->divideAll($mainAuthor, $points, $request, $bookChapter);

                }

                $mainAuthor->save();

                return redirect('publication/bookchapters')->with('success', 'Publication has benn accepted');

            }

            else if($request->input('research_ID'))
            {
                $points = 50;

                $researchID = $request->input('research_ID');

                $research = Research::find($researchID);

                $research->pub_status = 'Accepted';
                $research->cash_rewards = $cashRewards;
                $research->reward_points = $rewardPoints;
                $research->remarks = $remarks;

                
                $mainAuthor->points = $points + $mainAuthor->points;
                $mainAuthor->cash_rewards = $cashRewards + $mainAuthor->cash_rewards;
                $mainAuthor->reward_points = $rewardPoints + $mainAuthor->reward_points;

                $mainAuthor->save();
                $research->save();

                Mail::send(new AcceptedClaimMail( $mainAuthor, $research ));

                return redirect('publication/researches')->with('success', 'Publication has benn accepted');
                
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function divide1($mainAuthor, $points, $request, $claim)
    {

        $cashRewards = $request->input('cashRewards');
        $rewardPoints = $request->input('rewardPoints');

        $coAuthorsEmail = $request->input('emailCoAuthors0');

        $numCoAuthors = $request->input('numCoAuthors');

        $coAuthor = $this->show($coAuthorsEmail);

        //return $coAuthor;

        $mainAuthor->points = (( $points * 60 )/100) + $mainAuthor->points;

        //Just checking & for no risk the values as this value could be none
        if( $cashRewards )
        {

            //Adding rewards to main author
            $mainAuthor->cash_rewards = (( $cashRewards * 60 )/100) + $mainAuthor->cash_rewards;


            //if the co author is in list of users then save
            if( $coAuthor )
            {
                $coAuthor->cash_rewards = (( $cashRewards * 40 )/100) + $coAuthor->cash_rewards;

            }
        }

        //Just checking & for no risk the values as this value could be none
        if( $rewardPoints )
        {
            //Adding rewards to main author
            $mainAuthor->reward_points = (( $rewardPoints * 60 )/100) + $mainAuthor->reward_points;


            //if the co author is in list of users then save
            if( $coAuthor )
            {
                $coAuthor->reward_points = (( $rewardPoints * 40 )/100) + $coAuthor->reward_points;
            }
        }

        //If the co author not found in user as faculty then it will ignore else it will be save. As we are not caring about others outside of the ULAB so. even co author found as reviewer then dont save as we are saving reviewer into users table 
        if( $coAuthor )
        {

            $coAuthor->points = (( $points * 40 )/100) + $coAuthor->points;

            $coAuthor->save();

            Mail::send(new AcceptedClaimMail( $coAuthor, $claim ));
        }

        Mail::send(new AcceptedClaimMail( $mainAuthor, $claim ));

        return $mainAuthor;


    }


    private function divide2($mainAuthor, $points, $request, $claim)
    {
        $cashRewards = $request->input('cashRewards');
        $rewardPoints = $request->input('rewardPoints');


        $coAuthorsEmail0 = $request->input('emailCoAuthors0');

        $coAuthorsEmail1 = $request->input('emailCoAuthors1');

        $numCoAuthors = $request->input('numCoAuthors');

        $coAuthor0 = $this->show($coAuthorsEmail0);
        $coAuthor1 = $this->show($coAuthorsEmail1);

        $mainAuthor->points = (( $points * 50 )/100) + $mainAuthor->points;

        //Just checking & for no risk the values as this value could be none
        if( $cashRewards )
        {
            //Adding rewards to main author
            $mainAuthor->cash_rewards = (( $cashRewards * 50 )/100) + $mainAuthor->cash_rewards;

            //if the co author is in list of users then save
            if( $coAuthor0 )
            {
                $coAuthor0->cash_rewards = (( $cashRewards * 30 )/100) + $coAuthor0->cash_rewards;
            }
            if( $coAuthor1 )
            {
                $coAuthor1->cash_rewards = (( $cashRewards * 20 )/100) + $coAuthor1->cash_rewards;
            }
        }

        //Just checking & for no risk the values as this value could be none
        if( $rewardPoints )
        {
            //Adding rewards to main author
            $mainAuthor->reward_points = (( $rewardPoints * 50 )/100) + $mainAuthor->reward_points;


            //if the co author is in list of users then save
            if( $coAuthor0 )
            {
                $coAuthor0->reward_points = (( $rewardPoints * 30 )/100) + $coAuthor0->reward_points;
            }

            if( $coAuthor1 )
            {
                $coAuthor1->reward_points = (( $rewardPoints * 20 )/100) + $coAuthor1->reward_points;
            }
        }

        //If the co author not found in user as faculty then it will ignore else it will be save. As we are not caring about others outside of the ULAB so. even co author found as reviewer then dont save as we are saving reviewer into users table
        if( $coAuthor0 )
        {
            $coAuthor0->points = (( $points * 30 )/100) + $coAuthor->points;

            $coAuthor0->save();

            Mail::send(new AcceptedClaimMail($coAuthor0, $claim));
        }

        if( $coAuthor1 )
        {
            $coAuthor1->points = (( $points * 20 )/100) + $coAuthor->points;

            $coAuthor1->save();

            Mail::send(new AcceptedClaimMail($coAuthor1, $claim));
        }

        Mail::send(new AcceptedClaimMail($mainAuthor, $claim));

        return $mainAuthor;

    }

    private function divide3($mainAuthor, $points, $request, $claim)
    {

        $cashRewards = $request->input('cashRewards');
        $rewardPoints = $request->input('rewardPoints');


        $coAuthorsEmail0 = $request->input('emailCoAuthors0');

        $coAuthorsEmail1 = $request->input('emailCoAuthors1');

        $coAuthorsEmail2 = $request->input('emailCoAuthors2');

        $numCoAuthors = $request->input('numCoAuthors');

        $coAuthor0 = $this->show($coAuthorsEmail0);
        $coAuthor1 = $this->show($coAuthorsEmail1);
        $coAuthor2 = $this->show($coAuthorsEmail2);

        $mainAuthor->points = (( $points * 40 )/100) + $mainAuthor->points;


        //Just checking & for no risk the values as this value could be none
        if( $cashRewards )
        {
            //Adding rewards to main author
            $mainAuthor->cash_rewards = (( $cashRewards * 40 )/100) + $mainAuthor->cash_rewards;

            //if the co author is in list of users then save
            if( $coAuthor0 )
            {
                $coAuthor0->cash_rewards = (( $cashRewards * 30 )/100) + $coAuthor0->cash_rewards;
            }
            if( $coAuthor1 )
            {
                $coAuthor1->cash_rewards = (( $cashRewards * 20 )/100) + $coAuthor1->cash_rewards;
            }
            if( $coAuthor2 )
            {
                $coAuthor2->cash_rewards = (( $cashRewards * 10 )/100) + $coAuthor2->cash_rewards;
            }
        }

        //Just checking & for no risk the values as this value could be none
        if( $rewardPoints )
        {
            //Adding rewards to main author
            $mainAuthor->reward_points = (( $rewardPoints * 40 )/100) + $mainAuthor->reward_points;


            //if the co author is in list of users then save
            if( $coAuthor0 )
            {
                $coAuthor0->reward_points = (( $rewardPoints * 30 )/100) + $coAuthor0->reward_points;
            }

            if( $coAuthor1 )
            {
                $coAuthor1->reward_points = (( $rewardPoints * 20 )/100) + $coAuthor1->reward_points;
            }

            if( $coAuthor2 )
            {
                $coAuthor2->reward_points = (( $rewardPoints * 10 )/100) + $coAuthor2->reward_points;
            }
        }
                        
        //If the co author not found in user as faculty then it will ignore else it will be save. As we are not caring about others outside of the ULAB so. even co author found as reviewer then dont save as we are saving reviewer into users table
        if( $coAuthor0 )
        {
            $coAuthor0->points = (( $points * 30 )/100) + $coAuthor->points;

            $coAuthor0->save();

            Mail::send(new AcceptedClaimMail($coAuthor0, $claim));
        }

        if( $coAuthor1 )
        {
            $coAuthor1->points = (( $points * 20 )/100) + $coAuthor->points;

            $coAuthor1->save();

            Mail::send(new AcceptedClaimMail($coAuthor1, $claim));
        }

        if( $coAuthor2 )
        {
            $coAuthor2->points = (( $points * 10 )/100) + $coAuthor->points;

            $coAuthor2->save();

            Mail::send(new AcceptedClaimMail($coAuthor2, $claim));
        }

        Mail::send(new AcceptedClaimMail($mainAuthor, $claim));

        return $mainAuthor;

        
    }

    private function divideAll($mainAuthor, $points, $request, $claim)
    {
        $cashRewards = $request->input('cashRewards');
        $rewardPoints = $request->input('rewardPoints');


        $coAuthorsEmail0 = $request->input('emailCoAuthors0');

        $numCoAuthors = $request->input('numCoAuthors');

        $coAuthor0 = $this->show($coAuthorsEmail0);

        $mainAuthor->points = (( $points * 35 )/100) + $mainAuthor->points;


        //Just checking & for no risk the values as this value could be none
        if( $cashRewards )
        {
            //Adding rewards to main author
            $mainAuthor->cash_rewards = (( $cashRewards * 35 )/100) + $mainAuthor->cash_rewards;


            if( $coAuthor0 )
            {

                $coAuthor0->cash_rewards = (( $cashRewards * 25 )/100) + $coAuthor0->cash_rewards;

            }


            //getting co authors
            for($i=1; $i<$numCoAuthors; $i++)
            {
                $coAuthorsEmail = $request->input('emailCoAuthors'.$i);

                $coAuthor = $this->show($coAuthorsEmail);

                //if the co author is in list of users then save. even co author found as reviewer then dont save as we are saving reviewer into users table
                if( $coAuthor )
                {

                    $coAuthor->cash_rewards = (( $cashRewards * 20 )/100) + $coAuthor->cash_rewards;

                    $coAuthor->save();
                }
            }

        }

        //Just checking & for no risk the values as this value could be none
        if( $rewardPoints )
        {
            //Adding rewards to main author
            $mainAuthor->reward_points = (( $rewardPoints * 35 )/100) + $mainAuthor->reward_points;


            if( $coAuthor0 )
            {

                $coAuthor0->reward_points = (( $rewardPoints * 25 )/100) + $coAuthor0->reward_points;

            }


            //getting co authors
            for($i=1; $i<$numCoAuthors; $i++)
            {
                $coAuthorsEmail = $request->input('emailCoAuthors'.$i);

                $coAuthor = $this->show($coAuthorsEmail);

                //if the co author is in list of users then save. even co author found as reviewer then dont save as we are saving reviewer into users table
                if( $coAuthor )
                {
                    $coAuthor->reward_points = (( $rewardPoints * 20 )/100) + $coAuthor->reward_points;

                    $coAuthor->save();
                }
            }
        }

        //If the co author not found in user as faculty then it will ignore else it will be save. As we are not caring about others outside of the ULAB so. even co author found as reviewer then dont save as we are saving reviewer into users table
        if( $coAuthor0 )
        {
            $coAuthor0->points = (( $points * 25 )/100) + $coAuthor0->points;

            $coAuthor0->save();

            Mail::send(new AcceptedClaimMail($coAuthor0, $claim));
        }


        //getting co authors
        for($i=1; $i<$numCoAuthors; $i++)
        {
            $coAuthorsEmail = $request->input('emailCoAuthors'.$i);

            $coAuthor = $this->show($coAuthorsEmail);

            //if the co author is in list of users then save. even co author found as reviewer then dont save as we are saving reviewer into users table
            if( $coAuthor )
            {

                $coAuthor->points = (( $points * 20 )/100) + $coAuthor->points;

                $coAuthor->save();

                Mail::send(new AcceptedClaimMail($coAuthor, $claim));
            }
        }

        Mail::send(new AcceptedClaimMail($mainAuthor, $claim));
                    
        return $mainAuthor;
    }

}
