@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    @include('admin.components.alert')
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Характеристики</h4>
                        <div class="page-title-right">
{{--                            {{ \Diglactic\Breadcrumbs\Breadcrumbs::view('admin.components.breadcrumbs', 'admin.products.index') }}--}}
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
                                <a href="{{ route('admin.attributes.create') }}" class="btn btn-primary waves-effect waves-light">Добавить</a>
                            </div>
                            <form class="search" method="get" action="{{ route('admin.attributes.index') }}"
                                  style="display: flex; align-items: center;"
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
                                    'Наименование',
                                    'Действия'
                                ],
                                'tbody' => [
                                    ['alternative', 'fullname', 'name'],
                                ],
                                'data' => $attributes,
                                'route' => 'admin.attributes'
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
