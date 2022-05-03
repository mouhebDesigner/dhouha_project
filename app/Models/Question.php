<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function reponseActivites(){
        return $this->hasMany(ReponseActivite::class);
    }

    public function activite(){
        return $this->belongsTo(Activite::class);
    }

    public function previsions(){
        return $this->hasMany(Prevision::class);
    }
}
