<div class="mobile-menu_wrapper" id="mobileMenu">
    <div class="offcanvas-body">
        <div class="inner-body">
            <div class="offcanvas-top">
                <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
            </div>
            <div class="header-contact offcanvas-contact">
                <i class="pe-7s-call"></i>
                <a href="tel:+79780588210">+7 978 058 82 10</a>
            </div>
            {{--
            <div class="offcanvas-user-info">
                <ul class="dropdown-wrap">
                    <li class="dropdown dropdown-left">
                        <button class="btn btn-link dropdown-toggle ht-btn" type="button" id="languageButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                            English
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="languageButtonTwo">
                            <li><a class="dropdown-item" href="#">French</a></li>
                            <li><a class="dropdown-item" href="#">Italian</a></li>
                            <li><a class="dropdown-item" href="#">Spanish</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <button class="btn btn-link dropdown-toggle ht-btn usd-dropdown" type="button" id="currencyButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                            USD
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="currencyButtonTwo">
                            <li><a class="dropdown-item" href="#">GBP</a></li>
                            <li><a class="dropdown-item" href="#">ISO</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButtonTwo" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="pe-7s-users"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButtonTwo">
                            <li><a class="dropdown-item" href="my-account.html">My account</a></li>
                            <li><a class="dropdown-item" href="login-register.html">Login | Register</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="wishlist.html">
                            <i class="pe-7s-like"></i>
                        </a>
                    </li>
                </ul>
            </div>
            --}}
            <div class="offcanvas-menu_area mt-4">
                <nav class="offcanvas-navigation">
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children">
                            <a href="{{ route('home') }}">
                                <span class="mm-text">BeltStudio
                                </span>
                            </a>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('catalog.index') }}">
                                <span class="mm-text">Каталог
                                    <i class="pe-7s-angle-down"></i>
                                </span>
                            </a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children">
                                    <a href="#">
                                                    <span class="mm-text">Shop Layout
                                                <i class="pe-7s-angle-down"></i>
                                            </span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="shop.html">
                                                <span class="mm-text">Shop Default</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-grid-fullwidth.html">
                                                <span class="mm-text">Shop Grid Fullwidth</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-right-sidebar.html">
                                                <span class="mm-text">Shop Right Sidebar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-list-fullwidth.html">
                                                <span class="mm-text">Shop List Fullwidth</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-list-left-sidebar.html">
                                                <span class="mm-text">Shop List Left Sidebar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="shop-list-right-sidebar.html">
                                                <span class="mm-text">Shop List Right Sidebar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">
                                                    <span class="mm-text">Product Style
                                                <i class="pe-7s-angle-down"></i>
                                            </span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="single-product.html">
                                                <span class="mm-text">Single Product Default</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-group.html">
                                                <span class="mm-text">Single Product Group</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-variable.html">
                                                <span class="mm-text">Single Product Variable</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-sale.html">
                                                <span class="mm-text">Single Product Sale</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-sticky.html">
                                                <span class="mm-text">Single Product Sticky</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="single-product-affiliate.html">
                                                <span class="mm-text">Single Product Affiliate</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">
                                                    <span class="mm-text">Product Related
                                                <i class="pe-7s-angle-down"></i>
                                            </span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="my-account.html">
                                                <span class="mm-text">My Account</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="login-register.html">
                                                <span class="mm-text">Login | Register</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="cart.html">
                                                <span class="mm-text">Shopping Cart</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="wishlist.html">
                                                <span class="mm-text">Wishlist</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="compare.html">
                                                <span class="mm-text">Compare</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="checkout.html">
                                                <span class="mm-text">Checkout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('blog.index') }}">
                                <span class="mm-text">Блог
{{--                                    <i class="pe-7s-angle-down"></i>--}}
                                </span>
                            </a>
                            {{--
                            <ul class="sub-menu">
                                <li class="menu-item-has-children">
                                    <a href="#">
                                                    <span class="mm-text">Blog Holder
                                                <i class="pe-7s-angle-down"></i>
                                            </span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="blog.html">
                                                <span class="mm-text">Blog Default</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="blog-listview.html">Blog List View</a>
                                        </li>
                                        <li>
                                            <a href="blog-detail.html">Blog Detail</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            --}}
                        </li>
                        <li>
                            <a href="{{ route('about') }}">
                                <span class="mm-text">О нас</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}">
                                <span class="mm-text">Контакты</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
