<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'mast_patient';
    public $timestamps = false;
    protected $fillable = [
        'patientcode',
        'patient_image',
        'patient_signature',
        'lastname',
        'firstname',
        'middlename',
        'suffix',
        'email',
        'gender',
        'age',
        'position_applied',
        'license_no',
        'license_date',
        'username',
        'password',
        'signature',
        'default_signature',
        'registered_patientcode',
        'ynactive',
        'yndelete',
        'isVerify',
        'referral_id',
        'admission_id',
        'created_date',
        'medical_done_date',
        're_assessment_date',
        'fit_to_work_date',
        'unfit_to_work_date',
        'created_by',
        'updated_date',
        'updated_by',
    ];

    public $guarded = ['password'];

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
