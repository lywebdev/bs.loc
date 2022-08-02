<div class="header-sticky py-4 py-lg-0">
    <div class="container">
        <div class="header-nav position-relative">
            <div class="row align-items-center">
                <div class="col-lg-3 col-6">

                    <a href="{{ route('home') }}" class="header-logo">
                        <span>{{ env('APP_NAME') }}</span>
{{--                        <img src="img/logo/dark.png" alt="Header Logo">--}}
                    </a>

                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="main-menu">
                        <nav class="main-nav">
                            <ul>
                                <li>
                                    <a href="{{ route('home') }}">Главная</a>
                                </li>
                                <li class="megamenu-holder">
                                    <a href="{{ route('catalog.index') }}">Каталог</a>
                                    <ul class="drop-menu megamenu">
                                        <li>
                                            <span class="title">Все категории</span>
                                            <ul>
                                                @foreach ($share_categories as $category)
                                                    <li>
                                                        <a href="shop.html">{{ $category->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('blog.index') }}">Блог</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}">О нас</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Контакты</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="header-right">
                        <ul>
                            <li>
                                <a href="#exampleModal" class="search-btn bt" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="pe-7s-search"></i>
                                </a>
                            </li>
{{--                            <li class="dropdown d-none d-lg-block">--}}
{{--                                <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="stickysettingButton" data-bs-toggle="dropdown" aria-label="setting" aria-expanded="false">--}}
{{--                                    <i class="pe-7s-users"></i>--}}
{{--                                </button>--}}
{{--                                <ul class="dropdown-menu" aria-labelledby="stickysettingButton">--}}
{{--                                    <li><a class="dropdown-item" href="my-account.html">My account</a></li>--}}
{{--                                    <li><a class="dropdown-item" href="login-register.html">Login | Register</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li class="d-none d-lg-block">--}}
{{--                                <a href="wishlist.html">--}}
{{--                                    <i class="pe-7s-like"></i>--}}
{{--                                </a>--}}
{{--                            </li>--}}
                            <li class="minicart-wrap me-3 me-lg-0">
                                <a href="#miniCart" class="minicart-btn toolbar-btn">
                                    <i class="pe-7s-shopbag"></i>
                                    <span class="quantity">{{ $share_cartItemsCount }}</span>
                                </a>
                            </li>
                            <li class="mobile-menu_wrap d-block d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                    <i class="pe-7s-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
