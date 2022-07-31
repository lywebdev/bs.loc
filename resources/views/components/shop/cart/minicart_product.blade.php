<li class="minicart-product">
    <a class="product-item_remove ajax" href="#">
        <i class="pe-7s-close" data-tippy="Remove"
           data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
           data-tippy-arrow="true" data-tippy-theme="sharpborder"></i>
    </a>
    <a href="{{ route('catalog.product', $cartItem->slug) }}" class="product-item_img">
        <img class="img-full" src="{{ \Illuminate\Support\Facades\Storage::url($cartItem->preview) }}" alt="{{ $cartItem->name }}">
    </a>
    <div class="product-item_content">
        <a class="product-item_title" href="{{ route('catalog.product', $cartItem->slug) }}">{{ $cartItem->name }}</a>
        <span class="product-item_quantity">{{ $cartItem->quantity }} x {{ $cartItem->price * $cartItem->quantity }}&nbsp;₽</span>
    </div>
</li>
