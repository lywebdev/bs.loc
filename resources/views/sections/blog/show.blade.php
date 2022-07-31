@extends('layouts.app')

@section('title', $title)

@section('content')
<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="{{ asset('img/breadcrumb/bg/1-1-1919x388.jpg') }}">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">{{ $post->title }}</h2>
                        {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('components.breadcrumbs', 'blog.post', $post) }}
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
                    <div class="blog-detail-item">
                        <div class="blog-content">
                            <div class="blog-meta">
                                <ul>
                                    <li class="author">
                                        <a href="#">By: Admin</a>
                                    </li>
                                    <li class="date">{{ \Illuminate\Support\Carbon::parse($post->created_at)->translatedFormat('j F Y') }}</li>
                                </ul>
                            </div>
                            <h2 class="title">{{ $post->title }}</h2>
                        </div>
                        @if ($post->preview)
                            <div class="blog-img img-hover-effect">
                                <img class="img-full" src="{{ \Illuminate\Support\Facades\Storage::url($post->preview) }}" alt="Post image">
                            </div>
                        @endif

                        <p class="short-desc">{!! $post->content !!}</p>
                    </div>
                    {{--
                    <div class="social-with-tags">
                        <div class="tags">
                            <span class="title">Tags: </span>
                            <ul>
                                <li>
                                    <a href="#">Plant,</a>
                                </li>
                                <li>
                                    <a href="#">Tree Plant</a>
                                </li>
                            </ul>
                        </div>
                        <div class="social-link">
                            <ul>
                                <li>
                                    <a href="#" data-tippy="Facebook" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-tippy="Dribbble" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-tippy="Pinterest" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                </li>
                                <li class="comment">
                                    <a href="#">
                                        <span>2</span>
                                        <i class="fa fa-comments"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    --}}
                    {{--
                    <div class="blog-comment">
                        <h4 class="heading">Comments (03)</h4>
                        <div class="blog-comment-item">
                            <div class="blog-comment-img">
                                <img src="assets/images/blog/avatar/1-1-120x120.png" alt="User Image">
                            </div>
                            <div class="blog-comment-content">
                                <div class="user-meta">
                                    <h2 class="user-name">Donald Chavez</h2>
                                    <span class="date">21 July 2021</span>
                                </div>
                                <p class="user-comment">Lorem ipsum dolor sit amet, consectetur adipisi elit, sed
                                    do eiusmod tempor incidid ut labore etl dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitati ullamco laboris nisi ut aliquiex ea commodo
                                    consequat.
                                </p>
                                <a class="btn btn-custom-size comment-btn" href="#">Reply</a>
                            </div>
                        </div>
                        <div class="blog-comment-item relpy-item">
                            <div class="blog-comment-img">
                                <img src="assets/images/blog/avatar/1-2-120x120.png" alt="User Image">
                            </div>
                            <div class="blog-comment-content">
                                <div class="user-meta">
                                    <h2 class="user-name">Marissa Swan</h2>
                                    <span class="date">21 July 2021</span>
                                </div>
                                <p class="user-comment">Lorem ipsum dolor sit amet, consectetur adipisi elit, sed do
                                    eiusmod tempr incidid ut labore etl dolore magna aliqua. Ut enim ad minim veniam,
                                    quisnos exercitati ullamco laboris nisi ut aliquiex.
                                </p>
                                <a class="btn btn-custom-size comment-btn style-2" href="#">Reply</a>
                            </div>
                        </div>
                        <div class="blog-comment-item">
                            <div class="blog-comment-img">
                                <img src="assets/images/blog/avatar/1-3-120x120.png" alt="User Image">
                            </div>
                            <div class="blog-comment-content">
                                <div class="user-meta">
                                    <h2 class="user-name">Donald Chavez</h2>
                                    <span class="date">21 July 2021</span>
                                </div>
                                <p class="user-comment">Lorem ipsum dolor sit amet, consectetur adipisi elit, sed
                                    do eiusmod tempor incidid ut labore etl dolore magna aliqua. Ut enim ad minim
                                    veniam, quis nostrud exercitati ullamco laboris nisi ut aliquiex ea commodo
                                    consequat.
                                </p>
                                <a class="btn btn-custom-size comment-btn" href="#">Reply</a>
                            </div>
                        </div>
                    </div>
                    <div class="feedback-area">
                        <h2 class="heading">Leave a comment</h2>
                        <form class="feedback-form" action="#">
                            <div class="group-input">
                                <div class="form-field me-md-30 mb-30 mb-md-0">
                                    <input type="text" name="name" placeholder="Your Name*" class="input-field">
                                </div>
                                <div class="form-field">
                                    <input type="text" name="email" placeholder="Your Email*" class="input-field">
                                </div>
                            </div>
                            <div class="form-field mt-30">
                                <input type="text" name="subject" placeholder="Subject (Optinal)" class="input-field">
                            </div>
                            <div class="form-field mt-30">
                                <textarea name="message" placeholder="Message" class="textarea-field"></textarea>
                            </div>
                            <div class="button-wrap pt-5">
                                <button type="submit" value="submit" class="btn btn-custom-size xl-size btn-pronia-primary" name="submit">Post
                                    Comment</button>
                            </div>
                        </form>
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->
@endsection
