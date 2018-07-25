<?php
add_action('after_setup_theme', function() {
	register_nav_menus( array(
		'headermenu' => 'Header Menu',
		'footermenu' => 'Footer Menu',
		'bannermenu' => 'Banner Menu',
	) );
});

add_theme_support( 'post-thumbnails', array( 'post' ) );
add_theme_support( 'post-thumbnails', array( 'page' ) );

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Параметры',
		'menu_title'	=> 'Параметры',
		'menu_slug' 	=> 'acf-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
	return '<nav class="pagination %1$s" role="navigation">%3$s</nav>';
}

add_action('init', function() {
    register_post_type('reviews', array(
        'labels' => array(
            'name' => __('Отзывы', 'html5blank'),
            'all_items' => __('Все отзывы', 'html5blank'),
            'singular_name' => __('Отзыв', 'html5blank'),
            'add_new' => __('Добавить', 'html5blank'),
            'add_new_item' => __('Добавить отзыв', 'html5blank'),
            'edit' => __('Редактировать', 'html5blank'),
            'edit_item' => __('Редактировать отзыв', 'html5blank'),
            'new_item' => __('Новый отзыв', 'html5blank'),
            'view' => __('Смотреть', 'html5blank'),
            'view_item' => __('Смотреть отзыв', 'html5blank'),
            'search_items' => __('Искать отзывы', 'html5blank'),
            'not_found' => __('Отзывы не найдены', 'html5blank'),
            'not_found_in_trash' => __('Нет отзывов в корзине', 'html5blank')
        ),
		'show_in_rest' => false,
        'public' => true,
        'hierarchical' => false,
        'has_archive' => false,
		'menu_position' => 6,
		'menu_icon' => 'dashicons-testimonial',
        'supports' => array(
            'title',
            'editor',
            'excerpt'
        ),
        'can_export' => true,
        'taxonomies' => array()
    ));
});