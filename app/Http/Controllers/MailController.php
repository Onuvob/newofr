<?php

namespace App\Http\Controllers;

use App\Mail\AddReviewerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\ResearchGrant;
use Illuminate\Support\Facades\DB;
use App\Reviewer;

use App\Http\Controllers\Reviewer\ReviewerController;

class MailController extends Controller
{

    private $reviewController;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // Laravel know it has to inject an instance of SomeService when resolving the controller
    public function __construct(ReviewerController $reviewController)
    {
        $this->reviewController = $reviewController;

        $this->middleware('auth');
    }


    //
    public function sendEmail(Request $request)
    {
    	$id = $request->input('researchGrantId');


        $resGrant = ResearchGrant::where('id', $id)->first();

        //Updating Publication status "Pending" to "Reviewing"
        //DB::table('research_grants')->where('id', $id)->update(['pub_status' => 'Reviewing']);

        $resGrant->pub_status = "Reviewing";

        $resGrant->save();

        $resGrantApplicant = $resGrant->prefix .' '. $resGrant->first_name .' '. $resGrant->last_name;

        //Calling store method from Reviewer Controller to store the reviewer email and research grant id
        $this->reviewController->store($request, $resGrantApplicant, $resGrant->topic);


    	Mail::send(new AddReviewerMail());

    	return redirect('ongoingresearch/'. $id );
    }
}
