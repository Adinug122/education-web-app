<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RoadmapController::class, 'index'])->name('home');


Route::middleware(['role:admin'])->group(function () {
      Route::get('/dashboard', [RoadmapController::class, 'dashboard'])
      ->name('dashboard');
    Route::get('/reports', [ReportController::class, 'index'])->name('admin.reports');
    Route::delete('/reports/{id}', [ReportController::class, 'destroy'])->name('reports.destroy');
    Route::put('/reports/{id}', [ReportController::class, 'update'])->name('admin.reports.update');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::put('/reports/{id}/fix-link', [ReportController::class, 'fixLink'])
        ->name('admin.reports.fixLink');
   Route::delete('/user/{id}', [UserController::class, 'destroy'])
    ->name('user.destroy');
});

Route::middleware('auth')->group(function () {
    Route::post('/roadmap/step/{id}/complete', [RoadmapController::class, 'toggleStep'])
        ->name('roadmap.step.complete');

    Route::post('/generate', [RoadmapController::class, 'generate'])->name('generate.roadmap');
    Route::get('/roadmap/{id}', [RoadmapController::class, 'detail'])->name('roadmap.detail');

    Route::delete('/roadmap/{id}', [RoadmapController::class, 'delete'])
        ->name('roadmap.delete');
    Route::get('/resource/{id}/reports', [ReportController::class, 'create'])->name('report.create');

    Route::post('/resource/{id}/reports', [ReportController::class, 'store'])->name('report.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
