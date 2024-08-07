<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FitToWork extends Mailable
{
    use Queueable, SerializesModels;

    public $patient;
    public $agency;
    public $admission;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($patient, $agency, $admission, $pdf)
    {
        $this->patient = $patient;
        $this->agency = $agency;
        $this->admission = $admission;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdf = $this->pdf;
        if($pdf != null) {
            return $this->from('processing@meritaclinic.ph')->subject('Medical Result Status')->view('emails.fit-to-work', ["patient" => $this->patient, "agency" => $this->agency, "admission" => $this->admission])
            ->attachData($this->pdf->output(), 'prescription.pdf');
        } else {
             return $this->from('processing@meritaclinic.ph')->subject('Medical Result Status')->view('emails.fit-to-work', ["patient" => $this->patient, "agency" => $this->agency, "admission" => $this->admission]);
        }
    }
}
