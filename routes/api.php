<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('menu')->group(function () {
    Route::get('category', [\App\Http\Controllers\Api\MenuCategoryController::class, 'all']);
    // Запросы с персональным токеном
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('category/create', [\App\Http\Controllers\Api\MenuCategoryController::class, 'create']);
        Route::get('category/delete/{caegory_id}', [\App\Http\Controllers\Api\MenuCategoryController::class, 'delete']);
    });

    Route::get('show/to/category/{menu_category_id}', [\App\Http\Controllers\Api\MenuController::class, 'showToCategory']);
    Route::get('show/{menu_id}', [\App\Http\Controllers\Api\MenuController::class, 'show']);
    Route::get('/', [\App\Http\Controllers\Api\MenuController::class, 'all']);
    // Запросы с персональным токеном
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('create', [\App\Http\Controllers\Api\MenuController::class, 'create']);
        Route::post('update', [\App\Http\Controllers\Api\MenuController::class, 'update']);
        Route::get('delete/{menu_id}', [\App\Http\Controllers\Api\MenuController::class, 'delete']);
    });
});

Route::prefix('user')->group(function () {
    Route::post('code', [\App\Http\Controllers\Api\UserController::class, 'code']);
    Route::post('create', [\App\Http\Controllers\Api\UserController::class, 'create']);
    Route::post('auth', [\App\Http\Controllers\Api\UserController::class, 'auth']);
    Route::get('show/by/phone/{phone}', [\App\Http\Controllers\Api\UserController::class, 'showByPhone']);
    // Запросы с персональным токеном
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('update', [\App\Http\Controllers\Api\UserController::class, 'update']);
    });
});

Route::prefix('ingridient')->group(function () {
    Route::get('all', [\App\Http\Controllers\Api\IngridientController::class, 'all']);
    // Запросы с персональным токеном
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('create', [\App\Http\Controllers\Api\IngridientController::class, 'create']);
        Route::get('delete/{ingridient_id}', [\App\Http\Controllers\Api\IngridientController::class, 'delete']);
    });
    // Ингридиенты корзины
    Route::prefix('basket')->group(function () {
        // Запросы с персональным токеном
        Route::middleware('auth:sanctum')->group(function (){
            Route::post('create', [\App\Http\Controllers\Api\IngridientBasketController::class, 'create']);
            Route::get('show/{IngridientCode}', [\App\Http\Controllers\Api\IngridientBasketController::class, 'show']);
        });
    });
});

Route::prefix('basket')->group(function () {
    // Запросы с персональным токеном
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('create', [\App\Http\Controllers\Api\BasketController::class, 'create']);
        Route::get('delete/{basket_id}', [\App\Http\Controllers\Api\BasketController::class, 'delete']);
        Route::get('all', [\App\Http\Controllers\Api\BasketController::class, 'all']);
        Route::get('count/update/{basket_id}/{count}', [\App\Http\Controllers\Api\BasketController::class, 'countUpdate']);
    });
});

Route::prefix('purchases')->group(function () {
    Route::prefix('history')->group(function () {
        // Запросы с персональным токеном
        Route::middleware('auth:sanctum')->group(function (){
            Route::post('create', [\App\Http\Controllers\Api\PurchasesHistoryController::class, 'create']);
            Route::get('show/code/{order_code}', [\App\Http\Controllers\Api\PurchasesHistoryController::class, 'show']);
            Route::get('all/{user_id?}', [\App\Http\Controllers\Api\PurchasesHistoryController::class, 'all']);
        });
    });
});

Route::prefix('notification')->group(function () {
    // Запросы с персональным токеном
    Route::middleware('auth:sanctum')->group(function (){
        Route::post('create', [\App\Http\Controllers\Api\NotificationController::class, 'create']);
        Route::get('show/{notification_id}', [\App\Http\Controllers\Api\NotificationController::class, 'show']);
        Route::get('all', [\App\Http\Controllers\Api\NotificationController::class, 'all']);
        Route::post('update', [\App\Http\Controllers\Api\NotificationController::class, 'update']);
        Route::get('delete/{notification_id}', [\App\Http\Controllers\Api\NotificationController::class, 'delete']);
    });
});

Route::prefix('push')->group(function () {
    // Запросы с персональным токеном
    Route::middleware('auth:sanctum')->group(function (){
        Route::get('show/{user_id}', [\App\Http\Controllers\Api\PushUserSessionController::class, 'show']);
        Route::post('update', [\App\Http\Controllers\Api\PushUserSessionController::class, 'update']);
    });
});

Route::prefix('game')->group(function () {
    Route::prefix('add')->group(function () {
        Route::post('mark', [\App\Http\Controllers\Api\GameController::class, 'addMark']);
        Route::post('bonus', [\App\Http\Controllers\Api\GameController::class, 'addBonus']);
        Route::get('show/{user_id}', [\App\Http\Controllers\Api\GameController::class, 'showMark']);
        Route::get('show/bonus/{user_id}', [\App\Http\Controllers\Api\GameController::class, 'showBonus']);
    });
});