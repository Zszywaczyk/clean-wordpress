<?php
global $bgGrey_imgSrc;
$testi = get_field('testimonials');
$postsPerPage = $testi['posts-per-page'];

$ratesCounter =0;
$rateStar = 0;

$args = array(
    'post_type' => 'zsz_testimonials',
    'posts_per_page' => -1
);
$query = new WP_Query($args);
if ($query->have_posts() ) {
    while ($query->have_posts()) {
        $query->the_post();
        $rateStar += get_field('rate', $query->post);
        $ratesCounter++;
    }
    wp_reset_postdata();
    $rateStar = round($rateStar/$ratesCounter, 1);
}

?>
<?php
$the_query = new WP_Query( array('posts_per_page'=>$postsPerPage,
        'post_type'=>'zsz_testimonials',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1)
);
?>
</div>
</div>
<!--//section-->
<div class="section page-content-first">
    <div class="container">
        <div class="text-center mb-2  mb-md-3 mb-lg-4">
            <div class="h-sub theme-color"><?php echo $testi['title-small']; ?></div>
            <h1><?php echo $testi['title']; ?></h1>
            <div class="h-decor"></div>
        </div>
    </div>
    <div class="container">
        <div class="rating-box">
            <div class="rating-number"><?php echo $rateStar; ?></div>
            <div class="star-rating"><span>
                    <?php
                    for ($i=0;$i<round($rateStar);$i++){
                        echo '<i class="icon-star"></i>';
                    }
                    ?>
                </span></div>
            <div><?php echo $testi['subtitle']; ?></div>
        </div>
        <div class="text-center mb-3 mb-md-4 max-900">
            <?php echo $testi['text']; ?>
            <p><a href="#writeReview" class="btn btn-hover-fill js-wrire-review"><i class="icon-right-arrow"></i><span>Write Your Review</span><i
                            class="icon-right-arrow"></i></a></p>
        </div>
        <div class="row">
            <?php
            $firstCol = '';
            $secondCol = '';
            $counter = 0;
            while($the_query -> have_posts()){
                $rate = get_field('rate', $the_query->post);
                $the_query -> the_post();
                if($counter%2 == 0){
                    $firstCol.= '<div class="testimonial-wrap">';

                    if($counter%3==0){
                        $firstCol.= '<div class="testimonial text-center">';
                    }
                    elseif($counter%3==1){
                        $firstCol.='<div class="testimonial testimonial-bg1 text-center lazy" data-bg="'.$bgGrey_imgSrc.'">';
                    }
                    else{
                        $firstCol.='<div class="testimonial testimonial-bg2 text-center">';
                    }
                    $firstCol.= '<div class="testimonial-title">'.get_the_title().'</div>';
                    $rateDiv = '<div class="star-rating"><span class="txt-gradient">';
                    for($i=0;$i<$rate;$i++){
                        $rateDiv .= '<i class="icon-star"></i>';
                    }
                    $rateDiv .= '</span></div>';
                    $firstCol.= $rateDiv;
                    $firstCol.= '<div class="testimonial-text">';
                    $firstCol.= get_the_content();
                    $firstCol.= '</div>';
                    $firstCol.= '</div>';
                    $firstCol.= '</div>';
                }
                else{
                    $secondCol.= '<div class="testimonial-wrap">';

                    if($counter%3==0){
                        $secondCol.= '<div class="testimonial text-center">';
                    }
                    elseif($counter%3==1){
                        $secondCol.='<div class="testimonial testimonial-bg1 text-center lazy" data-bg="'.$bgGrey_imgSrc.'">';
                    }
                    else{
                        $secondCol.='<div class="testimonial testimonial-bg2 text-center">';
                    }
                    $secondCol.= '<div class="testimonial-title">'.get_the_title().'</div>';
                    $rateDiv = '<div class="star-rating"><span class="txt-gradient">';
                    for($i=0;$i<$rate;$i++){
                        $rateDiv .= '<i class="icon-star"></i>';
                    }
                    $rateDiv .= '</span></div>';
                    $secondCol.= $rateDiv;
                    $secondCol.= '<div class="testimonial-text">';
                    $secondCol.= get_the_content();
                    $secondCol.= '</div>';
                    $secondCol.= '</div>';
                    $secondCol.= '</div>';
                }
                $counter++;
            }
            //zsz_blog_pagination()
            ?>
            <div class="col-sm">
                <?php echo $firstCol; ?>
            </div>
            <div class="col-sm">
                <?php echo $secondCol; ?>
            </div>
        </div>
        <?php zsz_blog_pagination($the_query); ?>
        <div class="mt-5 mt-md-8" id="writeReview">
            <h3>Write a Review</h3>
            <div class="review-form-wrap opened mt-lg-3">

                <div class="row mt-1">
                    <div class="col-lg-8">
                        <?php echo do_shortcode($testi['cf7-short'])?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!--//section-->
<div class="container row">
    <div class="col-12">