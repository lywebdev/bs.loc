@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    @include('admin.components.alert')
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Товары</h4>
                        <div class="page-title-right">
                            {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('admin.components.breadcrumbs', 'admin.products.index') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body"
                             style="display: flex; align-items: center; justify-content: space-between;"
                        >
                            <div class="btns">
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary waves-effect waves-light">Добавить</a>
                            </div>
                            <form class="search" method="get" action="{{ route('admin.products.index') }}"
                                 style="display: flex; align-items: center;"
                            >
                                <input class="form-control"
                                       type="text"
                                       id="products_search"
                                       name="products_search"
                                       placeholder="Введите название товара или артикул"
                                       style="margin-right: 10px; min-width: 350px;"
                                       value="{{ \Illuminate\Support\Facades\Request::get('products_search') ?? '' }}"
                                >
                                <button type="submit" class="btn btn-light waves-effect"
                                    style="flex-grow: 1; display: inline-block; min-width: 100px;"
                                >Поиск</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            @include('admin.components.table', [
                                'thead' => [
                                    '#',
                                    'Изображение',
                                    'Наименование',
                                    'Артикул',
                                    'Категория',
                                    'Количество',
                                    'Действия'
                                ],
                                'tbody' => [
                                    ['image', 'preview'],
                                    'name',
                                    'vendor_code',
                                    ['relation', 'category', 'name'],
                                    'quantity'
                                ],
                                'data' => $products,
                                'route' => 'admin.products'
                            ])
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
@endsection
