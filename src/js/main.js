import $ from 'jquery'
window.$ = $
window.jQuery = $
import validate from 'jquery-validation'

import UIkit from 'uikit'
window.UIkit = UIkit
UIkit.use(require('uikit/dist/js/uikit-icons'))

/** Лайтбокс **/
/*$(".js-lightbox").fancybox({
  tpl: {
    closeBtn : '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;">&times;</a>',
    next     : '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;">Следующее фото <i class="uk-icon-angle-right"></i></a>',
    prev     : '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><i class="uk-icon-angle-left"></i> Предыдущее фото</a>'
  },
  helpers: {
    title: null
  },
  afterLoad: function() {
    this.outer.before('<div class="fancybox-title fancybox-title-before">' + this.title + '</div>');
  }
});*/

/** Валидация и отправка форм **/
$('.js-validate').each(function(){
    $(this).validate({
      errorClass: 'uk-form-danger',
      validClass: 'uk-form-success'
    });
});

/** Лайтбокс на галереи **/
$('.gallery, .lightbox').each(function(){
    UIkit.lightbox(this, {});
});

$('.js-offcanvas-nav').each(function(){
  UIkit.nav(this, {
    multiple: true,
    targets: '> .menu-item-has-children'
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