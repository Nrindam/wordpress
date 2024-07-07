<?php
/**
 * The template for displaying all single posts and attachments
 */

get_header(); 
?>

 <section class="main-sec-three">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
    <div class="main-part">
        <?php
        // Start the loop.
        while (have_posts()) : the_post();
            ?>
            <div class="images">
                <?php the_post_thumbnail(); ?>
            </div>
            <h2 class="main-header">
                <?php the_title(); ?>
            </h2>
            <div class="para-box">
                <?php the_content(); ?>

                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

                // Previous/next post navigation.
                the_post_navigation(array(
                    'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'twentyfifteen') . '</span> ' .
                        '<span class="screen-reader-text">' . __('Next post:', 'twentyfifteen') . '</span> ' .
                        '<span class="post-title">%title</span>',
                    'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'twentyfifteen') . '</span> ' .
                        '<span class="screen-reader-text">' . __('Previous post:', 'twentyfifteen') . '</span> ' .
                        '<span class="post-title"></span>',
                ));
                ?>
            </div>
        <?php endwhile; ?>
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
                        <!-- <div class="recent-post-box">
                            <h3 class="post-title">Advertisement </h3>
                            <div class="img-box">
                                <img src="./images/re-one.png" alt="">
                                <img src="./images/re-two.png" alt="">
                            </div>

                        </div>
                        <div class="recent-post-box sponsor">
                            <h3 class="post-title">Sponsor </h3>
                            <div class="img-box">
                                <img src="./images/ba-one.png" alt="">
                                <img src="./images/ba-two.png" alt="">
                                <img src="./images/ba-three.png" alt="">
                            </div>

                        </div>
                        <div class="recent-post-box sponsor video">
                            <h3 class="post-title">Featured Video </h3>
                            <div class="video-box">
                                <iframe width="560" height="315"
                                    src="https://www.youtube.com/embed/3ERdC_ZIrv4?si=swQa6LM1GhiPlThv"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






<?php

// Include the sidebar
get_footer();
?>