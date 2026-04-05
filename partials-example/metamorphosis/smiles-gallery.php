<?php
$pT = get_field('smiles-gallery');
$taxos = $pT['groups'];
$offers = $pT['offers'];

$ppost = array();
?>
</div>
</div>
<!--section-->
<div class="section page-content-first">
    <div class="container">
        <div class="text-center mb-2  mb-md-3 mb-lg-4">
            <div class="h-sub theme-color"><?php echo $pT['title-small']?></div>
            <h1><?php echo $pT['title']?></h1>
            <div class="h-decor"></div>
        </div>
    </div>
    <div class="container">
        <div class="text-center mb-3 mb-md-4 max-900">
            <?php echo $pT['text']?>
        </div>
        <div class="filters-by-category mb-2 mb-lg-4">
            <ul class="option-set justify-content-center" data-option-key="filter">
                <?php
                $postCounter = 1;
                foreach ($offers as $offer){
                    $classCounter = 1;
                    $ppost[$postCounter-1]['post'] = $offer;
                    foreach ($taxos as $taxo){
                        if(has_term($taxo->name, 'zsz_metamorphosis_group', $offer)){
                            $ppost[$postCounter-1]['class'][] = 'category'.$classCounter;
                        }
                        $classCounter++;
                    }
                    $postCounter++;
                }
                //var_dump($ppost);

                $counter = 1;
                foreach ($taxos as $taxo){
                    if($counter == 1){
                        echo '<li><a href="#filter" data-option-value="*" class="selected">'.$taxo->name.'</a></li>';
                    }
                    else{
                        echo '<li><a href="#filter" data-option-value=".category'.$counter.'">'.$taxo->name.'</a></li>';
                    }
                    $counter++;
                }
                    ?>
            </ul>
        </div>
        <div class="gallery-wrap">
            <div class="loading-content">
                <div class="inner-circles-loader"></div>
            </div>
            <div class="gallery-smiles gallery-isotope" id="gallery">

                <?php foreach ($ppost as $pp ): ?>
                <?php
                    $classes = '';
                    foreach ($pp['class'] as $class ){
                        $classes = $classes.$class.' ';
                    }
                    $metamor = get_field('metamorfosis',$pp['post']);
                    ?>
                <div class="gallery-item <?php echo $classes; ?>">
                    <?php if(!empty($metamor['photo'])){zsz_the_image($metamor['photo'], 'metamor-img');} ?>
                    <div class="after-label">Po</div>
                    <div class="before-label">Przed</div>
                    <div class="gallery-caption">
                        <?php echo $metamor['text']; ?>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!--//section-->
<div class="container row">
    <div class="col-12">
