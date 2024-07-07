<?php
/*
Template Name: custom-home
*/
get_header();
?>


    <!-- banner sec start -->
   <section class="banner-sec">
    <div class="owl-carousel owl-theme banner-slider">
        <?php
        // Get the repeater field value
        $banner_images = get_field('banner_images', 'option');

        // Check if the repeater field has rows
        if ($banner_images) :
            // Loop through the rows of data
            foreach ($banner_images as $image) :
                ?>
                <div class="item">
                    <div class="banner-img">
                        <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo esc_attr($image['image']['alt']); ?>">
                    </div>
                </div>
            <?php
            endforeach;
        endif;
        ?>
    </div>
    <div class="login-signup-section">
            <!-- Signup Form -->
            <form id="signupForm">
              <div class="form-group">
                <label for="signupMobile" class="text-center">Mobile Number </label>
                <input type="text" class="form-control" id="signupMobile" placeholder="Enter your mobile number">
              </div>
                          <?php 
            $r_link = get_field('r_link');
            if( $r_link ): 
                $r_link_url = $r_link['url'];
                ?>
                <a href="<?php echo esc_url( $r_link_url ); ?>" style="padding:0px">
                    <input type="button" class="btn hero-btn btn-warning"  value="Register For Free">
                </a>
            <?php endif; ?>

  
              <div class="d-flex pt-3 mt-3">
                <div class="col-6">
                  <div class="img">
                    <img class="android-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/andro.png" alt="Android Icon">
                  </div>
                </div>
                <div class="col-6">
                  <div class="img">
                    <img class="ios-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/IOS-Icon.png" alt="iOS Icon">
                  </div>
                </div>
              </div>
              <?php 
$link = get_field('d_link');
if( $link ): 
    $link_url = $link['url'];
    ?>
              <a href="<?php echo esc_url( $link_url ); ?>" style="padding:0px"><input type="button" class="btn hero-btn btn-warning"  value="Download"></a>
              <?php endif; ?>
            </form>
  
  
          </div>
</section>



    <!-- banner sec end -->
    <!-- card-two start -->
    <section class="card-two-sec is-desktop">
    <div class="container">
        <div class="card-box-one">
            <div class="row">
                <?php if (have_rows('your_repeater_field_name')) : ?>
                    <?php while (have_rows('your_repeater_field_name')) : the_row(); ?>
                        <div class="col-md-6">
                            <div class="block2-sub card-one bddiv">
                                <div class="block2-img <?php the_sub_field('icon_class'); ?>"></div>
                                <div class="block2-cont">
                                    <p><?php the_sub_field('title'); ?></p>
                                    <ul>
                                        <?php if (have_rows('list_items')) : ?>
                                            <?php while (have_rows('list_items')) : the_row(); ?>
                                                <li><?php the_sub_field('item'); ?></li>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

    <!-- card two end -->
    <!-- card start -->
    <section class="main-sec-three">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="left-box">
                    <?php
                    $image = get_field('image_field_name');
                    if ($image) {
                        echo '<div class="images"><img src="' . $image['url'] . '" alt="' . $image['alt'] . '"></div>';
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-box">
                    <h3 class="main-header"><?php the_field('heading_field_name'); ?></h3>
                    <div class="para-box">
                        <p class="para-mute"><?php the_field('paragraph_field_name'); ?></p>
                    </div>
                    <?php 
					$link = get_field('link');
					if( $link ): 
					    $link_url = $link['url'];
					    $link_title = $link['title'];
					    ?>
                    <a class="download-btn" href="<?php echo  $link_url ; ?>">

                        <?php echo $link_title ; ?>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- card end -->
    <!-- feature sec start -->
    <section class="shopping-sec is-desktop">
    <div class="container">
        <div class="shopping-box">
            <?php
            if (have_rows('shopping_section_items')) :
                while (have_rows('shopping_section_items')) : the_row();
            ?>
                    <div class="shipping-details-item">
                        <div class="<?php the_sub_field('service_image'); ?>"></div>
                        <div class="shipping-content">
                            <p class="para-mute"><?php the_sub_field('service_content'); ?></p>
                        </div>
                    </div>
            <?php
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>

    <!-- feature sec end -->
    <!-- download sec start -->
    <section class="main-sec-three download">
    <div class="container">
        <?php
        // Get the ACF fields
        $app_image = get_field('app_image');
        $play_icon = get_field('play_icon');
        $play_icon1 = get_field('play_icon1');

        $qr_code = get_field('qr_code');
        ?>
        <h3 class="main-header"><?php the_field('app_section_title'); ?></h3>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="left-box">
                    <div class="images">
                        <img src="<?php echo esc_url($app_image['url']); ?>" alt="<?php echo esc_attr($app_image['alt']); ?>">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-box">
                    <div class="right_winning_info">
                        <ul class="win_point">
                            <?php if (have_rows('winning_info')) :
                                while (have_rows('winning_info')) : the_row();
                                    $icon = get_sub_field('icon');
                                    $info_box = get_sub_field('info_box');
                            ?>
                                    <li>
                                        <span class="win_info_icon">
                                            <img src="<?php echo esc_url($icon['url']); ?>" width="40" height="40" loading="lazy" alt="<?php echo esc_attr($icon['alt']); ?>">
                                        </span>
                                        <span class="win_info_info_box"><?php echo $info_box; ?></span>
                                    </li>
                            <?php endwhile;
                            endif; ?>
                        </ul>
                        <ul class="d11_app_store_box">
                            <li>
                                <a id="android_button">
                                    <img src="<?php echo esc_url($play_icon['url']); ?>" width="156" height="50" loading="lazy" alt="<?php echo esc_attr($play_icon['alt']); ?>">
                                </a>
                            </li>
                            <li>
                                <a id="ios_button" href="#">
                                    <img src="<?php echo esc_url($play_icon1['url']); ?>" width="156" height="50" loading="lazy" alt="<?php echo esc_attr($play_icon1['alt']); ?>">
                                </a>
                            </li>
                        </ul>
                        <div class="download_barcode_box">
                            <div class="barcode_img playstore">
                                <img src="<?php echo esc_url($qr_code['url']); ?>" width="120" height="120" loading="lazy" alt="<?php echo esc_attr($qr_code['alt']); ?>">
                            </div>
                            <div class="barcode_info">
                                <div class="barcode_info_inner"><?php the_field('qr_code_text'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- download sec end -->

    <!-- FAQ Sec start -->
    <section class="faq-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="main-header">FAQs</h3>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <?php if (have_rows('faqs')) : ?>
                        <?php while (have_rows('faqs')) : the_row(); ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading-<?php echo get_row_index(); ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse-<?php echo get_row_index(); ?>" aria-expanded="false"
                                        aria-controls="flush-collapse-<?php echo get_row_index(); ?>">
                                        <?php the_sub_field('question'); ?>
                                    </button>
                                </h2>
                                <div id="flush-collapse-<?php echo get_row_index(); ?>" class="accordion-collapse collapse"
                                    aria-labelledby="flush-heading-<?php echo get_row_index(); ?>" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <?php the_sub_field('answer'); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- FAQ sec end -->
    <!-- review section  -->

    <!-- review section end  -->
   





<?php 
get_footer();

?>