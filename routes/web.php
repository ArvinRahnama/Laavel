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

Route::get('/', [HomeController::class, "home"])->name('home');

Route::get('/home', [HomeController::class, "home"]);

Route::get('/articles/{articleSlug}', [ArticleController::class, "single"]);

Route::get('/about', [HomeController::class, "about"]);

Route::get('/contact', [HomeController::class, "contact"])->name('contact');

Route::get('/services', [HomeController::class, "services"])->name('services');

Route::prefix('admin')->group(function () {
//    Route::get('/articles', [ArticleController2::class, "index"]);
//    Route::delete('/articles/{articles}', [ArticleController2::class, "delete"]);
//    Route::get('/articles/create', [ArticleController2::class, "create"]);
//    Route::post('/articles/create', [ArticleController2::class, 'store']);
//    Route::get('/articles/{articles}/edit', [ArticleController2::class, "edit"]);
//    Route::put('/articles/{articles}/edit', [ArticleController2::class, "update"]);

    Route::resource('articles', ArticleController::class);
});

Auth::routes();
