<div class="images-loader">
    <div class="images-loader__controls">
        <div class="images-loader__load-btn btn btn-outline-info waves-effect waves-light">Добавить фотографии</div>
    </div>
    <div class="images-loader__images">

    </div>
    <div class="images-loader__temp" style="display: none;"></div>
</div>


<script>
window.addEventListener('DOMContentLoaded', () => {
    let elsIndex = 0;
    let state = {};
    $loadBtn = $('.images-loader__load-btn');
    $imagesContainer = $('.images-loader__images');
    $tempArea = $('.images-loader__temp');

    function loadBtnInit() {
        $loadBtn.unbind('click');
        $loadBtn.bind('click', (e) => {
            uploadImage();
        });
    }

    function makeid(length) {
        let result           = '';
        let characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        let charactersLength = characters.length;
        for ( let i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() *
                charactersLength));
        }
        return result;
    }

    function uploadImage() {
        if ($tempArea.find('.images-loader__item').length === 0) {
            let inputTemplate = (`
            <div class="images-loader__item">
                <input type="file" style="display: none;" multiple="multiple">
            </div>
        `);

            $tempArea.append(inputTemplate);
        }

        $item = $(`.images-loader__item`);
        $input = $item.find('input');

        $input.trigger('click');
        $input.unbind('change');
        $input.bind('change', (e) => {
            let files = $input[0].files;
            if (files.length !== 0) {
                for (let i = 0; i < files.length; i++) {
                    let file = files[i];
                    let reader = new FileReader();

                    reader.readAsDataURL(file);

                    reader.onload = () => {
                        let hash = makeid(10);
                        let blob = reader.result;
                        let template = (`
                            <div class="images-loader__image"
                                data-hash="${hash}"
                                style="display: flex;"
                            >
                                <img src="${blob}" alt="" style="width: 250px; height: 200px; object-fit: cover;">
                                <div class="actions" style="margin-left: 20px;">
                                    <button type="button" class="btn btn-info waves-effect waves-light images-loader__remove">Удалить</button>
                                </div>
                                <input type="input" name="files[]" style="display: none;" value="${blob}">
                            </div>
                        `);
                        $(`.images-loader__image[data-hash="${hash}"]`).val(blob);

                        $imagesContainer.append(template);

                        imageRemoveRebind();
                    }
                }

                $input.val(null);
            }
        });
    }

    function imageRemoveRebind() {
        let $imageRemoveBtn = $('.images-loader__remove');
        $imageRemoveBtn.unbind('click');
        $imageRemoveBtn.bind('click', (e) => {
            e.preventDefault();
            let $el = $(e.currentTarget);
            let $image = $el.closest('.images-loader__image');
            $image.remove();
        });
    }


    loadBtnInit();
});
</script>
