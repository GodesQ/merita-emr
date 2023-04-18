<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeclarationForm extends Model
{
    use HasFactory;
    protected $table = 'declaration_form';
    protected $guarded = [];
    public $timestamps = false;

    public function patient() {
        return $this->hasOne(Patient::class, 'main_id');
    }

}
