<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPackage extends Model
{
    use HasFactory;
    protected $table = 'list_package';
    public $timestamps = false;
    
    
    public function admission()
    {
        return $this->hasOne(Admission::class, 'package_id', 'id');
    }
    
    public function patientinfo() {
        return $this->belongsTo(PatientInfo::class);
    }
    
    // public function exams() {
    //     return $this->hasMany(List);
    // }
}