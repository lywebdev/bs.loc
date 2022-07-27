@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    @include('admin.components.alert')
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Редактирование характеристики {{ $attribute->name }}</h4>

                        <div class="page-title-right">
                            {{--                            {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('admin.components.breadcrumbs', 'admin.products.create') }}--}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @include('admin.sections.attributes.body')
                                <div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Сохранить</button>
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
    <script src="{{ asset('js/admin/repeater.js') }}"></script>
@endsection
