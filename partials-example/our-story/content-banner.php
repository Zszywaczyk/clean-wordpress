<?php
$cB = get_field('content-banner');
?>
</div>
</div>
<!--section Content Banner--><!--Partial-->
<div class="section">
    <div class="container-fluid px-0">
        <div class="banner-center bg-cover lazy" data-bg="<?php echo $cB['image']; ?>">
            <div class="banner-center-caption text-center">
                <div class="banner-center-text1"><?php echo $cB['title']; ?></div>
                <div class="banner-center-text2"><?php echo $cB['text']; ?></div>
                <a href="<?php echo $cB['btn-link']; ?>" class="btn btn-white mt-5" data-toggle="modal" data-target="#modalBookingForm"><i class="icon-right-arrow"></i><span><?php echo $cB['btn-text']; ?></span><i class="icon-right-arrow"></i></a>
            </div>
        </div>
    </div>
</div>
<!--section Content Banner-->
<div class="container row">
    <div class="col-12">