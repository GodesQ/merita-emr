<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $classification, $email)
    {
        //
        $this->token = $token;
        $this->classification = $classification;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $token = $this->token;
        $classification = $this->classification;
        $email = $this->email;
        return $this->subject('Forgot Password')->view('/emails.forget-password', compact('token', 'classification', 'email'));
    }
}