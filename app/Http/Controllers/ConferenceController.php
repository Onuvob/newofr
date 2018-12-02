<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\NonUserClaim;

class ConferenceController extends Controller
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

        $conferences = Conference::where('email', Auth::user()->email)
                ->orderBy('updated_at', 'desc')
                ->paginate(30);

        return view('pages.admin.publications.accepted.conference')->with('conferences', $conferences);
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
        $prefix = $request->input('prefix');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $designation = $request->input('designation');
        $department = $request->input('department');
        $claimType = $request->input('claimType');

        
        $conferenceApplyingFor = $request->input('conferenceApplyingFor');
        $conferenceType = $request->input('conferenceType');
        $conferenceArticleTitle = $request->input('conferenceArticleTitle');
        $conferenceListOfAuthors = $request->input('conferenceListOfAuthors');
        $conferenceAuthorsAffiliation = $request->input('conferenceAuthorsAffiliation');
        $nameOfConference = $request->input('nameOfConference');
        $conferenceVenue = $request->input('conferenceVenue');
        $conferenceISBN = $request->input('conferenceISBN');
        $conferenceDOI = $request->input('conferenceDOI');

        if($request->hasFile('confFile'))
        {
            $fileName = $request->confFile->getClientOriginalName('');

            $fileName = time().'_'.$fileName;

            $request->confFile->storeAs('public/conference', $fileName);
        }
        else
        {
            $fileName = 'NoFile';   
        }


        $conference = new Conference;

        $userEmail = Auth::user()->email;

        $conference->email = $userEmail;


        //find the user. if not found then save in another non-user table
        for ($i=0; $i < $conferenceListOfAuthors; $i++)
        {
            $email = $request->input('authorEmailConf'. $i);

            $user = User::where('email', '=', $email)->first();


            if(!$user)
            {
                $co_user = NonUserClaim::where('email', '=', $email)->first();

                //if the co-author not found create
                if(!$co_user)
                {
                    $coUser = new NonUserClaim;

                    $coUser->first_name = $request->input('authorFirstNameConf'. $i);
                    $coUser->last_name = $request->input('authorLastNameConf'. $i);
                    $coUser->email = $request->input('authorEmailConf'. $i);

                    $coUser->save();
                }

                //remember the non faculty that hasn't registered in user table
                DB::table('rem_nonuser_claim')->insert(
                    ['email' => $email, 'article_title' => 'Conf'.$conferenceArticleTitle, 'faculty' => 0]
                );
                
            }

            else
            {
                //remember the faculty user 
                DB::table('rem_nonuser_claim')->insert(
                    ['email' => $email, 'article_title' => 'Conf'.$conferenceArticleTitle, 'faculty' => 1]
                );

            }
        }


        $conference->prefix = $prefix;
        $conference->first_name = $firstName;
        $conference->last_name = $lastName;
        $conference->designation = $designation;
        $conference->department = $department;
        $conference->claim_type = $claimType;
        $conference->applying_for = $conferenceApplyingFor;
        $conference->conference_type = $conferenceType;
        $conference->article_title = $conferenceArticleTitle;
        $conference->list_of_authors = $conferenceListOfAuthors;
        $conference->authors_affiliation = $conferenceAuthorsAffiliation;
        $conference->name_of_conference = $nameOfConference;
        $conference->venue = $conferenceVenue;
        $conference->isbn = $conferenceISBN;
        $conference->doi = $conferenceDOI;
        $conference->file_name = $fileName;


        $conference->save();

        return redirect('home')->with('success', 'Conference publication created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $conference = Conference::find($id);

        $conferenceTitle = 'Conf'.$conference->article_title;

        $nonUser = DB::table('rem_nonuser_claim')
                                ->select('email', 'faculty')
                                ->where('article_title', '=', $conferenceTitle)
                                ->get();

        //return $nonUserEmail;

        $len = sizeof($nonUser);

        $co_users = [];

        ///get the user. using rem table tracked by article titile
        for ($i=0; $i < $len; $i++)
        {

            $co_email = $nonUser[$i]->email;

            //return $nonUser[$i]->faculty;

            //If the co-author remembered is in faculty user list
            if($nonUser[$i]->faculty)
            {
                $co_users[$i] = User::where('email', '=', $co_email)->first();
            }
            else
            {
                $co_users[$i] = NonUserClaim::where('email', '=', $co_email)->first();
            }

        }
        
        return view('pages.admin.publications.showpublications.conference')->with('conference', $conference)->with('coUsers', $co_users);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
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
}
