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
$('.js-switcher-slider').each(function() {
    const timeout = 8000;
    const switcher = UIkit.switcher(this, {
        connect: '.js-switcher-slider-items',
        animation: 'uk-animation-fade'
    });

    let timer = null;

    UIkit.util.on(this, 'show', () => {
        clearTimeout(timer);

        timer = setTimeout(() => {
            switcher.show('next');
        }, timeout);
    });
});

$(window).scroll(function(){
    var scrollTop = $(this).scrollTop();

    if (scrollTop > 500) {
        $('.js-scrollup').addClass('scrollup_visible');
    } else {
        $('.js-scrollup').removeClass('scrollup_visible');
    }
});

