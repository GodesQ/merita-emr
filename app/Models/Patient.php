<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'mast_patient';
    public $timestamps = false;
    public $guarded = [];

    public function admission()
    {
        return $this->hasOne(Admission::class, 'id', 'admission_id');
    }

    public function patientinfo()
    {
        return $this->hasOne(PatientInfo::class, 'main_id');
    }

    public function sched_patients() {
        return $this->hasOne(SchedulePatient::class, 'patient_id');
    }

    public function declaration_form() {
        return $this->hasOne(DeclarationForm::class, 'main_id');
    }

    public function medical_history() {
        return $this->hasOne(MedicalHistory::class, 'main_id');
    }
}
