<?php
get_header();
?>
<?php get_template_part('partials/front-page/quick-links-main'); ?>
<div class="page-content">
    <?php zsz_page_breadcrumb(); ?>

    <?php get_template_part('partials/post/single-post'); ?>

</div>

<?php get_footer(); ?>