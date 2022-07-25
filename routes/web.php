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

Route::get('about', [\App\Http\Controllers\Pages\AboutController::class, 'index'])->name('about');

Route::group([
    'prefix' => 'catalog',
    'as' => 'catalog.',
], function() {
    Route::get('', [\App\Http\Controllers\CatalogController::class, 'index'])->name('index');
    Route::get('product/{slug}', [\App\Http\Controllers\CatalogController::class, 'product'])->name('product');
    Route::get('sku/{slug}', [\App\Http\Controllers\CatalogController::class, 'productBySku'])->name('productBySku');
});
