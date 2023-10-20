<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientMedicalResult extends Model
{
    use HasFactory;
    protected $table = "patient_medical_result";
    protected $fillable = ["admission_id", "patient_id", "remarks", "prescription", "doctor_prescription", "reschedule_at", "generate_at", "status", "generate_at"];
}
