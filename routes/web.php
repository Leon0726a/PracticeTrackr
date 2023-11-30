<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompositionTitleController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\FeedbackController;

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
    Route::get('/communities', [UserController::class, 'communityIndex'])->name('community');
    Route::get('/communities/create', [CommunityController::class, 'create'])->name('communities.create');
    Route::post('/communities', [CommunityController::class, 'store'])->name('communities.store');
    Route::post('/communities/search', [CommunityController::class, 'search'])->name('communities.search');
    Route::get('/communities/{community}', [CommunityController::class, 'show'])->name('communities.show');
    Route::post('/community/{community}/join', [CommunityController::class, 'joinCommunity'])->name('communities.join');
    Route::post('/community/{community}/leave', [CommunityController::class, 'leave'])->name('communities.leave');
    Route::post('/community/{community}/upload', [CommunityController::class, 'performanceStore'])->name('communities.upload_performance');
});

/*practicenote*/
Route::middleware('auth')->group(function () {
    Route::get('/practicenote', [UserController::class, 'compositionTitleIndex'])->name('practicenote');
    Route::delete('/practicenote/{composition_title}', [CompositionTitleController::class, 'delete'])->name('delete_composition_title');
    Route::get('/practicenote/{composition_title}', [CompositionTitleController::class, 'index'])->name('performances');
    Route::post('/practicenote/performance', [PerformanceController::class, 'store'])->name('upload_performance');
    Route::get('/practicenote/performance/{performance}/edit', [PerformanceController::class, 'edit'])->name('edit_performance');
    Route::get('/practicenote/performance/{performance}', [PerformanceController::class, 'show'])->name('show_performance');
    Route::put('/practicenote/performance/{performance}', [PerformanceController::class, 'update']);
    Route::post('/practicenote', [CompositionTitleController::class, 'store'])->name('save_composition_title');
    Route::post('/practicenote/performance/feedback', [FeedbackController::class, 'sendComment'])->name('feedback');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
