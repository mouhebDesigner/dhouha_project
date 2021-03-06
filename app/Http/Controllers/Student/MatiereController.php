<?php

namespace App\Http\Controllers\Student;

use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class MatiereController extends Controller
{
    public function index()
    {
        if(Auth::user()->isParent()){
            $matieres = Auth::user()->child->niveau->matieres()->get();
        } else if(Auth::user()->isStudent()) {
            
            $matieres = Auth::user()->niveau->matieres()->get();
        } else {
            $matieres = Matiere::all();

        }
        return view('student.matieres.index', compact('matieres'));
    }
    
    public function show($id)
    {
        $lessons = Matiere::find($id)->lessons()->get();
        $matiere = Matiere::find($id);
        if(Auth::user()->isParent()){

            return view('student.lessons.parentConnected', compact('examens',"matiere"));
            // return view('student.examens.parentConnected', compact('examens',"matiere"));
        }else {

            return view('student.lessons.index', compact('lessons', "matiere"));
            // return view('student.examens.index', compact('examens', "matiere"));
        }
    }
}
