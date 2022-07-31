<div class="mb-3 row">
    <div class="row">
        <div class="col-md-12">
            <label for="post[title]" class="col col-form-label">Заголовок поста</label>
            <div class="col">
                @include('admin.components.inputs.input', [
                    'name' => 'post[title]',
                    'placeholder' => 'Название категории',
                    'value' => $post->title ?? ''
                ])
            </div>
        </div>
    </div>
</div>

<div class="mb-3 row">
    <div class="row">
        <div class="col-md-6">
            <label class="form-label">Выберите категорию</label>
            @include('admin.components.inputs.select', [
                'name' => 'post[category_id]',
                'placeholder' => 'Категория не указана',
                'items' => $categories,
                'selected' => $post->category_id ?? null
            ])
        </div>
        <div class="col-md-6">
            <label class="form-label">Доступность статьи на сайте</label>
            <div class="form-check form-switch">
                @include('admin.components.inputs.checkbox', [
                    'name' => 'post[status]',
                    'label' => 'Статья доступна',
                ])
            </div>
        </div>
    </div>
</div>

<div class="mb-3 row">
    <div class="col-md-12">
        <label class="form-label">Выберите превью поста</label>
        <br>
        <input type="file" class="filestyle" data-input="false" name="post[preview]" data-buttonname="btn-secondary">
        @if (isset($post) && $post->preview)
            <br>
            <div class="mb-2"></div>
            <img src="{{ \Illuminate\Support\Facades\Storage::url($post->preview) }}"
                 alt="post image"
                 style="max-width: 100%;"
            >
        @endif
    </div>
</div>

<div class="mb-3 row">
    <div class="col-md-12">
        <textarea id="post_editor" name="post[content]">@if(isset($post)){{$post->content}}@endif</textarea>
    </div>
</div>
