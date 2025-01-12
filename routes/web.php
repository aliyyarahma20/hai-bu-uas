<?php

use App\Http\Controllers\KamusController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\ModuleBahasaController;
use App\Http\Controllers\ModuleStudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\StudentAnswerController;
use App\Http\Controllers\UserProgressController;
use App\Models\ModuleStudents;
use GuzzleHttp\Middleware;
use App\Models\User;
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

    /** @var \App\Models\User */
    $user = auth()->user(); 
    
    if ($user->hasRole('admin')) {
        return redirect()->route('dashboard.module-bahasa.index');
    } elseif ($user->hasRole('student')) {
        return redirect()->route('user.dashboard');
    }

    return redirect('/'); // Default redirect jika role tidak terdefinisi
})->middleware(['auth', 'verified'])->name('dashboard');



// User Dashboard
Route::get('/user/dashboard', function () {
    return view('users.dashboard_user');
})->middleware(['auth', 'role:student'])->name('user.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pilih-bahasa', [ModuleStudentController::class, 'index'])->name('pilih-bahasa');
    Route::get('/pilih-bahasa', [ModuleStudentController::class, 'create'])->name('pilih.bahasa.create');
    Route::post('/pilih-bahasa', [ModuleStudentController::class, 'store'])->name('pilih.bahasa.store');

    Route::prefix('dashboard')->name('dashboard.')->group(function (){

        // Route untuk CRUD module bahasa
        Route::resource('module-bahasa',ModuleBahasaController::class)
        ->middleware('role:admin');

        // Route untuk CRUD kuis
        Route::get('/question/create/{moduleBahasa}', [QuestionController::class, 'create'])
        ->middleware('role:admin')
        ->name('module-bahasa.create.question');

        Route::post('/question/question/save/{moduleBahasa}', [QuestionController::class, 'store'])
        ->middleware('role:admin')
        ->name('module-bahasa.create.question.store');

        Route::resource('question', QuestionController::class)
        ->middleware('role:admin');

        // Route untuk data pengguna
        Route::resource('user', UserProgressController::class)
        ->middleware('role:admin');

        // Route data kamus
        Route::resource('kamus', KamusController::class)
        ->middleware('role:admin');
    

        Route::get('/module-bahasa/students/show/{module-bahasa}', [ModuleStudentController::class, 'index'])
        ->middleware('role:admin')
        ->name('module-bahasa-students.index');

        Route::get('/module-bahasa/students/create/{module-bahasa}', [ModuleStudentController::class, 'create'])
        ->middleware('role:admin')
        ->name('module-bahasa.students.create');

        Route::post('/module-bahasa/students/save/{module-bahasa}', [ModuleStudentController::class, 'store'])
        ->middleware('role:admin')
        ->name('module-bahasa.students.store');

        Route::get('/dashboard', [LearningController::class, 'index'])->name('dashboard');
      

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
