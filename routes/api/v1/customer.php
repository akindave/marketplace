<?php
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CartController;

Route::prefix('user')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::post('update/basic/info', 'update_user_basic_info');
        Route::post('store/address', 'storeAddress');

    });

    Route::controller(CartController::class)->group(function () {
        Route::post('store/cart/items', 'save_cart_items');
    });

});
