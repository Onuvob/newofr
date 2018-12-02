<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

use App\ResearchGrant;
use Illuminate\Support\Facades\DB;

class AddReviewerMail extends Mailable
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {

        $id = $request->input('researchGrantId');

        //getting instances for Research Grant
        $researchgrant = DB::table('research_grants')->where('id', $id)->first();

        $data = [

           'intro_back' => $researchgrant->intro_back,
           'res_id' => $researchgrant->id,
           
        ];

        //return $researchgrant;

        return $this->markdown('Mail.AddReviewer')
                    ->to($request->input('reviewerEmail'))
                    ->from('sonjoy.tripura.cse@ulab.edu.bd')
                    ->attachFromStorage('/public/reviewerfile/Evaluation.docx', 'Intent Evaluation Form.docx')
                    ->with( 'data', $data );
    }
}
