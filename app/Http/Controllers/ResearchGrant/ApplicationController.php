<?php

namespace App\Http\Controllers\ResearchGrant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\ResearchGrant;
use Illuminate\Support\Facades\DB;


class ApplicationController extends Controller
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
        return view('pages.researchgrants.application');
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
        $resId = uniqid();
        
        //Primary Investigator
        $resGrantTopic = $request->input('resGrantTopic');
        $resGrantArea = $request->input('resGrantArea');
        $pmInvesPrefix = $request->input('pmInvesPrefix');
        $pmInvesFirstName = $request->input('pmInvesFirstName');
        $pmInvesLastName = $request->input('pmInvesLastName');
        $pmInvesDesignation = $request->input('pmInvesDesignation');
        $pmInvesDepartment = $request->input('pmInvesDepartment');
        $pmInvesEmail = $request->input('pmInvesEmail');
        $pmInvesContact = $request->input('pmInvesContact');

        $pmFileName = NULL;

        if($request->hasFile('pmInvesFile'))
        {
            $pmFileName = $request->pmInvesFile->getClientOriginalName('');
            $pmFileName = time().'_'.$pmFileName;
            $request->pmInvesFile->storeAs('public/primaryinvestigator', $pmFileName);
        }
        else
        {
            $pmFileName = 'NoFile';   
        }

        //Primary Investigator End

        //Co-Investigator

        

        $conInvesNum = $request->input('conInvesNum');

        
        for ($i=1; $i <= $conInvesNum; $i++)
        {

            $coFirstName = $request->input('coInves'.$i.'FirstName');
            $coLastname = $request->input('coInves'.$i.'LastName');
            $coDept = $request->input('coInves'.$i.'Department');
            $coDes = $request->input('coInves'.$i.'Designation');
            $coPrefix = $request->input('coInves'.$i.'Prefix');
            $coStatus = $request->input('coInves'.$i.'Status');
            $coStatSpe = $request->input('coInves'.$i.'StatusSpecify');

            $coId = uniqid();

            $user = DB::table('co_investigator')->where('first_name', $coFirstName)
                                                ->where('last_name', $coLastname)
                                                ->value('id');

            if(!$user)
            {
                
                //return $coPrefix;
                //remember the non faculty that hasn't registered in user table
                DB::table('co_investigator')->insert(
                    [
                        'id' => $coId,
                        'prefix' => $coPrefix,
                        'first_name' => $coFirstName,
                        'last_name' => $coLastname,
                        'department' => $coDept,
                        'designation' => $coDes,
                        'status' => $coStatus,
                        'status_specify' => $coStatSpe
                    ]
                );

            }
            else
            {
                $coId = $user;
            }

            $fileName = 'NoFile';   

            if($request->hasFile('coInves'.$i.'fileName'))
            {
                $fileName = $request->file('coInves'.$i.'fileName')->getClientOriginalName('');
                $fileName = time().'_'.$fileName;
                $request->file('coInves'.$i.'fileName')->storeAs('public/coinves', $fileName);
            }
           
            //remember the faculty user 
            DB::table('rem_res_coinves')->insert(
                [
                    'res_id' => $resId,
                    'co_id' => $coId,
                    'file_name' => $fileName
                ]
            );
            
        }

        //End Co-Investor

        //Research Proposal
        $resGrantIntroBack = $request->input('resGrantIntroBack');
        $resGrantQuestion = $request->input('resGrantQuestion');
        $resGrantBiblography = $request->input('resGrantBiblography');
        $resGrantMethodology = $request->input('resGrantMethodology');
        //End Research Grant

        //Research Outcome
        $resGrantJCP1name = $request->input('resGrantJCP1name');
        $resGrantJCP1index = $request->input('resGrantJCP1index');
        $resGrantJCP2name = $request->input('resGrantJCP2name');
        $resGrantJCP2index = $request->input('resGrantJCP2index');
        $resGrantJCP3name = $request->input('resGrantJCP3name');
        $resGrantJCP3index = $request->input('resGrantJCP3index');
        $resGrantPatentInfo = $request->input('resGrantPatentInfo');
        $resGrantPubCountry = $request->input('resGrantPubCountry');
        //End Research Outcome


        //Research Cost
        $resGrantTentativeBudget = $request->input('resGrantTentativeBudget');
        $resGrantCoInvesDifIns = $request->input('resGrantCoInvesDifIns');
        $resGrantProjProspect = $request->input('resGrantProjProspect');
        //End Research Cost

        $researchGrant = new ResearchGrant;

        
        $researchGrant->id = $resId;

        $researchGrant->topic = $resGrantTopic;
        $researchGrant->area = $resGrantArea;
        $researchGrant->prefix = $pmInvesPrefix;
        $researchGrant->first_name = $pmInvesFirstName;
        $researchGrant->last_name = $pmInvesLastName;
        $researchGrant->designation = $pmInvesDesignation;
        $researchGrant->department = $pmInvesDepartment;
        $researchGrant->email = $pmInvesEmail;
        $researchGrant->contact = $pmInvesContact;
        $researchGrant->list_of_inves = $conInvesNum;


        $researchGrant->intro_back = $resGrantIntroBack;
        $researchGrant->question = $resGrantQuestion;
        $researchGrant->biblography = $resGrantBiblography;
        $researchGrant->methodology = $resGrantMethodology;


        $researchGrant->jcp1_name = $resGrantJCP1name;
        $researchGrant->jcp1_index = $resGrantJCP1index;
        $researchGrant->jcp2_name = $resGrantJCP2name;
        $researchGrant->jcp2_index = $resGrantJCP2index;
        $researchGrant->jcp3_name = $resGrantJCP3name;
        $researchGrant->jcp3_index = $resGrantJCP3index;
        $researchGrant->patent_info = $resGrantPatentInfo;
        $researchGrant->publish_country = $resGrantPubCountry;


        $researchGrant->tentative_budget = $resGrantTentativeBudget;
        $researchGrant->diff_institution = $resGrantCoInvesDifIns;
        $researchGrant->project_prospect = $resGrantProjProspect;
        $researchGrant->file_name = $pmFileName;

        $researchGrant->save();

        
        return redirect('home')->with('success', 'Research Grant Application Submitted');

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
