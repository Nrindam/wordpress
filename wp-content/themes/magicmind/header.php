<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Grand Coffee</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <?php wp_head(); ?>
   </head>
   <body>
      <!--header section start -->
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <div class="logo">
    <a href="<?php echo esc_url(home_url('/')); ?>">
        <?php $logo = get_field('logo', 'option'); // 'logo' is the ACF field name ?>
        <?php if ($logo) : ?>
            <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
        <?php endif; ?>
    </a>
</div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
               <?php
wp_nav_menu(array(
    'theme_location' => 'primary-menu',
    'menu_class' => 'navbar-nav ml-auto',
    'container' => false,
    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
));
?>

               </div>
            </nav>
         </div>
      </div>