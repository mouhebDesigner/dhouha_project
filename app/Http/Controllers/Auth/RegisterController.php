<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => ['required', 'string', 'max:255'],
            'niveau_id' => ['required'],
            'nom_parent' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'prenom_parent' => ['required', 'string', 'max:255'],
            'date_naissance' => ['required', 'date'],
            'email.*' => ['required', 'string', 'email', 'max:255'],
            'numtel' => ['required', 'numeric','unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'date_naissance' => $data['date_naissance'],
            'email' => $data['email'][0],
            'role' => 'etudiant',
            'numtel' => $data['numtel'],
            'password' => Hash::make($data['password']),
        ]);
        return User::create([
            'nom' => $data['nom_parent'],
            'prenom' => $data['prenom_parent'],
            'date_naissance' => $data['date_naissance'],
            'email' => $data['email_parent'],
            'numtel' => $data['numtel'],
            'role' => 'parent',
            'password' => Hash::make($data['password']),
        ]);
    }
}
