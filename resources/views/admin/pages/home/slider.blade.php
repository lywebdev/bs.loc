@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    @include('admin.components.alert')
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Редактирование слайдера на главной</h4>

                        <div class="page-title-right">
{{--                            {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('admin.components.breadcrumbs', 'admin.categories.create') }}--}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.pages.home.mainSlider.store') }}" method="post">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-12 col-form-label">Верхняя строчка</label>
                                            <div class="col-md-12">
                                                @include('admin.components.inputs.input', [
                                                    'name' => 'slide[offer]',
                                                    'placeholder' => 'Верхняя строчка',
                                                ])
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-12 col-form-label">Центральная строчка (акцентр внимания)</label>
                                            <div class="col-md-12">
                                                @include('admin.components.inputs.input', [
                                                    'name' => 'slide[title]',
                                                    'placeholder' => 'Центральная строчка',
                                                ])
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="example-text-input" class="col-md-12 col-form-label">Нижняя строчка</label>
                                            <div class="col-md-12">
                                                @include('admin.components.inputs.input', [
                                                    'name' => 'slide[description]',
                                                    'placeholder' => 'Нижняя строчка',
                                                ])
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Сохранить изменения</button>
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
