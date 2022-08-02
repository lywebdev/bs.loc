@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    @include('admin.components.alert')
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Добавление категории</h4>

                        <div class="page-title-right">
                            {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('admin.components.breadcrumbs', 'admin.categories.create') }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.categories.store') }}" method="post">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Название категории</label>
                                    <div class="col-md-10">
                                        @include('admin.components.inputs.input', [
                                            'name' => 'category[name]',
                                            'placeholder' => 'Название категории',
                                        ])
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="example-text-input" class="col-md-2 col-form-label">Выберите категорию</label>
                                    <div class="col-md-10">
                                        @include('admin.components.inputs.select', [
                                            'name' => 'category[parent_id]',
                                            'placeholder' => 'Категория не указана',
                                            'items' => $categories,
                                            'selected' => $category->parent_id ?? null
                                        ])
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
