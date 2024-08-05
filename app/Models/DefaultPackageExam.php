<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultPackageExam extends Model
{
    use HasFactory;
    protected $table = "default_package_exams";
    protected $fillable = ["default_package_id", "exam_id"];
}
