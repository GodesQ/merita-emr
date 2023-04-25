<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UnfitTempToWork extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($patient, $agency, $admission)
    {
        //
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
        return $this->from('processing@meritaclinic.ph')->subject('Laboratory Result Status')
        ->view('emails.unfittemp-to-work', ["patient" => $this->patient, "agency" => $this->agency, "admission" => $this->admission]);
    }
}
