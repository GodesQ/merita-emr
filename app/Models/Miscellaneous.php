<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miscellaneous extends Model
{
    use HasFactory;
    protected $table = 'examlab_misc';
    public $timestamps = false;
    protected $guarded = [];

    public function admission() {
        $this->belongsTo(Admission::class, 'admission_id');
    }
}
