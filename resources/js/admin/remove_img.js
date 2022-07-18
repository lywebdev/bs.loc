$(document).ready(() => {
    function init() {
        $removeImageBtns = $('.remove-image-btn');

        $removeImageBtns.unbind('click');
        $removeImageBtns.bind('click', (e) => {
            let $el = $(e.currentTarget);
            let $imageContainer = $el.closest('.gallery-item');
            let photoId = $imageContainer.data('photo-id');

            function ajaxPhotoRemove() {
                return $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: `/admin/api/products/photos/${photoId}/destroy`,
                    method: 'post',
                    dataType: 'json',
                    beforeSend: () => {
                        $removeImageBtns.unbind('click');
                    },
                    success: () => {
                        console.log(`Image with id ${photoId} has been successfully deleted`);
                        $el.closest('.gallery-item').remove();
                    },
                    error: (e) => {
                        console.log(e);
                        console.log(`An error occurred when deleting an image with ID ${photoId}`);
                    }
                });
            }

            $.when(ajaxPhotoRemove()).then((response) => {
                init();
            });
        });
    }

    init();
});
