<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\PengalamanOrganisasiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return view('Halo Mahasiswa');
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: '.$param1;
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
})->name('mahasiswa.show');

Route::get('/about', function () {
    return view('halaman-about');
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/matakuliah', [MatakuliahController::class, 'index']);

Route::get('/matakuliah/show/{kode?}', [MatakuliahController::class, 'show']);

// Pertemuan 5 Menambahkan Controller HomeController
Route::get('/home', [HomeController::class, 'index']);

// Pertemuan 6 
Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

// Pertemuan 7 (Template Admin)
Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

// Pertemuan 8 (CRUD)
Route::resource('pelanggan', PelangganController::class);

//UTS
Route::resource('uts', CvController::class);
Route::resource('pengalaman-organisasi', PengalamanOrganisasiController::class)->except(['index', 'show']);