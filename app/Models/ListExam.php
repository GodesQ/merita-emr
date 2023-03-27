<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListExam extends Model
{
    use HasFactory;

    protected $table = 'list_exam';
    public $timestamps = false;
    protected $guarded = [];

    public function ad_exams()
    {
        return $this->hasOne(AdmissionExam::class, 'exam_id');
    }
}
