@extends('layouts.app')

@section('title', 'Каталог | ' . env('APP_NAME'))

@section('content')
    <!-- Begin Main Content Area -->
    <main class="main-content">
        <div class="breadcrumb-area breadcrumb-height"{{--data-bg-image="{{ asset('img/pages/shop/breadcrumbs_bg.jpg') }}" --}}>
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-lg-12">
                        <div class="breadcrumb-item">
                            <h2 class="breadcrumb-heading">Каталог товаров</h2>
                            {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('components.breadcrumbs', 'catalog.index') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shop-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 order-2 order-lg-1 pt-5 pt-lg-0">
                        @include('components.shop.catalog.sidebar')
                    </div>
                    <div class="col-xl-9 col-lg-8 order-1 order-lg-2">
                        <div class="product-topbar">
                            <ul>
                                <li class="page-count">
                                    <span>Всего {{ $products->total() }} {{ trans_choice('shop/product.products_quantity', $products->total()) }}</span>
                                </li>
                                <li class="product-view-wrap">
                                    <ul class="nav" role="tablist">
                                        <li class="grid-view" role="presentation">
                                            <a class="active" id="grid-view-tab" data-bs-toggle="tab" href="#grid-view"
                                               role="tab" aria-selected="true">
                                                <i class="fa fa-th"></i>
                                            </a>
                                        </li>
                                        <li class="list-view" role="presentation">
                                            <a id="list-view-tab" data-bs-toggle="tab" href="#list-view" role="tab"
                                               aria-selected="true">
                                                <i class="fa fa-th-list"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="short">
                                    <select class="nice-select">
                                        <option value="1">Сортировка по дате</option>
                                        <option value="2">Sort by Popularity</option>
                                        <option value="3">Sort by Rated</option>
                                        <option value="4">Sort by Latest</option>
                                        <option value="5">Sort by High Price</option>
                                        <option value="6">Sort by Low Price</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="grid-view" role="tabpanel"
                                 aria-labelledby="grid-view-tab">
                                <div class="product-grid-view row g-y-20">
                                    @foreach ($products as $product)
                                        <div class="col-md-4 col-sm-6">
                                            @include('components.shop.product.product_item', [
                                                'product' => $product
                                            ])
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
                                <div class="product-list-view row g-y-30">
                                    @foreach ($products as $product)
                                        <div class="col-12">
                                            @include('components.shop.product.product_item_fullwidth', [
                                                'product' => $product
                                            ])
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="pagination-area">
                            {{ $products->onEachSide(0)->links('components.shop.pagination') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Main Content Area End Here -->
@endsection
