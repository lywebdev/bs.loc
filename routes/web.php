<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::group([
    'prefix' => 'catalog',
    'as' => 'catalog.',
], function() {
    Route::get('', [\App\Http\Controllers\CatalogController::class, 'index'])->name('index');
});


Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function() {
    Route::get('', [\App\Http\Controllers\Admin\HomeController::class, 'home']);

    Route::group([
        'prefix' => 'categories',
        'as' => 'categories.'
    ], function() {
        Route::get('', [\App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('index');
    });
});
