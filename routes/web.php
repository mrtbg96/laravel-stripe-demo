<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');
