<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;

use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('BeltStudio', route('home'));
});

Breadcrumbs::for('about', function(BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('О нас', route('about'));
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

require_once(base_path('routes/admin_breadcrumbs.php'));
