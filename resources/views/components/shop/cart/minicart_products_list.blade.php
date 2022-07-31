<ul class="minicart-list">
    @if ($cartItems->count())
        @foreach ($cartItems as $cartItem)
            @include('components.shop.cart.minicart_product')
        @endforeach
    @else
        <p>В корзине пусто</p>
    @endif
</ul>
