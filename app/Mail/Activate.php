<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Activate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($refferal)
    {
        //
        $this->data = $refferal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $data = $this->data;
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->subject('Activate Refferal Slip')
            ->view('emails.activate', compact('data'));
    }
}