<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardioVascular extends Model
{
    use HasFactory;
    protected $table = 'exam_cardio';
    public $timestamps = false;
    
    public function admission() {
        $this->belongsTo(Admission::class, 'admission_id');
    }
}