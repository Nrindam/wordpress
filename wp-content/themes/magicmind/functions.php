<?php

function grandcoffee_setup(){

/**
* Add post-formats support.
*/
add_theme_support(
'post-formats',
  array(
	'link',
    'aside',
    'gallery',
    'image',
    'quote',
    'status',
    'video',
    'audio',
    'chat',
  )
);
add_theme_support(
'html5',
array(
'comment-form',
'comment-list',
'gallery',
'caption',
'style',
'script',
'navigation-widgets',
 )
);
add_theme_support( 'post-thumbnails' );
//set_post_thumbnail_size( 1568, 9999 );

add_theme_support( 'menus' );    


add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'grandcoffee_setup' );

function theme_register_menus() {
    register_nav_menus(
        array(
            'primary-menu' => 'Primary Menu',
            'footer-menu' => 'Footer Menu', // Added footer menu registration
        )
    );
}
add_action( 'init', 'theme_register_menus' );






if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();

    acf_add_options_page(array(
        'page_title' => 'Admin Logo Settings',
        'menu_title' => 'Admin Logo',
        'menu_slug' => 'admin-logo-settings',
        'capability' => 'manage_options',
        'redirect' => false
    ));
}


function custom_menu_item_classes($classes, $item, $args, $depth) {
    // Add your custom class here
    $classes[] = 'nav-item';

    // Return the modified classes array
    return $classes;
}
add_filter('nav_menu_css_class' , 'custom_menu_item_classes' , 10, 4);

function enqueue_gallery_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('gallery-load-more', get_template_directory_uri() . 'assets/js/gallery-load-more.js', array('jquery'), null, true );

    wp_localize_script('gallery-load-more', 'gallery_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('gallery-load-more-nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_gallery_scripts');

function add_search_icon_to_menu_item($items, $args) {
    if ($args->theme_location == 'primary-menu') {
        $search_icon = '<i class="fa fa-search" aria-hidden="true"></i>';
        $search_item = '<li class="nav-item"><a class="nav-link" href="#">' . $search_icon . '</a></li>';
        $items .= $search_item;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_search_icon_to_menu_item', 10, 2);

function enqueue_custom_styles() {
    // Bootstrap CSS
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');

    // Custom Style CSS
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/assets/css/custom_style.css');

    // Responsive CSS
    wp_enqueue_style('responsive', get_template_directory_uri() . '/assets/css/responsive.css');

    // Font Awesome (CDN)
    wp_enqueue_style('font-awesome', 'https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css');

    // Owl Carousel CSS
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
    wp_enqueue_style('owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css');

    // Fancybox CSS
    wp_enqueue_style('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css', array(), null, 'screen');

    // Scrollbar Custom CSS
    wp_enqueue_style('custom-scrollbar', get_template_directory_uri() . '/assets/css/jquery.mCustomScrollbar.min.css');
    
    // Favicon
    wp_enqueue_style('favicon', get_template_directory_uri() . '/assets/images/fevicon.png', array(), null, 'screen');
}
add_action('wp_enqueue_scripts', 'enqueue_custom_styles');

function enqueue_custom_scripts() {
    // jQuery
    wp_enqueue_script('jquery');

    // Popper.js
    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), null, true);

    // Bootstrap Bundle (includes both Bootstrap JS and Popper.js)
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery', 'popper'), null, true);

    // jQuery 3.0.0 (assuming you need this specific version)
    wp_enqueue_script('jquery-3.0.0', get_template_directory_uri() . '/assets/js/jquery-3.0.0.min.js', array('jquery'), null, true);

    // Plugin.js
    wp_enqueue_script('plugin', get_template_directory_uri() . '/assets/js/plugin.js', array('jquery'), null, true);

    // Sidebar Custom Scrollbar
    wp_enqueue_script('custom-scrollbar', get_template_directory_uri() . '/assets/js/jquery.mCustomScrollbar.concat.min.js', array('jquery'), null, true);

    // Custom.js
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

