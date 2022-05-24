<?php

namespace App\Http\Controllers\Student;

use App\Models\Activite;
use App\Models\Resultat;
use App\Models\Prevision;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class ActiviteController extends Controller
{
    public function show($id){
        $questions  = Activite::find($id)->questions()->get();
        $activite_id = $id;
        return view('student.examens.show', compact('questions', 'activite_id'));
    }

    public function store(Request $request, $activite_id){
        $resultat = new Resultat;
        $note = 0;
        foreach($request->question_ids as $id){
            if(Prevision::find($request->input('reponse'.$id))->reponse == 1){
                $note++;
            }
        }

        $questions = Activite::find($activite_id)->questions()->count();

        if($note < $questions){
            $message = true;
        } else {
            $message = false;
        }
        $resultat->note = $note;
        $resultat->bareme = $questions;
        $resultat->activite_id = $activite_id;

        $resultat->user_id = Auth::user()->id;

        $resultat->save();
        return redirect('activite/'.$activite_id.'/result');

    }

    public function result($id){
        if(Auth::user()->isStudent()){

            $note = Activite::find($id)->resultats()->where('user_id', Auth::id())->orderBy('created_at', 'desc')->first()->note;
            $matiere = Activite::find($id)->lesson->matiere->label;
            $bareme = Activite::find($id)->resultats()->where('user_id', Auth::id())->orderBy('created_at', 'desc')->first()->bareme;
        } else {
            $note = Activite::find($id)->resultats()->where('user_id', Auth::user()->child->id)->first()->note;
            $matiere = Activite::find($id)->matiere->label;
            $bareme = Activite::find($id)->resultats()->where('user_id', Auth::user()->child->id)->first()->bareme;
        }
        return view('student.examens.result', compact('note', 'matiere','bareme'));

    }
}
