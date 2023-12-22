<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products\GetProductsController;
use App\Http\Controllers\Products\GetProductByIdController;
use App\Http\Controllers\Orders\CreateOrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('products')->group(function() {
    Route::get('', GetProductsController::class);
    Route::get('/{product}', GetProductByIdController::class);
});

Route::prefix('orders')->group(function() {
    Route::post('create', CreateOrderController::class);
});