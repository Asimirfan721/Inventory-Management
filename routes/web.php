<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController; 
Route::get('/', function () {
    return view('home');
});


Route::get('/currencies', [CurrencyController::class, 'index'])->name('currency.index');
Route::post('/currencies', [CurrencyController::class, 'store'])->name('currency.store');
Route::post('/currencies/{id}/update', [CurrencyController::class, 'update'])->name('currency.update');
