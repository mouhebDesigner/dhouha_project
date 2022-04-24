<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Matiere;
use Illuminate\Http\Request;
use App\Http\Requests\MatiereRequest;
use App\Http\Requests\SubjectRequest;
use RealRashid\SweetAlert\Facades\Alert;

class SubjectController extends Controller
{
     public function __construct(){
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(str_contains($request->path(), 'admin') && Auth::user()->isStudent()){
            abort(404);
        }
        if(session('created')){
            Alert::success('Success Title', session('created'));
        }
        if(session('updated')){
            Alert::success('Success Title', session('updated'));
        }
        $matieres = Matiere::orderBy('created_at', 'desc')->paginate(10);
        return view('matieres.index', compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matieres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        Matiere::create($request->all());

        return redirect('subjects')->with('created', 'لقد تمت إضافة المادة بنجاح');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Matiere $matiere)
    {
        return view('matieres.edit', compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, Matiere $matiere)
    {
        $matiere->update($request->all());

        return redirect()->route('matieres.index')->with('updated', 'لقد تم تعديل المادة بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matiere $matiere)
    {
        
        $matiere->delete();

        return response()->json([
            "deleted" => "Matiere est supprimé"
        ]);
    }

   
}
