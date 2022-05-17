<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        "label",
        "matiere_id"
    ];

    public function matiere(){
        return $this->belongsTo(Matiere::class);
    }
    
    public function activites(){
        return $this->hasMany(Activite::class);
    }
}
