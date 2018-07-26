<?php
/*
Template Name: Контакты
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

            <div class="page-internal">
                <div class="uk-container">
                    <?php // bcn_display() ?>
                    <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <div class="page-content">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; else: ?>
                        <div class="page-content">
                            <p>Извините, ничего не найдено.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="section-contacts">
                <div class="uk-container">
                    <div class="contacts">
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

            <?php get_template_part( 'partials/footer' ) ?>
        </div>
    </body>
</html>