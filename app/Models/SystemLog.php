<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    use HasFactory;
    protected $table = "system_logs";
    protected $fillable = ['user_id', 'classification', 'dept_id', 'action', 'model', 'context'];
}
