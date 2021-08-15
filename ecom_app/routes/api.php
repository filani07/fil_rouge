<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\SupplierController;



Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signup']);
});

Route::group([

    'middleware' => ['jwt.verify'],
    'prefix' => 'auth'

], function () {

    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});



Route::apiResource('employee', EmployeeController::class);
Route::apiResource('supplier', SupplierController::class);
Route::apiResource('category', CategoryController::class);
Route::apiResource('product', ProductController::class);
Route::apiResource('order', OrderController::class);
Route::apiResource('cart', CartController::class);


Route::post('showcart', [CartController::class, 'showcart']);
Route::post('confirmCart', [CartController::class, 'confirmCart']);
