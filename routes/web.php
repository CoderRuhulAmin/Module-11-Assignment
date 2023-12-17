<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index']);

// Route::prefix('dashboard')->name('dashboard.')->group(function(){}
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function(){

    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::get('/users', [UsersController::class, 'index'])->name('user');
    Route::get('/users/create', [UsersController::class, 'create'])->name('user.create');
    Route::post('/users/create', [UsersController::class, 'store'])->name('user.store');
    Route::get('/users/details/{id}', [UsersController::class, 'show'])->name('user.show');
    Route::get('/users/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
    Route::post('/users/update/{id}', [UsersController::class, 'update'])->name('user.update');
    Route::get('/users/delete/{id}', [UsersController::class, 'delete'])->name('user.delete');

    Route::get('/products', [ProductsController::class, 'index'])->name('products');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products/create', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/details/{id}', [ProductsController::class, 'show'])->name('products.show');
    Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::get('/products/update/{id}', [ProductsController::class, 'update'])->name('products.update');
    Route::get('/products/delete/{id}', [ProductsController::class, 'delete'])->name('products.delete');

    Route::get('/stocks', [StocksController::class, 'index'])->name('stocks');
    Route::get('/stocks/create', [StocksController::class, 'create'])->name('stocks.create');
    Route::post('/stocks/create', [StocksController::class, 'store'])->name('stocks.store');
    Route::get('/stocks/details/{id}', [StocksController::class, 'show'])->name('stocks.show');
    Route::get('/stocks/edit/{id}', [StocksController::class, 'edit'])->name('stocks.edit');
    Route::get('/stocks/update/{id}', [StocksController::class, 'update'])->name('stocks.update');
    Route::get('/stocks/delete/{id}', [StocksController::class, 'delete'])->name('stocks.delete');

    Route::get('/sales', [SalesController::class, 'index'])->name('sales');


});