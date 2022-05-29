<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Auth;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'parent_name',
        'prenom',
        'date_naissance',
        'genre',
        'email',
        'role',
        'password',
        'numtel',
        'niveau_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function niveau(){
        return $this->belongsTo(Niveau::class);
    }

    public function parent(){
        return $this->hasOne(User::class, 'id', 'parent_id');
    }
    public function resultats(){
        return $this->hasMany(Resultat::class);
    }
    
    public function child(){
        return $this->belongsTo(User::class, 'id', 'parent_id');
    }

    public function isStudent(){
        return Auth::user()->role == "etudiant";
    }
    public function isParent(){
        return Auth::user()->role == "parent";
    }
    public function isAdmin(){
        return Auth::user()->role == "admin";
    }

    
}
