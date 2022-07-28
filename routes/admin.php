<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\HomeController::class, 'home'])->name('home');

Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class);
Route::resource('products', \App\Http\Controllers\Admin\ProductsController::class);
Route::resource('attributes', \App\Http\Controllers\Admin\AttributesController::class);

Route::group([
    'prefix' => 'blog',
    'as' => 'blog.'
], function() {
    Route::resource('categories', \App\Http\Controllers\Admin\Blog\CategoriesController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\Blog\PostsController::class);
});

Route::group([
    'prefix' => 'pages',
    'as' => 'pages.'
], function() {
    Route::group([
        'prefix' => 'home',
        'as' => 'home.'
    ], function() {
        Route::get('main-slider', [\App\Http\Controllers\Admin\Pages\HomeController::class, 'mainSlider'])->name('mainSlider');
        Route::post('main-slider', [\App\Http\Controllers\Admin\Pages\HomeController::class, 'mainSliderStore'])->name('mainSlider.store');
    });
});

Route::group([
    'prefix' => 'api',
    'as' => 'api.',
], function() {
    Route::group([
        'prefix' => 'products',
        'as' => 'products.'
    ], function() {
        Route::post('photos/{photoId}/destroy', [\App\Http\Controllers\Admin\Api\ProductsController::class, 'photoDestroy']);
    });


    Route::group([
        'prefix' => 'imager',
        'as' => 'imager.'
    ], function() {
        Route::post('store', [\App\Http\Controllers\Admin\Api\Imager\ImagerController::class, 'store'])->name('store');
        Route::post('delete', [\App\Http\Controllers\Admin\Api\Imager\ImagerController::class, 'delete'])->name('delete');
    });

    Route::group([
        'prefix' => 'attributes',
        'as' => 'attributes.'
    ], function() {
        Route::post('get-attributes-by-category', [\App\Http\Controllers\Admin\Api\Attributes\AttributesController::class, 'getAttributesByCategory'])->name('getAttributesByCategory');
    });
});
