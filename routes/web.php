<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController; 
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\StockController;
Route::get('/', function () {
    return view('home');
});

// currency
Route::get('/currencies', [CurrencyController::class, 'index'])->name('currency.index');
Route::post('/currencies', [CurrencyController::class, 'store'])->name('currency.store');
Route::post('/currencies/{id}/update', [CurrencyController::class, 'update'])->name('currency.update');
Route::delete('/currency/{id}', [CurrencyController::class, 'destroy'])->name('currency.destroy');
Route::get('/currency/create', [CurrencyController::class, 'create'])->name('currency.create');




// Company
Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');
Route::post('/companies', [CompanyController::class, 'store'])->name('company.store');
Route::put('/companies/{id}/update', [CompanyController::class, 'update'])->name('company.update');
Route::delete('/company/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');
Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');

// Product

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::put('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


// Supplier 
// Supplier Routes
Route::get('/suppliers', [SupplierController::class, 'index'])->name('supplier.index');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('supplier.store');
Route::put('/suppliers/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/suppliers/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');



//Customer Routes
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
Route::post('/customers', [CustomerController::class, 'store'])->name('customer.store');
Route::put('/customers/{id}', [CustomerController::class, 'update'])->name('customer.update');
Route::delete('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');


//Expense Management
Route::get('/expense', [ExpenseController::class, 'index'])->name('expense.index');
Route::post('/expenses', [ExpenseController::class, 'store'])->name('expense.store');
Route::put('/expenses/{id}', [ExpenseController::class, 'update'])->name('expense.update');
Route::delete('/expense/{id}', [ExpenseController::class, 'destroy'])->name('expense.destroy');
 

//Account Management
Route::get('/account', [AccountController::class, 'index'])->name('account.index');
Route::post('/accounts', [AccountController::class, 'store'])->name('account.store');
Route::put('/accounts/{id}', [AccountController::class, 'update'])->name('account.update');
Route::delete('/account/{id}', [AccountController::class, 'destroy'])->name('account.destroy');


//Stock Management
Route::get('/stockks', [StockController::class, 'index'])->name('stocks.index');

Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::post('/stocks', [StockController::class, 'store'])->name('stocks.store');
Route::put('/stocks/{id}', [StockController::class, 'update'])->name('stocks.update');
Route::delete('/stock/{id}', [StockController::class, 'destroy'])->name('stocks.destroy');
