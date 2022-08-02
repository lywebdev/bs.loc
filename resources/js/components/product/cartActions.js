DOMLoadedHookFunctions.push({
    call: () => {
        let $addToCartBtn = $('.single-product-content .add-to-cart');
        let $a = $addToCartBtn.find('a');
        $a.click((e) => {
            e.preventDefault();
        })

        $addToCartBtn.bind('click', (e) => {
            let $productItem = $(e.currentTarget).closest('.single-product-content');
            let productId = $productItem.data('product-id');
            let $quantityInput = $('.cart-plus-minus-box');

            function add() {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/api/cart/set-cart-item',
                    type: 'post',
                    data: {
                        productId: productId,
                        quantity: parseInt($quantityInput.val().match(/\d+/))
                    },
                    success: (response) => {
                        $a.text('Товар в корзине');
                        $a.css({'background-color':'#525252'});
                        $a.css({'border-color':'#525252'});
                        $addToCartBtn.addClass('added');
                        window.updateCart();
                    },
                    error: (e) => {
                        let response = e.responseJSON;
                        let maxQuantity = response.data.max_quantity;
                        let message = response.message;

                        $quantityInput.val(maxQuantity);
                        alert(message);

                        add();
                    }
                });
            }

            if ($addToCartBtn.hasClass('added')) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/api/cart/unset-cart-item',
                    type: 'post',
                    data: {
                        productId: productId
                    },
                    success: (response) => {
                        $a.text('В корзину');
                        $a.css({'background-color':'#755A57'});
                        $a.css({'border-color':'#755A57'});
                        $addToCartBtn.removeClass('added');
                        window.updateCart();
                    },
                    error: (e) => {
                        location.reload();
                    }
                });
            } else {
                // Товара в корзине нет
                add();
            }
        });
    }
});
