<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audiometry extends Model
{
    use HasFactory;
    protected $table = 'exam_audio';
    public $timestamps = false;
    
    public function admission() {
        $this->belongsTo(Admission::class, 'admission_id')->latest('id');
    }
}