<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SaleController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
Route::post('/products/{product}/purchase', [SaleController::class, 'store']);
Route::middleware('auth:sanctum')->post('/products/{id}/purchase', [ProductController::class, 'purchase']);
});