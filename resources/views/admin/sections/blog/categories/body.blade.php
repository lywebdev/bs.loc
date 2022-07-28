<div class="mb-3 row">
    <div class="row">
        <div class="col-md-12">
            <label for="category[name]" class="col col-form-label">Название категории</label>
            <div class="col">
                @include('admin.components.inputs.input', [
                    'name' => 'category[name]',
                    'placeholder' => 'Название категории',
                    'value' => $category->name ?? ''
                ])
            </div>
        </div>
    </div>
</div>
