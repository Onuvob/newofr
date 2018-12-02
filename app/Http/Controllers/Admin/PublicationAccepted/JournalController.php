<?php

namespace App\Http\Controllers\Admin\PublicationAccepted;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Journal;

use App\NonUserClaim;
use Illuminate\Support\Facades\DB;  
use App\User;                

class JournalController extends Controller
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
        $journals = Journal::where('pub_status', 'accepted')
                ->orderBy('updated_at', 'desc')
                ->paginate(30);

        return view('pages.admin.publications.accepted.journal')->with('journals', $journals);
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
    public function show($id)
    {
        //
        $journal = Journal::find($id);

        $journalTitle = 'Jour'.$journal->article_title;

        $nonUser = DB::table('rem_nonuser_claim')
                                ->select('email', 'faculty')
                                ->where('article_title', '=', $journalTitle)
                                ->get();

        //return $nonUserEmail;

        $len = sizeof($nonUser);

        $co_users = [];

                //get the user. using rem table tracked by article titile
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

        
        return view('pages.admin.publications.showpublications.journal')->with('journal', $journal)->with('coUsers', $co_users);
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
