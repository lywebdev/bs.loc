@extends('layouts.app')

@section('title', 'BeltStudio - интернет-магазин ремней')

@section('preloader', view('components.preloader'))

@section('content')
    <!-- Begin Slider Area -->
    <div class="slider-area">

        <!-- Main Slider -->
        <div class="swiper-container main-slider swiper-arrow with-bg_white">
            <div class="swiper-wrapper">
                <div class="swiper-slide animation-style-01">
                    <div class="slide-inner style-1 bg-height" data-bg-image="img/slider/bg/1-1.jpg">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 order-2 order-lg-1 align-self-center">
                                    <div class="slide-content text-black">
                                        <span class="offer">65% Скидка</span>
                                        <h2 class="title">Новая Коллекция</h2>
                                        <p class="short-desc">Переходите и приобретайте по заниженным ценам</p>
                                        <div class="btn-wrap">
                                            <a class="btn btn-custom-size xl-size btn-pronia-primary" href="{{ route('catalog.index') }}">Купить
                                                сейчас</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-0 order-1 order-lg-2">
                                    <div class="inner-img">
                                        <div class="scene fill">
                                            <div class="expand-width" data-depth="0.2">
                                                <img src="{{ asset('img/pages/home/main-slider/belt.png') }}"
                                                     alt="Inner Image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination d-md-none"></div>

            <!-- Add Arrows -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </div>
    <!-- Slider Area End Here -->

    <!-- Begin Shipping Area -->
    <div class="shipping-area section-space-top-100">
        <div class="container">
            <div class="shipping-bg">
                <div class="row shipping-wrap">
                    <div class="col-lg-6 col-md-12">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="img/shipping/icon/car.png" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h2 class="title">Удобная доставка</h2>
                                <p class="short-desc mb-0">Мы используем СДЭК</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 mt-4 mt-md-0">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="img/shipping/icon/card.png" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h2 class="title">Безопасность и кофморт платежей</h2>
                                <p class="short-desc mb-0">С помощью интегрированных сервисов</p>
                            </div>
                        </div>
                    </div>
                    {{--
                    <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                        <div class="shipping-item">
                            <div class="shipping-img">
                                <img src="img/shipping/icon/service.png" alt="Shipping Icon">
                            </div>
                            <div class="shipping-content">
                                <h2 class="title">Best Services</h2>
                                <p class="short-desc mb-0">Friendly & Supper Services</p>
                            </div>
                        </div>
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Shipping Area End Here -->

    <!-- Begin Product Area -->
    <div class="product-area section-space-top-100">
        <div class="container">
            <div class="section-title-wrap">
                <h2 class="section-title mb-0">Наши товары</h2>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav product-tab-nav tab-style-1" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="active" id="featured-tab" data-bs-toggle="tab" href="#featured" role="tab"
                               aria-controls="featured" aria-selected="true">
                                Рекомендуемые
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a id="bestseller-tab" data-bs-toggle="tab" href="#bestseller" role="tab"
                               aria-controls="bestseller" aria-selected="false">
                                Часто покупаемые
                            </a>
                        </li>
                        @if ($latestProducts)
                            <li class="nav-item" role="presentation">
                                <a id="latest-tab" data-bs-toggle="tab" href="#latest" role="tab" aria-controls="latest"
                                   aria-selected="false">
                                    Последние
                                </a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="featured" role="tabpanel"
                             aria-labelledby="featured-tab">
                            <div class="product-item-wrap row">
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-1-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-2-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">American Marigold</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$23.45</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-2-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-3-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Black Eyed Susan</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$25.45</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-3-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-4-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Bleeding Heart</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$30.45</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-4-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-5-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Bloody Cranesbill</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$45.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-5-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-6-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Butterfly Weed</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$50.45</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-6-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-7-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Common Yarrow</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$65.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-7-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-8-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Doublefile Viburnum</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$67.45</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-8-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-1-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Feather Reed Grass</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$20.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="bestseller" role="tabpanel" aria-labelledby="bestseller-tab">
                            <div class="product-item-wrap row">
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-5-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-6-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Butterfly Weed</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$50.45</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-6-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-7-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Common Yarrow</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$65.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-7-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-8-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Doublefile Viburnum</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$67.45</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-8-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-1-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Feather Reed Grass</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$20.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-1-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-2-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">American Marigold</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$23.45</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-2-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-3-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Black Eyed Susan</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$25.45</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-3-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-4-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Bleeding Heart</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$30.45</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-md-4 col-sm-6 pt-4">
                                    <div class="product-item">
                                        <div class="product-img">
                                            <a href="shop.html">
                                                <img class="primary-img" src="{{ asset('img/product/medium-size/1-4-270x300.jpg') }}"
                                                     alt="Product Images">
                                                <img class="secondary-img" src="{{ asset('img/product/medium-size/1-5-270x300.jpg') }}"
                                                     alt="Product Images">
                                            </a>
                                            <div class="product-add-action">
                                                <ul>
                                                    <li>
                                                        <a href="wishlist.html" data-tippy="Add to wishlist"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-like"></i>
                                                        </a>
                                                    </li>
                                                    <li class="quuickview-btn" data-bs-toggle="modal"
                                                        data-bs-target="#quickModal">
                                                        <a href="#" data-tippy="Quickview" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-look"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="cart.html" data-tippy="Add to cart"
                                                           data-tippy-inertia="true" data-tippy-animation="shift-away"
                                                           data-tippy-delay="50" data-tippy-arrow="true"
                                                           data-tippy-theme="sharpborder">
                                                            <i class="pe-7s-cart"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <a class="product-name" href="shop.html">Bloody Cranesbill</a>
                                            <div class="price-box pb-1">
                                                <span class="new-price">$45.00</span>
                                            </div>
                                            <div class="rating-box">
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($latestProducts)
                            <div class="tab-pane fade" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                                <div class="product-item-wrap row">
                                    @foreach ($latestProducts as $latestProduct)
                                        <div class="col-xl-3 col-md-4 col-sm-6">
                                            @include('components.shop.product.product_item', [
                                                'product' => $latestProduct
                                            ])
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->

    <!-- Begin Banner Area -->
    <div class="banner-area section-space-top-90">
        <div class="container">
            <div class="row g-min-30 g-4">
                <div class="col-lg-8">
                    <div class="banner-item img-hover-effect">
                        <div class="banner-img">
                            <img src="{{ asset('img/banner/1-1-770x300.jpg') }}" alt="Banner Image">
                        </div>
                        <div class="banner-content text-position-left">
                            <span class="collection">Collection Of Cactus</span>
                            <h3 class="title">Pottery Pots & <br> Plant</h3>
                            <div class="button-wrap">
                                <a class="btn btn-custom-size btn-pronia-primary" href="shop.html">Shop
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-item img-hover-effect">
                        <div class="banner-img">
                            <img src="{{ asset('img/banner/1-2-370x300.jpg') }}" alt="Banner Image">
                        </div>
                        <div class="banner-content text-position-center">
                            <span class="collection">New Collection</span>
                            <h3 class="title">Plant Port</h3>
                            <div class="button-wrap">
                                <a class="btn btn-custom-size lg-size btn-pronia-primary" href="shop.html">Shop
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="banner-item img-hover-effect">
                        <div class="banner-img">
                            <img src="{{ asset('img/banner/1-3-370x300.jpg') }}" alt="Banner Image">
                        </div>
                        <div class="banner-content text-position-center">
                            <span class="collection">New Collection</span>
                            <h3 class="title">Plant Port</h3>
                            <div class="button-wrap">
                                <a class="btn btn-custom-size lg-size btn-pronia-primary" href="shop.html">Shop
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="banner-item img-hover-effect">
                        <div class="banner-img">
                            <img src="{{ asset('img/banner/1-4-770x300.jpg') }}" alt="Banner Image">
                        </div>
                        <div class="banner-content text-position-left">
                            <span class="collection">Collection Of Cactus</span>
                            <h3 class="title">Hanging Pots & <br> Plant</h3>
                            <div class="button-wrap">
                                <a class="btn btn-custom-size lg-size btn-pronia-primary" href="shop.html">Shop
                                    Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End Here -->

    <!-- Begin Product Area -->
    <div class="product-area section-space-top-100">
        <div class="container">
            <div class="row">
                <div class="section-title-wrap without-tab">
                    <h2 class="section-title">Новые товары</h2>
                    <p class="section-desc">Последние опубликованные товары
                    </p>
                </div>
                <div class="col-lg-12">
                    <div class="swiper-container product-slider">
                        <div class="swiper-wrapper">
                            @foreach ($latestProducts as $latestProduct)
                                @include('components.shop.product.product_item', [
                                    'product' => $latestProduct,
                                    'classes' => 'swiper-slide'
                                ])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->

    @include('components.fragments.blog_latest_posts', ['classes' => 'section-space-top-100'])
@endsection
