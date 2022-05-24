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
        
        
        if($request->hasFile('file')){
            $histoire->file = $request->file->store('images');
        }
        
        $histoire->save();
        return redirect('admin/histoires')->with('created', 'لقد تمت إضافة القصة بنجاح');
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
        if($request->hasFile('file')){
            $histoire->file = $request->file->store('images');
        }
        $histoire->save();

        return redirect()->route('admin.histoires.index')->with('updated', 'لقد تم تعديل المرحلة بنجاح');
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
