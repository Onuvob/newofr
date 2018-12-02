<?php

namespace App\Http\Controllers\Reviewer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Reviewer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewerController extends Controller
{
    
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
        $reviewers = Reviewer::where('email', Auth::user()->email)
                // ->where('accepted', '1')
                ->orderBy('updated_at', 'desc')
                ->paginate(30);
        

        return view('pages.reviewers.reviewerreports')->with('reviewers', $reviewers);
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
    public function store(Request $request, $resGrantApplicant, $resGrantTopic)
    {
        //
        $email = $request->input('reviewerEmail');
        $resId = $request->input('researchGrantId');

        //return $request;


        $reviewer = new Reviewer;


        $reviewer->email = $email;
        $reviewer->res_id = $resId;
        $reviewer->topic = $resGrantTopic;
        $reviewer->applicant = $resGrantApplicant;

        $reviewer->save();

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

        //return $researchgrant;

        //$coInves = json_decode(json_encode($coInves),true);
        

        //Returning details from reviewer table

        $reviewerReports = Reviewer::where('email', Auth::user()->email)
                                    ->where('res_id', $id)->first();


        //return $reviewerReports;

        return view('pages.reviewers.ongoingreviewerreport')->with('researchgrant', $researchgrant)->with('coInves', $coInves)->with('coCV', $getCoInves)->with('reviewerReports', $reviewerReports);
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
        

        if( $request->input('researchAccept') )
        {

            DB::table('reviewers')->where('res_id', $id)
                                ->where('email', Auth::user()->email )
                                ->update(['review_status' => 'Accepted']);

            return redirect('reviewerreports/'. $id);

            //return redirect('publication/conferences');

        }


        if( $request->hasFile('intentEvFile') )
        {

            $fileName = $request->intentEvFile->getClientOriginalName('');

            $fileName = time().'_'.$fileName;

            $request->intentEvFile->storeAs('public/reviewerfile/submittedreport', $fileName);


            DB::table('reviewers')->where('res_id', $id)
                                ->where('email', Auth::user()->email )
                                ->update(['report_status' => 'Submitted', 'file_name' => $fileName]);

            return redirect('reviewerreports/'. $id);

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


    public function acceptReport($id)
    {

        return view('pages.researchgrants.acceptrequest')->with('id', $id);

    }
}
