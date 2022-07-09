<?php

use Illuminate\Support\Facades\Route;


Route::get('', [\App\Http\Controllers\Admin\HomeController::class, 'home'])->name('home');

Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class);
