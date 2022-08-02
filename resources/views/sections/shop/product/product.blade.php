@extends('layouts.app')

@section('title', $product->name . ' | ' . env('APP_NAME'))

@section('content')
    <!-- Begin Main Content Area  -->
    <main class="main-content">
        <div class="breadcrumb-area breadcrumb-height" data-bg-image={{ asset('img/breadcrumb/bg/1-1-1919x388.jpg') }}>
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12">
                        <div class="breadcrumb-item">
                            <h2 class="breadcrumb-heading">{{ $product->name }}</h2>
                            {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('components.breadcrumbs', 'catalog.product', $product) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-product-area section-space-top-100">
            <div class="container">
                <div class="row">
                    @if ($product->photos->count() || $product->preview)
                    <div class="col-lg-6">
                        <div class="single-product-img">
                            <div class="swiper-container single-product-slider">
                                <div class="swiper-wrapper">
                                    @if (!$product->photos->count() && $product->preview)
                                        <div class="swiper-slide">
                                            <a href="{{ \Illuminate\Support\Facades\Storage::url($product->preview) }}" class="single-img gallery-popup">
                                                <img class="img-full" src="{{ \Illuminate\Support\Facades\Storage::url($product->preview) }}" alt="Изображение товара">
                                            </a>
                                        </div>
                                    @else
                                        @foreach ($product->photos as $photo)
                                            <div class="swiper-slide">
                                                <a href="{{ \Illuminate\Support\Facades\Storage::url($photo->filename) }}" class="single-img gallery-popup">
                                                    <img class="img-full" src="{{ \Illuminate\Support\Facades\Storage::url($photo->filename) }}" alt="Изображение товара №{{ $loop->iteration }}">
                                                </a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="thumbs-arrow-holder">
                                <div class="swiper-container single-product-thumbs">
                                    <div class="swiper-wrapper">
                                        @if (!$product->photos->count() && $product->preview)
                                            <a href="#" class="swiper-slide">
                                                <img class="img-full" src="{{ \Illuminate\Support\Facades\Storage::url($product->preview) }}" alt="Изображение товара">
                                            </a>
                                        @else
                                            @foreach ($product->photos as $photo)
                                                <a href="#" class="swiper-slide">
                                                    <img class="img-full" src="{{ \Illuminate\Support\Facades\Storage::url($photo->filename) }}" alt="Изображение товара №{{ $loop->iteration }}">
                                                </a>
                                            @endforeach
                                        @endif
                                    </div>
                                    <!-- Add Arrows -->
                                    <div class=" thumbs-button-wrap d-none d-md-block">
                                        <div class="thumbs-button-prev">
                                            <i class="pe-7s-angle-left"></i>
                                        </div>
                                        <div class="thumbs-button-next">
                                            <i class="pe-7s-angle-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-lg-6 pt-5 pt-lg-0">
                        <div class="single-product-content" data-product-id="{{ $product->id }}">
                            <h2 class="title">{{ $product->name }}</h2>
                            <div class="price-box">
                                <span class="new-price">
                                    @if (is_int((int)$product->price))
                                        {{ $product->price }}
                                    @else
                                        {{ number_format((float)$product->price, 2, '.', '') }}
                                    @endif₽
                                </span>
                            </div>
{{--                            <div class="rating-box-wrap">--}}
{{--                                <div class="rating-box">--}}
{{--                                    <ul>--}}
{{--                                        <li><i class="fa fa-star"></i></li>--}}
{{--                                        <li><i class="fa fa-star"></i></li>--}}
{{--                                        <li><i class="fa fa-star"></i></li>--}}
{{--                                        <li><i class="fa fa-star"></i></li>--}}
{{--                                        <li><i class="fa fa-star"></i></li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                                <div class="review-status">--}}
{{--                                    <a href="#">( 1 Review )</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            {{--
                            <div class="selector-wrap color-option">
                                <span class="selector-title border-bottom-0">Color</span>
                                <select class="nice-select wide border-bottom-0 rounded-0">
                                    <option value="default">Black & White</option>
                                    <option value="blue">Blue</option>
                                    <option value="green">Green</option>
                                    <option value="red">Red</option>
                                </select>
                            </div>
                            <div class="selector-wrap size-option">
                                <span class="selector-title">Size</span>
                                <select class="nice-select wide rounded-0">
                                    <option value="medium">Medium Size & Poot</option>
                                    <option value="large">Large Size With Poot</option>
                                    <option value="small">Small Size With Poot</option>
                                </select>
                            </div>
                            --}}

                            @if ($product->description)
                                <p class="short-desc">{{ $product->description }}</p>
                            @endif
                            <ul class="quantity-with-btn">
                                <li class="quantity">
                                    <div class="cart-plus-minus">
                                        @if ($product->cartItem)
                                            <input class="cart-plus-minus-box" value="{{ $product->cartItem->quantity }}" type="text">
                                        @else
                                            <input class="cart-plus-minus-box" value="1" type="text">
                                        @endif
                                    </div>
                                </li>
                                <li class="add-to-cart">
                                    @if ($product->cartItem)
                                        <a class="btn btn-custom-size lg-size btn-pronia-primary added" href="#cart-action">В корзине</a>
                                    @else
                                        <a class="btn btn-custom-size lg-size btn-pronia-primary" href="#cart-action">В корзину</a>
                                    @endif
                                </li>
{{--                                <li class="wishlist-btn-wrap">--}}
{{--                                    <a class="custom-circle-btn" href="wishlist.html">--}}
{{--                                        <i class="pe-7s-like"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="compare-btn-wrap">--}}
{{--                                    <a class="custom-circle-btn" href="compare.html">--}}
{{--                                        <i class="pe-7s-refresh-2"></i>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
                            </ul>
                            <ul class="service-item-wrap">
                                <li class="service-item">
                                    <div class="service-img">
                                        <img src="{{ asset('img/shipping/icon/car.png') }}" alt="Shipping Icon">
                                    </div>
                                    <div class="service-content">
                                        <span class="title">Удобная <br> Доставка</span>
                                    </div>
                                </li>
                                <li class="service-item">
                                    <div class="service-img">
                                        <img src="{{ asset('img/shipping/icon/card.png') }}" alt="Shipping Icon">
                                    </div>
                                    <div class="service-content">
                                        <span class="title">Безопасная <br> Оплата</span>
                                    </div>
                                </li>
{{--                                <li class="service-item">--}}
{{--                                    <div class="service-img">--}}
{{--                                        <img src="{{ asset('img/shipping/icon/service.png') }}" alt="Shipping Icon">--}}
{{--                                    </div>--}}
{{--                                    <div class="service-content">--}}
{{--                                        <span class="title">Safe <br> Payment</span>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
                            </ul>
                            @if ($product->vendor_code)
                                <div class="product-category">
                                    <span class="title">Артикул:</span>
                                    <ul>
                                        <li>
                                            <a href="{{ route('catalog.productBySku', $product->vendor_code) }}" rel="nofollow">{{ $product->vendor_code }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                            <div class="product-category">
                                <span class="title">Категория :</span>
                                <ul>
                                    <li>
                                        <a href="#">{{ $product->category->name }}</a>
                                    </li>
                                </ul>
                            </div>
{{--                            <div class="product-category product-tags">--}}
{{--                                <span class="title">Tags :</span>--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">Furniture</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
                            {{--
                            <div class="product-category social-link align-items-center pb-0">
                                <span class="title pe-3">Share:</span>
                                <ul>
                                    <li>
                                        <a href="#" data-tippy="Pinterest" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-pinterest-p"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-tippy="Twitter" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-tippy="Tumblr" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-tumblr"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-tippy="Dribbble" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-tab-area section-space-top-100 section-space-bottom-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="nav product-tab-nav tab-style-2 pt-0" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="active tab-btn" id="information-tab" data-bs-toggle="tab" href="#information" role="tab" aria-controls="information" aria-selected="false">
                                    Информация
                                </a>
                            </li>
                            @if ($product->description)
                                <li class="nav-item" role="presentation">
                                    <a class="tab-btn" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">
                                        Описание
                                    </a>
                                </li>
                            @endif
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <a class="tab-btn" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">--}}
{{--                                    Reviews(3)--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>
                        <div class="tab-content product-tab-content">
                            <div class="tab-pane fade show active" id="information" role="tabpanel" aria-labelledby="information-tab">
                                <div class="product-information-body">
                                    <h4 class="title">Доставка</h4>
                                    <p class="short-desc mb-4">The item will be shipped from China. So it need 15-20 days to
                                        deliver. Our product is good with reasonable price and we believe you will worth it.
                                        So please wait for it patiently! Thanks.Any question please kindly to contact us and
                                        we promise to work hard to help you to solve the problem</p>
                                    <h4 class="title">Возврат товара</h4>
                                    <p class="short-desc mb-4">If you don't need the item with worry, you can contact us
                                        then we will help you to solve the problem, so please close the return request!
                                        Thanks</p>
                                    <h4 class="title">Гарантии</h4>
                                    <p class="short-desc mb-0">If it is the quality question, we will resend or refund to
                                        you; If you receive damaged or wrong items, please contact us and attach some
                                        pictures about product, we will exchange a new correct item to you after the
                                        confirmation.</p>
                                </div>
                            </div>
                            @if ($product->description)
                                <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                                    <div class="product-description-body">
                                        <p class="short-desc mb-0">{{ $product->description }}</p>
                                    </div>
                                </div>
                            @endif
                            {{--
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="product-review-body">
                                    <div class="blog-comment mt-0">
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
                                                <p class="user-comment">Lorem ipsum dolor sit amet, consectetur adipisi
                                                    elit, sed
                                                    do eiusmod tempor incidid ut labore etl dolore magna aliqua. Ut enim ad
                                                    minim
                                                    veniam, quis nostrud exercitati ullamco laboris nisi ut aliquiex ea
                                                    commodo
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
                                                <p class="user-comment">Lorem ipsum dolor sit amet, consectetur adipisi
                                                    elit, sed do
                                                    eiusmod tempr incidid ut labore etl dolore magna aliqua. Ut enim ad
                                                    minim veniam,
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
                                                <p class="user-comment">Lorem ipsum dolor sit amet, consectetur adipisi
                                                    elit, sed
                                                    do eiusmod tempor incidid ut labore etl dolore magna aliqua. Ut enim ad
                                                    minim
                                                    veniam, quis nostrud exercitati ullamco laboris nisi ut aliquiex ea
                                                    commodo
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
                                </div>
                            </div>
                            --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (isset($relatedProducts) && $relatedProducts->count())
            <!-- Begin Product Area -->
            <div class="product-area{{--section-space-y-axis-90--}}">
                <div class="container">
                    <div class="row">
                        <div class="section-title-wrap without-tab">
                            <h2 class="section-title">Связанные товары</h2>
                            <p class="section-desc">Товары, подходящие по параметрам к текущему товару</p>
                        </div>
                        <div class="col-lg-12">
                            <div class="swiper-container product-slider">
                                <div class="swiper-wrapper">
                                    @foreach ($relatedProducts as $relatedProduct)
                                        @include('components.shop.product.product_item', [
                                            'product' => $relatedProduct,
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
        @endif

    </main>
    <!-- Main Content Area End Here  -->
@endsection

@section('footer_scripts')
    <script src="{{ mix('js/components/product/cartActions.js') }}"></script>
@endsection
