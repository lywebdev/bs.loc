<div class="mb-1 row">
    <div class="row">
        <div class="col-md-6">
            <label for="product[name]" class="col col-form-label">Наименование товарной позиции</label>
            <div class="col">
                @include('admin.components.inputs.input', [
                    'name' => 'product[name]',
                    'placeholder' => 'Наименование товарной позиции',
                    'value' => $product->name ?? ''
                ])
            </div>
        </div>
        <div class="col-md-6">
            <label for="product[vendor_code]" class="col col-form-label">Артикул товарной позиции</label>
            <div class="col">
                @include('admin.components.inputs.input', [
                    'name' => 'product[vendor_code]',
                    'placeholder' => 'Артикул товарной позиции',
                    'value' => $product->vendor_code ?? ''
                ])
            </div>
        </div>
    </div>
</div>
<div class="mb-3 row">
    <div class="row">
        <div class="col-md-4">
            <label for="product[price]" class="col col-form-label">Стоимость товара</label>
            <div class="col">
                @include('admin.components.inputs.input_number', [
                    'name' => 'product[price]',
                    'placeholder' => 'Стоимость товара',
                    'value' => $product->price ?? ''
                ])
            </div>
        </div>
        <div class="col-md-4">
            <label for="product[old_price]" class="col col-form-label">Предыдущая стоимость товара</label>
            <div class="col">
                @include('admin.components.inputs.input', [
                    'name' => 'product[old_price]',
                    'placeholder' => 'Предыдущая стоимость товара',
                    'value' => $product->old_price ?? ''
                ])
            </div>
        </div>
        <div class="col-md-4">
            <label for="product[quantity]" class="col col-form-label">Количество товара</label>
            <div class="col">
                @include('admin.components.inputs.input_number', [
                    'name' => 'product[quantity]',
                    'placeholder' => 'Количество товара',
                    'value' => $product->quantity ?? 0
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
                'name' => 'product[category_id]',
                'placeholder' => 'Категория не указана',
                'items' => $productsCategories,
                'selected' => $product->category_id ?? null
            ])
        </div>
        <div class="col-md-6">
            <label class="form-label">Выберите производителя</label>
            @include('admin.components.inputs.select', [
                'name' => 'product[manufacturer_id]',
                'placeholder' => 'Производитель не указан',
                'items' => [],
                'selected' => $product->manufacturer_id ?? null
            ])
        </div>
    </div>
</div>
<div class="mb-3 row">
    <div class="col-md-4">
        <div class="form-check form-switch">
            @include('admin.components.inputs.checkbox', [
                'name' => 'product[status]',
                'label' => 'Товар доступен на сайте',
            ])
        </div>
    </div>
</div>

<div class="mb-3 row">
    <div class="row">
        <div class="col-md-12 imager-container"></div>
    </div>
</div>
