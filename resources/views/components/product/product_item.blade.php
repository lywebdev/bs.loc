<div class="product-item">
    <div class="product-img">
        <a href="shop.html">
            @if ($product->preview)
                @if (strpos(mb_strtolower($product->preview), 'http') === false)
                    @php
                        $path = \Illuminate\Support\Facades\Storage::url($product->preview);
                    @endphp
                @else
                    @php
                        $path = $product->preview;
                    @endphp
                @endif

                <img class="primary-img" src="{{ $path }}" alt="Изображение товара №{{ $loop->iteration }}">
            @endif
            @foreach ($product->photos as $photo)
                @if ($loop->iteration === 1 && $product->preview)
                    @continue
                @else
                    <img class="primary-img" src="{{ \Illuminate\Support\Facades\Storage::url($photo->filename) }}" alt="Изображение товара №{{ $loop->iteration }}">
                @endif

                @if ($loop->iteration === 2)
                    <img class="secondary-img" src="{{ \Illuminate\Support\Facades\Storage::url($photo->filename) }}" alt="Изображение товара №{{ $loop->iteration }}">
                @endif
            @endforeach
        </a>
        <div class="product-add-action">
            <ul>
                <li>
                    <a href="wishlist.html" data-tippy="Add to wishlist" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                        <i class="pe-7s-like"></i>
                    </a>
                </li>
                <li class="quuickview-btn" data-bs-toggle="modal" data-bs-target="#quickModal">
                    <a href="#" data-tippy="Quickview" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                        <i class="pe-7s-look"></i>
                    </a>
                </li>
                <li>
                    <a href="cart.html" data-tippy="Add to cart" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                        <i class="pe-7s-cart"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="product-content">
        <a class="product-name" href="shop.html">{{ $product->name }}</a>
        <div class="price-box pb-1">
            <span class="new-price">
                @if (is_int((int)$product->price))
                    {{ $product->price }}
                @else
                    {{ number_format((float)$product->price, 2, '.', '') }}
                @endif
                ₽</span>
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
