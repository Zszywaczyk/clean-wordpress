<?php
global $bgGrey_imgSrc,$bgDotted_imgSrc,$bgGreyDark_imgSrc,$ColShiftRight_imgSrc,$serviceBoxGreybg_imgSrc;
$whyus = get_field('whyus');
$squeres = $whyus['blocks'];
?>
</div>
</div>
<!--section why choose us--><!--Partial-->
<div class="section">
    <div class="container">
        <div class="title-wrap text-center">
            <div class="h-sub theme-color"><?php echo $whyus['title-small']; ?></div>
            <h2 class="h1"><?php echo $whyus['title']; ?></h2>
            <div class="h-decor"></div>
        </div>
        <div class="row js-icn-carousel icn-carousel flex-column flex-sm-row text-center text-sm-left" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}]}'>

            <?php foreach ($squeres as $squere): ?>
            <div class="col-md">
                <div class="icn-text icn-text-wmax">
                    <div class="icn-text-circle"><i class="<?php echo $squere['icon']; ?>"></i></div>
                    <div>
                        <h5 class="icn-text-title"><?php echo $squere['title']; ?></h5>
                        <p><?php echo $squere['text']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
<!--//section why choose us-->
<div class="container row">
    <div class="col-12">