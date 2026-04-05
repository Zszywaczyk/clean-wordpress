<?php
$telefon = get_field('telefony', 'options')[0]; //['telefon'] ['telefon-link']
$callUs = get_field('call-us2');
$image = $callUs['image'];
?>
</div>
</div>
<!--section call us-->
<div class="section mt-5">
    <div class="container">
        <div class="banner-call">
            <div class="row no-gutters">
                <div class="col-md-7 d-flex align-items-center">
                    <div class="text-center w-100">
                        <h2>Want the Same <span class="theme-color">Wonderful Smile?</span></h2>
                        <div class="h-decor"></div>
                        <p class="mt-sm-1 mt-lg-4 text-left text-sm-center">We provide advanced, trusted dental care delivered by a dedicated team in our modern practice.</p>
                        <div class="mt-2 mt-lg-4 text-center">
                            <a href="tel:<?php echo $telefon['telefon-link']?>" class="banner-call-phone"><i class="icon-telephone"></i><?php echo $telefon['telefon']?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-lg-5 mt-3 mt-md-0 text-center text-lg-left">
                    <?php zsz_the_image($image, 'call-us-img','shift-right');?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--section call us-->
<div class="container row">
    <div class="col-12">