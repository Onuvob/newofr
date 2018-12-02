<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AcceptedClaimMail extends Mailable
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

    //private $email;
    //private $id;
    private $author;
    private $claim;

    public function __construct($author, $claim)
    {
        $this->author = $author;
        $this->claim = $claim;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $data = [
            
           'firstName' => $this->author->first_name,
           'lastName' => $this->author->last_name,
           'claimId' => $this->claim->id,
           'claimType' => $this->claim->claim_type,

           'rewardPoints' => $this->claim->reward_points,
           'cashRewards' => $this->claim->cash_rewards,
           
        ];

        return $this->markdown('Mail.AcceptedClaim')
                    ->to( $this->author->email )
                    ->from('sonjoy.tripura.cse@ulab.edu.bd')
                    ->with( 'data', $data );
    }
}
