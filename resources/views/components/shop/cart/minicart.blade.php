<div class="minicart-content">
    <div class="minicart-heading">
        <h4 class="mb-0">Ваша корзина</h4>
        <a href="#" class="button-close"><i class="pe-7s-close" data-tippy="Закрыть" data-tippy-inertia="true"
            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
            data-tippy-theme="sharpborder"></i>
        </a>
    </div>
    @include('components.shop.cart.minicart_products_list', [
        'cartItems' => $cartItems
    ])
</div>
<div class="minicart-item_total">
    <span>Итого</span>
    <span class="ammount">{{ $cartItemsTotalCost }}&nbsp;₽</span>
</div>
<div class="group-btn_wrap d-grid gap-2">
    <a href="{{ route('cart.index') }}" class="btn btn-dark">В корзину</a>
    <a href="checkout.html" class="btn btn-dark">Оформить заказ</a>
</div>
