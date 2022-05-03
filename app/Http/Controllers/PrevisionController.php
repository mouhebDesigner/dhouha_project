<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class PrevisionController extends Controller
{
    public function index($question_id)
    {
        
        $previsions = Question::find($question_id)->previsions()->get();
        return view('previsions.index', compact('previsions'));
    
    }
}
