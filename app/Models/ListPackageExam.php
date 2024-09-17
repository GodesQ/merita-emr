<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPackageExam extends Model
{
    use HasFactory;

    protected $table = "list_packagedtl";
    public $timestamps = false;

    protected $fillable = ["main_id", "exam_id"];
}
