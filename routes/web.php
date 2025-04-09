<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/* CATEGORIAS */
Route::get('categories/createCategory', [CategoriesController::class, 'create'])->name('categories.create');
Route::post('categories/storeCategory', [CategoriesController::class, 'store'])->name('categories.store');
Route::get('categories/{category}', [CategoriesController::class, 'show'])->name('category.show');
Route::get('categories/edit/{category}', [CategoriesController::class, 'edit'])->name('category.edit');
Route::patch('category/{category}', [CategoriesController::class, 'update'])->name('category.update');
Route::delete('category/{category}', [CategoriesController::class, 'destroy'])->name('category.delete');

/* PRODUCTOS */
Route::get('/', [ProductoController::class, 'index'])->name('home');
Route::get('products/createProduct', [ProductoController::class, 'create'])->name('products.create');
Route::post('products/storeProduct', [ProductoController::class, 'store'])->name('products.store');
Route::get('products/{product}', [ProductoController::class, 'show'])->name('product.show');
Route::get('products/edit/{product}', [ProductoController::class, 'edit'])->name('product.edit');
Route::patch('product/{product}', [ProductoController::class, 'update'])->name('product.update');
Route::delete('product/{product}', [ProductoController::class, 'destroy'])->name('product.delete');

/* Articulos */
Route::get('articles', [ArticleController::class, 'index'])->name('articles');
Route::get('articles/createArticle', [ArticleController::class, 'create'])->name('articles.create');
Route::post('articles/storeArticle', [ArticleController::class, 'store'])->name('articles.store');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('articles/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::patch('article/{article}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('article/{article}', [ArticleController::class, 'destroy'])->name('article.delete');

/* COMENTEARIOS */
Route::get('articles/{article}/createComment', [CommentController::class, 'create'])->name('comment.create');
Route::post('articles/{article}/storeComment', [CommentController::class, 'store'])->name('comment.store');
Route::get('articles/{article}/edit/{comment}', [CommentController::class, 'edit'])->name('comment.edit');
Route::patch('article/{article}/{comment}', [CommentController::class, 'update'])->name('comment.update');
Route::delete('article/{article}/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');

/* LOGIN */
Auth::routes();