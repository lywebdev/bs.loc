@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    @include('admin.components.alert')
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Редактирование товара "{{ $product->name }}"</h4>

                        <div class="page-title-right">
                            {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('admin.components.breadcrumbs', 'admin.products.edit', $product) }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.products.update', $product->id) }}"
                                  method="post"
                                  enctype="multipart/form-data"
                                  data-product-id="{{ $product->id }}"
                            >
                                @method('PUT')
                                @csrf
                                @include('admin.sections.products.body')

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

@section('footer_scripts')
    <script src="{{ asset('js/admin/remove_img.js') }}"></script>
    <script>
        $(document).ready(() => {
            const imager = new Imager('edit', {
                items: `{!! json_encode($product->photos) !!}`,
                table: `App\\Models\\Product\\Photo`,
                idColumn: `id`,
                pathColumn: `filename`,
                entityColumnName: 'product_id',
                entityColumnValue: {{ $product->id }}
            });
        });
    </script>
@endsection
