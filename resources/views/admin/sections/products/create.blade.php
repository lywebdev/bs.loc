@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    @include('admin.components.alert')
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Добавление товара</h4>

                        <div class="page-title-right">
                            {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('admin.components.breadcrumbs', 'admin.products.create') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.products.store') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="product[name]" class="col col-form-label">Наименование товарной позиции</label>
                                            <div class="col">
                                                @include('admin.components.inputs.input', [
                                                    'name' => 'product[name]',
                                                    'placeholder' => 'Наименование товарной позиции',
                                                ])
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="product[vendor_code]" class="col col-form-label">Артикул товарной позиции</label>
                                            <div class="col">
                                                @include('admin.components.inputs.input', [
                                                    'name' => 'product[vendor_code]',
                                                    'placeholder' => 'Артикул товарной позиции',
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="product[price]" class="col col-form-label">Стоимость товара</label>
                                            <div class="col">
                                                @include('admin.components.inputs.input_number', [
                                                    'name' => 'product[price]',
                                                    'placeholder' => 'Стоимость товара',
                                                ])
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="product[old_price]" class="col col-form-label">Предыдущая стоимость товара</label>
                                            <div class="col">
                                                @include('admin.components.inputs.input', [
                                                    'name' => 'product[old_price]',
                                                    'placeholder' => 'Предыдущая стоимость товара',
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="card-title">Загрузка изображений</h4>
                                            @include('admin.components.images_loader.images_loader')
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Добавить</button>
                                </div>
                            </form>
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
