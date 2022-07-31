<div class="offcanvas-minicart_wrapper" id="miniCart">
    <div class="offcanvas-body">
        @include('components.shop.cart.minicart', [
            'cartItems' => $share_cartItems,
            'cartItemsTotalCost' => $share_cartItemsTotalCost
        ])
    </div>
</div>
