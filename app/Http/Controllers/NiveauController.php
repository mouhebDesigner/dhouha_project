<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Niveau;
use Illuminate\Http\Request;
use App\Http\Requests\PriceRequest;
use App\Http\Requests\NiveauRequest;
use RealRashid\SweetAlert\Facades\Alert;

class NiveauController extends Controller
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
        $niveaux = Niveau::orderBy('created_at', 'desc')->paginate(10);
        return view('niveaux.index', compact('niveaux'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('niveaux.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NiveauRequest $request)
    {
        Niveau::create($request->all());

        return redirect('niveaux')->with('created', 'لقد تمت إضافة المرحلة بنجاح');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Niveau $niveau)
    {
        return view('niveaux.edit', compact('niveau'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NiveauRequest $request, Niveau $niveau)
    {
        $niveau->update($request->all());

        return redirect()->route('niveaux.index')->with('updated', 'لقد تم تعديل المرحلة بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Niveau $niveau)
    {
        
        $niveau->delete();

        return response()->json([
            "deleted" => "price is deleted"
        ]);
    }

   
}
