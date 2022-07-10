<div class="images-loader">
    <div class="images-loader__controls">
        <div class="images-loader__load-btn btn btn-outline-info waves-effect waves-light">Добавить фотографии</div>
    </div>
    <div class="images-loader__images">

    </div>
</div>


<script>
window.addEventListener('DOMContentLoaded', () => {
    $loadBtn = $('.images-loader__load-btn');
    $imagesContainer = $('.images-loader__images');

    function loadBtnInit() {
        $loadBtn.bind('click', (e) => {
            
        });
    }
});
</script>
