<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;
    protected $table = 'mast_agency';
    protected $fillable = [
        'agencycode',
        'oldcode',
        'agencyname',
        'agencychild',
        'principal',
        'address',
        'telno',
        'faxno',
        'arrangement_type',
        'contactperson',
        'commission',
        'remarks',
        'email',
        'username',
        'password',
        'ad_password',
        'not_first',
        'created_date',
        'created_by',
        'updated_date',
        'updated_by'
    ];
    public $timestamps = false;
    protected $hidden = ['password', 'ad_password'];

    public function admission()
    {
        return $this->hasOne(Admission::class, 'agency_id', 'id');
    }

    public function packages()
    {
        return $this->hasMany(ListPackage::class, 'agency_id');
    }

    public function patientinfo()
    {
        return $this->belongsTo(PatientInfo::class);
    }

    public function vessels()
    {
        return $this->hasMany(AgencyVessel::class, 'main_id', 'id');
    }

    public function principals()
    {
        return $this->hasMany(AgencyPrincipal::class, 'main_id', 'id');
    }
}
