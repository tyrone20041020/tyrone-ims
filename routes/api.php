<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProductController;


Route::post('/register', action: [AuthenticationController::class, 'register']);
Route::post('/login', action: [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
    //Product CRUD
    Route::get('/get-products', [ProductController::class, 'getProducts']);
    Route::post('/add-product', [ProductController::class, 'addProduct']);
    Route::put('/edit-product/{id}', [ProductController::class, 'editProduct']);
    Route::delete('/delete-product/{id}', [ProductController::class, 'deleteProduct']);

      Route::get('/logout', [AuthenticationController::class, 'logout']);
});
