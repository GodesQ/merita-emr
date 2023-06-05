<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartAccount extends Model
{
    use HasFactory;
    protected $table = 'actgmast_coa';
    public $timestamps = false;
    protected $guarded = [];
}
