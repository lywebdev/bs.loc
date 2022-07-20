<div class="header-middle py-30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="header-middle-wrap position-relative">
                    <div class="header-contact d-none d-lg-flex">
                        <i class="pe-7s-call"></i>
                        <a href="tel://+00-123-456-789">+7 978 030 27 26</a>
                    </div>

                    <a href="{{ route('home') }}" class="header-logo">
{{--                        <img src="{{ asset('img/logo/beltstudio.png') }}" alt="Header Logo">--}}
                        <h3 style="padding-top: 5px;">BeltStudio</h3>
                    </a>

                    <div class="header-right">
                        <ul>
                            <li>
                                <a href="#exampleModal" class="search-btn bt" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="pe-7s-search"></i>
                                </a>
                            </li>
                            <li class="dropdown d-none d-lg-block">
                                <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button" id="settingButton" data-bs-toggle="dropdown" aria-label="setting" aria-expanded="false">
                                    <i class="pe-7s-users"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="settingButton">
                                    <li><a class="dropdown-item" href="my-account.html">My account</a></li>
                                    <li><a class="dropdown-item" href="login-register.html">Login | Register</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="d-none d-lg-block">
                                <a href="wishlist.html">
                                    <i class="pe-7s-like"></i>
                                </a>
                            </li>
                            <li class="minicart-wrap me-3 me-lg-0">
                                <a href="#miniCart" class="minicart-btn toolbar-btn">
                                    <i class="pe-7s-shopbag"></i>
                                    <span class="quantity">3</span>
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
