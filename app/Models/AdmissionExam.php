<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionExam extends Model
{
    use HasFactory;
    protected $table = 'tran_admissiondtl';
    public $timestamps = false;
    
    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }
    
    public function exam() {
        return $this->belongsTo(ListExam::class);
    }
}

?>