<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProductoController::class, 'index'])->name('home');
Route::get('products/createProduct', [ProductoController::class, 'create'])->name('products.create');