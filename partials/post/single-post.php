<?php
$facebookLink = get_field('facebook-link', 'options');
if(empty($facebookLink)){
    $facebookLink = "https://facebook.com/example/example/example";
}
$months = ['STY', 'LUT', 'MAR', 'KWI', 'MAJ', 'CZE', 'LIP', 'SIE', 'WRZ', 'PAŹ', 'LIS', 'GRU'];
?>
<div class="section page-content-first">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 aside">

                <!-- Post section -->
                <?php if (have_posts()) : the_post(); ?>
                    <?php
                    $day = date("d",strtotime($post->post_date));
                    $month = $months[date("m",strtotime($post->post_date))-1];
                    ?>
                <div class="blog-post blog-post-single">

                    <div class="blog-post-info">
                        <div class="post-date"><?php echo $day; ?><span><?php echo $month; ?></span></div>
                        <div>
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>">How to Choose the Best Toothbrush</a></h2>
                            <div class="post-meta">
                                <div class="post-meta-author">Napisał <i><?php the_author();?></i></div>
                                <div class="post-meta-social">
                                    <a href="<?php echo $facebookLink; ?>"><i class="icon-facebook-logo"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="post-image">
                        <img data-src="<?php the_post_thumbnail_url('full');?>" alt="<?php the_post_thumbnail_caption(); ?>" class="lazy">
                    </div>
                    <div class="post-text">
                         <?php the_content(); ?>
                    </div>

                    <ul class="tags-list">
                        <?php foreach (get_the_tags() as $tag):?>
                            <li><a href="<?php echo get_tag_link($tag->term_id); ?>"><?php echo $tag->name; ?></a></li>
                        <?php endforeach;?>
                    </ul>

                </div>
                <?php endif; ?>
                <!-- /Post section -->

                <!-- Comments section -->
                <div class="comments-block mt-4 mt-lg-7">
                    <h3>Komentarze</h3>
                    <?php comments_template(); ?>
                </div>
                <!-- /Comments section -->

            </div>

            <!-- Sidebar -->
            <div class="col-lg-3 aside-left mt-5 mt-lg-0">

                <?php get_template_part('partials/single-services/widget'); ?>

            </div>
            <!-- /Sidebar -->
        </div>
    </div>
</div>
