<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    protected $fillable=[
        "label"
    ];

    public function students(){
        return $this->hasMany(User::class);
    }

    
    public function matieres(){
        return $this->hasMany(Matiere::class);
    }

    
}
