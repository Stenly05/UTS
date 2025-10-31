<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;

Route::resource('matakuliah', MataKuliahController::class);
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('absensi', AbsensiController::class);