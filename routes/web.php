<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController; 
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
});

// currency
Route::get('/currencies', [CurrencyController::class, 'index'])->name('currency.index');
Route::post('/currencies', [CurrencyController::class, 'store'])->name('currency.store');
Route::post('/currencies/{id}/update', [CurrencyController::class, 'update'])->name('currency.update');


// Company
Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');
Route::post('/companies', [CompanyController::class, 'store'])->name('company.store');
Route::put('/companies/{id}/update', [CompanyController::class, 'update'])->name('company.update');


// Product

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
