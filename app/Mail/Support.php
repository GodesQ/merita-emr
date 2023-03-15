<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Support extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $data = $this->data;
        $image = public_path('/app-assets/images/support/' . $data['ss_issue']);
        return $this->subject('Support Email from Merita!')
        ->view('emails.support', compact('data'))
        ->attach($image);
    }
}