<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

require_once(base_path('routes/admin_breadcrumbs.php'));

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('BeltStudio', route('home'));
});

Breadcrumbs::for('about', function(BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('О нас', route('about'));
});

Breadcrumbs::for('contact', function(BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Контакты', route('contact'));
});

// Catalog
Breadcrumbs::for('catalog.index', function(BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Каталог', route('catalog.index'));
});
Breadcrumbs::for('catalog.product', function(BreadcrumbTrail $trail, \App\Models\Product\Product $product) {
    $trail->parent('catalog.index');
    $trail->push($product->name, route('catalog.product', $product->slug));
});

// Cart
Breadcrumbs::for('cart.index', function(BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Корзина', route('cart.index'));
});

// Blog
Breadcrumbs::for('blog.index', function(BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Блог', route('blog.index'));
});

Breadcrumbs::for('blog.post', function(BreadcrumbTrail $trail, \App\Models\Blog\Post $post) {
    $trail->parent('blog.index');
    $trail->push($post->title, route('blog.show', $post->slug));
});
