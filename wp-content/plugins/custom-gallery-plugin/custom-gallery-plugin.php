<?php
/*
Plugin Name: Gallery
Description: A custom gallery plugin with activation and deactivation functionality.
Version: 1.0
Author: Your Name
*/

if (!defined('ABSPATH')) {
    exit;
}


function gallery_custom_post_type() {
    $labels = array(
        'name'               => 'Galleries',
        'singular_name'      => 'Gallery',
        'menu_name'          => 'Galleries',
        'name_admin_bar'     => 'Gallery',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Gallery',
        'new_item'           => 'New Gallery',
        'edit_item'          => 'Edit Gallery',
        'view_item'          => 'View Gallery',
        'all_items'          => 'All Galleries',
        'search_items'       => 'Search Galleries',
        'parent_item_colon'  => 'Parent Galleries:',
        'not_found'          => 'No galleries found.',
        'not_found_in_trash' => 'No galleries found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'gallery'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail'),
    );

    register_post_type('gallery', $args);
}

add_action('init', 'gallery_custom_post_type');

// Enqueue scripts and styles
function gallery_enqueue_scripts() {
    wp_enqueue_style('gallery-style', plugins_url('gallery.css', __FILE__));
    wp_enqueue_script('gallery-script', plugins_url('gallery.js', __FILE__), array('jquery'), '1.0', true);

    // Localize the script with new data
    $translation_array = array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('gallery_action_nonce'),
    );
    wp_localize_script('gallery-script', 'gallery_ajax', $translation_array);
}

add_action('wp_enqueue_scripts', 'gallery_enqueue_scripts');

// Add activation and deactivation buttons to gallery edit screen
function gallery_custom_column($columns) {
    $columns['gallery_status'] = 'Status';
    return $columns;
}

add_filter('manage_gallery_posts_columns', 'gallery_custom_column');

function gallery_custom_column_content($column, $post_id) {
    if ($column == 'gallery_status') {
        $active = get_post_meta($post_id, '_gallery_active', true);
        if ($active) {
            echo '<span style="color:green;">Active</span>';
        } else {
            echo '<span style="color:red;">Inactive</span>';
        }
    }
}

add_action('manage_gallery_posts_custom_column', 'gallery_custom_column_content', 10, 2);

function gallery_activation_button() {
    global $post;
    if ($post->post_type == 'gallery') {
        $active = get_post_meta($post->ID, '_gallery_active', true);
        $button_text = $active ? 'Deactivate Gallery' : 'Activate Gallery';
        $button_action = $active ? 'deactivate' : 'activate';
        ?>
        <div class="misc-pub-section misc-pub-gallery-status">
            <span id="gallery-status"><?php echo $active ? '<span style="color:green;">Active</span>' : '<span style="color:red;">Inactive</span>'; ?></span>
            |
            <a href="#" id="gallery-<?php echo $button_action; ?>-button" class="gallery-action-button" data-post-id="<?php echo $post->ID; ?>"><?php echo $button_text; ?></a>
        </div>
        <?php
    }
}

add_action('post_submitbox_misc_actions', 'gallery_activation_button');

// Handle activation and deactivation actions
function activate_gallery() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'gallery_action_nonce')) {
        die('Permission denied.');
    }

    $post_id = $_POST['post_id'];
    update_post_meta($post_id, '_gallery_active', true);
    echo '<span style="color:green;">Active</span>';
    die();
}

function deactivate_gallery() {
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'gallery_action_nonce')) {
        die('Permission denied.');
    }

    $post_id = $_POST['post_id'];
    delete_post_meta($post_id, '_gallery_active');
    echo '<span style="color:red;">Inactive</span>';
    die();
}

add_action('wp_ajax_activate_gallery', 'activate_gallery');
add_action('wp_ajax_deactivate_gallery', 'deactivate_gallery');

// Shortcode for displaying gallery
function display_gallery_shortcode($atts) {
    $atts = shortcode_atts(array(
        'id'     => '',
        'number' => 6, // Default number of images to display
    ), $atts, 'gallery');

    $post_id = $atts['id'];
    $number = $atts['number'];

    if (empty($post_id)) {
        return 'Gallery ID not provided.';
    }

    $images = get_field('gallery_images', $post_id);

    if (!$images) {
        return 'No images found.';
    }

    $output = '<div class="gallery_section layout_padding">';
    $output .= '<div class="container">';
    $output .= '<div class="row">';
    $output .= '<div class="col-sm-12">';
    $output .= '<h1 class="gallery_taital">Our Gallery</h1>';
    $output .= '<p class="gallery_text">Lorem Ipsum is simply dummy text of printing typesetting ststry lorem Ipsum the industry\'ndard dummy text ever since of the 1500s, when an unknown printer took a galley of type and scra make a type specimen book. It has</p>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '<div class="row gallery_section_2">';

    // Loop through images and generate HTML for each
    $count = 0;
    foreach ($images as $index => $image) {
        $count++;
        $output .= '<div class="col-md-4 gallery-image' . ($count > $number ? ' hidden-image' : '') . '">';
        $output .= '<div class="container_main">';
        $output .= '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" class="image">';
        $output .= '<div class="overlay">';
        $output .= '<div class="text"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>';
        $output .= '</div>';
        $output .= '</div>';
        $output .= '</div>';
    }

    $output .= '</div>'; // Close gallery_section_2 div
    $output .= '</div>'; // Close container div

    // Add "See More" button
    if (count($images) > $number) {
        $output .= '<div class="seemore_bt"><a href="#">See More</a></div>';
    }

    $output .= '</div>'; // Close gallery_section div

    return $output;
}

add_shortcode('gallery', 'display_gallery_shortcode');


