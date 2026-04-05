<?php
$fb = get_field('facebook-link', 'option');
$emailUs = get_field('email-us');
?>
</div>
</div>
<!--section-->
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md col-lg-5">
                <div class="pr-0 pr-lg-8">
                    <div class="title-wrap">
                        <h2><?php echo $emailUs['title']; ?></h2>
                        <div class="h-decor"></div>
                    </div>
                    <div class="mt-2 mt-lg-4">
                        <?php echo $emailUs['text']; ?>
                    </div>
                    <div class="mt-2 mt-md-5"></div>
                    <h5><?php echo $emailUs['subtitle']; ?></h5>
                    <div class="content-social mt-15">
                        <a href="<?php echo $fb; ?>" target="blank" class="hovicon"><i class="icon-facebook-logo"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md col-lg-6 mt-4 mt-md-0">
                <?php echo do_shortcode( $emailUs['cf7-short'] ); ?>
            </div>
        </div>
    </div>
</div>
<!--//section-->
<div class="container row">
    <div class="col-12">
