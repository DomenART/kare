<div class="footer">
    <div class="uk-container uk-container-large">
        <div class="footer__first">
            <?php wp_nav_menu([
                'container' => false,
                'theme_location' => 'footermenu',
                'menu_class' => 'footer__menu',
            ]); ?>
            <div class="footer__contacts">
                <div class="footer__address uk-visible@l">
                    <?php the_field('address', 'option') ?>
                </div>
                <div class="footer__socials">
                    <a href="#"><span uk-icon="instagram"></span></a>
                </div>
                <div class="footer__phone">
                    <?php the_field('phone', 'option') ?>
                </div>
            </div>
        </div>
        <div class="footer-second">
            <div class="footer-second__left">
                <div class="footer__copyright">
                    <div class="uk-margin-small-bottom uk-hidden@l">
                        <?php the_field('address', 'option') ?>
                    </div>
                    <?php the_field('copyright', 'option') ?>
                </div>
                <div class="footer__requisite">
                    <?php the_field('requisite', 'option') ?>
                </div>
                <div class="footer__links">
                    <a href="<?php echo get_permalink(164) ?>">Пользовательское соглашение</a><br>
                    <a href="<?php echo get_permalink(166) ?>">Политика обработки персональных данных</a>
                </div>
            </div>
            <div class="footer-second__right">
                <div class="footer__sitemap">
                    <a href="<?php echo get_permalink(168) ?>">Карта сайта</a>
                </div>
                <div class="footer__counters">
                    <?php the_field('counters', 'option') ?>
                </div>
                <div class="footer__creator">
                    <a href="http://domenart-studio.ru/" target="_blank">
                        <img src="<?php echo get_bloginfo('template_url') ?>/dist/img/creator.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <button class="scrollup js-scrollup" uk-scroll>
    <span uk-icon="chevron-up"></span>
</button> -->

<!--<div id="feedback" uk-modal>-->
<!--    <div class="uk-modal-dialog uk-modal-body modal-dialog--small">-->
<!--        <button class="uk-modal-close-default" type="button" uk-close></button>-->
<!--        <div class="uk-modal-header">-->
<!--          <div class="modal-title">Есть вопросы?<br>Напишите нам.</div>-->
<!--        </div>-->
<!--        --><?php //echo do_shortcode('[contact-form-7 id="96" title="Контактная форма"]'); ?>
   <!-- </div>
</div> -->

<script type="text/javascript" src="<?php echo get_bloginfo('template_url') ?>/dist/main.js"></script>
<?php wp_footer() ?>