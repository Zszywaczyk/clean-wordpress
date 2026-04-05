<?php
$images = $args;
?>
<div class="slider-gallery">
    <ul class="slider-gallery-main list-unstyled js-slider-gallery-main">
        <?php foreach ($images as $img): ?>
            <li>
                <?php echo '<img src="'.$img['url'].'" alt="">';//var_dump($img);//zsz_the_image($img, 'our-story-full-gallery');?>
            </li>
        <?php endforeach; ?>
    </ul>
    <ul class="slider-gallery-thumbs list-unstyled js-slider-gallery-thumbs">
        <?php foreach ($images as $img): ?>
            <li>
                <?php echo '<img src="'.$img['url'].'" alt="">';//zsz_the_image($img, 'our-story-full-gallery-thumbnail');?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
