<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::get('/success', [ProductController::class, 'success'])->name('success');
Route::get('/cancel', [ProductController::class, 'cancel'])->name('cancel');
Route::post('/webhook', [ProductController::class, 'webhook'])->name('webhook');
