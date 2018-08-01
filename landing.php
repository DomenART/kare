<?php
/*
Template Name: Главная
*/
$query = new WP_Query;
$reviews = $query->query([
    'post_type' => 'reviews',
    'nopaging' => true
]);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php get_template_part( 'partials/head' ) ?>
    </head>
    <body>
        <div class="wrapper uk-offcanvas-content">
            <?php get_template_part( 'partials/header' ) ?>

            <div class="section-first">
                <div class="uk-container">
                    <?php if ($notification = get_field('notification')) : ?>
                        <div class="header-notification">
                            <div class="header-notification__label"><?php echo $notification['label'] ?></div>
                            <div class="header-notification__text"><?php echo $notification['text'] ?></div>
                        </div>
                    <?php endif; ?>

                    <?php $banner = get_field('banner') ?>
                    <div class="banner-wrap">
                        <div class="banner-menu">
                            <?php wp_nav_menu([
                                'theme_location' => 'bannermenu',
                                'container' => false,
                                'menu_class' => 'banner-menu__list'
                            ]); ?>
                        </div>
                        <div class="banner">
                            <div class="banner__info">
                                <div
                                    class="banner__title"
                                    uk-scrollspy="cls: uk-animation-slide-left-medium; delay: 100"
                                >
                                    <?php echo nl2br($banner['title']) ?>
                                </div>
                                <div
                                    class="banner__desc"
                                    uk-scrollspy="target: > span; cls: uk-animation-fade; delay: 80"
                                >
                                    <?php $letters = preg_split('//u', $banner['desc'], null, PREG_SPLIT_NO_EMPTY) ?>
                                    <?php foreach ($letters as $letter) : echo '<span>' . $letter . '</span>'; endforeach; ?>
                                </div>
                            </div>
                            <div class="banner__image">
                                <img
                                    src="<?php echo $banner['image']['url'] ?>"
                                    alt="<?php echo $banner['image']['title'] ?>"
                                >
                            </div>
                            <div
                                class="banner__sticker"
                                uk-scrollspy="cls: uk-animation-scale-up; delay: 500"
                            >
                                <div><?php echo $banner['sticker'] ?></div>
                            </div>
                            <a
                                href="<?php echo $banner['link'] ?>"
                                class="uk-button button-default banner__link"
                                uk-scrollspy="cls: uk-animation-slide-right-medium; delay: 1000"
                            ><?php echo $banner['btn_text'] ?></a>
                        </div>
                    </div>

                    <?php if ($advantages = get_field('advantages')) : ?>
                        <div class="advantages">
                            <div class="uk-grid" uk-grid>
                                <?php foreach($advantages as $item) : ?>
                                    <div class="uk-width-1-2@m">
                                        <div class="advantages-item">
                                            <?php if ($item['title']) : ?>
                                                <div class="advantages-item__title"><?php echo $item['title'] ?></div>
                                            <?php endif; ?>
                                            <?php if ($item['text']) : ?>
                                                <div class="advantages-item__text"><?php echo $item['text'] ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if ($slider = get_field('slider')) : ?>
                <ul class="uk-hidden" uk-switcher="connect: .js-switcher-slider; animation: uk-animation-fade">
                    <?php foreach ($slider as $item): ?><li></li><?php endforeach; ?>
                </ul>
                <div class="slider">
                    <ul class="uk-switcher js-switcher-slider">
                        <?php foreach($slider as $item) : ?>
                            <li>
                                <div
                                    class="slider-item"
                                    style="background-image: linear-gradient(<?php echo $item['gradient']['from'] ?> 0%, <?php echo $item['gradient']['to'] ?> 100%);"
                                >
                                    <div class="uk-container">
                                        <div class="uk-grid uk-grid-small" uk-grid>
                                            <div class="uk-width-1-2@m">
                                                <div class="slider-item__image">
                                                    <img src="<?php echo $item['image']['url'] ?>" alt="">
                                                    <?php echo $item['sticker'] ?>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2@m">
                                                <?php $cls = strlen($item['text']) < 180 && empty($item['annotation']) ? 'slider-item__info slider-item__info_center' : 'slider-item__info' ?>
                                                <div class="<?php echo $cls ?>">
                                                    <?php if ($item['text']) : ?>
                                                        <div class="slider-item__text <?php echo($item['darken'] ? 'slider-item__text_light' : '') ?>">
                                                            <?php echo $item['text'] ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($item['link']) : ?>
                                                        <div class="slider-item__more">
                                                            <?php $btn_txt = $item['btn_text'] ? $item['btn_text'] : 'Записаться' ?>
                                                            <?php $btn_cls = $item['darken'] ? 'button-default' : 'button-light' ?>
                                                            <a class="uk-button <?php echo $btn_cls ?>" href="<?php echo $item['link'] ?>">
                                                                <?php echo $btn_txt ?>
                                                                <span class="btn-arrow"></span>
                                                            </a>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($item['annotation']) : ?>
                                                        <div class="slider-item__annotation">
                                                            <?php echo $item['annotation'] ?>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="uk-width-1-2@m">
                                                <div class="slider__navigation">
                                                    <ul class="slider-dotnav js-switcher-slider">
                                                        <?php foreach ($slider as $key => $tmp): echo '<li uk-switcher-item="' . $key . '"></li>'; endforeach; ?>
                                                    </ul>
                                                    <div class="slider-nav">
                                                        <button class="slider-nav__previous <?php echo($item['darken'] ? 'slider-nav__previous_light' : '') ?>" uk-switcher-item="previous"></button>
                                                        <button class="slider-nav__next <?php echo($item['darken'] ? 'slider-nav__next_light' : '') ?>" uk-switcher-item="next"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <div class="section-about">
                <?php if ($about = get_field('about')): ?>
                    <div class="uk-container">
                        <div class="about">
                            <div class="about__title" uk-scrollspy="cls: uk-animation-slide-left-medium; delay: 100"><?php echo $about['title'] ?></div>
                            <div class="about__first-text" uk-scrollspy="cls: uk-animation-slide-left-medium; delay: 300">
                                <div>
                                    <?php echo $about['first_text'] ?>
                                </div>
                            </div>
                            <div class="about__second-text" uk-scrollspy="cls: uk-animation-slide-left-medium; delay: 300"><?php echo $about['second_text'] ?></div>
                            <div class="about-image">
                                <img class="about-image__pattern-first" src="<?php echo get_bloginfo('template_url') ?>/dist/img/letters-kare.png" alt="">
                                <img class="about-image__pattern-second" src="<?php echo get_bloginfo('template_url') ?>/dist/img/sun.png" alt="">
                                <img class="about-image__image" src="<?php echo $about['image']['url'] ?>" alt="">
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="section-gallery">
                    <div class="uk-container">
                        <?php if ($gallery = get_field('gallery')): ?>
                            <div class="gallery">
                                <div class="gallery__title"><?php echo $gallery['title'] ?></div>
                                <?php if (!empty($gallery['mask'])): ?>
                                    <div class="gallery__mask" uk-scrollspy="cls: uk-animation-slide-bottom-medium; delay: 150">
                                        <img src="<?php echo $gallery['mask']['url'] ?>" alt="">
                                    </div>
                                <?php endif; ?>
                                <?php if ($gallery['gallery']): ?>
                                    <div class="gallery__list" uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 150">
                                        <?php foreach ($gallery['gallery'] as $key => $item): ?>
                                            <div class="gallery-item" uk-parallax="target: .gallery__list; y: 150; easing: <?php echo ($key+1)/2 ?>">
                                                <div class="gallery-item__inner uk-cover-container">
                                                    <img src="<?php echo $item['url'] ?>" alt="" uk-cover>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($services = get_field('services')): ?>
                            <div class="services">
                                <div class="services-headline">
                                    <div class="services-headline__title"><?php echo $services['title'] ?></div>
                                    <?php if (!empty($services['desc'])): ?>
                                        <div class="services-headline__desc"><?php echo nl2br($services['desc']) ?></div>
                                    <?php endif; ?>
                                </div>

                                <?php if (!empty($services['text'])): ?>
                                    <div class="services__text">
                                        <div>
                                            <?php echo $services['text'] ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($gallery['gallery'] && count($services['gallery'])): ?>
                                    <div class="services-gallery" uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 150">
                                        <?php foreach ($services['gallery'] as $key => $item): ?>
                                            <div class="services-gallery-item" uk-parallax="target: .services-gallery; y: 150; easing: <?php echo ($key+1)/2 ?>">
                                                <div class="services-gallery-item__inner uk-cover-container">
                                                    <img src="<?php echo $item['url'] ?>" alt="" uk-cover>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <ul class="uk-hidden" uk-switcher="connect: .js-switcher; animation: uk-animation-slide-left-medium">
                <?php foreach ($reviews as $item): ?><li></li><?php endforeach; ?>
            </ul>
            <div class="reviews">
                <div class="uk-container">
                    <div class="uk-grid" uk-grid>
                        <div class="reviews__info-column uk-width-2-3@m">
                            <ul class="js-switcher uk-switcher">
                                <?php foreach ($reviews as $item): ?>
                                    <li>
                                        <?php if ($video = get_field('video', $item->ID)): ?>
                                            <div class="reviews__video uk-cover-container">
                                                <iframe
                                                    src="https://www.youtube.com/embed/<?php echo $video ?>"
                                                    frameborder="0"
                                                    allow="autoplay; encrypted-media"
                                                    allowfullscreen
                                                    uk-cover
                                                ></iframe>
                                            </div>
                                        <?php else: ?>
                                            <div class="reviews-info">
                                                <div class="uk-grid" uk-grid>
                                                    <div class="uk-width-1-2@s reviews-info__column-first">
                                                        <div class="reviews-info__excerpt">
                                                            <?php echo nl2br($item->post_excerpt) ?>
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-1-2@s">
                                                        <?php if ($image = get_field('image', $item->ID)): ?>
                                                            <div class="reviews-info__image uk-cover-container">
                                                                <img src="<?php echo $image['url'] ?>" alt="" uk-cover>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if ($item->post_content): ?>
                                                            <div class="reviews-info__more">
                                                                <button uk-toggle="target: #review-<?php echo $item->ID ?>">
                                                                    читать отзыв полностью <span uk-icon="arrow-right"></span>
                                                                </button>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="reviews-detail" id="review-<?php echo $item->ID ?>" hidden>
                                                    <div class="uk-grid" uk-grid>
                                                        <div class="uk-width-1-2@s reviews-info__column-first">
                                                            <div class="reviews-info__excerpt">
                                                                <?php echo nl2br($item->post_excerpt) ?>
                                                            </div>
                                                        </div>
                                                        <div class="uk-width-1-2@s">
                                                            <?php if ($image = get_field('image', $item->ID)): ?>
                                                                <div class="reviews-info__image uk-cover-container">
                                                                    <img src="<?php echo $image['url'] ?>" alt="" uk-cover>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="reviews-info__content">
                                                        <?php echo $item->post_content ?>
                                                    </div>
                                                    <button
                                                        class="reviews-detail__close"
                                                        uk-toggle="target: #review-<?php echo $item->ID ?>"
                                                    >
                                                        <span uk-icon="icon: close; ratio: 1.6"></span>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="uk-width-1-3@m">
                            <div class="reviews__wrap">
                                <div class="reviews__title">Отзывы<br> наших клиентов</div>
                                <ul class="js-switcher uk-switcher">
                                    <?php foreach ($reviews as $item): ?>
                                        <li uk-scrollspy="target: > div; cls: uk-animation-slide-left-small; delay: 150">
                                            <div class="reviews__date"><?php echo $item->post_date ?></div>
                                            <div class="reviews__name"><?php echo $item->post_title ?></div>
                                            <div class="reviews__service"><?php echo get_field('service', $item->ID) ?></div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                                <div class="reviews-nav js-switcher">
                                    <button
                                        class="reviews-nav__button reviews-nav__button_previous"
                                        uk-switcher-item="previous"
                                    ><span uk-icon="icon: arrow-left; ratio: 1.8"></span></button>
                                    <button
                                        class="reviews-nav__button reviews-nav__button_next"
                                        uk-switcher-item="next"
                                    ><span uk-icon="icon: arrow-right; ratio: 1.8"></span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-add-review">
                <div class="uk-container">
                    <div class="add-review">
                        <button class="add-review__button" uk-toggle="target: #add-review">Добавьте свой отзыв</button>
                    </div>
                </div>
            </div>

            <div class="section-contacts">
                <div class="uk-container">
                    <div class="contacts">
                        <div class="contacts__title">Контакты</div>
                        <?php if ($contacts = get_field('contacts', 'option')): ?>
                            <?php foreach ($contacts as $item): ?>
                                <div class="contacts-group contacts-group_<?php echo $item['position'] ?>" style="background-image: url('<?php echo $item['image']['url'] ?>')">
                                    <div class="uk-flex-<?php echo $item['position'] ?>" uk-grid>
                                        <div class="uk-width-1-2@m">
                                            <div class="contacts-group__title" uk-scrollspy="cls: uk-animation-slide-left-medium; delay: 100">
                                                <?php echo $item['title'] ?>
                                            </div>
                                            <div class="contacts-group__text" uk-scrollspy="cls: uk-animation-slide-left-small; delay: 200">
                                                <?php echo $item['text'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="contacts-map">
                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A18540bb249eb7ccf27848771f97f1dc57472c2d4cfba3dfa8fbdb0f617c6025e&amp;width=100%25&amp;height=720&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
            </div>

            <div id="add-review" uk-modal>
                <div class="uk-modal-dialog">
                    <button class="uk-modal-close-default" type="button" uk-close></button>
                    <div class="uk-modal-header">
                        <div class="uk-modal-title">Отправить отзыв</div>
                    </div>
                    <div class="uk-modal-body">
                        <?php echo do_shortcode('[contact-form-7 id="174" title="Добавить отзыв"]') ?>
                    </div>
                </div>
            </div>

            <?php get_template_part( 'partials/footer' ) ?>
        </div>
    </body>
</html>