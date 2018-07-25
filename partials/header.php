<div class="header">
    <div class="uk-container uk-container-large">
        <div class="header__wrap">
            <!-- <div class="header__left"> -->
                <div class="header__logo">
                    <a href="/">
                        <img src="<?php bloginfo('template_url') ?>/dist/img/logo.png" alt="">
                    </a>
                </div>
                <div class="header__menu">
                    <?php wp_nav_menu([
                        'theme_location' => 'headermenu',
                        'container' => false,
                        'menu_class' => 'header-menu'
                    ]); ?>
                </div>
            <!-- </div> -->
            <div class="header__contacts">
                <div class="header__address">
                    <?php the_field('address', 'option') ?>
                </div>
                <div class="header-phone">
                    <div class="header-phone__number">
                        <?php the_field('phone', 'option') ?>
                    </div>
                    <div class="header-phone__working-time">
                        <?php the_field('working_time', 'option') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>