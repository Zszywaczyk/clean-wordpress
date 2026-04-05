<?php
$list = get_field('list');
?>
<ul class="numbered-list-lg">
    <?php foreach ($list as $point): ?>
    <li><?php echo $point['point']; ?></li>
    <?php endforeach; ?>
</ul>
