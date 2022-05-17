<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Auth;
class LessonStudentController extends Controller
{
    public function show($id)
    {
        $activites = Lesson::find($id)->activites()->get();
        $lesson = Lesson::find($id);
        if(Auth::user()->isParent()){

            return view('student.lessons.parentConnected', compact('examens',"matiere"));
            // return view('student.examens.parentConnected', compact('examens',"matiere"));
        }else {

            return view('student.examens.index', compact('activites', "lesson"));
            // return view('student.examens.index', compact('examens', "matiere"));
        }
    }
}
