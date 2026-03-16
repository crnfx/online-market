<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductsController::class, 'index'])->name('home');
Route::get('/catalog', [ProductsController::class, 'getProducts'])->name('catalog');
Route::get('/product/{id}', [ProductsController::class, 'getProductById'])->name('product');
Route::view('/service', 'service')->name('service');
