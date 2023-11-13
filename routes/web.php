<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompositionTitleController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\CommunityController;

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
    return view('auth.login');
});

/*cmmunity*/
Route::middleware('auth')->group(function () {
    Route::get('/community', [UserController::class, 'communityIndex'])->name('community');
    Route::get('/community/create', [CommunityController::class, 'create'])->name('create_community');
    Route::post('/community', [CommunityController::class, 'store'])->name('store_community');
    Route::get('/community/{community}', [CommunityController::class, 'index'])->name('performances');
    Route::post('/practicenote/performance', [PerformanceController::class, 'store'])->name('upload_performance');
    Route::post('/practicenote/performance/{performance}', [PerformanceController::class, 'update'])->name('update_performance');
});

/*practicenote*/
Route::middleware('auth')->group(function () {
    Route::get('/practicenote', [UserController::class, 'compositionTitleIndex'])->name('practicenote');
    Route::get('/practicenote/{composition_title}', [CompositionTitleController::class, 'index'])->name('performances');
    Route::post('/practicenote/performance', [PerformanceController::class, 'store'])->name('upload_performance');
    Route::get('/practicenote/performance/{performance}/edit', [PerformanceController::class, 'edit'])->name('edit_performance');
    Route::get('/practicenote/performance/{performance}', [PerformanceController::class, 'show'])->name('show_performance');
    Route::put('/practicenote/performance/{performance}', [PerformanceController::class, 'update']);
    Route::post('/practicenote', [CompositionTitleController::class, 'store'])->name('save_composition_title');
    Route::post('/practicenote/performance/{feedback}', [PerformanceController::class, 'sendComment'])->name('comment');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
