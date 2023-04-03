<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ApiMisController;

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

    Route::middleware('auth:sanctum')->group(function () {

    });
    Route::controller(ApiMisController::class)->group(function () {
        Route::get('get/all/country', 'getAllCountry');
        // Route::get('get/state/by/country/{id}', 'getStateByCountry');
        // Route::get('get/city/by/state/{id}', 'getCityByState');
    });

    Route::controller(AuthController::class)->group(function () {
        Route::post('auth/login/with/emailpass', 'loginEmailPass');
        Route::post('auth/register', 'register');

        // Route::post('confirm/email', 'confirmEmail');
        // Route::post('verify/email', 'verifyEmail');
        // Route::post('check/email', 'checkEmail');
        // Route::post('auth/reset/password', 'resetPassword');


    });
});
