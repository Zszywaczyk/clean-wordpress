<?php
$pT = get_field('price-table');
$taxos = $pT['groups'];
$offers = $pT['offers'];

$categories = array();
//var_dump($offers);
?>
</div>
</div>
<!--section prices-->
<div class="section page-content-first">
    <div class="container">
        <div class="text-center mb-2 mb-md-3 mb-lg-4">
            <div class="h-sub theme-color"<?php echo $pT['title-small']?></div>
            <h1><?php echo $pT['title']?></h1>
            <div class="h-decor"></div>
        </div>
    </div>
    <div class="container">
        <div class="text-center mb-3 mb-md-4 max-900">
            <?php echo $pT['text']?>
        </div>
        <div class="nav nav-pills justify-content-center" role="tablist">
            <?php
            $counter = 1;
            foreach ($taxos as $taxo){
                //Prepering special array()
                $categories[$counter-1]['taxo'] = $taxo->name;
                foreach ($offers as $offer){
                    if(has_term($taxo->name, 'zsz_services_group', $offer)){
                        $categories[$counter-1]['offers'][] = $offer;
                    }
                }

                if($counter == 1){
                    echo '<a class="nav-link active" data-toggle="pill" href="#tab'.$counter.'" role="tab" aria-expanded="true">'.$taxo->name.'</a>';
                }
                else{
                    echo '<a class="nav-link" data-toggle="pill" href="#tab'.$counter.'" role="tab" aria-expanded="false">'.$taxo->name.'</a>';
                }
                $counter++;
            }
            ?>
            <?php
            foreach ($offers as $offer){
                $offerTable = get_field('offer',$offer);// ['treatment-type'] ['unit'] ['price'] ['no-visits']
            }
            ?>
        </div>
        <div id="tab-content" class="tab-content mt-3 mt-md-4">
        <?php $counter = 1;?>
        <?php foreach ($categories as $category):?>
            <div id="tab<?php echo $counter;?>" class="tab-pane fade <?php if($counter==1){echo 'show active';}?>" role="tabpanel">
                <div class="table-scroll">
                    <div class="table-wrap">
                        <table class="table price-table js-fixed-table">
                            <tr>
                                <th class="fixed-side">Rodzaj leczenia</th>
                                <th>Jednostka</th>
                                <th>Cena(GBP)</th>
                                <th>Ilość wizyt</th>
                            </tr>
                            <?php //var_dump($category['offers']);?>
                            <?php if(isset($category['offers'])):?>
                                <?php foreach ($category['offers'] as $offer):?>
                                        <?php $offerTable = get_field('offer',$offer); ?>
                                        <?php if(!isset($offerTable)){continue;}?>
                                        <tr>
                                            <td class="fixed-side"><?php echo $offerTable['treatment-type'];?></td>
                                            <td><?php echo $offerTable['unit'];?></td>
                                            <td> <?php echo $offerTable['price'];?></td>
                                            <td> <?php echo $offerTable['no-visits'];?></td>
                                        </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>


                        </table>
                    </div>
                </div>
            </div>

        <?php $counter++; endforeach;?>
        <p class="mt-2 p-sm">* <?php echo $pT['note']; ?></p>
    </div>
    <!--//section-->
</div>
<!--//section prices-->
<div class="container row">
    <div class="col-12">