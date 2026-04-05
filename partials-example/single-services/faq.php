<?php
$faq = get_field('faq');
if(empty($faq) || !isset($faq)){
    return;
}
$counter = 1;
?>
<div class="mt-3 mt-md-5 px-1 pt-1 pb-15 pt-md-2 px-md-4 bg-grey">
    <div id="faqAccordion1" class="faq-accordion" data-children=".faq-item">

        <?php foreach ( $faq as $sng ): ?>
            <div class="faq-item">
                <a data-toggle="collapse" data-parent="#faqAccordion1" href="#faqItem<?php echo $counter; ?>" <?php if($counter==1){echo'aria-expanded="true"';} else{echo 'aria-expanded="false" class="collapsed"';}?> >
                    <span><?php echo $counter; ?>.</span><?php echo $sng['question']; ?>
                </a>
                <div id="faqItem<?php echo $counter; ?>" class="collapse <?php if($counter==1){echo'show';} ?> faq-item-content" role="tabpanel">
                    <div>
                        <?php echo $sng['answer']; ?>
                    </div>
                </div>
            </div>
            <?php
            $counter++;
        endforeach;
        ?>

    </div>
</div>