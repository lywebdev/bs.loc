<!-- Begin Footer Area -->
<div class="footer-area" data-bg-image="img/footer/bg/1-1920x465.jpg">
    <div class="footer-top section-space-top-100 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-widget-item">
                        <div class="footer-widget-logo">
                            <a href="{{ route('home') }}">
{{--                                <img src="img/logo/dark.png" alt="Logo">--}}
                                <h3 style="padding-top: 5px;">BeltStudio</h3>
                            </a>
                        </div>
                        <p class="footer-widget-desc">
                            Интернет-магазин ремней и других аксессуаров
                        </p>
                        <div class="social-link with-border">
                            <ul>
                                <li>
                                    <a href="#" data-tippy="Facebook" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-tippy="Twitter" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-tippy="Pinterest" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                        <i class="fa fa-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-tippy="Dribbble" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 pt-40">
                    <div class="footer-widget-item">
                        <h3 class="footer-widget-title">Полезные ссылки</h3>
                        <ul class="footer-widget-list-item">
                            <li>
                                <a href="#">Контакты</a>
                            </li>
                            <li>
                                <a href="#">Блог</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 pt-40">
                    {{--
                    <div class="footer-widget-item">
                        <h3 class="footer-widget-title">My Account</h3>
                        <ul class="footer-widget-list-item">
                            <li>
                                <a href="#">Sign In</a>
                            </li>
                            <li>
                                <a href="#">View Cart</a>
                            </li>
                            <li>
                                <a href="#">My Wishlist</a>
                            </li>
                            <li>
                                <a href="#">Track My Order</a>
                            </li>
                            <li>
                                <a href="#">Help</a>
                            </li>
                        </ul>
                    </div>
                    --}}
                </div>
                <div class="col-lg-2 col-md-4 pt-40">
                    <div class="footer-widget-item">
                        <h3 class="footer-widget-title">Our Service</h3>
                        <ul class="footer-widget-list-item">
                            <li>
                                <a href="#">Payment Methods</a>
                            </li>
                            <li>
                                <a href="#">Money Guarantee!</a>
                            </li>
                            <li>
                                <a href="#">Returns</a>
                            </li>
                            <li>
                                <a href="#">Shipping</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 pt-40">
                    <div class="footer-contact-info">
                        <h3 class="footer-widget-title">Мы на связи</h3>
                        <a class="number" href="tel://+79780588210">+7 978 058 82 10</a>
                        <div class="address">
                            <ul>
                                <li>г.Ялта ул.Киевская 6, ТЦ «Дом торговли» 3й Этаж</li>
                                <li>г.Ялта ул.Пушкинская 23 выставочный центр «Энергетик»</li>
                                <li>г.Ялта наб. им. Ленина 5 тц «Фонтан» 1й Этаж</li>
                            </ul>
                        </div>
                    </div>
                    {{--
                    <div class="payment-method">
                        <a href="#">
                            <img src="img/payment/1.png" alt="Payment Method">
                        </a>
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright">
                                <span class="copyright-text">© 2021 Pronia Made with <i class="fa fa-heart text-danger"></i> by
                            <a href="https://hasthemes.com/" rel="noopener" target="_blank">HasThemes</a> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Area End Here -->

<!-- Begin Modal Area -->
{{--Модальное окно, отвечающее за предпросмотр товара--}}
{{--
<div class="modal quick-view-modal fade" id="quickModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="quickModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-tippy="Close" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-wrap row">
                    <div class="col-lg-6">
                        <div class="modal-img">
                            <div class="swiper-container modal-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <a href="#" class="single-img">
                                            <img class="img-full" src="img/product/large-size/1-1-570x633.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#" class="single-img">
                                            <img class="img-full" src="img/product/large-size/1-2-570x633.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#" class="single-img">
                                            <img class="img-full" src="img/product/large-size/1-3-570x633.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="#" class="single-img">
                                            <img class="img-full" src="img/product/large-size/1-4-570x633.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 pt-5 pt-lg-0">
                        <div class="single-product-content">
                            <h2 class="title">American Marigold</h2>
                            <div class="price-box">
                                <span class="new-price">$23.45</span>
                            </div>
                            <div class="rating-box-wrap">
                                <div class="rating-box">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                                <div class="review-status">
                                    <a href="#">( 1 Review )</a>
                                </div>
                            </div>
                            <div class="selector-wrap color-option">
                                <span class="selector-title border-bottom-0">Color</span>
                                <select class="nice-select wide border-bottom-0 rounded-0">
                                    <option value="default">Black & White</option>
                                    <option value="blue">Blue</option>
                                    <option value="green">Green</option>
                                    <option value="red">Red</option>
                                </select>
                            </div>
                            <div class="selector-wrap size-option">
                                <span class="selector-title">Size</span>
                                <select class="nice-select wide rounded-0">
                                    <option value="medium">Medium Size & Poot</option>
                                    <option value="large">Large Size With Poot</option>
                                    <option value="small">Small Size With Poot</option>
                                </select>
                            </div>
                            <p class="short-desc">Lorem ipsum dolor sit amet, consectetur adipisic elit, sed do eiusmod
                                tempo incid ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostru
                                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
                                dolor
                                in reprehenderit in voluptate</p>
                            <ul class="quantity-with-btn">
                                <li class="quantity">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" value="1" type="text">
                                    </div>
                                </li>
                                <li class="add-to-cart">
                                    <a class="btn btn-custom-size lg-size btn-pronia-primary" href="cart.html">Add to
                                        cart</a>
                                </li>
                                <li class="wishlist-btn-wrap">
                                    <a class="custom-circle-btn" href="wishlist.html">
                                        <i class="pe-7s-like"></i>
                                    </a>
                                </li>
                                <li class="compare-btn-wrap">
                                    <a class="custom-circle-btn" href="compare.html">
                                        <i class="pe-7s-refresh-2"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="service-item-wrap pb-0">
                                <li class="service-item">
                                    <div class="service-img">
                                        <img src="img/shipping/icon/car.png" alt="Shipping Icon">
                                    </div>
                                    <div class="service-content">
                                        <span class="title">Free <br> Shipping</span>
                                    </div>
                                </li>
                                <li class="service-item">
                                    <div class="service-img">
                                        <img src="img/shipping/icon/card.png" alt="Shipping Icon">
                                    </div>
                                    <div class="service-content">
                                        <span class="title">Safe <br> Payment</span>
                                    </div>
                                </li>
                                <li class="service-item">
                                    <div class="service-img">
                                        <img src="img/shipping/icon/service.png" alt="Shipping Icon">
                                    </div>
                                    <div class="service-content">
                                        <span class="title">Safe <br> Payment</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
--}}
<!-- Modal Area End Here -->

<!-- Begin Scroll To Top -->
<a class="scroll-to-top" href="">
    <i class="fa fa-angle-double-up"></i>
</a>
<!-- Scroll To Top End Here -->

</div>

<!-- Global Vendor, plugins JS -->

<!-- JS Files
============================================ -->
<script src="{{ mix('js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ mix('js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ mix('js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
<script src="{{ mix('js/vendor/jquery.waypoints.js') }}"></script>
<script src="{{ mix('js/vendor/modernizr-3.11.2.min.js') }}"></script>
<script src="{{ mix('js/plugins/wow.min.js') }}"></script>
<script src="{{ mix('js/plugins/swiper-bundle.min.js') }}"></script>
<script src="{{ mix('js/plugins/jquery.nice-select.js') }}"></script>
<script src="{{ mix('js/plugins/parallax.min.js') }}"></script>
<script src="{{ mix('js/plugins/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ mix('js/plugins/tippy.min.js') }}"></script>
<script src="{{ mix('js/plugins/ion.rangeSlider.min.js') }}"></script>
<script src="{{ mix('js/plugins/mailchimp-ajax.js') }}"></script>
<script src="{{ mix('js/plugins/jquery.counterup.js') }}"></script>

<!--Main JS (Common Activation Codes)-->
<script src="{{ mix('js/main.js') }}"></script>

</body>
</html>
