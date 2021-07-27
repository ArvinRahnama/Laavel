<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ArticleController;

Route::get('/', [HomeController::class, "home"]);

Route::get('/about', [HomeController::class, "about"]);

Route::get('/contact', [HomeController::class, "contact"]);

Route::prefix('admin')->group(function () {
    Route::get('/articles', [ArticleController::class, "index"]);
    Route::delete('/articles/{articles}', [ArticleController::class, "delete"]);
    Route::get('/articles/create', [ArticleController::class, "create"]);
    Route::post('/articles/create', [ArticleController::class, 'store']);
    Route::get('/articles/{articles}/edit', [ArticleController::class, "edit"]);
    Route::put('/articles/{articles}/edit', [ArticleController::class, "update"]);
});

