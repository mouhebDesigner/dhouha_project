<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Page;
use App\Models\Histoire;
use Illuminate\Http\Request;
use App\Http\Requests\PriceRequest;
use App\Http\Requests\histoireRequest;
use RealRashid\SweetAlert\Facades\Alert;

class HistoireController extends Controller
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
        $histoires = Histoire::orderBy('created_at', 'desc')->paginate(10);
        return view('histoires.index', compact('histoires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('histoires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $histoire = new Histoire();

        $histoire->titre = $request->titre;
        
        $histoire->save();

        if($request->hasFile('image')){
            foreach($request->image as $key => $image){
                $page = new Page();
                $page->image = $image->store('images');
                $page->vocal = $request->vocal[$key]->store('images');
                $page->histoire_id = $histoire->id;
                $page->save();
            }
        }

        return redirect('histoires')->with('created', 'لقد تمت إضافة القصة بنجاح');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(histoire $histoire)
    {
        return view('histoires.edit', compact('histoire'));
    }
    
    public function show(Histoire $histoire)
    {
        return view('histoires.show', compact('histoire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(histoireRequest $request, histoire $histoire)
    {
        $histoire->update($request->all());

        return redirect()->route('histoires.index')->with('updated', 'لقد تم تعديل المرحلة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(histoire $histoire)
    {
        
        $histoire->delete();

        return response()->json([
            "deleted" => "تم حذف القصة"
        ]);
    }

   
}
