<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\facultyController;
use App\Http\Controllers\hodController;
use App\Http\Controllers\principalController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout')
    ->middleware('auth');

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->name('login');



    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/faculty/dashboard',[facultyController::class,'dashboard'])->name('faculty.dashboard');
    Route::get('/hod/dashboard',[hodController::class,'dashboard'])->name('hod.dashboard');
    Route::get('/principal/dashboard',[principalController::class,'dashboard'])->name('principal.dashboard');

    // login routes
    Route::middleware(['auth','role:admin'])->group(function () {
        Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    });

    Route::middleware(['auth','role:faculty'])->group(function () {
        Route::get('/faculty/dashboard',[facultyController::class,'dashboard'])->name('faculty.dashboard');
    });


    // Route::middleware('auth')->group(function () {
    //     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    //     Route::get('/faculty/dashboard', [FacultyController::class, 'dashboard'])->name('faculty.dashboard');
    //     Route::get('/hod/dashboard', [HODController::class, 'dashboard'])->name('hod.dashboard');
    //     // Route::get('/dashboard', [Controller::class, 'dashboard'])->name('user.dashboard');
    // });


require __DIR__ . '/auth.php';