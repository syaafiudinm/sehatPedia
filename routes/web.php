<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'index'])->name('beranda');

Route::group(['prefix' => 'account'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/register', [AccountController::class, 'register'])->name('account.register');
        Route::post('/process-register', [AccountController::class, 'processRegister'])->name('account.processRegister');
        Route::get('/login', [AccountController::class, 'login'])->name('account.login');
        Route::post('/process-login', [AccountController::class, 'authenticate'])->name('account.authenticate');
    });
});

Route::get('/list-user', [AccountController::class, 'listUser'])->name('account.listUser');
Route::get('/account-profile', [AccountController::class, 'profile'])->name('account.profile');
Route::post('/account-profile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');

Route::get('/disease-dashboard', [DiseaseController::class, 'index'])->name('disease.index');
Route::get('/disease-create', [DiseaseController::class, 'create'])->name('disease.create');
Route::post('/disease-store', [DiseaseController::class, 'store'])->name('disease.store');
Route::get('/disease-edit/{id}', [DiseaseController::class, 'edit'])->name('disease.edit');
Route::post('/disease-edit/{id}', [DiseaseController::class, 'update'])->name('disease.update');
Route::delete('/disease-delete/{id}', [DiseaseController::class, 'destroy'])->name('disease.destroy');

Route::get('/disease-category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category-create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category-store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category-edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category-edit/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category-delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');

