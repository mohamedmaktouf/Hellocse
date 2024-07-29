<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [\App\Http\Controllers\UserController::class, 'login']);
Route::prefix('profiles')->group( function () {
    Route::get('/', [\App\Http\Controllers\ProfileController::class, 'list']);
    Route::post('/', [\App\Http\Controllers\ProfileController::class, 'store'])->middleware('auth:sanctum');
});
