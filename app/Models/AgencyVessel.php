<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyVessel extends Model
{
    use HasFactory;
    protected $table = 'mast_agency_vessel';
    protected $fillable = ['main_id', 'vesselname'];
}
