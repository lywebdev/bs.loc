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

Route::get('test', [\App\Http\Controllers\TestController::class, 'index']);

Route::get('about', [\App\Http\Controllers\Pages\AboutController::class, 'index'])->name('about');
Route::get('contact', [\App\Http\Controllers\Pages\ContactController::class, 'index'])->name('contact');

Route::get('checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])->name('checkoutForm');

Route::group([
    'prefix' => 'catalog',
    'as' => 'catalog.',
], function() {
    Route::get('', [\App\Http\Controllers\CatalogController::class, 'index'])->name('index');
    Route::get('product/{slug}', [\App\Http\Controllers\CatalogController::class, 'product'])->name('product');
    Route::get('sku/{slug}', [\App\Http\Controllers\CatalogController::class, 'productBySku'])->name('productBySku');

    Route::get('{categorySlug}', [\App\Http\Controllers\CatalogController::class, 'category'])->name('category');
});

Route::group([
    'prefix' => 'blog',
    'as' => 'blog.'
], function() {
    Route::get('', [\App\Http\Controllers\BlogController::class, 'index'])->name('index');
    Route::get('{slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('show');
});

Route::group([
    'prefix' => 'cart',
    'as' => 'cart.'
], function() {
    Route::get('', [\App\Http\Controllers\CartController::class, 'index'])->name('index');
});

// Api routes
Route::group([
    'prefix' => 'api',
    'as' => 'api.'
], function() {
    Route::post('contact/send-message', [\App\Http\Controllers\Api\ContactController::class, 'sendMessage'])->name('contact.sendMessage');

    Route::group([
        'prefix' => 'cart',
        'as' => 'cart.'
    ], function() {
        Route::post('toggle-cart-item', [\App\Http\Controllers\Api\Shop\CartController::class, 'toggleCartItem'])->name('toggleCartItem');

        Route::get('items', [\App\Http\Controllers\Api\Shop\CartController::class, 'getItems'])->name('items');

//        Route::get('template/minicart/items', [\App\Http\Controllers\Api\Shop\CartController::class, 'getMinicartItemsTemplate'])->name('template.minicart.items');
        Route::get('template/minicart', [\App\Http\Controllers\Api\Shop\CartController::class, 'getMinicartTemplate'])->name('template.minicart');

//        Route::get('count-items', [\App\Http\Controllers\Api\Shop\CartController::class, 'countItems'])->name('countItems');
        Route::post('set-cart-item', [\App\Http\Controllers\Api\Shop\CartController::class, 'setCartItem'])->name('setCartItem');
        Route::post('unset-cart-item', [\App\Http\Controllers\Api\Shop\CartController::class, 'unsetCartItem'])->name('unsetCartItem');
    });
});
