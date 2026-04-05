<?php
global $bgGrey_imgSrc,$bgDotted_imgSrc,$bgGreyDark_imgSrc,$ColShiftRight_imgSrc,$serviceBoxGreybg_imgSrc;
$services = get_field('services');
$boxes1 = $services['box1'];
$box2 = $services['box2'];
$box3 = $services['box3'];
$boxes4 = $services['box4'];
?>
</div>
</div>
<!--section services--><!--Partial-->
<div class="section">
    <div class="container-fluid px-0">
        <div class="title-wrap text-center">
            <div class="h-sub theme-color"><?php echo $services['title-small']; ?></div>
            <h2 class="h1"><?php echo $services['title']; ?></h2>
            <div class="h-decor"></div>
        </div>
        <div class="row no-gutters services-box-wrap services-box-wrap-desktop">
            <div class="col-4 order-1">
                <div class="service-box-rotator js-service-box-rotator">

                    <?php foreach ($boxes1 as $box1 ): ?>

                    <div data-bg="<?php echo $serviceBoxGreybg_imgSrc; ?>" class="service-box service-box-greybg service-box--hiddenbtn lazy">
                        <div class="service-box-caption text-center">
                            <div class="service-box-icon"><i class="<?php echo $box1['icon']; ?>"></i></div>
                            <div class="service-box-icon-bg"><i class="<?php echo $box1['icon']; ?>"></i></div>
                            <h3 class="service-box-title"><?php echo $box1['title']; ?></h3>
                            <p><?php echo $box1['text']; ?></p>
                            <div class="btn-wrap"><a href="<?php echo $box1['btn-link']; ?>" class="btn"><i class="icon-right-arrow"></i><span><?php echo $box1['btn-text']; ?></span><i class="icon-right-arrow"></i></a></div>
                        </div>
                    </div>

                    <?php endforeach; ?>

                </div>
            </div>
            <div class="col-8 order-2">
                <div class="service-box">
                    <div class="service-box-image lazy" data-bg="<?php echo $box2['image']; ?>"></div>
                    <div class="service-box-caption text-center w-50 ml-auto">
                        <h3 class="service-box-title"><?php echo $box2['title']; ?></h3>
                        <p><?php echo $box2['text']; ?></p>
                        <div class="btn-wrap"><a href="<?php echo $box2['btn-link']; ?>" class="btn"><i class="icon-right-arrow"></i><span><?php echo $box2['btn-text']; ?></span><i class="icon-right-arrow"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-8 order-3 order-lg-4 order-xl-3">
                <div class="service-box">
                    <div class="service-box-image" data-bg="<?php echo $box3['image']; ?>"></div>
                    <div class="service-box-caption text-center w-50 ml-auto">
                        <h3 class="service-box-title"><?php echo $box3['title']; ?></h3>
                        <p><?php echo $box3['text']; ?></p>
                        <div class="btn-wrap"><a href="<?php echo $box3['btn-link']; ?>" class="btn"><i class="icon-right-arrow"></i><span><?php echo $box3['btn-text']; ?></span><i class="icon-right-arrow"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="col-4 order-5">
                <div class="service-box-rotator js-service-box-rotator">

                    <?php foreach ($boxes4 as $box4 ): ?>

                        <div data-bg="<?php echo $serviceBoxGreybg_imgSrc; ?>" class="service-box service-box-greybg service-box--hiddenbtn lazy">
                            <div class="service-box-caption text-center">
                                <div class="service-box-icon"><i class="<?php echo $box4['icon']; ?>"></i></div>
                                <div class="service-box-icon-bg"><i class="<?php echo $box4['icon']; ?>"></i></div>
                                <h3 class="service-box-title"><?php echo $box4['title']; ?></h3>
                                <p><?php echo $box4['text']; ?></p>
                                <div class="btn-wrap"><a href="<?php echo $box4['btn-link']; ?>" class="btn"><i class="icon-right-arrow"></i><span><?php echo $box4['btn-text']; ?></span><i class="icon-right-arrow"></i></a></div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>

        <div class="row no-gutters services-box-wrap services-box-wrap-mobile">
            <div class="service-box-rotator js-service-box-rotator">
                <div data-bg="<?php echo $serviceBoxGreybg_imgSrc; ?>" class="service-box service-box-greybg service-box--hiddenbtn lazy">
                    <div class="service-box-caption text-center">
                        <div class="service-box-icon"><i class="icon-icon-whitening"></i></div>
                        <div class="service-box-icon-bg"><i class="icon-icon-whitening"></i></div>
                        <h3 class="service-box-title">Cosmetic Dentistry</h3>
                        <p>Cosmetic dentistry is concerned with the appearance of teeth and the enhancement of a person's smile</p>
                        <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>Know more</span><i class="icon-right-arrow"></i></a></div>
                    </div>
                </div>
                <div data-bg="<?php echo $serviceBoxGreybg_imgSrc; ?>" class="service-box service-box-greybg service-box--hiddenbtn lazy ">
                    <div class="service-box-caption text-center">
                        <div class="service-box-icon"><i class="icon-icon-orthodontics"></i></div>
                        <div class="service-box-icon-bg"><i class="icon-icon-orthodontics"></i></div>
                        <h3 class="service-box-title">Orthodontics</h3>
                        <p>Diagnosis and treatment of improper bites
                            <br>and irregularity of teeth</p>
                        <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>Know more</span><i class="icon-right-arrow"></i></a></div>
                    </div>
                </div>
                <div data-bg="<?php echo $serviceBoxGreybg_imgSrc; ?>" class="service-box service-box-greybg service-box--hiddenbtn lazy">
                    <div class="service-box-caption text-center">
                        <div class="service-box-icon"><i class="icon-icon-implant"></i></div>
                        <div class="service-box-icon-bg"><i class="icon-icon-implant"></i></div>
                        <h3 class="service-box-title">Dental Implants</h3>
                        <p>When teeth are lost because of disease or an accident, dental implants may be a good option</p>
                        <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>Know more</span><i class="icon-right-arrow"></i></a></div>
                    </div>
                </div>
                <div data-bg="<?php echo $serviceBoxGreybg_imgSrc; ?>" class="service-box service-box-greybg service-box--hiddenbtn lazy">
                    <div class="service-box-caption text-center">
                        <div class="service-box-icon"><i class="icon-emergency"></i></div>
                        <div class="service-box-icon-bg"><i class="icon-emergency"></i></div>
                        <h3 class="service-box-title">Dental Emergency</h3>
                        <p>Helping thousands of people each year find
                            <br>immediate dental services</p>
                        <div class="btn-wrap"><a href="service-page.html" class="btn"><i class="icon-right-arrow"></i><span>Know more</span><i class="icon-right-arrow"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--//section services-->
<div class="container row">
    <div class="col-12">