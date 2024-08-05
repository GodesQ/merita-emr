<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultPackage extends Model
{
    use HasFactory;
    protected $table = "default_packages";
    protected $fillable = ["package_name", "peso_price", "dollar_price"];
}
