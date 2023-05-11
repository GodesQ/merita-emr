<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUpResult extends Model
{
    use HasFactory;
    protected $table = 'followup_results';
    protected $guarded = [''];
}
