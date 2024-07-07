
<?php
/*
Template Name: Home
*/
get_header();
?>


<div class="banner_section layout_padding">
   <div class="container">
      <div id="main_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <?php if( have_rows('banner_slides') ): ?>
               <?php $slide_index = 0; ?>
               <?php while( have_rows('banner_slides') ): the_row(); ?>
                  <div class="carousel-item <?php if($slide_index == 0) echo 'active'; ?>">
                     <div class="row">
                        <div class="col-sm-12">
                           <div class="banner_taital">
                              <h1 class="outstanding_text"><?php the_sub_field('headline_1'); ?></h1>
                              <h1 class="coffee_text"><?php the_sub_field('headline_2'); ?></h1>
                              <p class="there_text"><?php the_sub_field('description'); ?></p>
                              <div class="learnmore_bt"><a href="<?php the_sub_field('button_link'); ?>"><?php the_sub_field('button_text'); ?></a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php $slide_index++; ?>
               <?php endwhile; ?>
            <?php endif; ?>
         </div>
         <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
         </a>
         <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
         </a>
      </div>
   </div>
</div>

      <!-- banner section end -->
      <!-- about section start -->
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
            <div class="about_img">
               <?php 
                  $image = get_field('about_image'); 
                  if( !empty( $image ) ): ?>
                     <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
               <?php endif; ?>
            </div>
         </div>
      </div>
   </div>
</div>

      <!-- about section end -->
      <!-- gallery section start -->
      <div class="gallery_section layout_padding">
         <div class="container">
            <div class="row">
               <!-- <div class="col-sm-12">
                  <h1 class="gallery_taital">Our Gallery</h1>
                  <p class="gallery_text">Lorem Ipsum is simply dummy text of printing typesetting ststry lorem Ipsum the industry'ndard dummy text ever since of the 1500s, when an unknown printer took a galley of type and scra make a type specimen book. It has</p>
               </div> -->
            </div>
            <div class="">
               <?php echo do_shortcode('[gallery id="272" number="6"]'); ?>
            </div>
            <!-- <div class="seemore_bt"><a href="#">See More</a></div> -->
         </div>
      </div>
      <!-- gallery section end -->
      <!-- services section start -->
      <div class="services_section layout_padding">
         <div class="container">
            <div class="row">
               <!-- <div class="col-sm-12">
                  <h1 class="services_taital">Services</h1>
                  <p class="services_text">Typesetting industry lorem Ipsum is simply dummy text of the </p>
               </div> -->
            </div>
            <div class="services_section_2">
               <div class="row">
                  <?php echo do_shortcode('[custom_services]');?>
               </div>
            </div>
         </div>
      </div>
      <!-- services section end -->
      <!-- testimonial section start -->
      <?php
// Check if the repeater field has rows of data
if (have_rows('testimonials')) :
?>
<div class="client_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="client_taital">Testimonial</h1>
                <p class="client_text">Eeven slightly believable. If you are going to use a passage of Lorem Ipsum, you need to</p>
            </div>
        </div>
    </div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $i = 0;
            // Loop through rows and create carousel indicators
            while (have_rows('testimonials')) : the_row();
            ?>
                <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo $i === 0 ? 'active' : ''; ?>"></li>
            <?php
                $i++;
            endwhile;
            ?>
        </ol>
        <div class="carousel-inner">
            <?php
            $i = 0;
            // Loop through rows and create carousel items
            while (have_rows('testimonials')) : the_row();
                // Variables for the sub-fields
                $client_name = get_sub_field('client_name');
                $client_icon = get_sub_field('client_icon');
                $testimonial_text = get_sub_field('testimonial_text');
            ?>
                <div class="carousel-item <?php echo $i === 0 ? 'active' : ''; ?>">
                    <div class="client_section_2">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="testimonial_section_2">
                                        <h4 class="client_name_text"><?php echo esc_html($client_name); ?> <span class="quick_icon"><img src="<?php echo esc_url($client_icon['url']); ?>" alt="<?php echo esc_attr($client_name); ?>"></span></h4>
                                        <p class="customer_text"><?php echo esc_html($testimonial_text); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $i++;
            endwhile;
            ?>
        </div>
    </div>
</div>
<?php
endif;
?>

      <!-- testimonial section end -->
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <h1 class="contact_text">Contact Us</h1>
         </div>
      </div>
      <div class="contact_section_2 layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6 padding_0">
                  <div class="mail_section">
                     <?php echo do_shortcode('[contact-form-7 id="21bce05" title="Contact form 1"]'); ?>
                  </div>
               </div>
               <div class="col-md-6 padding_0">
                  <div class="map-responsive">
                     <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="508" frameborder="0" style="border:0; width: 100%;" allowfullscreen></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact section end -->

      <?php
      get_footer();

      ?>


