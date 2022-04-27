<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $activite_id)
    {   
        $activite = Activite::find($activite_id);
        $questions = Question::where('activite_id', $activite_id)->paginate(10);
        return view('questions.index', compact('questions', 'activite', 'activite_id') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($activite_id)
    {
        // $this->authorize('create');
        
        return view('questions.create', compact('activite_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request, $activite_id)
    {

        $question = new Question();
        
        $question->activite_id  = $activite_id;
        $question->question = $request->question;
        $question->save();
        
        if(Activite::find($activite_id)->type == "one")
        {
            $tab = array();
            $count = count($request->contenue);
            for($i = 1; $i < $count; $i++){
                if($request->reponse == $i){
                    array_push($tab, 1);
                }
                array_push($tab, 0);
            }
        }

        foreach($request->contenue as $key => $contenue){
            $prevision = new Prevision;
            $prevision->question_id = $question->id;
            if(Activite::find($activite_id)->type_prevision == "text")
                $prevision->contenue = $contenue;
            else {
                $prevision->contenue =  $contenue->store('images');
            }
            if(Activite::find($activite_id)->type == "one")
                $prevision->reponse = $tab[$key];
            else
                $prevision->reponse = $request->input('reponse'.($key+1));
            $prevision->save();

            echo $request->reponse;

        }
       


        return redirect('activites/'.$activite_id.'/questions')->with('added', 'تمت إضافة السؤال الجديد');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show($activite_id, Question $question)
    {
        $previsions = $question->pevisions;

        return view('previsions.index', compact('previsions', '$activite_id', 'question'));
        // 'quizzes/'.$activite_id.'/questions/'.$question->id.'/previsions'
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($activite_id, Question $question)
    {
        return view('questions.edit', compact('activite_id', 'question'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$activite_id,  Question $question)
    {


        if(Quiz::find($activite_id)->type_prevision == "text"){
            $request->validate([
                'question' => 'required',
                'contenue' => 'required',
                'reponse'  => 'required'
            ], [
                'contenue.required' => 'قم بإختبار الإجابة الصحيح',
            ]);
        } else {
            $request->validate([
                'question' => 'required',
                'reponse'  => 'required'
            ]);
        }

        $question->question = $request->question;
        $question->save();
        
        if(Quiz::find($activite_id)->type == "one" && !empty($request->contenue))
        {
            $tab = array();
            $count = count($request->contenue);
            for($i = 1; $i < $count; $i++){
                if($request->reponse == $i){
                    array_push($tab, 1);
                }
                array_push($tab, 0);
            }
        }

        if(!empty($request->contenue)){
            foreach($question->previsions as $key => $prevision){
                $prevision = Prevision::find($prevision->id);
                $prevision->question_id = $question->id;
                if(Quiz::find($activite_id)->type_prevision == "text")

                    $prevision->contenue = $request->contenue[$key];

                else {
                
                    if($request->hasFile('contenue')){
                        $prevision->contenue =  $request->contenue[$key]->store('images');
                    }
                }

                if(Quiz::find($activite_id)->type == "one")
                    $prevision->reponse = $tab[$key];
                else
                    $prevision->reponse = $request->input('reponse'.($key+1));

                $prevision->save();  
                
            }
        }   

        return redirect('activites/'.$activite_id.'/questions')->with('updated', 'تم تعديل السؤال ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($activite_id,Question $question)
    {
        $question->delete();

        foreach($question->previsions as $prevision)
        {
           echo  $prevision->delete();
        }

        return redirect('activites/'.$activite_id.'/questions')->with('deleted', 'تم حذف السؤال بنجاج');
    }
}
