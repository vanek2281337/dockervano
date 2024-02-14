<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostIngridientController;
use App\Http\Controllers\Admin\PostLoginUserController;
use App\Http\Controllers\Admin\PostMenuCategoryController;
use App\Http\Controllers\Admin\PostMenuController;
use App\Http\Controllers\Admin\PostPurchasesHistoryController;
use App\Http\Controllers\Admin\PostUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'admin'])->name('admin');
    // Выход
    Route::post('logout', [PostLoginUserController::class, 'logout'])->name('admin.logout');
    // Вход
    Route::prefix('login')->group(function () {
        Route::get('/code', [HomeController::class, 'send_code'])->name('admin.send_code');
        Route::get('/{phone}', [HomeController::class, 'login'])->name('admin.login');
        // Запросы
        Route::post('query/code', [PostLoginUserController::class, 'send_code'])->name('admin.query.send_code');
        Route::post('query/auth', [PostLoginUserController::class, 'auth'])->name('admin.query.auth');
    });
    // Меню + категории
    Route::prefix('menu')->group(function () {
        Route::get('/', [HomeController::class, 'menu'])->name('admin.menu');
        Route::get('/create', [HomeController::class, 'menu_create'])->name('admin.menu.create');
        Route::get('/update/{id}', [HomeController::class, 'menu_update'])->name('admin.menu.update');
        // Запросы
        Route::post('query/create', [PostMenuController::class, 'create'])->name('admin.query.menu.create');
        Route::post('query/update', [PostMenuController::class, 'update'])->name('admin.query.menu.update');
        Route::post('query/delete', [PostMenuController::class, 'delete'])->name('admin.query.menu.delete');

        // Категории
        Route::prefix('category')->group(function () {
            Route::get('/', [HomeController::class, 'menu_category'])->name('admin.menu_category');
            Route::get('/create', [HomeController::class, 'menu_category_create'])->name('admin.menu_category_create');
            // Запросы
            Route::post('query/create', [PostMenuCategoryController::class, 'create'])->name('admin.query.menu_category.create');
            Route::post('query/delete', [PostMenuCategoryController::class, 'delete'])->name('admin.query.menu_category.delete');
        });

        // Ингридиенты
        Route::prefix('ingridient')->group(function () {
            Route::get('/', [HomeController::class, 'ingridients'])->name('admin.ingridients');
            Route::get('/create', [HomeController::class, 'ingridients_create'])->name('admin.ingridients_create');
             // Запросы
             Route::post('query/create', [PostIngridientController::class, 'create'])->name('admin.query.ingridients.create');
             Route::post('query/delete', [PostIngridientController::class, 'delete'])->name('admin.query.ingridients.delete');
        });
    });
    // Пользователи
    Route::prefix('users')->group(function () {
        Route::get('/clients', [HomeController::class, 'users_client'])->name('admin.users_client');
        Route::get('/employee', [HomeController::class, 'users_employee'])->name('admin.users_employee');
        Route::get('/create', [HomeController::class, 'users_create'])->name('admin.users_create');
        Route::get('/update/{id}', [HomeController::class, 'users_update'])->name('admin.users_update');
        // Запросы
        Route::post('query/create', [PostUserController::class, 'create'])->name('admin.query.users.create');
        Route::post('query/update', [PostUserController::class, 'update'])->name('admin.query.users.update');
    });
    // Заказы + история
    Route::prefix('order')->group(function () {
        Route::get('/', [HomeController::class, 'orders'])->name('admin.orders');
        Route::get('/food/history', [HomeController::class, 'food_order'])->name('admin.food_order');
        // Запрос на смену статуса
        Route::post('status/change', [PostPurchasesHistoryController::class, 'status_change'])->name('admin.query.status_change');
    });
});