<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        "niveau_id"
    ];

    public function niveau(){
        return $this->belongsTo(Niveau::class);
    }

    public function activites(){
        return $this->hasMany(Activite::class);
    }
}
