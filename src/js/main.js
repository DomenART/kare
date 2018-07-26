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
    const switcher = UIkit.switcher(this, {
        connect: '.js-switcher-slider-items',
        animation: 'uk-animation-fade'
    });
    switcher.timer = null;
    // switcher.$on('show', function(e) {
    //     console.log(e);
    //     // clearTimeout(timer);

    //     // timer = setTimeout(() => {
    //     //     switcher.show('next');
    //     // }, timeout);
    // });
    // this.addEventListener('show', function(e) {
    //     console.log(e);
    // });
    UIkit.util.on('.js-switcher-slider-items', 'shown', function(e) {
        console.log(e.detail[0]);
        clearTimeout(e.detail[0].timer);

        e.detail[0].timer = setTimeout(() => {
            e.detail[0].show('next');
        }, 8000);
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

