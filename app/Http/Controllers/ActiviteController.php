<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;
use App\Http\Requests\ActiviteRequest;

class ActiviteController extends Controller
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
    public function index()
    {
        $activites = Activite::paginate(10);
        
        return view('activites.index', compact('activites') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActiviteRequest $request)
    {
        Activite::create($request->all());

        return redirect('admin/activites')->with('added', 'تمت إضافة الإختبار بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Activite $activite)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activite = Activite::find($id);
        return view('activites.edit', compact('activite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activite $activite)
    {

        $activite->update($request->all());


        return redirect('/activites')->with('added', 'تم تحديث الإختبار بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activite $activite)
    {
        $activite->delete();
        foreach($activite->questions as $question)
        {
            $question->delete();
        }

        return redirect('activites')->with('deleted', 'تم حذف الإختبار بنجاج');
    }
}
