<?php
$track = get_field('track', 'options');
$worktime = get_field('worktime', 'options');
$deposit = get_field('deposit', 'options');
$prices = get_field('prices', 'options');
$contact = get_field('contact', 'options');
?>
<!--Widget-->
<div class="quickLinks-wrap js-quickLinks-wrap-d d-none d-lg-flex">
    <div class="quickLinks js-quickLinks">
        <div class="container">
            <div class="row no-gutters">

                <div class="col">
                    <a href="#" class="link">
                        <i class="icon-placeholder"></i><span><?php echo $track['title']; ?></span></a>
                    <div class="link-drop p-0">
                        <div id="googleMapDrop" class="google-map"></div>
                    </div>
                </div>

                <div class="col">
                    <a href="#" class="link">
                        <i class="icon-clock"></i><span><?php echo $worktime['title']; ?></span>
                    </a>
                    <div class="link-drop">
                        <h5 class="link-drop-title"><i class="icon-clock"></i><?php echo $worktime['title']; ?></h5>
                        <table class="row-table">
                            <?php foreach ($worktime['time'] as $time ): ?>
                            <tr>
                                <td><i><?php echo $time['day']; ?></i></td>
                                <td><?php echo $time['hours']; ?></td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                    </div>
                </div>

                <div class="col">
                    <a href="#" class="link">
                        <i class="icon-calendar"></i><span><?php echo $deposit['title']; ?></span>
                    </a>
                    <div class="link-drop">
                        <h5 class="link-drop-title"><i class="icon-calendar"></i><?php echo $deposit['title']; ?></h5>
                        <?php echo $deposit['text']; ?>
                        <p class="text-right"><a href="<?php echo $deposit['btn-link']; ?>" class="btn btn-sm btn-hover-fill"><?php echo $deposit['btn-text']; ?></a></p>
                    </div>
                </div>

                <div class="col">
                    <a href="#" class="link">
                        <i class="icon-price-tag"></i><span><?php echo $prices['title']; ?></span>
                    </a>
                    <div class="link-drop">
                        <h5 class="link-drop-title"><i class="icon-price-tag"></i><?php echo $prices['title']; ?></h5>
                        <table class="row-table">
                            <?php foreach ($prices['prices-table'] as $price) {
                                $price = get_field('offer', $price);
                                if(empty($price['treatment-type']) || empty($price['price'])){
                                    continue;
                                }
                                echo '<tr>';
                                echo '<td>'.$price['treatment-type'].'</td>';
                                echo '<td>£'.$price['price'].'</td>';
                                echo '</tr>';
                            } ?>
                        </table>
                        <!--<p class="text-right mt-15"><a href="prices.html" class="btn btn-sm btn-hover-fill">Calculator</a><a href="prices.html" class="btn btn-sm btn-hover-fill">Details</a></p>-->
                    </div>
                </div>

                <div class="col">
                    <a href="#" class="link">
                        <i class="icon-emergency-call"></i><span><?php echo $contact['title']; ?></span></a>
                    <div class="link-drop">
                        <h5 class="link-drop-title"><i class="icon-emergency-call"></i><?php echo $contact['title']; ?></h5>
                        <?php echo $contact['text']; ?>
                        <ul class="icn-list">
                            <li>
                                <i class="icon-telephone"></i><span class="phone">
                                    <?php foreach ($contact['phones'] as $key => $phone){
                                        $phone = $phone['number'];
                                        echo $phone;
                                        if(!empty($contact['phones'][$key+1])) echo '<br>';
                                    }?>
                                </span>
                            </li>
                            <li><i class="icon-black-envelope"></i><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></li>
                        </ul>
                        <p class="text-right mt-2"><a href="<?php echo $contact['btn-link']; ?>" class="btn btn-sm btn-hover-fill"><?php echo $contact['btn-text']; ?></a></p>
                    </div>
                </div>

                <div class="col col-close"><a href="#" class="js-quickLinks-close"><i class="icon-top" data-toggle="tooltip" data-placement="top" title="Close panel"></i></a></div>
            </div>
        </div>
        <div class="quickLinks-open js-quickLinks-open"><span data-toggle="tooltip" data-placement="left" title="Open panel">+</span></div>
    </div>
</div>
<!--//Widget-->
