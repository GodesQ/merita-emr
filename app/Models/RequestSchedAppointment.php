<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestSchedAppointment extends Model
{
    use HasFactory;
    protected $table = "request_sched_appointments";

    protected $fillable = ["patient_id", "agency_id", "schedule_date", "reason", "status"];

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function agency() {
        return $this->belongsTo(Agency::class, 'agency_id');
    }
}
