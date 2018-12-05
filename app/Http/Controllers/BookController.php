<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\NonUserClaim;

class BookController extends Controller
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

        $books = Book::where('email', Auth::user()->email)
                ->orderBy('updated_at', 'desc')
                ->paginate(30);

        return view('pages.admin.publications.accepted.book')->with('books', $books);
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

        
        $bookApplyingFor = $request->input('bookApplyingFor');
        $bookType = $request->input('bookType');
        $bookName = $request->input('bookName');
        $bookListOfAuthors = $request->input('bookListOfAuthors');
        $bookAuthorsAffiliation = $request->input('bookAuthorsAffiliation');
        $bookPublisher = $request->input('bookPublisher');
        $bookISBN = $request->input('bookISBN');

        if($request->hasFile('bookFile'))
        {
            $fileName = $request->bookFile->getClientOriginalName('');

            $fileName = time().'_'.$fileName;

            $request->bookFile->storeAs('public/book', $fileName);
        }
        else
        {
            $fileName = 'NoFile';   
        }


        $bookController = new Book;

        $userEmail = Auth::user()->email;

        //find the user. if not found then save in another non-user table
        for ($i=0; $i < $bookListOfAuthors; $i++)
        {
            $email = $request->input('authorEmailBook'. $i);

            $user = User::where('email', '=', $email)->first();


            if(!$user)
            {
                $co_user = NonUserClaim::where('email', '=', $email)->first();

                //if the co-author not found create
                if(!$co_user)
                {
                    $coUser = new NonUserClaim;

                    $coUser->first_name = $request->input('authorFirstNameBook'. $i);
                    $coUser->last_name = $request->input('authorLastNameBook'. $i);
                    $coUser->email = $request->input('authorEmailBook'. $i);

                    $coUser->save();
                }

                //remember the non faculty that hasn't registered in user table
                DB::table('rem_nonuser_claim')->insert(
                    ['email' => $email, 'article_title' => 'Book'.$bookName, 'faculty' => 0]
                );
            }

            else
            {
                //remember the faculty user 
                DB::table('rem_nonuser_claim')->insert(
                    ['email' => $email, 'article_title' => 'Book'.$bookName, 'faculty' => 1]
                );

            }
        }

        $bookController->email = $userEmail;
        $bookController->prefix = $prefix;
        $bookController->first_name = $firstName;
        $bookController->last_name = $lastName;
        $bookController->designation = $designation;
        $bookController->department = $department;
        $bookController->claim_type = $claimType;
        $bookController->applying_for = $bookApplyingFor;
        $bookController->book_type = $bookType;
        $bookController->book_name = $bookName;
        $bookController->list_of_authors = $bookListOfAuthors;
        $bookController->authors_affiliation = $bookAuthorsAffiliation;
        $bookController->publisher = $bookPublisher;
        $bookController->isbn = $bookISBN;
        $bookController->file_name = $fileName;

        $bookController->save();

        return redirect('home')->with('success', 'Book publication created');
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
        $book = Book::find($id);

        $bookTitle = 'Book'.$book->book_name;

        $nonUser = DB::table('rem_nonuser_claim')
                                ->select('email', 'faculty')
                                ->where('article_title', '=', $bookTitle)
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
        
        return view('pages.admin.publications.showpublications.book')->with('book', $book)->with('coUsers', $co_users);
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
