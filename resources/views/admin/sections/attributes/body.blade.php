<div class="mb-3 row">
    <div class="row">
        <div class="col-md-4">
            <label for="attribute[name]" class="col col-form-label">Название характеристики</label>
            <div class="col">
                @include('admin.components.inputs.input', [
                    'name' => 'attribute[name]',
                    'placeholder' => 'Название характеристики',
                    'value' => $attribute->name ?? ''
                ])
            </div>
        </div>
        <div class="col-md-4">
            <label for="attribute[fullname]" class="col col-form-label">Полное название характеристики (в админ-панели)</label>
            <div class="col">
                @include('admin.components.inputs.input', [
                    'name' => 'attribute[fullname]',
                    'placeholder' => 'Полное название',
                    'value' => $attribute->fullname ?? ''
                ])
            </div>
        </div>
        <div class="col-md-4">
            <label class="col col-form-label">Выберите тип характеристики</label>
            @include('admin.components.inputs.select', [
                'name' => 'attribute[frontend_type]',
                'placeholder' => false,
                'items' => $attributesTypes,
                'selected' => $attribute->frontend_type ?? \App\Models\Attribute\Attribute::TYPE_TEXT
            ])
        </div>
    </div>
</div>
