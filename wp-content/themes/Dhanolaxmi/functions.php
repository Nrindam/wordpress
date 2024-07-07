<?php 

function dhanolaxmi_setup(){

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
add_action( 'after_setup_theme', 'dhanolaxmi_setup' );

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


function my_cool_menu_function(){
  register_nav_menus( array(
    'primary' => 'Primary Navigation',
    'footer-menu-1' => __( 'Footer Menu 1', 'theme' ),
            'footer-menu-2' => __( 'Footer Menu 2', 'theme' ),
            'footer-menu-3' => __( 'Footer Menu 3', 'theme' ),
    //'header' => 'Header Menu',
  ));
}


add_action( 'after_setup_theme', 'my_cool_menu_function' );




function enqueue_custom_styles() {
    // Enqueue Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap' );

    // Enqueue Font Awesome
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );

    // Enqueue Bootstrap CSS
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '5.3.0' );

    // Enqueue Owl Carousel CSS
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.3.4' );
    wp_enqueue_style( 'owl-carousel-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '2.3.4' );

    // Enqueue your custom stylesheets
    //wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/style.css' );
    //wp_enqueue_style( 'custom-style-two', get_template_directory_uri() . '/assets/css/style-two.css' );
    wp_enqueue_style('custom-style-two', get_template_directory_uri() . '/assets/css/style-two.css', array(), null);
}

add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );

function enqueue_custom_scripts() {
    // Enqueue Bootstrap JS
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . 'assets/js/bootstrap.bundle.min.js', array('jquery'), '5.3.0', true );

    // Enqueue jQuery (included in WordPress by default)
    wp_enqueue_script( 'jquery' );

    // Enqueue Owl Carousel JS
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . 'assets/js/owl.carousel.min.js', array('jquery'), '2.3.4', true );

    // Enqueue your custom scripts
    // wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );
    wp_enqueue_script( 'custom-script-two', get_template_directory_uri() . 'assets/js/custom-two.js', array('jquery'), '1.0', true );
}

add_action( 'wp_enqueue_scripts', 'enqueue_custom_scripts' );

