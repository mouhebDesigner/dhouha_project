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
        "matiere_id"
    ];

    

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }
    public function questions(){
        return $this->hasMany(Question::class);
    }
    
    public function resultats(){
        return $this->hasMany(Resultat::class);
    }
}
