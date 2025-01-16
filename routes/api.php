<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\Api\StreakController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('/user-activities', [UserActivityController::class, 'index']);
    Route::post('/user-activities', [UserActivityController::class, 'store']);
    Route::get('/user-activities/streak', [UserActivityController::class, 'showStreak']);
});


Route::get('/streaks', [StreakController::class, 'index']);
Route::get('/streaks/{id}', [StreakController::class, 'show']);
Route::post('/streaks', [StreakController::class, 'store']);
Route::put('/streaks/{id}', [StreakController::class, 'update']);
Route::delete('/streaks/{id}', [StreakController::class, 'destroy']);

// Endpoint untuk mendapatkan data streak
Route::get('/streaks', [StreakController::class, 'showStreak']);