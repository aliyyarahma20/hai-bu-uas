<?php

use App\Http\Controllers\BookmarkController;
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
use App\Http\Controllers\UserActivityController;

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

// Route::get('/dashboard', function () {

//     /** @var \App\Models\User */
//     $user = auth()->user(); 
    
//     if ($user->hasRole('admin')) {
//         return redirect()->route('dashboard.module-bahasa.index');
//     } elseif ($user->hasRole('student')) {
//         return redirect()->route('pilih-bahasa');
//     }

//     return redirect('/'); // Default redirect jika role tidak terdefinisi
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route pilih bahasa setelah regristasi
Route::get('dashboard/pilih-bahasa', [ModuleStudentController::class, 'index'])->middleware('auth')->name('pilih-bahasa');
Route::post('pilih-bahasa', [ModuleStudentController::class, 'store'])->middleware('auth')->name('pilih.bahasa.store');    

Route::get('dashboard/pilih-bahasa/{moduleStudents}', [ModuleStudentController::class, 'edit'])->middleware('auth')->name('pilih.bahasa.edit');
Route::put('dashboard/pilih-bahasa/{moduleStudents}', [ModuleStudentController::class, 'update'])->middleware('auth')->name('pilih.bahasa.update');


// User Dashboard
Route::get('/user/dashboard/{id}', [ModuleStudentController::class, 'show'])->middleware(['auth', 'role:student'])->name('user.dashboard');

Route::get('/user/modules/{id}', [ModuleStudentController::class, 'showModules'])
    ->middleware('role:student')
    ->name('user.modules');

Route::get('/user/kamus/{id}', [ModuleStudentController::class, 'showKamus'])
->middleware('role:student')
->name('user.kamus');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['auth'])->group(function () {
        // View route
        Route::get('/streaks', function () {
            return view('streaks.index');
        })->name('streaks.index');
        
        // API routes
        Route::prefix('api')->group(function () {
            Route::get('/user-activities', [UserActivityController::class, 'index']);
            Route::post('/user-activities', [UserActivityController::class, 'store']);
            Route::get('/user-activities/streak', [UserActivityController::class, 'getStreak']);
        });
    });

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
        Route::resource('user', UserProgressController::class);

        // Route data kamus
        Route::resource('kamus', KamusController::class)
        ->middleware('role:admin');


        Route::get('/dashboard', [LearningController::class, 'index'])->name('dashboard');

        Route::get('/learning/finished/{module-bahasa}', [LearningController::class, 'learning_finished'])
        ->middleware('role:student')
        ->name('learning.finished.module-bahasa');

        Route::get('/learning/rapport/{module-bahasa}', [LearningController::class, 'learning_rapport'])
        ->middleware('role:student')
        ->name('learning.rapport.module-bahasa');

        Route::get('/learning/{moduleId?}', [LearningController::class, 'index'])
        ->middleware('role:student')
        ->name('learning.index');

        Route::get('/learning/{module-bahasa}/{quiz}', [LearningController::class, 'learning'])
        ->middleware('role:student')
        ->name('learning.module-bahasa');

        Route::post('/learning/{module-bahasa}/{quiz}', [StudentAnswerController::class, 'store'])
        ->middleware('role:student')
        ->name('learning.module-bahasa.answer.store');

    });

    Route::get('/bookmarks', [BookmarkController::class, 'index'])->name('bookmarks.index');
    Route::post('/bookmarks', [BookmarkController::class, 'store'])->name('bookmarks.store');
    Route::delete('/bookmarks/{bookmark}', [BookmarkController::class, 'destroy'])->name('bookmarks.destroy');

    Route::get('/kamus/{id}', [KamusController::class, 'show'])->name('kamus.show');
    Route::get('/module/bahasa/{moduleBahasa}', [ModuleBahasaController::class, 'show'])
    ->name('module.bahasa.show');
});

require __DIR__.'/auth.php';
