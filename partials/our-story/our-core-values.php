<?php
$oCV = get_field('our-core-val');
?>
</div>
</div>
<!--section Our Core Values--><!--Partial-->
<div class="section">
    <div class="container">
        <div class="title-wrap text-center">
            <div class="h-sub theme-color"><?php echo $oCV['title-small']; ?></div>
            <h2 class="h1"><?php echo $oCV['title']; ?></h2>
            <div class="h-decor"></div>
        </div>
        <div class="row js-icn-carousel icn-carousel flex-column flex-sm-row text-center text-sm-left" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}]}'>

            <?php foreach ( $oCV['boxes'] as $box ): ?>
            <div class="col-md">
                <div class="icn-text">
                    <div class="icn-text-simple"><i class="<?php echo $box['icon']; ?>"></i></div>
                    <div>
                        <h5 class="icn-text-title"><?php echo $box['title']; ?></h5>
                        <p><?php echo $box['text']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<!--//section Our Core Values-->
<div class="container row">
    <div class="col-12">