<?php

use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UjianController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect("/siswa");
});

Route::resource('/siswa', SiswaController::class);
Route::resource('/mata-pelajaran', MataPelajaranController::class);
Route::resource('/ujian', UjianController::class);
Route::resource('/peserta', PesertaController::class);
