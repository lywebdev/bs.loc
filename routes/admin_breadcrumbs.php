<?php

use \Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


Breadcrumbs::for('admin.home', function(BreadcrumbTrail $trail) {
    $trail->push('Главная', route('admin.home'));
});


Breadcrumbs::for('admin.categories.index', function(BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Категории', route('admin.categories.index'));
});
Breadcrumbs::for('admin.categories.create', function(BreadcrumbTrail $trail) {
    $trail->parent('admin.categories.index');
    $trail->push('Добавление категории', route('admin.categories.create'));
});
Breadcrumbs::for('admin.categories.edit', function(BreadcrumbTrail $trail, \App\Models\Category\Category $category) {
    $trail->parent('admin.categories.index');
    $trail->push('Редактирование "' . $category->name . '"', route('admin.categories.create', $category->id));
});

Breadcrumbs::for('admin.products.index', function(BreadcrumbTrail $trail) {
    $trail->parent('admin.home');
    $trail->push('Товары', route('admin.products.index'));
});
Breadcrumbs::for('admin.products.create', function(BreadcrumbTrail $trail) {
    $trail->parent('admin.products.index');
    $trail->push('Добавление товара', route('admin.products.create'));
});
Breadcrumbs::for('admin.products.edit', function(
    BreadcrumbTrail $trail,
    \App\Models\Product\Product $product
) {
    $trail->parent('admin.products.index');
    $trail->push('Редактирование товара ' . $product->id, route('admin.products.edit', $product->id));
});
