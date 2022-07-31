@extends('layouts.app')

@section('title', 'Блог | BeltStudio')

@section('content')
    <!-- Begin Main Content Area -->
    <main class="main-content">
        <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('img/breadcrumb/bg/1-1-1919x388.jpg') }}">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12">
                        <div class="breadcrumb-item">
                            <h2 class="breadcrumb-heading">Блог</h2>
                            {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('components.breadcrumbs', 'blog.index') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 order-2 pt-5 pt-lg-0">
                        <div class="sidebar-area">
                            <div class="widgets-searchbox">
                                <form id="widgets-searchbox">
                                    <input class="input-field" type="text" placeholder="Поиск">
                                    <button class="widgets-searchbox-btn" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </form>
                            </div>
                            <div class="widgets-area">
                                @include('components.blog.categories_widget')
                                @include('components.blog.recent_posts_widget')

                                {{--
                                <div class="widgets-item">
                                    <h2 class="widgets-title mb-4">Populer Tags</h2>
                                    <ul class="widgets-tag">
                                        <li>
                                            <a href="#">Fashion</a>
                                        </li>
                                        <li>
                                            <a href="#">Organic</a>
                                        </li>
                                        <li>
                                            <a href="#">Old Fashion</a>
                                        </li>
                                        <li>
                                            <a href="#">Men</a>
                                        </li>
                                        <li>
                                            <a href="#">Fashion</a>
                                        </li>
                                        <li>
                                            <a href="#">Dress</a>
                                        </li>
                                    </ul>
                                </div>
                                --}}
                            </div>
                            {{--
                            <div class="banner-item widgets-banner img-hover-effect">
                                <div class="banner-img">
                                    <img src="assets/images/sidebar/banner/1-270x300.jpg" alt="Banner Image">
                                </div>
                                <div class="banner-content text-position-center">
                                    <span class="collection">New Collection</span>
                                    <h3 class="title">Plant Port</h3>
                                    <div class="button-wrap">
                                        <a class="btn btn-custom-size sm-size btn-pronia-primary" href="shop.html">Shop
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 order-1">
                        <div class="blog-item-wrap row g-y-30">
                            @foreach ($posts as $post)
                                <div class="col-12">
                                    @include('components.blog.blog_item')
                                </div>
                            @endforeach
                        </div>
                        <div class="pagination-area">
                            {{ $posts->onEachSide(0)->links('components.shop.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main Content Area End Here -->
@endsection
