<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;


Route::post('/register', action: [AuthenticationController::class, 'register']);
Route::post('/login', action: [AuthenticationController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){
      Route::post('/logout', [AuthenticationController::class, 'logout']);
});
