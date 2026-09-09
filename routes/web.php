<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/mypage', [MyPageController::class, 'index'])->name('mypage');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/mypage/products/{product}', [ProductController::class, 'showMine'])->name('products.mine.show');
    Route::put('/mypage/products/{product}', [ProductController::class, 'update'])->name('products.mine.update');
    Route::delete('/mypage/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/mypage/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/mypage/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
});

require __DIR__.'/auth.php';
