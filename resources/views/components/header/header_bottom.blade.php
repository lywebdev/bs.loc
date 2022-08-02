<div class="header-bottom d-none d-lg-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="main-menu position-relative">
                    <nav class="main-nav">
                        <ul>
                            <li class="drop-holder">
                                <a href="{{ route('home') }}">BeltStudio</a>
                            </li>
                            <li class="megamenu-holder">
                                <a href="{{ route('catalog.index') }}">Каталог</a>
                                <ul class="drop-menu megamenu">
                                    <li>
                                        <span class="title">Категории</span>
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
                            <li class="drop-holder">
                                <a href="{{ route('blog.index') }}">Блог</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}">О нас</a>
                            </li>
{{--                            <li class="drop-holder">--}}
{{--                                <a href="#">Pages</a>--}}
{{--                                <ul class="drop-menu">--}}
{{--                                    <li>--}}
{{--                                        <a href="faq.html">FAQ</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="404.html">Error 404</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
                            <li>
                                <a href="{{ route('contact') }}">Контакты</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
