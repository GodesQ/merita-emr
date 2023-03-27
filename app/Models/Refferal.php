<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refferal extends Model
{
    use HasFactory;
    protected $table = 'refferal';
    public $timestamps = false;
    protected $guarded = [];

    public function package() {
        return $this->belongsTo(ListPackage::class, 'package_id');
    }

    public function agency() {
        return $this->belongsTo(Agency::class, 'agency_id');
    }

    public function patient() {
        return $this->hasOne(Patient::class, 'email', 'email_employee');
    }

}
