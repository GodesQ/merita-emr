<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardioVascular extends Model
{
    use HasFactory;
    protected $table = 'exam_cardio';
    public $timestamps = false;
    protected $guarded = [];

    public function admission() {
        return $this->belongsTo(Admission::class, 'admission_id');
    }

    public function first_tech() {
        return $this->belongsTo(User::class, 'technician_id');
    }
}
