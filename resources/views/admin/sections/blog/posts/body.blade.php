<div class="mb-3 row">
    <div class="row">
        <div class="col-md-12">
            <label for="post[name]" class="col col-form-label">Заголовок поста</label>
            <div class="col">
                @include('admin.components.inputs.input', [
                    'name' => 'post[name]',
                    'placeholder' => 'Название категории',
                    'value' => $post->title ?? ''
                ])
            </div>
        </div>
    </div>
</div>

<div class="mb-3 row">
    <div class="row">
        <div class="col-md-12">
            <label class="form-label">Выберите категорию</label>
            @include('admin.components.inputs.select', [
                'name' => 'post[category_id]',
                'placeholder' => 'Категория не указана',
                'items' => $categories,
                'selected' => $post->category_id ?? null
            ])
        </div>
    </div>
</div>
