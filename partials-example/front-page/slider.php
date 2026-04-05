<?php
global $bgGrey_imgSrc,$bgDotted_imgSrc,$bgGreyDark_imgSrc,$ColShiftRight_imgSrc,$serviceBoxGreybg_imgSrc;
$slides = get_field('slides');
?>
</div>
</div>

<!--section slider--><!--Partial-->
<div class="section mt-0">



    <!--Slider-->
    <div id="mainSliderWrapper">
        <div class="loading-content">
            <div class="inner-circles-loader"></div>
        </div>
        <div class="main-slider arrows-white arrows-bottom" id="mainSlider" data-slick='{"arrows": false, "dots": false}'>
            <?php foreach ($slides as $slide): ?>
            <div class="slide">
                <div class="img--holder" data-animation="kenburns" data-bg="<?php echo $slide['image']['url']; ?>"></div>
                <div class="slide-content center">
                    <div class="vert-wrap container">
                        <div class="vert">
                            <div class="container">
                                <div class="slide-txt1" data-animation="fadeInDown" data-animation-delay="1s"><?php echo $slide['title1']; ?>
                                    <br><b><?php echo $slide['title2']; ?></b></div>
                                <div class="slide-txt2" data-animation="fadeInUp" data-animation-delay="1.5s"><?php echo $slide['text']; ?></div>
                                <div class="slide-btn"><a href="<?php echo $slide['btn-link']; ?>" class="btn btn-white" data-animation="fadeInUp" data-animation-delay="2s"><i class="icon-right-arrow"></i><span><?php echo $slide['btn-text']; ?></span><i class="icon-right-arrow"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
    <!--//Slider-->


</div>
<!--//section slider-->
<div class="container row">
    <div class="col-12">