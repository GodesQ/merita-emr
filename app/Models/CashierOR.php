<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashierOR extends Model
{
    use HasFactory;
    protected $table = 'actgtran_or';
    public $timestamps = false;
    protected $guarded = [];

    public function admission() {
        return $this->hasOne(Admission::class, 'id', 'admission_id');
    }
}
