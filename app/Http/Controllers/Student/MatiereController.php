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
        } else {
            
            $matieres = Auth::user()->niveau->matieres()->get();
        }
        return view('student.matieres.index', compact('matieres'));
    }
    
    public function show($id)
    {
        $examens = Matiere::find($id)->activites()->get();
        if(Auth::user()->isParent()){

            return view('student.examens.parentConnected', compact('examens'));
        }else {

            return view('student.examens.index', compact('examens'));
        }
    }
}
