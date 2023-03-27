<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReassessmentFindings extends Model
{
    use HasFactory;
    protected $table = 'reassessment';
    public $timestamps = false;
    protected $guarded = [];
}
