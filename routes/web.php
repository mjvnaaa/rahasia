<?php

use App\Http\Controllers\KrsController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){ return redirect('/krs'); });
Route::get('/krs', [KrsController::class, 'search'])->name('krs.index');
Route::get('/form-mahasiswa', [MahasiswaController::class,'create'])->name('mahasiswa.create');
Route::post('/form-mahasiswa', [MahasiswaController::class,'store'])->name('mahasiswa.store');
Route::get('/krs/search', [KrsController::class, 'search'])->name('krs.search');
