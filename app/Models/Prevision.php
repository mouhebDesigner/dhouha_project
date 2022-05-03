<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prevision extends Model
{
    use HasFactory;

    protected $fillable = ['description', 'reponse', 'resultat'];
    
    public function reponseQuiz(){
        return $this->hasOne(ReponseQuiz::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
