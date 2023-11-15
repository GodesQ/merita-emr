<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyPrincipal extends Model
{
    use HasFactory;
    protected $table = 'mast_agency_principal';
    protected $fillable = ['main_id', 'principal_name'];

}
