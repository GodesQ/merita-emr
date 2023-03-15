<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ishihara extends Model
{
    use HasFactory;
    protected $table = 'exam_ishihara';
    public $timestamps = false;
    
    public function admission() {
        $this->belongsTo(Admission::class, 'admission_id');
    }
}