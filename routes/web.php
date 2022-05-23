<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\HistoireController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PrevisionController;
use App\Http\Controllers\LessonStudentController;
use App\Http\Controllers\Student\MatiereController;
use App\Http\Controllers\Student\ActiviteController as ActiviteControllerStudent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('niveaux', NiveauController::class);
        Route::resource('histoires', HistoireController::class);
        Route::resource('students', StudentController::class)->except(['create', 'store']);
        Route::resource('parents', ParentController::class)->except(['create', 'store']);
        Route::resource('matieres', SubjectController::class);
        Route::resource('lessons', LessonController::class);
        Route::resource('activites', ActiviteController::class);
        Route::get('questions/{question_id}/previsions', [PrevisionController::class, 'index']);
        Route::get('questions/{id}/edit', [QuestionController::class, 'edit']);
        Route::put('questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
        Route::delete('questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
        Route::get('activites/{id}/questions', [QuestionController::class, 'index']);
        Route::get('activites/{id}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('activites/{id}/questions', [QuestionController::class, 'store'])->name('questions.store');
    });
});
Auth::routes();
// STUDENT PART ------------------------------------------
Route::resource('matieres', MatiereController::class)->only('index', 'show');
Route::get('matiere/{id}/lessons', [MatiereController::class, 'show']);
Route::get('lesson/{id}/activites', [LessonStudentController::class, 'show']);
Route::get('examens/{id}', [ActiviteControllerStudent::class, 'show']);
Route::post('activite/{id}', [ActiviteControllerStudent::class, 'store']);
Route::get('activite/{id}/result', [ActiviteControllerStudent::class, 'result']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/testajax/{niveau}', function($niveau){
    $matieres = App\Models\Matiere::where('niveau_id', $niveau)->get();
    return response()->json($matieres);
});
Route::get('archives', function(){
    return view('student.archives.index');
})->name('archives.index')->middleware('auth');
Route::get('/matiere/{matiere}/lessonsJson', function($matiere){
    $lessons = App\Models\Lesson::where('matiere_id', $matiere)->get();
    return response()->json($lessons);
});
