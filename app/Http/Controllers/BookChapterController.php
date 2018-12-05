<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookChapter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\NonUserClaim;

class BookChapterController extends Controller
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
        $bookchapters = BookChapter::where('email', Auth::user()->email)
                ->orderBy('updated_at', 'desc')
                ->paginate(30);

        return view('pages.admin.publications.accepted.bookchapter')->with('bookchapters', $bookchapters);

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

        $bookChapterApplyingFor = $request->input('bookChapterApplyingFor');
        $bookChapterType = $request->input('bookChapterType');
        $bookChapterArticleTitle = $request->input('bookChapterArticleTitle');
        $bookChapterListOfAuthors = $request->input('bookChapterListOfAuthors');
        $bookChapterAuthorsAffiliation = $request->input('bookChapterAuthorsAffiliation');
        $bookChapterBookTitle = $request->input('bookChapterBookTitle');
        $bookChapterPublisher = $request->input('bookChapterPublisher');
        $bookChapterISBN = $request->input('bookChapterISBN');
        $bookChapterDOI = $request->input('bookChapterDOI');


        if($request->hasFile('bookCFile'))
        {
            $fileName = $request->bookCFile->getClientOriginalName('');

            $fileName = time().'_'.$fileName;

            $request->bookCFile->storeAs('public/bookchapter', $fileName);
        }
        else
        {
            $fileName = 'NoFile';   
        }




        $bookChapter = new BookChapter;
        
        $userEmail = Auth::user()->email;

        //find the user. if not found then save in another non-user table
        for ($i=0; $i < $bookChapterListOfAuthors; $i++)
        {
            $email = $request->input('authorEmailBookChapter'. $i);

            $user = User::where('email', '=', $email)->first();


            if(!$user)
            {
                $co_user = NonUserClaim::where('email', '=', $email)->first();

                //if the co-author not found create
                if(!$co_user)
                {
                    $coUser = new NonUserClaim;

                    $coUser->first_name = $request->input('authorFirstNameBookChapter'. $i);
                    $coUser->last_name = $request->input('authorLastNameBookChapter'. $i);
                    $coUser->email = $email;

                    $coUser->save();

                }

                //remember the non faculty that hasn't registered in user table
                DB::table('rem_nonuser_claim')->insert(
                    ['email' => $email, 'article_title' => 'BookC'.$bookChapterArticleTitle, 'faculty' => 0]
                );
            }

            else
            {
                //remember the faculty user 
                DB::table('rem_nonuser_claim')->insert(
                    ['email' => $email, 'article_title' => 'BookC'.$bookChapterArticleTitle, 'faculty' => 1]
                );

            }
        }



        $bookChapter->email = $userEmail;
        $bookChapter->prefix = $prefix;
        $bookChapter->first_name = $firstName;
        $bookChapter->last_name = $lastName;
        $bookChapter->designation = $designation;
        $bookChapter->department = $department;
        $bookChapter->claim_type = $claimType;
        $bookChapter->applying_for = $bookChapterApplyingFor;
        $bookChapter->chapter_type = $bookChapterType;
        $bookChapter->article_title = $bookChapterArticleTitle;
        $bookChapter->list_of_authors = $bookChapterListOfAuthors;
        $bookChapter->authors_affiliation = $bookChapterAuthorsAffiliation;
        $bookChapter->book_title = $bookChapterBookTitle;
        $bookChapter->publisher = $bookChapterPublisher;
        $bookChapter->isbn = $bookChapterISBN;
        $bookChapter->doi = $bookChapterDOI;
        $bookChapter->file_name = $fileName;

        $bookChapter->save();

        return redirect('home')->with('success', 'Book chapter publication created');
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
        $bookchapter = BookChapter::find($id);

        $bookChapterTitle = 'BookC'.$bookchapter->article_title;

        $nonUser = DB::table('rem_nonuser_claim')
                                ->select('email', 'faculty')
                                ->where('article_title', '=', $bookChapterTitle)
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

        
        return view('pages.admin.publications.showpublications.bookchapter')->with('bookchapter', $bookchapter)->with('coUsers', $co_users);
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
