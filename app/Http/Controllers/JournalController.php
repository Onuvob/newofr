<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Journal;
use App\User;
use App\NonUserClaim;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $journals = Journal::where('email', Auth::user()->email)
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
        //
        $prefix = $request->input('prefix');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $designation = $request->input('designation');
        $department = $request->input('department');
        $claimType = $request->input('claimType');
        $journalApplyingFor = $request->input('journalApplyingFor');
        $journalType = $request->input('journalType');
        $journalArticleTitle = $request->input('journalArticleTitle');
        $journalListOfAuthors = $request->input('journalListOfAuthors');
        $journalAuthorsAffiliation = $request->input('journalAuthorsAffiliation');
        $nameOfJournal = $request->input('nameOfJournal');
        $journalPublisher = $request->input('journalPublisher');
        $journalISBN = $request->input('journalISBN');
        $journalDOI = $request->input('journalDOI');
        $journalImpactFactor = $request->input('journalImpactFactor');

        if($request->hasFile('jourFile'))
        {
            $fileName = $request->jourFile->getClientOriginalName('');
            $fileName = time().'_'.$fileName;
            $request->jourFile->storeAs('public/journal', $fileName);
        }
        else
        {
            $fileName = 'NoFile';   
        }

        $journal = new Journal;
        $userEmail = Auth::user()->email;

        //find the user. if not found then save in another non-user table
        for ($i=0; $i < $journalListOfAuthors; $i++)
        {
            $email = $request->input('authorEmailJour'. $i);
            $user = User::where('email', '=', $email)->first();


            if(!$user)
            {
                $co_user = NonUserClaim::where('email', '=', $email)->first();
                //if the co-author not found create
                if(!$co_user)
                {
                    $coUser = new NonUserClaim;
                    $coUser->first_name = $request->input('authorFirstNameJour'. $i);
                    $coUser->last_name = $request->input('authorLastNameJour'. $i);
                    $coUser->email = $request->input('authorEmailJour'. $i);
                    $coUser->save();
                }
                	
                //remember the non faculty that hasn't registered in user table
		        DB::table('rem_nonuser_claim')->insert(
		            ['email' => $email, 'article_title' => 'Jour'.$journalArticleTitle, 'faculty' => 0]
		        );
	            

            }
            else
            {
            	//remember the faculty user 
	            DB::table('rem_nonuser_claim')->insert(
	                ['email' => $email, 'article_title' => 'Jour'.$journalArticleTitle, 'faculty' => 1]
	            );

            }
            
        }


        $journal->email = $userEmail;
        $journal->prefix = $prefix;
        $journal->first_name = $firstName;
        $journal->last_name = $lastName;
        $journal->designation = $designation;
        $journal->department = $department;
        $journal->claim_type = $claimType;
        $journal->applying_for = $journalApplyingFor;
        $journal->journal_type = $journalType;
        $journal->article_title = $journalArticleTitle;
        $journal->list_of_authors = $journalListOfAuthors;
        $journal->authors_affiliation = $journalAuthorsAffiliation;
        $journal->name_of_journal = $nameOfJournal;
        $journal->publisher = $journalPublisher;
        $journal->isbn = $journalISBN;
        $journal->doi = $journalDOI;
        $journal->impact_factor = $journalImpactFactor;
        $journal->file_name = $fileName;
        $journal->save();
        return redirect('home')->with('success', 'Journal publication created');
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

        //return $nonUser;
                                
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