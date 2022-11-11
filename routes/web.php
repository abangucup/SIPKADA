<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});



Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('/kriteria', KriteriaController::class);
        Route::get('/kelurahan', [DashboardController::class, 'kelurahan'])->name('dashboard.kelurahan');
        Route::resource('user', UserController::class);

        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    });
});
