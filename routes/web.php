<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'index'])->name('beranda');

Route::get('/disease-dashboard', [DiseaseController::class, 'index'])->name('disease.index');
Route::get('/disease-create', [DiseaseController::class, 'create'])->name('disease.create');
Route::post('/disease-store', [DiseaseController::class, 'store'])->name('disease.store');

Route::get('/disease-category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category-create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');