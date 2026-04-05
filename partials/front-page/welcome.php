<?php
global $bgGrey_imgSrc,$bgDotted_imgSrc,$bgGreyDark_imgSrc,$ColShiftRight_imgSrc,$serviceBoxGreybg_imgSrc;
$welcome = get_field('welcome');
?>
</div>
</div>
<!--section welcome--><!--Partial-->
<div class="section">
    <div class="container pt-lg-2">
        <div class="title-wrap text-center text-md-left d-lg-none mb-lg-2">
            <div class="h-sub"><?php echo $welcome['title-small']?></div>
            <h2 class="h1"><?php echo $welcome['title']?><span class="theme-color"><?php echo $welcome['title-blue']?></span></h2>
        </div>
        <div class="row mt-2 mt-md-3 mt-lg-0">
            <div class="col-md-6">
                <div class="title-wrap hidden d-none d-lg-block text-center text-md-left">
                    <div class="h-sub"><?php echo $welcome['title-small']?></div>
                    <h2 class="h1"><?php echo $welcome['title']?><span class="theme-color"><?php echo $welcome['title-blue']?></span></h2>
                </div>
                <div>
                    <?php echo $welcome['text']?>
                </div>
                <div class="mt-2 mt-md-4"></div>
                <a href="<?php echo $welcome['link']?>" class="btn-link" data-toggle="modal" data-target="#modalBookingForm"><?php echo $welcome['link-text']?><i class="icon-right-arrow"></i></a>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <div class="video-wrap embed-responsive embed-responsive-16by9">
                    <?php echo $welcome['yt']?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//section welcome-->
<div class="container row">
    <div class="col-12">