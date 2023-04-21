<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetLabStatus extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->patient = $patient;
        $this->agency = $agency;
        $this->admission = $admission;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Review of Lab Results and Resetting of Your Medical Status')
        ->view('emails.reset-lab-status', ["patient" => $this->patient, "agency" => $this->agency, "admission" => $this->admission]);
    }
}
