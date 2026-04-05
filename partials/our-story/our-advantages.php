<?php
$oA = get_field('our-adventages');
?>
</div>
</div>
<!--section Our Advantages--><!--Partial-->
<div class="section">
    <div class="container-fluid px-0">
        <div class="row no-gutters">
            <div class="col-xl-6 bg-grey">
                <div class="max-670 mx-lg-auto px-15">
                    <div class="title-wrap">
                        <h2 class="h1"><?php echo $oA['title']; ?> <span class="theme-color"><?php echo $oA['title-blue']; ?></span></h2>
                    </div>
                    <div class="mt-lg-5"></div>
                    <div class="row">
                        <div class="col-sm-7">
                            <ul class="marker-list-md">
                                <?php foreach ($oA['checklist-left'] as $point ): ?>
                                    <li><?php echo $point['point']; ?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                        <div class="col-sm-5 mt-1 mt-sm-0">
                            <ul class="marker-list-md">
                                <?php foreach ($oA['checklist-right'] as $point ): ?>
                                    <li><?php echo $point['point']; ?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 banner-left bg-full lazy" data-bg="<?php echo $oA['image']; ?>" style="background-size: cover;"></div>
        </div>
    </div>
</div>
<!--//section Our Advantages-->
<div class="container row">
    <div class="col-12">