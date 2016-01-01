<?php get_header();?>
    <div class="cntn-sec">
        <div class="wper">
            <div class="pg-lft-clm">
                <div class="pg-bnr">
                    <span class="pg-brn-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Be-Informed-bnr.png" align="right"> </span>
                    <div class="pg-bnr-tilel">
                        <div>
                            <h2><?php echo ucfirst($post->post_type); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="pg-cntnt">
                    <?php get_template_part('partials/breadcrumbs/breadcrumbs');?>
                        <ul class="list-inline">
                            <?php if(have_posts()) : while(have_posts()) : the_post();
                            echo '<li>';
                            $images = get_post_meta($post->ID, 'as_album_images', true);?>

                                    <a href='<?php echo get_the_permalink()?>'>
                                        <?php echo wp_get_attachment_image($images, "thumbnail")?>
                                            <span class="thumbnail-image-title"><?php the_title(); ?></span>
                                    </a>
                                    <?php
                            echo '</li>';
                            endwhile; endif; ?>
                        </ul>
                </div>
            </div>
            <?php get_sidebar();?>
        </div>
    </div>
    <?php get_footer();?>
