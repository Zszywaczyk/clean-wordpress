<?php
$facebookLink = get_field('facebook-link', 'options');
if(empty($facebookLink)){
    $facebookLink = "https://facebook.com/example/example/example";
}
$post = $wp_query->get_queried_object();
$months = ['STY', 'LUT', 'MAR', 'KWI', 'MAJ', 'CZE', 'LIP', 'SIE', 'WRZ', 'PAŹ', 'LIS', 'GRU'];
?>
<!--section-->
<div class="section page-content-first">
    <div class="container">
        <div class="text-center mb-2  mb-md-3 mb-lg-4">
            <h1>Szukaj</h1>
            <div class="h-decor"></div>
            <?php get_template_part('partials/search/search') ?>
        </div>
    </div>
    <div class="container mb-5">
        <div class="blog-isotope">

            <?php if (have_posts()) : ?>

                <!-- Start of the main loop. -->
                <?php $counter = 0; ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php
                    $day = date("d",strtotime($post->post_date));
                    $month = $months[date("m",strtotime($post->post_date))-1];
                    ?>

                    <div class="blog-post <?php if($counter%3==1){ echo 'bg-grey';} ?>">
                        <div class="post-image">
                            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('large');?>" alt="<?php the_post_thumbnail_caption(); ?>" class=""></a>
                        </div>
                        <div class="blog-post-info">
                            <div class="post-date"><?php echo $day; ?><span><?php echo $month; ?></span></div>
                            <div>
                                <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></h2>

                                <div class="post-meta">
                                    <div class="post-meta-author">Napisał <i><?php the_author();?></i></div>
                                    <div class="post-meta-social">
                                        <a href="<?php echo $facebookLink; ?>"><i class="icon-facebook-logo"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-teaser">
                            <?php the_excerpt();?>
                        </div>
                        <div class="mt-2"><a href="<?php the_permalink(); ?>" class="btn btn-sm btn-hover-fill"><i
                                    class="icon-right-arrow"></i><span>Czytaj dalej</span><i
                                    class="icon-right-arrow"></i></a>
                        </div>
                    </div>
                    <?php $counter++; ?>
                <?php endwhile; ?>

            <?php endif; ?>
            <div class="clearfix"></div>
        </div>
        <?php zsz_blog_pagination($wp_query); ?>
        <div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
    </div>
</div>

