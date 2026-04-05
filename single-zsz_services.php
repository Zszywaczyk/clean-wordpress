<?php
get_header();
?>
<?php get_template_part('partials/front-page/quick-links-main'); ?>
    <div class="page-content">

        <?php zsz_page_breadcrumb(); ?>
        <!--section-->
        <div class="section page-content-first">
            <div class="container mt-6">
                <div class="row">
                    <div class="col-md">
                        <?php get_template_part('partials/single-services/widget'); ?>
                        <?php zsz_the_oferta_menu(); ?>
                    </div>
                    <div class="col-md-8 col-lg-9 mt-4 mt-md-0">

                        <?php while (have_posts()) : the_post();/* Start loop */ ?>

                            <div class="title-wrap">
                                <h1><?php the_title();?></h1>
                            </div>
                            <div class="service-img">
                                <?php the_post_thumbnail('services-thumbnail'); ?>
                                <?php /*wp_get_attachment_image_src();*/?>
                                <!--<img src="images/content/service-big-01.jpg" class="img-fluid" alt="">-->
                            </div>
                        <div class="pt-2 pt-md-4">
                            <?php the_content(); ?>
                        </div>
                        <?php endwhile; /* End loop */ ?>

                    </div>
                </div>
            </div>
        </div>
        <!--//section-->
    </div>
    <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
<?php
get_footer();
?>