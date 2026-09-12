<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AccountController;

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
    Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
});
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::post('/products/{product}/like', [LikeController::class, 'toggle'])->name('likes.toggle');
    Route::get('/products/{product}/purchase', [SaleController::class, 'create'])->name('sales.create');
    Route::post('/products/{product}/purchase', [SaleController::class, 'store'])->name('sales.store');
    Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/account/edit', [AccountController::class, 'edit'])->name('account.edit');
    Route::put('/account', [AccountController::class, 'update'])->name('account.update');
    Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contact.complete');


require __DIR__.'/auth.php';