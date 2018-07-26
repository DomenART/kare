import $ from 'jquery'
window.$ = $
window.jQuery = $

import UIkit from 'uikit'
window.UIkit = UIkit
UIkit.use(require('uikit/dist/js/uikit-icons'))

/** Лайтбокс на галереи **/
$('.gallery, .lightbox').each(function(){
    UIkit.lightbox(this, {});
});

/** Лайтбокс на галереи **/
UIkit.util.on('.js-switcher-slider-items', 'shown', function(e) {
    clearTimeout(e.detail[0].timer);

    e.detail[0].timer = setTimeout(() => {
        e.detail[0].show('next');
    }, 8000);
});

$(window).scroll(function(){
    var scrollTop = $(this).scrollTop();

    if (scrollTop > 500) {
        $('.js-scrollup').addClass('scrollup_visible');
    } else {
        $('.js-scrollup').removeClass('scrollup_visible');
    }
});

