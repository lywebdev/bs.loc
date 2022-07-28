<!-- Begin Main Header Area -->
<header class="main-header-area">
    @include('components.header.header_top')
    @include('components.header.header_middle')
    @include('components.header.header_bottom')
    @include('components.header.header_sticky')
    @include('components.header.header_mobile_menu')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content modal-bg-dark">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-tippy="Close" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-search">
                        <span class="searchbox-info">Начните вводить желамое</span>
                        <form action="#" class="hm-searchbox">
                            <input type="text" name="Search..." value="Найти..." onblur="if(this.value==''){this.value='Найти...'}" onfocus="if(this.value=='Найти...'){this.value=''}" autocomplete="off">
                            <button class="search-btn" type="submit" aria-label="searchbtn">
                                <i class="pe-7s-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.header.header_cart')
    <div class="global-overlay"></div>
</header>
<!-- Main Header Area End Here -->
