<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductsController::class, 'index'])->name('home');
Route::get('/catalog', [ProductsController::class, 'getProducts'])->name('catalog');
Route::get('/product/{id}', [ProductsController::class, 'getProductById'])->name('product');
Route::view('/service', 'pages.service')->name('service');

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'store'])->name('cart.add');
Route::patch('/cart/item/{itemId}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/item/{itemId}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/admin', function () {
    return view('admin.index');
});
