<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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


Route::prefix('v1')->group(function () {
    Route::middleware('restrictURL')->group(function () {
        Route::middleware('auth:sanctum')->group(function () {
            require __DIR__.'/api/v1/customer.php';
        });
        require __DIR__.'/api/v1/index.php';
    });

});
