<?php get_header(); ?>
    <div class="cntn-sec">
        <div class="wper">
            <div class="pg-lft-clm">
                <div class="pg-bnr">
                    <span class="pg-brn-img"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Be-Informed-bnr.png" align="right"> </span>
                    <div class="pg-bnr-tilel">
                        <div>
                            <h2><?php echo ucfirst($post->post_type);?></h2>
                        </div>
                    </div>
                </div>

                <div class="pg-cntnt">
                    <?php get_template_part('partials/breadcrumbs/breadcrumbs');?>
                        <h2>Current Openings</h2>

                       <?php if(have_posts()):?>
                        <div class="tbl-ovr-flo">
                            <table width="100%" cellspacing="0" cellpadding="7" bordercolor="#fff" border="1" bgcolor="#f1f2f2">
                                <thead>
                                    <tr>
                                        <td>Designation</td>
                                        <td>No. of Openings</td>
                                        <td>Qualifications</td>
                                        <td>Experience</td>
                                        <td>Location</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while(have_posts()) : the_post() ;?>
                                    <tr>
                                        <td>
                                            <?php the_title();?>
                                        </td>
                                        <?php $departments = wp_get_post_terms($post->ID, 'department', array("fields" => "all"));?>
                                        <td>
                                           <?php foreach($departments as $dept) {
                                                    echo $dept->name;
                                                }
                                            ?>
                                        </td>
                                        <td> 3</td>
                                        <td> 4</td>
                                        <td> 5</td>
                                        <td><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" class="btn">View More</a></td>
                                    </tr>
                                    <?php endwhile;?>
                                </tbody>

                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
                <?php get_footer(); ?>
        </div>
    </div>
