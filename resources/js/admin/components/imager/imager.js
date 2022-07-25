/**
 * @author {Kulik Leonid}
 * @description {
 *     Компонент получает входные параметры, в зависимости от которых выполняет различный функционал:
 *     1. Позволяет добавлять к текущему типу записи изображения, сохраняя их как значение типа blob в input формы
 *     2. Позволяет crud'ить изображения у уже существующей записи, средствами ajax
 * }
 */
const TEMPLATE_IMAGER = 'imager';
const TYPE_CREATE = 'create';
const TYPE_EDIT = 'edit';

const IMAGER_TEMPAREA_CLASSNAME = 'imager__temp-area';

class Imager {
    constructor(type = TYPE_CREATE, params = {}) {
        this.type = type;
        this.params = params;

        this.rendered = false;

        this.$imager = undefined;
        this.$imagerItems = undefined;
        this.$tempArea = undefined;
        this.$addImageBtn = undefined;

        this.imageIndex = 0;

        this.#setup();
    }

    templates = {
        imager: (params = {}, moduleType = 'create') => {
            let itemsTemplate = ``;

            if (moduleType === TYPE_EDIT) {
                for (let i = 0; i < this.items.length; i++) {
                    itemsTemplate += (`
                        <div class="imager__item" data-row-id="${this.items[i].id}">
                            <img src="/storage/${this.items[i].filename}" alt="image">

                            <div class="imager__item__actions">
                                <button type="button" class="imager__remove-image-btn btn btn-info waves-effect waves-light">Удалить</button>
                            </div>
                        </div>
                    `);
                }
            }

            return (`
                <div class="imager">
                    <div class="imager__controls">
                        <div class="imager__controls__add-image-btn btn btn-outline-info waves-effect waves-light">
                            Добавить фотографии
                        </div>
                    </div>
                    <div class="imager__items">${itemsTemplate}</div>
                </div>
            `);
        }
    };

    #setup() {
        if (this.type === TYPE_EDIT) {
            this.idColumn = this.params.idColumn;
            this.pathColumn = this.params.pathColumn;
            this.entityColumnName = this.params.entityColumnName;
            this.entityColumnValue = this.params.entityColumnValue;
            this.table = this.params.table;
            this.items = JSON.parse(this.params.items);
        }

        if (!this.rendered) {
            this.#render();
            this.$imager = $('.imager');
            this.$imagerItems = this.$imager.find('.imager__items');
        }

        this.$addImageBtn = $('.imager__controls__add-image-btn');

