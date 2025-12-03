<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RoadmapController::class,'index'])->name('home');
Route::post('/generate',[RoadmapController::class,'generate'])->name('generate.roadmap');
Route::get('/roadmap/{id}', [RoadmapController::class, 'detail'])->name('roadmap.detail');
Route::get('/roadmap',function(){
    return view('roadmap');
})->name('roadmap');


// route admin
Route::middleware(['role:admin'])->group(function(){
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/user',[UserController::class,'index'])->name('user');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
