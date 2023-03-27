<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListSection extends Model
{
    use HasFactory;
    protected $table = 'list_section';
    public $timestamps = false;
    protected $guarded = [];
}
