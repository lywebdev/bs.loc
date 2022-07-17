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
                            <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @include('admin.sections.products.body')

                                @if ($product->photos->count())
                                    <div class="mb-3 row">
                                        @foreach ($product->photos as $photo)
                                            <div class="col-md-3">
                                                <img class="card-img-top img-fluid" src="{{ \Illuminate\Support\Facades\Storage::disk('public')->path($photo->filename) }}" alt="Card image cap">
                                                <button type="button" class="btn btn-danger waves-effect waves-light mt-3">Удалить</button>
                                            </div>
                                        @endforeach
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
