<?php

use App\Http\Controllers\LearningController;
use App\Http\Controllers\ModuleBahasaController;
use App\Http\Controllers\ModuleStudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentAnswerController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
})->name('landingpage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('dashboard')->name('dashboard.')->group(function (){

        Route::resource('module-bahasa',ModuleBahasaController::class)
        ->middleware('role:admin');

        Route::get('module-bahasa/quiz/question/create/{quiz}', [QuestionController::class, 'create'])
        ->middleware('role:admin')
        ->name('module-bahasa.quiz.question.create');

        Route::post('/quiz/question/save/{quiz}', [QuestionController::class, 'store'])
        ->middleware('role:admin')
        ->name('module-bahasa.quiz.create.question.store');

        Route::resource('quiz-question', QuizController::class)
        ->middleware('role:admin');

        Route::get('/module-bahasa/students/show/{module-bahasa}', [ModuleStudentController::class, 'index'])
        ->middleware('role:admin')
        ->name('module-bahasa-students.index');

        Route::get('/module-bahasa/students/create/{module-bahasa}', [ModuleStudentController::class, 'create'])
        ->middleware('role:admin')
        ->name('module-bahasa.student.create');

        Route::post('/module-bahasa/students/save/{module-bahasa}', [ModuleStudentController::class, 'store'])
        ->middleware('role:admin')
        ->name('module-bahasa.student.store');

        Route::get('/learning/finished/{module-bahasa}', [LearningController::class, 'learning_finished'])
        ->middleware('role:student')
        ->name('learning.finished.module-bahasa');

        Route::get('/learning/rapport/{module-bahasa}', [LearningController::class, 'learning_rapport'])
        ->middleware('role:student')
        ->name('learning.rapport.module-bahasa');

        Route::get('/learning', [LearningController::class, 'index'])
        ->middleware('role:student')
        ->name('learning.index');

        Route::get('/learning/{module-bahasa}/{quiz}', [LearningController::class, 'learning'])
        ->middleware('role:student')
        ->name('learning.module-bahasa');

        Route::post('/learning/{module-bahasa}/{quiz}', [StudentAnswerController::class, 'store'])
        ->middleware('role:student')
        ->name('learning.module-bahasa.answer.store');

    });
});

require __DIR__.'/auth.php';
