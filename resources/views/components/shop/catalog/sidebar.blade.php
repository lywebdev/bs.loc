<div class="sidebar-area">
    <form action="{{ route('catalog.index') }}" method="get">
        <div class="widgets-searchbox">
            <div id="widgets-searchbox">
                <input class="input-field"
                       type="text"
                       placeholder="Поиск"
                       name="search"
                       value="{{ \Illuminate\Support\Facades\Request::get('search') }}"
                >
                <button class="widgets-searchbox-btn" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
        <div class="widgets-area">
            <div class="widgets-item pt-0">
                <h2 class="widgets-title mb-4">Категории</h2>
                <ul class="widgets-category">
                    @foreach ($categories as $category)
                        @include('components.shop.catalog.sidebar_category_item', [
                            'category' => $category
                        ])
                    @endforeach
                </ul>
            </div>
            {{--
            <div class="widgets-item">
                <h2 class="widgets-title mb-4">Color</h2>
                <ul class="widgets-category widgets-color">
                    <li>
                        <a href="#">
                            <i class="fa fa-chevron-right"></i>
                            All <span>(65)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-chevron-right"></i>
                            Gold <span>(12)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-chevron-right"></i>

                            Green <span>(22)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-chevron-right"></i>
                            white <span>(13)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-chevron-right"></i>
                            Black <span>(10)</span>
                        </a>
                    </li>
                </ul>
            </div>
            --}}
            <div class="widgets-item widgets-filter">
                <h2 class="widgets-title mb-4">Фильтр по цене</h2>
                <div class="price-filter">
                    <input type="text" class="pronia-range-slider" name="price_filter" value="" data-type="double" data-min="{{ $filterSettings['price_filter']['min'] }}" data-from="{{ $filterSettings['price_filter']['selected_min'] }}" data-to="{{ $filterSettings['price_filter']['selected_max'] }}" data-max="{{ $filterSettings['price_filter']['max'] }}" data-grid="false" />
                </div>
            </div>
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

            <div style="display: flex; justify-content: center; margin-top: 30px;">
                <button class="btn btn-custom-size sm-size btn-pronia-primary" style="width: 100%;">Применить</button>
            </div>
        </div>
    </form>
    <div class="banner-item widgets-banner img-hover-effect">
        <div class="banner-img">
            <img src="assets/images/sidebar/banner/1-270x300.jpg" alt="Banner Image">
        </div>
        <div class="banner-content text-position-center">
            <span class="collection">New Collection</span>
            <h3 class="title">Plant Port</h3>
            <div class="button-wrap">
                <a class="btn btn-custom-size sm-size btn-pronia-primary" href="#">Shop
                    Now</a>
            </div>
        </div>
    </div>
</div>
