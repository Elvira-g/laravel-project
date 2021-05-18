<?php

use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\indexController;
use \App\Http\Controllers\Admin\CategoryController;
use \App\Http\Controllers\SocialiteController;
use App\Http\Controllers\Account\IndexController as AccountController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {
    Route::get('/account', AccountController::class)->name('account');
    Route::group(['middleware' => 'admin'], function () {
        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
            Route::get('/', [indexController::class, 'index'])->name('admin');
            Route::resource('news', AdminNewsController::class);
            Route::resource('categories', CategoryController::class);
            Route::resource('users', UsersController::class);
            Route::resource('links', LinkController::class);
        });
    });
});

Route::group(['prefix' => 'news'], function () {
    Route::get('/', [NewsController::class, 'index'])
        ->name('news.index');
    Route::get('/toOrder', [NewsController::class, 'toOrder'])
        ->name('news.toOrder');
    Route::get('/{id}&{cat}', [NewsController::class, 'show'])
        ->name('news.show');
    Route::get('/{news}', [NewsController::class, 'category'])
        ->name('news.category');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/auth/vk', [SocialiteController::class, 'init'])->name('vk.init');
    Route::get('/auth/vk/callback', [SocialiteController::class, 'callback'])->name('vk.callback');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/data', [\Database\Seeders\NewsSeeder::class, 'getData']);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


