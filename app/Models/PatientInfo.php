<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientInfo extends Model
{
    use HasFactory;

    protected $table = 'mast_patientinfo';
    public $timestamps = false;
    protected $fillable = [
        'main_id',
        'patientcode',
        'address',
        'contactno',
        'telno',
        'celno',
        'occupation',
        'occupation_other',
        'category',
        'position',
        'nationality',
        'religion',
        'religion_other',
        'maritalstatus',
        'agency_id',
        'principal',
        'referral',
        'agency_address',
        'country_destination',
        'medical_package',
        'payment_type',
        'admission_type',
        'vessel',
        'passportno',
        'passport_expdate',
        'srbno',
        'srb_expdate',
        'birthdate',
        'birthplace',
    ];
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'main_id');
    }

    public function agency() {
        return $this->hasOne(Agency::class, 'id', 'agency_id');
    }

    public function package() {
        return $this->hasOne(ListPackage::class, 'id', 'medical_package');
    }

}
