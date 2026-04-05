<?php
$oO = get_field('our-office');
$images = $oO['images'];
?>
</div>
<!--section Our Office--><!--Partial-->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="title-wrap">
                    <h2 class="h1"><?php echo $oO['title'];?></h2>
                    <div class="h-decor"></div>
                </div>
                <?php echo $oO['text'];?>
                <div class="mt-4"></div>
                <h3><?php echo $oO['subtitle'];?></h3>
                <div class="mt-lg-4"></div>
                <ul class="marker-list-md">
                    <?php foreach ($oO['checklist'] as $point): ?>
                        <li><?php echo $point['point'];?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-lg-8 mt-4 mt-lg-0">
                <?php get_template_part('partials/our-story/slider',null, $images); ?>
            </div>
        </div>
    </div>
</div>
<!--//section-->
<div class="container row">
    <div class="col-12">