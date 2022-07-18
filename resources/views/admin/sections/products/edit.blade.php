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

                                @if ($product->photos->count())
                                    <div class="mb-3 row">
                                        <div class="gallery">
                                        @foreach ($product->photos as $photo)
                                            <div class="gallery-item" data-photo-id="{{ $photo->id }}">
                                                <div class="gallery-item__image">
                                                    <img class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;" src="{{ \Illuminate\Support\Facades\Storage::url($photo->filename) }}" data-holder-rendered="true">
                                                </div>
                                                <div class="gallery-item__actions">
                                                    <button type="button" class="btn btn-danger waves-effect waves-light mt-2 remove-image-btn">Удалить</button>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                @endif

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
@endsection
