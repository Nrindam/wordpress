 <!-- footer start -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
    <figure>
        <?php $logo = get_field('footer_logo', 'option'); ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-img"><img src="<?php echo esc_url($logo['url']); ?>" class="img-fluid" alt="<?php echo esc_attr($logo['alt']); ?>"></a>
    </figure>
    <p class="para-mute">
        <?php the_field('address', 'option'); ?>
    </p>
   
    <ul class="social-media">
        <?php
        if (have_rows('footer_social_media', 'option')) :
          while (have_rows('footer_social_media', 'option')) : the_row();
            $icon = get_sub_field('font_awesome');
            $medialink = get_sub_field('social_media_link');
      ?>
      <li><a href="<?php echo $medialink['url']?>" target="_blank"><i class="fa-brands <?php echo $icon;?>"></i> <?php //echo $medialink['title']?></a></li>
    <?php endwhile;endif; ?>
    </ul>
</div>

                <div class="col-lg-2 col-md-6">
    <h3 class="para-mute"><?php echo esc_html__( 'QUICK LINKS', 'theme' ); ?></h3>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'footer-menu-1',
            'container' => 'ul',
            'menu_class'     => 'footer-menu',
            'link_before' => '<span class="nav-link para-mute">',
            'link_after' => '</span>',
        )
    );
    ?>
</div>

<div class="col-lg-2 col-md-6">
    <h3 class="para-mute"><?php echo esc_html__( 'QUICK LINKS', 'theme' ); ?></h3>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'footer-menu-2',
            'container' => 'ul',
            'menu_class'     => 'footer-menu',
            'link_before' => '<span class="nav-link para-mute">',
            'link_after' => '</span>',
        )
    );
    ?>
</div>

<div class="col-lg-2 col-md-6">
    <h3 class="para-mute"><?php echo esc_html__( 'Contact', 'theme' ); ?></h3>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'footer-menu-3',
            'container' => 'ul',
            'menu_class'     => 'footer-menu',
            'link_before' => '<span class="nav-link para-mute">',
            'link_after' => '</span>',
        )
    );
    ?>
</div>

                <div class="col-lg-3 col-md-6">
                    <h3 class="para-mute">SECURITY & GAME INTEGRITY</h3>
                    <div class="img-box">
                        <div class="security-img security-img1"></div>
                        <div class="security-img security-img2"></div>
                        <div class="security-img security-img3"></div>
                        <div class="security-img security-img4"></div>
                        <div class="security-img security-img5"></div>
                        <div class="security-img security-img6"></div>
                    </div>
                    <h3 class="para-mute add-style">PAYMENT PARTNERS</h3>
                    <div class="img-box">
                        <div class="security-img payment-img1"></div>
                        <div class="security-img payment-img2"></div>
                        <div class="security-img payment-img3"></div>
                        <div class="security-img payment-img4"></div>
                        <div class="security-img payment-img5"></div>
                        <div class="security-img payment-img6"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="footer-box">

                            <div class="footer-left">

                                <small class="content"><a class="para-mute" href="#">Terms &amp; Conditions
                                        |</a></small>



                                <small class="content"><a class="para-mute" href="#">Privacy Policy |</a></small>

                                <small class="content">© 2024, <a class="para-mute" href="#" title="">©Dhanolaxmi Playz
                                        Pvt Ltd All rights reserved 2024</a></small>

                            </div>


                            <div class="footer-bottom-text">

                                <img class="footer-bottom-img" src="./images/footer-img.avif" alt="">
                                <p class="para-mute">If you need any help or support, please contact us at
                                    support@sample.com.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php wp_footer(); ?>
    <!-- footer end -->

    <!-- script -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets//js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.min.js"></script>

    <!-- <script src="js/custom.js"></script> -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/custom-two.js"></script>
</body>

</html>