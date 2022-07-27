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

<div class="mb-3 row">
    <div class="col-md-12">
        <div>
            <label class="form-label">Привяжите характеристику к категориям</label>
            <select class="select2 form-control select2-multiple"
                    multiple="multiple"
                    data-placeholder="Выберите категории..."
                    name="attributeCategories[]"
            >
                @if (isset($attributeCategoriesIds))
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if (in_array($category->id, $attributeCategoriesIds))
                                selected
                            @endif
                        >{{ $category->name }}</option>
                    @endforeach
                @else
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
</div>

<div class="mb-3 row">
    <div class="row">
        <div class="col-md-12">
            <div class="repeater">
                <div class="repeater__basic">
                    <div class="repeater__item">
                        <div class="repeater__item__body">
                            @include('admin.components.inputs.input', [
                                'name' => 'attributeValues[]',
                                'placeholder' => 'Введите значение характеристики',
                                'value' => ''
                            ])
                        </div>
                        <button type="button" class="repeater__remove-btn btn btn-outline-danger waves-effect waves-light">Удалить значение</button>
                    </div>
                </div>
                @if (isset($attribute->values))
                    <div class="repeater__items">
                        @foreach ($attribute->values as $attributeValue)
                            <div class="repeater__item">
                                <div class="repeater__item__body">
                                    @include('admin.components.inputs.input', [
                                        'name' => 'attributeValues[]',
                                        'placeholder' => 'Введите значение характеристики',
                                        'value' => $attributeValue->value
                                    ])
                                </div>
                                <button type="button" class="repeater__remove-btn btn btn-outline-danger waves-effect waves-light">Удалить значение</button>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="repeater__actions">
                    <button type="button" class="repeater__add-btn btn btn-outline-primary waves-effect waves-light">Добавить характеристику</button>
                </div>
            </div>
        </div>
    </div>
</div>
