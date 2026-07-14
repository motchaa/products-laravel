<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produtos', [ProductController::class, 'index'])->name('produto.index');
Route::get('/produtos/create', [ProductController::class, 'create'])->name('produto.create');
Route::post('/produtos', [ProductController::class, 'store'])->name('produto.store');
Route::get('/produtos/{produto}', [ProductController::class, 'show'])->name('produto.show');
Route::get('/produtos/{produto}/edit', [ProductController::class, 'edit'])->name('produto.edit');
Route::put('/produtos/{produto}', [ProductController::class, 'update'])->name('produto.update');
Route::delete('/produtos/{produto}', [ProductController::class, 'destroy'])->name('produto.destroy');

Route::get('/categorias', [CategoryController::class, 'index'])->name('categoria.index');
Route::get('/categorias/create', [CategoryController::class, 'create'])->name('categoria.create');
Route::post('/categorias', [CategoryController::class, 'store'])->name('categoria.store');
Route::get('/categorias/{categoria}', [CategoryController::class, 'show'])->name('categoria.show');
Route::get('/categorias/{categoria}/edit', [CategoryController::class, 'edit'])->name('categoria.edit');
Route::put('/categorias/{categoria}', [CategoryController::class, 'update'])->name('categoria.update');
Route::delete('/categorias/{categoria}', [CategoryController::class, 'destroy'])->name('categoria.destroy');