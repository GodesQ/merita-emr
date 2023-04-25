<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReAssessment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($admission, $patient, $schedule, $pdf)
    {
        //
        $this->data = $admission;
        $this->patient = $patient;
        $this->schedule = $schedule;
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
            $data = $this->data;
            $schedule = $this->schedule;
            $patient = $this->patient;
            return $this->from('processing@meritaclinic.ph')->subject('Laboratory Result Status')
            ->view('emails.reassessment', compact('data', 'schedule', 'patient'))
            ->attachData($this->pdf->output(), 'prescription.pdf');
        } else {
            $data = $this->data;
            $schedule = $this->schedule;
            $patient = $this->patient;
            return $this->from('processing@meritaclinic.ph')->subject('Laboratory Result Status')
            ->view('emails.reassessment', compact('data', 'schedule', 'patient'));
        }

    }
}
