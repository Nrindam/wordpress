<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo( 'name' ); ?></title>

    <!-- font family  -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
     <!-- Font awesome -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <!-- Bootstrap CSS -->
 <link href="<?php echo get_template_directory_uri(); ?>/assets/css/all.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.theme.default.min.css" rel="stylesheet" /> 
     <link href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" rel="stylesheet" /> 
    <link href="<?php echo get_template_directory_uri(); ?>/assets/css/style-two.css" rel="stylesheet" /> 
<?php wp_head(); ?>
</head>

<body>

    <!-- home top bar -->
    <div class="top-header">
    <div class="offer-box">
        <marquee>
            <div class="item">
                <a class="para-mute" href="#">
                    <?php echo get_field('offer_text', 'option'); ?>
                </a>
            </div>
        </marquee>
    </div>
</div>


    <header class="nav-header">
    <div class="container">
        <div class="logo">
            <?php $logo_image = get_field('logo_image', 'option'); ?>
            <?php if ($logo_image) : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-img">
                    <img src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php bloginfo('name'); ?>">
                </a>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-img">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo001.png" alt="<?php bloginfo('name'); ?>">
                </a>
            <?php endif; ?>
        </div>
        <div class="c-user">
            <div class="prize-won">
                <i class="header-prize-icon"></i>
                <span><?php echo get_field('trusted_by_text', 'option'); ?></span>
                <span><?php echo get_field('crore_plus', 'option'); ?></span>
            </div>
        </div>
        <!-- hambar -->
        <div id="mainListDiv" class="main_list home-nav">
         
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'ul',
                'menu_class' => 'navlinks',
                'fallback_cb' => false,
                'link_before' => '<span class="nav-link para-mute">',
                'link_after' => '</span>',
            ));
            ?>
   
        </div>
        <span class="navTrigger">
            <i></i>
            <i></i>
            <i></i>
        </span>
    </div>
</header>

    <!-- header section end -->