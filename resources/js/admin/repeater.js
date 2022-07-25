$(document).ready(() => {
    const repeaterContainerClass = 'repeater';
    let $repeaterContainers = $(`.${repeaterContainerClass}`);

    function initRepeaters() {
        let $addBtns = $repeaterContainers.find('.repeater__add-btn');

        function rebindRemoveRepeaterItemBtn() {
            let $removeRepeaterItemBtns = $('.repeater__remove-btn');
            $removeRepeaterItemBtns.unbind('click');
            $removeRepeaterItemBtns.bind('click', (e) => {
                e.preventDefault();

                let $currentEl = $(e.currentTarget);
                if ($currentEl.closest('.repeater__basic').length === 0) {
                    $currentEl.closest('.repeater__item').remove();

                    rebindRemoveRepeaterItemBtn();
                }
            });
        }

        function initAddBtnHandler() {
            $addBtns.unbind('click');
            $addBtns.bind('click', (e) => {
                e.preventDefault();

                let $currentEl = $(e.currentTarget);
                let $currentRepeater = $currentEl.closest('.repeater');
                let $basicContainer = $currentRepeater.find('.repeater__basic');

                let $repeaterItems = $currentRepeater.find('.repeater__items');
                if ($repeaterItems.length === 0) {
                    $basicContainer.after(`<div class="repeater__items"></div>`);
                    $repeaterItems = $currentRepeater.find('.repeater__items');
                }

                $repeaterItems.append($basicContainer.html());
                rebindRemoveRepeaterItemBtn();
            });
        }


        initAddBtnHandler();
        rebindRemoveRepeaterItemBtn();
    }

    initRepeaters();
});
