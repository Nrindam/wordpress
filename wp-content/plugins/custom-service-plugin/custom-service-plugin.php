<?php
/*
Plugin Name: Custom Service Plugin
Description: Plugin to display custom services.
Version: 1.0
Author: Your Name
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Register Custom Post Type
function custom_service_post_type() {
    $labels = array(
        'name'                  => 'Services',
        'singular_name'         => 'Service',
        'menu_name'             => 'Services',
        'name_admin_bar'        => 'Service',
        'archives'              => 'Service Archives',
        'attributes'            => 'Service Attributes',
        'parent_item_colon'     => 'Parent Service:',
        'all_items'             => 'All Services',
        'add_new_item'          => 'Add New Service',
        'add_new'               => 'Add New',
        'new_item'              => 'New Service',
        'edit_item'             => 'Edit Service',
        'update_item'           => 'Update Service',
        'view_item'             => 'View Service',
        'view_items'            => 'View Services',
        'search_items'          => 'Search Service',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into service',
        'uploaded_to_this_item' => 'Uploaded to this service',
        'items_list'            => 'Services list',
        'items_list_navigation' => 'Services list navigation',
        'filter_items_list'     => 'Filter services list',
    );
    $args = array(
        'label'                 => 'Service',
        'description'           => 'Custom services provided',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-clipboard',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'service', $args );
}
add_action( 'init', 'custom_service_post_type', 0 );

// Register Meta Boxes for Service Details
function custom_service_meta_boxes() {
    add_meta_box(
        'service_details',
        'Service Details',
        'render_service_details_meta_box',
        'service',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'custom_service_meta_boxes' );

function render_service_details_meta_box( $post ) {
    // Use ACF functions to get the field values
    $service_icon = get_field('service_icon', $post->ID);
    $read_more_url = get_field('read_more_url', $post->ID);
    ?>
    <label for="service_icon">Service Icon:</label><br>
    <input type="text" id="service_icon" name="service_icon" value="<?php echo esc_attr($service_icon); ?>"><br>
    <label for="read_more_url">Read More URL:</label><br>
    <input type="text" id="read_more_url" name="read_more_url" value="<?php echo esc_attr($read_more_url); ?>"><br>
    <?php
}

// Save Meta Box Data
function save_service_meta_box_data( $post_id ) {
    // Check if our nonce is set.
    if ( ! isset( $_POST['service_meta_box_nonce'] ) ) {
        return;
    }
    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['service_meta_box_nonce'], 'save_service_meta_box_data' ) ) {
        return;
    }
    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Check the user's permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Sanitize and save the fields
    if ( isset( $_POST['service_icon'] ) ) {
        update_field('service_icon', sanitize_text_field( $_POST['service_icon'] ), $post_id);
    }
    if ( isset( $_POST['read_more_url'] ) ) {
        update_field('read_more_url', esc_url_raw( $_POST['read_more_url'] ), $post_id);
    }
}
add_action( 'save_post', 'save_service_meta_box_data' );

function display_services_shortcode() {
    ob_start();

    $args = array(
        'post_type' => 'service',
        'posts_per_page' => -1,
        'post_status' => 'publish',
    );
    $services = new WP_Query( $args );

    if ( $services->have_posts() ) {
        ?>
        <div class="services_section layout_padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="services_taital">Services</h1>
                        <p class="services_text">Typesetting industry lorem Ipsum is simply dummy text of the </p>
                    </div>
                </div>
                <div class="services_section_2">
                    <div class="row">
                        <?php while ( $services->have_posts() ) : $services->the_post(); ?>
                            <div class="col-lg-4 col-sm-12 col-md-4">
                                <div class="box_main">
                                    <div class="house_icon">
                                        <?php 
                                        $service_icon = get_field('service_icon'); 
                                        echo '<!-- Debug service_icon: ' . print_r($service_icon, true) . ' -->'; // Debug output
                                        if( $service_icon && is_array($service_icon) ):
                                            $service_icon_url = $service_icon['url'];
                                        ?>
                                            <img src="<?php echo esc_url( $service_icon_url ); ?>" class="image_1">
                                            <img src="<?php echo esc_url( $service_icon_url ); ?>" class="image_2">
                                        <?php else: ?>
                                            <p>No service icon found</p>
                                        <?php endif; ?>
                                    </div>
                                    <h3 class="decorate_text"><?php the_title(); ?></h3>
                                    <p class="tation_text"><?php the_excerpt(); ?></p>
                                    <?php 
                                    $read_more_url = get_field('read_more_url'); 
                                    ?>
                                    <div class="readmore_bt"><a href="<?php echo esc_url( $read_more_url ); ?>">Read More</a></div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode( 'custom_services', 'display_services_shortcode' );



// Activation and Deactivation Hooks
function activate_custom_service_plugin() {
    // Register custom post type and flush rewrite rules
    custom_service_post_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'activate_custom_service_plugin' );

function deactivate_custom_service_plugin() {
    // Unregister custom post type and flush rewrite rules
    unregister_post_type( 'service' );
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'deactivate_custom_service_plugin' );
