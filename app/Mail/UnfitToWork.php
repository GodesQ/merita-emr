<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UnfitToWork extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($patient, $agency, $admission, $cause_of_unfit)
    {
        //
        $this->patient = $patient;
        $this->agency = $agency;
        $this->admission = $admission;
        $this->cause_of_unfit = $cause_of_unfit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('processing@meritaclinic.ph')->subject('Laboratory Result Status')
        ->view('emails.unfit-to-work', ["patient" => $this->patient, "agency" => $this->agency, "admission" => $this->admission, "cause_of_unfit" => $this->cause_of_unfit]);
    }
}