        this[`${this.type}ImagerModuleInit`](this); // Динамический вызов модуля, в зависимости от переданного типа модуля, по умолчанию - create
    }

    #render() {
        $('.imager-container').append(this.getTemplate(TEMPLATE_IMAGER));
    }

    getTemplate(templateName, params = null) {
        return this.templates[`${templateName}`](params, this.type);
    }


    generateTempArea() {
        let template = (`<div class="${IMAGER_TEMPAREA_CLASSNAME}" style="display: none;"></div>`);

        if (this.$imager.find(`.${IMAGER_TEMPAREA_CLASSNAME}`).length !== 0) {
            this.$imager.find(`.${IMAGER_TEMPAREA_CLASSNAME}`).remove();
        }

        this.$imager.append(template);
        this.$tempArea = this.$imager.find(`.${IMAGER_TEMPAREA_CLASSNAME}`);
    }

    /**
     * В случае создания записи, элементов ещё нет, поэтому мы оперируем с формой, её элементами
     * При нажатии на кнопку добавления фотографии - во временной области генерируется инпут, в который загружаются фотографии
     * Далее, эти фотографии считываются и отображаются уже в контейнере imager'a, попутно генерируя отдельно под каждое
     * изображение свой инпут с фотографией - значением в blob
     */
    createImagerModuleInit(context) {
        function removeImage(imageIndex) {
            let $imageItem = context.$imagerItems.find(`.imager__item[data-index="${imageIndex}"]`);

            $imageItem.off().find("*").off();
            $imageItem.remove();
        }

        function addImage(blob) {
            let index = context.imageIndex;
            let imageItemTemplate = (`
                <div class="imager__item" data-index="${index}">
                    <img src="${blob}" alt="image">
                    <input type="input" name="files[]" style="display: none;">

                    <div class="imager__item__actions">
                        <button type="button" class="imager__remove-image-btn btn btn-info waves-effect waves-light">Удалить</button>
                    </div>
                </div>
            `);

            context.$imagerItems.append(imageItemTemplate);

            let $currentItem = context.$imagerItems.find(`.imager__item[data-index="${index}"]`);

            $currentItem.find('input').val(blob);
            $currentItem.find('.imager__remove-image-btn').bind('click', (event) => {
                event.preventDefault();
                removeImage(index);
            });

            context.imageIndex++;
        }

        function triggerHiddenFileInput() {
            context.generateTempArea();

            let fileInputTemplate = (`<input class="imager__temp-file-input" type="file" multiple="multiple">`);
            context.$tempArea.append(fileInputTemplate);
            let $fileInput = context.$tempArea.find('.imager__temp-file-input');

            $fileInput.unbind('change');
            $fileInput.bind('change', (event) => {
                event.preventDefault();

                let files = $fileInput[0].files;
                for (let i = 0; i < files.length; i++) {
                    let file = files[i];
                    let reader = new FileReader();

                    reader.readAsDataURL(file);
                    reader.onload = () => {
                        let blob = reader.result;
                        addImage(blob);
                    }
                }
            });

            $fileInput.trigger('click');
        }

        function addImageBtnBinding() {
            context.$addImageBtn.unbind('click');
            context.$addImageBtn.bind('click', (event) => {
                event.preventDefault();

                triggerHiddenFileInput();
            });
        }

        addImageBtnBinding();
    }

    /**
     * В случае редактирования:
     * - если фотография добавляется - сразу пишется в базу и хранилище, присваивается номер. Также делается переинициализация
     *  плагина сортировки, добавление обработчиков
     * - если фотография удалется - удаляется из хранилища и бд. переинициалзация плагина сортировки, удаление обработчиков
     *
     * Выгоднее не вешать на каждый элемент обработчик, на один класс повесить и определять конкретный элемент
     *
     * Чтобы не зависеть от сущности, нужно ... передавать таблицу и id которые нужно удалиить. table, id, path
     */
    editImagerModuleInit(context) {
        function addImage(fileRow) {
            let imageItemTemplate = (`
                <div class="imager__item" data-row-id="${fileRow.id}">
                    <img src="/storage/${fileRow.filename}" alt="image">

                    <div class="imager__item__actions">
                        <button type="button" class="imager__remove-image-btn btn btn-info waves-effect waves-light">Удалить</button>
                    </div>
                </div>
            `);

            context.$imagerItems.append(imageItemTemplate);
            removeBtnBindning();
        }

        function triggerHiddenFileInput() {
            context.generateTempArea();

            let fileInputTemplate = (`<input class="imager__temp-file-input" type="file" multiple="multiple">`);
            context.$tempArea.append(fileInputTemplate);
            let $fileInput = context.$tempArea.find('.imager__temp-file-input');

            $fileInput.unbind('change');
            $fileInput.bind('change', (event) => {
                event.preventDefault();

                let files = $fileInput[0].files;
                for (let i = 0; i < files.length; i++) {
                    let file = files[i];
                    let reader = new FileReader();

                    reader.readAsDataURL(file);
                    reader.onload = () => {
                        let blob = reader.result;

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: `/admin/api/imager/store`,
                            type: 'post',
                            data: {
                                table: `${context.table}`,
                                entityColumnName: 'product_id',
                                entityColumnValue: context.entityColumnValue,
                                image: blob
                            },
                            beforeSend: () => {},
                            success: (response) => {
                                addImage(response.data.fileRow);
                            },
                            error: (e) => {
                                alert('Возникла ошибка при загрузке фотографии');
                            }
                        });
                    }
                }
            });

            $fileInput.trigger('click');
        }


        function removeBtnBindning() {
            let $removeBtns = context.$imager.find('.imager__remove-image-btn');
            $removeBtns.unbind('click');
            $removeBtns.bind('click', (e) => {
                e.preventDefault();

                let $currentItem = $(e.currentTarget).closest('.imager__item');
                let rowId = $currentItem.data('row-id');

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: `/admin/api/imager/delete`,
                    type: 'post',
                    data: {
                        table: `${context.table}`,
                        rowId: rowId
                    },
                    beforeSend: () => {},
                    success: (response) => {
                        $currentItem.remove();

                        removeBtnBindning();
                    },
                    error: (e) => {
                        alert('Не удалось удалить изображение');
                    }
                });
            });
        }

        function addImageBtnBinding() {
            context.$addImageBtn.unbind('click');
            context.$addImageBtn.bind('click', (event) => {
                event.preventDefault();

                triggerHiddenFileInput();
            });
        }

        addImageBtnBinding();
        removeBtnBindning();
    }

    // Тут различный функционал уже самого модуля - загрузка по ajax, в инпуты и тд
}
