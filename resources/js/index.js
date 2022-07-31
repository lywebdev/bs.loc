let DOMLoadedHookFunctions = [];
let ResizeHookFunctions = [];
let SetMobileVersionHookFunctions = [];
let SetPCVersionHookFunctions = [];
let FromMobileToPcFunctions = [];
let CommonScriptsFunctions = [];


const helper = {
    hooks: {
        DOMContentLoaded: () => {
            DOMLoadedHookFunctions.map((functionObject) => {
                functionObject.call(functionObject.params);
            });
        },
        Resize: () => {
            ResizeHookFunctions.map((functionObject) => {
                functionObject.call(functionObject.params);
            });
        },
        /*
        SetMobileVersion: () => {
            SetMobileVersionHookFunctions.map((functionObject) => {
                functionObject.call(functionObject.params);
            });

            $app.removeClass('pc');
            $app.addClass('mobile');
            helper.options.app.version = 'mobile';
        },
        SetPCVersion: () => {
            SetPCVersionHookFunctions.map((functionObject) => {
                functionObject.call(functionObject.params);
            });

            $app.removeClass('mobile');
            $app.addClass('pc');
            helper.options.app.version = 'pc';
        },
        */
        FromMobileToPc: () => {
            FromMobileToPcFunctions.map((functionObject) => {
                functionObject.call(functionObject.params);
            });

            helper.hooks.CommonScriptsInit();
        },
        CommonScriptsInit: (firstInit) => {
            let time = firstInit ? 0 : 1000;

            setTimeout(() => {
                CommonScriptsFunctions.map((functionObject) => {
                    functionObject.call(functionObject.params);
                });
            }, time);
        }
    }
};


$(document).ready(function() {
    helper.hooks.DOMContentLoaded();
});



window.updateCart = () => {
    let $minicart = $('.minicart-btn');
    let $minicartQuantity = $minicart.find('.quantity');
    let $minicartMenu = $('#miniCart');
    let $minicartMenuList = $minicartMenu.find('.minicart-list');


    function rebindCartActions() {
        $menuClose = $('.button-close');
        $menuClose.unbind('click');

        $menuClose.on('click', function (e) {
            var dom = $('.main-wrapper').children();
            e.preventDefault();
            var $this = $(this);
            $this.parents('.open').removeClass('open');
            dom.find('.global-overlay').removeClass('overlay-open');
        });

        let $offcanvasNav = $('.mobile-menu, .offcanvas-minicart_menu'),
            $offcanvasNavWrap = $(
                '.mobile-menu_wrapper, .offcanvas-minicart_wrapperm, .offcanvas-search_wrapper'
            ),
            $offcanvasNavSubMenu = $offcanvasNav.find('.sub-menu'),
            $menuToggle = $('.menu-btn');

        $menuClose.on('click', function (e) {
            e.preventDefault();
            $('.mobile-menu .sub-menu').slideUp();
            $('.mobile-menu .menu-item-has-children').removeClass('menu-open');
        });


        // Remove product from minicart
        let $productItemRemoveBtns = $('.product-item_remove.ajax');
        $productItemRemoveBtns.unbind('click');
        $productItemRemoveBtns.bind('click', (e) => {
            e.preventDefault();

            // Удаляем итем - делаем updateCart
        });
    }


    function getCartItems() {
        return $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/api/cart/items',
            type: 'get',
            data: {},
            success: (response) => {
                return response.data.items;
            },
            error: (e) => {
                location.reload();
            }
        });
    }

    $.when(getCartItems())
        .done((cartItemsResponse) => {
            let cartItems = cartItemsResponse.data.items;
            console.log(cartItems);
            $.ajax({
                url: '/api/cart/template/minicart',
                type: 'get',
                data: {
                    cartItems: cartItems
                },
                success: (response) => {
                    let template = response.data.template;
                    $minicartMenu.find('.offcanvas-body').html(template);

                    rebindCartActions();
                    // reinit cart actions
                },
                error: (e) => {}
            })
        });
}


DOMLoadedHookFunctions.push({
    call: () => {
        let $addToCartBtns = $('.product-item.ajax .add-product-to-cart');
        let $a = $addToCartBtns.find('a');

        $a.click(e => {
            e.preventDefault();
        });

        $addToCartBtns.unbind('click');
        $addToCartBtns.bind('click', (e) => {
            let $productItem = $(e.currentTarget).closest('.product-item');
            let productId = $productItem.data('product-id');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `/api/cart/toggle-cart-item`,
                type: 'post',
                data: {
                    productId: productId
                },
                success: (response) => {
                    if (response.message === 'increase') {
                        alert('Товар добавлен в корзину');
                    } else if (response.message === 'decrease') {
                        alert('Товар удалён из корзины')
                    }

                    window.updateCart();
                },
                error: (e) => {
                    alert(e.responseJSON.message)
                }
            });
        });
    }
});
