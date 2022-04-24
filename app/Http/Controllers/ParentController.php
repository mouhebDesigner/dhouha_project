<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\JuryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\parentRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {

        $parents = User::where('role', 'etudiant')->orderBy('created_at', 'desc')->paginate(10);
        if(str_contains($request->path(), 'admin') && Auth::user()->isParent()){
            abort(404);
        }
        if(session('created')){
            Alert::success('Success Title', session('created'));
        }
        if(session('updated')){
            Alert::success('Success Title', session('updated'));
        }

        return view('parents.index', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParentRequest $request)
    {
        $parent = User::create($request->all());
        
        if($request->hasFile('avatar')){
            $parent->avatar = $request->avatar->store('resources');
        }
        $parent->save();


        return redirect('parents')->with('added', "تمت إضافة الطالب بنجاح");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $parent)
    {

        return view('parents.edit', compact('parent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $parent)
    {

        $validations_password = "";
        if($request->password != ""){
            $validations_password = "required | string | min:8 | confirmed";
        }
        $request->validate([
            "password" => $validations_password,
            "email" =>  "required | string | email | max:255 | unique:users,email,".$parent->id.",id",
            'nom' => 'required | string | max:255',
            'prenom' => 'required | string | max:255',
            'date_naissance' => 'required',
        ]);


        $parent->nom = $request->nom;
        $parent->prenom = $request->prenom;
        $parent->email = $request->email;
        if($request->password != ""){
            $parent->password = Hash::make($request->password);
        }
      

        $parent->save();



        return redirect('parents')->with('updated', 'تم تعديل الطالب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $parent)
    {
        $parent->delete();
        
         return response()->json([
            "deleted" => "تم حذف الطالب بنجاح"
        ]);
        
        
    }
}
