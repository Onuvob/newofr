<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Research;
use Illuminate\Support\Facades\Auth;

class ResearchController extends Controller
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
        $researches = Research::where('email', Auth::user()->email)
                ->orderBy('updated_at', 'desc')
                ->paginate(30);

        return view('pages.admin.publications.accepted.research')->with('researches', $researches);
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

        $researchApplyingFor = $request->input('researchApplyingFor');        
        $projectName = $request->input('projectName');
        $projectStatusPI = $request->input('projectStatusPI');
        $projectFundingAuthority = $request->input('projectFundingAuthority');
        $projectFundingAmount = $request->input('projectFundingAmount');
        $projectDateOfAward = $request->input('projectDateOfAward');
        $projectStatus = $request->input('projectStatus');


        if($request->hasFile('resFile'))
        {
            $fileName = $request->resFile->getClientOriginalName('');

            $fileName = time().'_'.$fileName;

            $request->resFile->storeAs('public/research', $fileName);
        }
        else
        {
            $fileName = 'NoFile';   
        }


        $research = new Research;

        $userEmail = Auth::user()->email;

        $research->email = $userEmail;

        $research->prefix = $prefix;
        $research->first_name = $firstName;
        $research->last_name = $lastName;
        $research->designation = $designation;
        $research->department = $department;
        $research->claim_type = $claimType;
        $research->applying_for = $researchApplyingFor;
        $research->project_name = $projectName;
        $research->status_pi = $projectStatusPI;
        $research->funding_authority = $projectFundingAuthority;
        $research->funding_amount = $projectFundingAmount;
        $research->date_of_award = $projectDateOfAward;
        $research->status = $projectStatus;
        $research->file_name = $fileName;

        $research->save();

        return redirect('home')->with('success', 'Research publication created');
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
        $research = Research::find($id);
        
        return view('pages.admin.publications.showpublications.research')->with('research', $research);
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
