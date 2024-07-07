<?php
/*
Template Name: about
*/
get_header();
?>




<div class="about_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="about_taital_main">
                     <div class="about_taital"><?php the_field('section_title'); ?></div>
                     <p class="about_text"><?php the_field('description_1'); ?></p>
                     <p class="about_text"><?php the_field('description_2'); ?></p>
                     <div class="read_bt"><a href="<?php the_field('button_link'); ?>"><?php the_field('button_text'); ?></a></div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="about_img"><?php 
                  $image = get_field('about_image'); 
                  if( !empty( $image ) ): ?>
                     <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
               <?php endif; ?></div>
               </div>
            </div>
         </div>
      </div>



<?php
get_footer();

?>