$(document).ready((e) => {
    let categorySelectQuery = `select[name="product[category_id]"]`;
    let $categorySelect = $(categorySelectQuery);
    $categorySelect.select2({
        placeholder: "Select a state",
    });

    let $attributer = $('.attributer');
    let attributerType = $attributer.data('type');

    $attributer.append(`<div class="attributer__info">Выберите категорию, чтобы загрузились сопутствующие характеристики</div>`);

    if (attributerType === 'create') {
        attributerCreateInit();
    }

    function appendAttributes(attributes) {
        $attributerInfo = $attributer.find('.attributer__info');

        if (attributes.length !== 0) {
            $attributerInfo.text('Загружены характеристики для выбранной категории');

            if ($attributer.find('.attributer__attributes').length === 0) {
                $attributer.append(`<div class="attributer__attributes"></div>`);
            }

            let $attributes = $attributer.find('.attributer__attributes');

            $attributes.empty();
            for (let i = 0; i < attributes.length; i++) {
                let attribute = attributes[i];
                $attributes.append(`<div class="attribuer__attribute" data-attribute-id="${attribute.id}">${attribute.name}</div>`);
            }
        }
        else {
            $attributerInfo.text('Для выбранной категории не найдены характеристики');
        }
    }


    function attributerCreateInit() {
        function categorySelectChange(event) {
            let $currentTarget = $(event.currentTarget);
            let selectedCategoryId = $currentTarget[0].value;

            if (selectedCategoryId !== -1) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/admin/api/attributes/get-attributes-by-category',
                    type: 'post',
                    data: {
                        categoryId: `${selectedCategoryId}`
                    },
                    success: (response) => {
                        appendAttributes(response.data.attributes);
                    }
                });
            }
        }

        $categorySelect.bind('change', (event) => {
            categorySelectChange(event);
        });
    }

    function attributerEditInit() {

    }
});
