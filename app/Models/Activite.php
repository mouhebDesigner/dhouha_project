<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "type_prevision",
        "nbr_prevision",
        "lesson_id"
    ];

    

    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    
    public function resultats(){
        return $this->hasMany(Resultat::class);
    }
}
