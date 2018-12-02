<?php

namespace App\Http\Controllers\Admin\Publication;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Conference;
use Illuminate\Support\Facades\Auth;

use App\NonUserClaim;
use Illuminate\Support\Facades\DB;
use App\User;

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
        //
        $conferences = Conference::orderBy('updated_at', 'desc')
                ->paginate(30);

        return view('pages.admin.publications.conference')->with('conferences', $conferences);
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
        $conference = Conference::find($id);

        $conferenceTitle = 'Conf'.$conference->article_title;

        $nonUser = DB::table('rem_nonuser_claim')
                                ->select('email', 'faculty')
                                ->where('article_title', '=', $conferenceTitle)
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
        if(Auth::user()->is_admin)
        {

            $conferenceID = $request->input('reject_conference_ID');

            $conference = Conference::find($conferenceID);

            $conference->pub_status = 'Rejected';
            
            $conference->save();

            return redirect('publication/conferences');

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
}
