<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\SubKriteriaController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\UserController;
use App\Models\Survey;
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
            Route::resource('/kategori', KategoriController::class);
            Route::resource('/sub', SubKriteriaController::class);
            Route::resource('/survey', SurveyController::class);
            Route::get('rank', [SurveyController::class, 'rank'])->name('rank');
            Route::get('cetak-ranking', [LaporanController::class, 'cetak_rank'])->name('rank.cetak');
            Route::post('/rank/filter', [SurveyController::class, 'filter_rank']);
            Route::resource('/user', UserController::class);
            Route::resource('/kelurahan', KelurahanController::class);
            Route::post('/survey/filter', [SurveyController::class, 'filter'])->name('filter');

            // Route::get('/verifikasi/{penerima_id}', [SurveyController::class, 'verifikasi'])->name('verifikasi');
            // Route::post('/verifikasi', [SurveyController::class, 'storeVerifikasi'])->name('storeVerifikasi');
        });
    });

    Route::prefix('kelurahan')->group(function () {
        Route::group(['middleware' => ['role:kelurahan']], function () {
            Route::get('/', [DashboardController::class, 'kelurahan'])->name('dashboard.kelurahan');
            Route::resource('/penerima', PenerimaController::class);
            Route::get('/detail', [PenerimaController::class, 'detail'])->name('penerima.detail');
            Route::get('/cetak-penerima', [LaporanController::class, 'cetak_penerima'])->name('penerima.cetak');
            Route::get('/laporan', [LaporanController::class, 'laporan_penerima'])->name('laporan.penerima');
            Route::get('/cetak-laporan', [LaporanController::class, 'cetak_laporan_penerima'])->name('cetak_laporan_penerima');
        });
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
