<?php

namespace App\Http\Controllers\ResearchGrant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ResearchGrant;
USE App\Reviewer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OngoingProjectsController extends Controller
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

        if( Auth::user()->is_admin )
        {
            $researchgrants = DB::table('research_grants')->orderBy('updated_at', 'desc')
                                                        ->paginate(30);
        }
        else
        {
            $researchgrants = DB::table('research_grants')->where('email', Auth::user()->email)
                                                        ->orderBy('updated_at', 'desc')
                                                        ->paginate(30);
        }
        

        /*return $user;

        $researchgrants = ResearchGrant::where('email', Auth::user()->email)
                ->orderBy('updated_at', 'desc')
                ->paginate(30);*/

        return view('pages.researchgrants.ongoing.allprojects')->with('researchgrants', $researchgrants);
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

        $getCoInves = DB::table('rem_res_coinves')->where('res_id', $id)->get();

        //return $getCoInves;

        $len = sizeof($getCoInves);

        $coInves = [];

        //return $len;

        //get the user. using rem table tracked by article titile
        for ($i=0; $i < $len; $i++)
        {
            $coId = $getCoInves[$i]->co_id;

            $coInves[$i] = DB::table('co_investigator')->where('id', $coId)->get();

            //return $coInves;

        }

        $researchgrant = DB::table('research_grants')->where('id', $id)->first();

        //retrieving reviewer if admin has assigned
        $reviewerList = Reviewer::where('res_id', $id)->get();

        //return $reviewerList;


        //return $researchgrant;

        //$coInves = json_decode(json_encode($coInves),true);
        
        //return $coInves[0];

        return view('pages.researchgrants.ongoing.ongoingproject')->with('researchgrant', $researchgrant)->with('coInves', $coInves)->with('coCV', $getCoInves)->with('reviewerList', $reviewerList);
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

            //return $user->cash_rewards;

            if( $request->input('researchAccept') )
            {

                DB::table('research_grants')->where('id', $id)->update(['pub_status' => 'Accepted']);

                return redirect('ongoingresearch/'. $id);

                //return redirect('publication/conferences');

            }
            else if( $request->input('researchReject') )
            {

                DB::table('research_grants')->where('id', $id)->update(['pub_status' => 'Rejected']);
                
                //return $request->input('researchReject');
                return redirect('ongoingresearch/'. $id);

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
}
