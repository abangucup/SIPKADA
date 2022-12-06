<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\SurveyController;
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

        Route::group(['middleware' => ['role:admin']], function () {
            Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
            Route::resource('/kriteria', KriteriaController::class);
            Route::resource('/sub', SubKriteriaController::class);
            Route::resource('/survey', SurveyController::class);
            Route::get('rank', [SurveyController::class, 'rank'])->name('rank');
            Route::get('hitung', [SurveyController::class, 'hitung'])->name('hitung');
            Route::resource('/user', UserController::class);
            Route::resource('/kelurahan', KelurahanController::class);
            Route::post('/survey/filter', [SurveyController::class, 'filter']);
        });
    });

    Route::prefix('kelurahan')->group(function () {
        Route::group(['middleware' => ['role:kelurahan']], function () {
            Route::get('/', [DashboardController::class, 'kelurahan'])->name('dashboard.kelurahan');
            Route::resource('/penerima', PenerimaController::class);
        });
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
