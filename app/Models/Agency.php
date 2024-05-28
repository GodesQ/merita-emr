<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $table = 'mast_agency';
    public $timestamps = false;
    protected $guarded = ['password', 'ad_password'];
    protected $hidden = ['password'];


        public function admission()
    {
        return $this->hasOne(Admission::class, 'agency_id', 'id');
    }

    public function packages() {
        return $this->hasMany(ListPackage::class, 'agency_id');
    }

    public function patientinfo() {
        return $this->belongsTo(PatientInfo::class);
    }

    public function vessels() {
        return $this->hasMany(AgencyVessel::class, 'main_id', 'id');
    }

    public function principals() {
        return $this->hasMany(AgencyPrincipal::class, 'main_id', 'id');
    }
}
