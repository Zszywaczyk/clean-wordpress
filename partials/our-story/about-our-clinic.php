<?php
global $bgGrey_imgSrc,$bgDotted_imgSrc,$bgGreyDark_imgSrc,$ColShiftRight_imgSrc,$serviceBoxGreybg_imgSrc;
$aOC = get_field('about-our-cli');  //aboutOurClinic
?>
</div>
</div>
<!--section about our clinic--><!--Partial-->
<div class="section page-content-first">
    <div class="container">
        <div class="text-center mb-2  mb-md-3 mb-lg-4">
            <div class="h-sub theme-color"><?php echo $aOC['title-small']; ?></div>
            <h1><?php echo $aOC['title']; ?></h1>
            <div class="h-decor"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left pr-md-4">
                <img data-src="<?php echo $aOC['image-big']; ?>" class="w-100 lazy" alt="">
                <div class="row mt-3">
                    <div class="col-6">
                        <img data-src="<?php echo $aOC['image-small1']; ?>" class="w-100 lazy" alt="">
                    </div>
                    <div class="col-6">
                        <img data-src="<?php echo $aOC['image-small2']; ?>" class="w-100 lazy" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-3 mt-lg-0">
                <?php echo $aOC['text1']; ?>
                <ul class="marker-list-md">
                    <?php foreach ($aOC['checklist'] as $point ): ?>
                    <li><?php echo $point['point']; ?></li>
                    <?php endforeach;?>
                </ul>
                <div class="mt-3 mt-md-7"></div>
                <h3>Mission / Vision <span class="theme-color">Statement</span></h3>
                <div class="mt-0 mt-md-4"></div>
                <p>It is our mission to exceed expectations by providing exceptional dental care to our patients and at the same time, building relationships of trust with them.</p>
                <p>Our vision is to be one of the leading dental clinic in the area, expanding our services to reach additional community members. We work to be trusted by patients, a valued partner in the community.</p>
            </div>
        </div>
    </div>
</div>
<!--//section about our clinic-->
<div class="container row">
    <div class="col-12">