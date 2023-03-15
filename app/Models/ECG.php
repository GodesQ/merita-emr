<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ECG extends Model
{
    use HasFactory;
    protected $table = 'exam_ecg';
    public $timestamps = false;
    
    public function admission() {
        $this->belongsTo(Admission::class, 'admission_id');
    }
}