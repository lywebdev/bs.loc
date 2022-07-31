<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Интернет-магазин ремней BeltStudio">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico" />

    <!-- CSS
    ============================================ -->

    <link rel="stylesheet" href="{{ mix('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ mix('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ mix('css/Pe-icon-7-stroke.css') }}" />
    <link rel="stylesheet" href="{{ mix('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ mix('css/magnific-popup.min.css') }}" />
    <link rel="stylesheet" href="{{ mix('css/ion.rangeSlider.min.css') }}" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ mix('css/styles.css') }}">
    <link rel="stylesheet" href="{{ mix('css/custom-styles.css') }}">

</head>

<body>
@yield('preloader')
<div class="main-wrapper">

    @include('components.header.header')
