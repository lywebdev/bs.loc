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

require_once(base_path('routes/admin_breadcrumbs.php'));
