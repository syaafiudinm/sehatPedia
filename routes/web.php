<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('beranda');

Route::get('/disease', [DiseaseController::class, 'index'])->name('disease.index');
Route::get('/disease-create', [DiseaseController::class, 'create'])->name('disease.create');
Route::post('/disease-store', [DiseaseController::class, 'store'])->name('disease.store');

