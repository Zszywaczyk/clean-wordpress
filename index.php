<?php
get_header();
?>

    <div class="page-content">
        <?php get_template_part('partials/front-page/quick-links-main'); ?>
        <div class="container row">
            <div class="col-12">

                <?php while (have_posts()) : the_post();/* Start loop */ ?>
                    <?php the_content(); ?>
                <?php endwhile; /* End loop */ ?>

            </div>
        </div>
    </div>

<?php
get_footer();
?>