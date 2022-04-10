<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\JuryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\studentRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) 
    {

        $students = User::where('role', 'etudiant')->orderBy('created_at', 'desc')->paginate(10);
        if(str_contains($request->path(), 'admin') && Auth::user()->isStudent()){
            abort(404);
        }
        if(session('created')){
            Alert::success('Success Title', session('created'));
        }
        if(session('updated')){
            Alert::success('Success Title', session('updated'));
        }

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student = User::create($request->all());
        
        if($request->hasFile('avatar')){
            $student->avatar = $request->avatar->store('resources');
        }
        $student->save();


        return redirect('students')->with('added', "تمت إضافة الطالب بنجاح");
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
    public function edit(User $student)
    {

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $student)
    {

        $validations_password = "";
        if($request->password != ""){
            $validations_password = "required | string | min:8 | confirmed";
        }
        $request->validate([
            "password" => $validations_password,
            "email" =>  "required | string | email | max:255 | unique:users,email,".$student->id.",id",
            'nom' => 'required | string | max:255',
            'prenom' => 'required | string | max:255',
            'date_naissance' => 'required',
        ]);


        $student->nom = $request->nom;
        $student->prenom = $request->prenom;
        $student->email = $request->email;
        if($request->password != ""){
            $student->password = Hash::make($request->password);
        }
      

        $student->save();



        return redirect('students')->with('updated', 'تم تعديل الطالب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        $student->delete();
        
         return response()->json([
            "deleted" => "تم حذف الطالب بنجاح"
        ]);
        
        
    }
}
