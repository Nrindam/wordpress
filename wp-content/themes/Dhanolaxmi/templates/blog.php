<?php
/*
Template Name: blog
*/
get_header();
?>

<div class="top-header trend-sec">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3 class="t-title">NOW TRENDING:</h3>
            </div>
            <div class="col-md-9">
                <div class="offer-box">
                    <marquee>
                        <ul class="item">
                            <?php if( have_rows('trending_items') ): ?>
                                <?php while( have_rows('trending_items') ): the_row(); ?>
                                    <li>
                                        <a class="para-mute" href="<?php the_sub_field('trending_item_link'); ?>">
                                            <?php the_sub_field('trending_item_text'); ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </marquee>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- now trending end -->
    <section class="blog-banner">
    <div class="container-fluid">
        <div class="row g-lg-4 g-3">
            <?php
            // Get ACF fields
            $card_1_image = get_field('card_1_image');
            $card_1_content = get_field('card_1_content');
            $card_2_image = get_field('card_2_image');
            $card_2_content = get_field('card_2_content');
            $card_3_image = get_field('card_3_image');
            $card_3_content = get_field('card_3_content');
            ?>
            <div class="col-md-8">
                <div class="hero-box">
                    <div class="ban-card">
                        <div class="card-top-one">
                            <img src="<?php echo esc_url($card_1_image['url']); ?>" alt="<?php echo esc_attr($card_1_image['alt']); ?>">
                        </div>
                        <div class="card-content-one">
                            <h3 class="card-header-text"><a href="#"><?php echo esc_html($card_1_content); ?></a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="hero-box right">
                    <?php for ($i = 2; $i <= 4; $i++) : ?>
                        <div class="ban-card">
                            <div class="card-top-one">
                                <img src="<?php echo esc_url(get_field('card_' . $i . '_image')['url']); ?>" alt="<?php echo esc_attr(get_field('card_' . $i . '_image')['alt']); ?>">
                            </div>
                            <div class="card-content-one">
                                <h3 class="card-header-text"><a href="#"><?php echo esc_html(get_field('card_' . $i . '_content')); ?></a></h3>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</section>

   

   
    <!-- blog start  -->
    <section class="main-sec-three blog-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="section-header">
    <?php
    // Get the latest articles category name dynamically
    $latest_articles_category = get_category_by_slug('latest-articles'); // Replace 'latest-articles' with your category slug
    if ($latest_articles_category) {
        echo esc_html($latest_articles_category->name);
    } else {
        echo 'Latest Articles'; // Default header if category is not found
    }
    ?>
</h2>
<div class="blog-box">
     <?php
                    // Query latest articles category
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $posts_per_page = 4; // Number of posts to display per page
                    $offset = ($paged - 1) * $posts_per_page;
                    $latest_articles_query = new WP_Query(array(
                        'category_name' => 'latest-articles', // Replace 'latest-articles' with the slug of your latest articles category
                        'posts_per_page' => $posts_per_page,
                        'offset' => $offset
                    ));

                    // Check if there are any posts
                    if ($latest_articles_query->have_posts()) :
                        // Loop through posts
                        while ($latest_articles_query->have_posts()) : $latest_articles_query->the_post();
                    ?>
            <div class="card mb-3 blog-card p-md-3">
                <div class="row g-0">
                    <div class="col-md-5 col-lg-4">
                        <?php
                        // Display post thumbnail
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('medium', array('class' => 'blog-img img-fluid rounded-start'));
                        } else {
                            // You can add a default image here if no thumbnail is available
                            echo '<img src="' . get_template_directory_uri() . '/images/default-thumbnail.jpg" class="blog-img img-fluid rounded-start" alt="Default Thumbnail">';
                        }
                        ?>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p class="card-text para-mute"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                            <a class="download-btn" href="<?php the_permalink(); ?>">
                                Read More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
                        endwhile;
                        // Reset post data
                        wp_reset_postdata();

                        // Pagination links
                        echo '<div class="pagination">';
                        echo paginate_links(array(
                            'total' => $latest_articles_query->max_num_pages,
                            'prev_text' => __('« Previous'),
                            'next_text' => __('Next »'),
                        ));
                        echo '</div>';
                    else :
                        // If no posts found
                        echo '<p>No latest articles found.</p>';
                    endif;
                    ?>
</div>

                   





                </div>
                <div class="col-md-3">
                    <div class="post-left">
                        <div class="recent-post-box">
    <h3 class="post-title">Recent Posts</h3>
    <?php
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 5,
        'category_name'  => 'recent-posts', // Number of recent posts to display
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
    ?>
            <div class="post-card">
                <div class="img-one">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                    <?php endif; ?>
                </div>
                <div class="content">
                    <p class="post-des"><a href="<?php the_permalink(); ?>"><?php the_content(); ?></a></p>
                </div>
            </div>
    <?php
        endwhile;
        wp_reset_postdata(); // Reset post data query
    else :
        // If no posts found
        echo '<p>No recent posts found.</p>';
    endif;
    ?>
</div>

                         <div class="recent-post-box">
                            <h3 class="post-title">Advertisement </h3>
                            <div class="img-box">
							    <?php if( have_rows('image_gallery') ): ?>
							        <?php while( have_rows('image_gallery') ): the_row(); 
							            // Get field value
							            $adv_image = get_sub_field('adv_image');
							        ?>
							            <img src="<?php echo $adv_image['url']; ?>" alt="<?php echo esc_attr($image['alt']); ?>">
							        <?php endwhile; ?>
							    <?php endif; ?>
							</div>

                        </div>
                        <div class="recent-post-box sponsor">
                            <h3 class="post-title">Sponsor </h3>
                            <div class="img-box">
							    <?php if( have_rows('sponsor_images') ): ?>
							        <?php while( have_rows('sponsor_images') ): the_row(); 
							            // Get field value
							            $s_image = get_sub_field('s_image');
							        ?>
							            <img src="<?php echo $s_image['url']; ?>" alt="<?php echo esc_attr($image['alt']); ?>">
							        <?php endwhile; ?>
							    <?php endif; ?>
							</div>


                        </div>
                        <div class="recent-post-box sponsor video">
                            <h3 class="post-title">Featured Video </h3>
                            <div class="video-box">
                                <?php the_field('video_embed'); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog end -->
    <!-- know more start -->
    <section class="more-sec">
    <div class="container">
        <h2 class="more-title">DID YOU KNOW</h2>
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-theme bolg-slider">
                    <?php
                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => -1, // Retrieve all posts
                        'category_name'  => 'did-you-know', // Category slug
                    );
                    $query = new WP_Query($args);
                    
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                    ?>
                            <div class="item">
                                <div class="course-box">
                                    <div class="courese-img-box">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="courese-content-box">
                                        <div class="date-box">
                                            <i class="fa-solid fa-calendar-days"></i>
                                            <p class="para-mute"><?php echo get_the_date('F j, Y'); ?></p>
                                        </div>
                                        <h3 class="card-title-one"><?php the_title(); ?></h3>
                                        <p class="para-mute"><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
                                        <div class="button-box">
                                            <a class="download-btn" href="<?php the_permalink(); ?>">
                                                Read More
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                        wp_reset_postdata(); // Reset post data
                    else :
                        echo '<p>No posts found.</p>';
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
?>