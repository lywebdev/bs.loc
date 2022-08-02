@extends('layouts.app')

@section('content')
    <!-- Begin Main Content Area -->
    <main class="main-content">
        <div class="breadcrumb-area breadcrumb-height" data-bg-image="assets/images/breadcrumb/bg/1-1-1919x388.jpg">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12">
                        <div class="breadcrumb-item">
                            <h2 class="breadcrumb-heading">Корзина</h2>
                            {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('components.breadcrumbs', 'cart.index') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if (!$cartItems->count())
                            <h2 class="heading mb-0">В вашей корзине пусто</h2>
                        @else
                            <form action="javascript:void(0)">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="product_remove">Удаление</th>
                                            <th class="product-thumbnail">Фотография</th>
                                            <th class="cart-product-name">Название</th>
                                            <th class="product-price">Стоимость за единицу</th>
                                            <th class="product-quantity">Количество</th>
                                            <th class="product-subtotal">Итого</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($cartItems as $cartItem)
                                            <tr>
                                                <td class="product_remove">
                                                    <a href="#">
                                                        <i class="pe-7s-close" data-tippy="Удалить" data-tippy-inertia="true"
                                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                                           data-tippy-arrow="true" data-tippy-theme="sharpborder"></i>
                                                    </a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="{{ route('catalog.product', $cartItem->slug) }}">
                                                        @if ($cartItem->preview)
                                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($cartItem->preview) }}"
                                                                 alt="{{ $cartItem->name }}"
                                                                 style="max-height: 125px; max-width: 125px;"
                                                            >
                                                        @else
                                                            <img src="{{ asset('img/product/small-size/1-1-112x124.png') }}" alt="Cart Thumbnail">
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="product-name"><a href="{{ route('catalog.product', $cartItem->slug) }}">{{ $cartItem->name }}</a></td>
                                                <td class="product-price"><span class="amount">{{ $cartItem->product->price }}&nbsp;₽</span></td>
                                                <td class="quantity">
                                                    <div class="cart-plus-minus">
                                                        <span>{{ $cartItem->quantity }}</span>
{{--                                                        <input class="cart-plus-minus-box" value="{{ $cartItem->quantity }}" type="text">--}}
{{--                                                        <div class="dec qtybutton">--}}
{{--                                                            <i class="fa fa-minus"></i>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="inc qtybutton">--}}
{{--                                                            <i class="fa fa-plus"></i>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span class="amount">{{ $cartItem->price * $cartItem->quantity }}&nbsp;₽</span></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
{{--                                            <div class="coupon">--}}
{{--                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">--}}
{{--                                                <input class="button mt-xxs-30" name="apply_coupon" value="Apply coupon" type="submit">--}}
{{--                                            </div>--}}
{{--                                            <div class="coupon2">--}}
{{--                                                <input class="button" name="update_cart" value="Обновить корзину" type="submit">--}}
{{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Итого</h2>
                                            <ul>
{{--                                                <li>Subtotal <span>$79.35</span></li>--}}
                                                <li>Общая стоимость <span>{{ $totalCost }}&nbsp;₽</span></li>
                                            </ul>
                                            <a href="{{ route('checkoutForm') }}">Оформить заказ</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main Content Area End Here -->
@endsection
