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
            console.log('change');
            let files = $input[0].files;
            if (files.length !== 0) {
                for (let i = 0; i < files.length; i++) {
                    let file = files[i];
                    let reader = new FileReader();

                    reader.readAsDataURL(file);

                    reader.onload = () => {
                        let blob = reader.result;
                        let template = (`
                            <div class="images-loader__image">
                                <img src="${blob}" alt="" style="width: 250px; height: 200px;">
                                <input type="file" name="files[]" style="display: none;">
                            </div>
                        `);

                        $imagesContainer.append(template);
                    }
                }
            }
        });
    }

    loadBtnInit();
});
</script>
