@extends('admin.layouts.app')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    @include('admin.components.alert')
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Редактирование статьи блога "{{ $post->title }}"</h4>

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
                            <form action="{{ route('admin.blog.posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @include('admin.sections.blog.posts.body')
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
    <!--tinymce js-->
    <script src="{{ asset('assets/libs/tinymce/tinymce.min.js') }}"></script>
    <script>
        $(document).ready((e) => {
            tinymce.init({
                selector: 'textarea#post_editor',
                height: 300,
            });
        });
    </script>
@endsection
