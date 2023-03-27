<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeLog extends Model
{
    use HasFactory;
    protected $table = 'employee_logs';
    public $timestamps = false;
    protected $guarded = [];
}
