<!-- footer section start -->
<div class="footer_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-sm-6">
                  <h3 class="useful_text">About</h3>
                  <p class="footer_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation u</p>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <h3 class="useful_text">Menu</h3>
                  <div class="footer_menu">
                  <ul>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'footer-menu',
        'container' => false,
        'items_wrap' => '%3$s', // Removes <ul> wrapper around <li>
        'fallback_cb' => false
    ));
    ?>
</ul>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <h1 class="useful_text">Useful Link</h1>
                  <p class="dummy_text">Adipiscing Elit, sed do Eiusmod Tempor incididunt </p>
               </div>
               <div class="col-lg-3 col-sm-6">
                  <h1 class="useful_text">Contact Us</h1>
                  <div class="location_text">
   <ul>
      <li>
         <a href="<?php the_field('address_link', 'option'); ?>">
            <i class="fa fa-map-marker" aria-hidden="true"></i>
            <span class="padding_left_10">
               <?php the_field('address_label', 'option'); ?> : <?php the_field('address', 'option'); ?>
            </span>
         </a>
      </li>
      <li>
         <a href="<?php the_field('phone_link', 'option'); ?>">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <span class="padding_left_10">
               <?php the_field('phone_label', 'option'); ?> : <?php the_field('phone', 'option'); ?>
            </span>
         </a>
      </li>
      <li>
         <a href="<?php the_field('email_link', 'option'); ?>">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <span class="padding_left_10">
               <?php the_field('email_label', 'option'); ?> : <?php the_field('email', 'option'); ?>
            </span>
         </a>
      </li>
   </ul>
</div>

               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
    <div class="container">
        <?php
        $copyright_text = get_field('copyright_text', 'option');
        if (empty($copyright_text)) {
            $copyright_text = 'All Rights Reserved.';
        }
        $current_year = date('Y');
        ?>
        <p class="copyright_text">
            <?php echo $current_year; ?> All Rights Reserved. Design by 
            <?php
            if (get_field('copyright_link', 'option')) {
                echo '<a href="' . get_field('copyright_link', 'option') . '">Free html Templates</a>';
            } else {
                echo 'Free html Templates';
            }
            ?>
        </p>
    </div>
</div>

      <!-- copyright section end -->
      
 <?php wp_footer(); ?>  
   </body>
</html>