<?php
get_header();
?>
<?php get_template_part('partials/front-page/quick-links-main'); ?>
<div class="page-content">

    <?php zsz_page_breadcrumb(); ?>
    <?php while (have_posts()) : the_post();/* Start loop */ ?>
    <div class="container row">
        <div class="col-12">
        <?php the_content(); ?>
        </div>
    </div>
    <?php endwhile; /* End loop */ ?>

</div>

<?php get_footer() ?>
