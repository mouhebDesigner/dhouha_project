<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Requests\LessonRequest;
use RealRashid\SweetAlert\Facades\Alert;

class LessonController extends Controller
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
        $lessons = Lesson::orderBy('created_at', 'desc')->paginate(10);
        return view('lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lessons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LessonRequest $request)
    {
        Lesson::create($request->all());

        return redirect('admin/lessons')->with('created', 'لقد تمت إضافة الدرس بنجاح');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        return view('lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LessonRequest $request, Lesson $lesson)
    {
        $lesson->update($request->all());

        return redirect()->route('admin.lessons.index')->with('updated', 'لقد تم تعديل الدرس بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        
        $lesson->delete();

        return response()->json([
            "deleted" => "تم حذف الدرس بنجاح"
        ]);
    }

   
}
