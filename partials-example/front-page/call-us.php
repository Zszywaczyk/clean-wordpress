<?php
global $bgGrey_imgSrc,$bgDotted_imgSrc,$bgGreyDark_imgSrc,$ColShiftRight_imgSrc,$serviceBoxGreybg_imgSrc;
$telefon = get_field('telefony', 'options')[0]; //['telefon'] ['telefon-link']
$callUs = get_field('call-us');
$image = $callUs['image'];
?>
</div>
</div>
<!--section call us--><!--Partial-->
<div class="section mt-7">
    <div class="container">
        <div class="banner-call">
            <div class="row no-gutters">
                <div class="col-sm-5 col-lg-4 order-2 order-sm-1 mt-3 mt-md-0 text-center text-md-right">
                    <?php zsz_the_image($image, 'call-us-img','shift-left');?>
                </div>
                <div class="col-sm-7 col-lg-7 d-flex align-items-center order-1 order-sm-2">
                    <div class="text-center">
                        <h2><?php echo $callUs['title']; ?> <span class="theme-color"><?php echo $callUs['title-blue']; ?></span></h2>
                        <div class="h-decor"></div>
                        <p class="mt-sm-1 mt-lg-4 text-left text-sm-center"> <?php echo $callUs['text']; ?> </p>
                        <div class="mt-3 mt-lg-4">
                            <a href="tel:<?php echo $telefon['telefon-link']; ?>" class="banner-call-phone"><i class="icon-telephone"></i><?php echo $telefon['telefon'];?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--section call us-->
<div class="container row">
    <div class="col-12">