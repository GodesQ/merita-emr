<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dental extends Model
{
    use HasFactory;
    protected $table = 'exam_dental';
    public $timestamps = false;
    protected $guarded = [];
    protected $fillable = [
        'trans_date', 'admission_id', 'hygiene', 'gingiva', 'color', 'tongue', 'high_blood', 'diabetis', 'tuberculosis', 'hepatitis', 
        'goiter', 'allergy', 'food', 'drugs', 'anesthesia', 'fainting', 'others', 'tooth18', 'tooth17', 
        'tooth16', 'tooth15', 'tooth14', 'tooth13', 'tooth12', 'tooth11', 'tooth21', 'tooth22', 
        'tooth23', 'tooth24', 'tooth25', 'tooth26', 'tooth27', 'tooth28', 'tooth48', 'tooth47', 
        'tooth46', 'tooth45', 'tooth44', 'tooth43', 'tooth42', 'tooth41', 'tooth31', 'tooth32', 
        'tooth33', 'tooth34', 'tooth35', 'tooth36', 'tooth37', 'tooth38', 'decidous1', 'decidous2', 
        'dentition1', 'dentition2', 'dentition18', 'dentition17', 'dentition16', 'dentition15', 
        'dentition14', 'dentition13', 'dentition12', 'dentition11', 'dentition21', 'dentition22', 
        'dentition23', 'dentition24', 'dentition25', 'dentition26', 'dentition27', 'dentition28', 
        'dentition48', 'dentition47', 'dentition46', 'dentition45', 'dentition44', 'dentition43', 
        'dentition42', 'dentition41', 'dentition31', 'dentition32', 'dentition33', 'dentition34', 
        'dentition35', 'dentition36', 'dentition37', 'dentition38', 'remarks_status', 'remarks', 
        'recommendation', 'technician_id'
    ];

    public function admission() {
        return $this->belongsTo(Admission::class, 'admission_id');
    }
}
