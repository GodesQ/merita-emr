<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientInfo extends Model
{
    use HasFactory;

    protected $table = 'mast_patientinfo';
    public $timestamps = false;
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function agency() {
        return $this->hasOne(Agency::class, 'id', 'agency_id');
    }

    public function package() {
        return $this->hasOne(ListPackage::class, 'id', 'medical_package');
    }

}
