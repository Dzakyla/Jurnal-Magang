<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;
        return view("dashboard.$role");
    })->name('dashboard');

    // Redirect /home ke /dashboard
    Route::get('/home', function () {
        return redirect()->route('dashboard');
    })->name('home');

    // Routes untuk magang
    Route::middleware(['role:magang'])->group(function () {
        Route::resource('journals', JournalController::class)->only(['index', 'create', 'store']);
    });

    // Routes untuk admin
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/magang-users', [UserController::class, 'magangUsers'])->name('magang.users');
        Route::get('/magang-journals', [JournalController::class, 'magangJournals'])->name('magang.journals');
    });

    // Routes untuk super admin
    Route::middleware(['role:super_admin'])->group(function () {
        Route::resource('users', UserController::class);
    });
});