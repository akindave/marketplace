<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ApiMisController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\PublicProductController;

Route::controller(ApiMisController::class)->group(function () {
    Route::get('get/all/country', 'getAllCountry');
    // Route::get('get/state/by/country/{id}', 'getStateByCountry');
    // Route::get('get/city/by/state/{id}', 'getCityByState');
});

Route::controller(SettingController::class)->group(function () {
    Route::get('get/all/product_category', 'fetch_all_product_categories');

});

Route::controller(PublicProductController::class)->group(function () {
    Route::get('get/all/product/{count}', 'load_all_products');
    Route::get('get/product/by/{id}', 'load_product_by_id');
    Route::get('get/product/by/category/{category}/{count}', 'load_product_by_category');
});

Route::controller(AuthController::class)->group(function () {

    Route::post('auth/login/with/emailpass', 'loginEmailPass');
    Route::post('auth/register/user', 'registerUser');
    require __DIR__.'/seller.php';

    // Route::post('confirm/email', 'confirmEmail');
    // Route::post('verify/email', 'verifyEmail');
    // Route::post('check/email', 'checkEmail');
    // Route::post('auth/reset/password', 'resetPassword');
});

Route::get('/run_migration',function(){
    Artisan::make('migrate');
});
