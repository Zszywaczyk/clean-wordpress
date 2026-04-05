<?php
$contact = get_field('contact');

$adress  = $contact['adres'];
$contactInfo  = $contact['contact-info'];
$workingTimes  = $contact['working-time'];
?>
</div>
</div>
<!--section-->
<div class="section mt-0 bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="title-wrap">
                    <h5><?php echo $adress['title'];?></h5>
                    <div class="h-decor"></div>
                </div>
                <ul class="icn-list-lg">
                    <li><i class="icon-placeholder2"></i>
                        <?php echo $adress['text'];?>
                    </li>
                </ul>
            </div>
            <div class="col-md mt-3 mt-md-0">
                <div class="title-wrap">
                    <h5>Contact Info</h5>
                    <div class="h-decor"></div>
                </div>
                <ul class="icn-list-lg">
                    <li><i class="icon-telephone"></i>
                        Phone:
                        <?php
                        $phones = $contactInfo['phones'];
                            foreach ( $phones as $key => $sI ){
                                if(isset($phones[$key+1])){
                                    echo '<a href="tel:'.$sI['number-link'].'" class=" theme-color text-nowrap">'.$sI['number'].', </a>';
                                }
                                else
                                    echo '<a href="tel:'.$sI['number-link'].'" class=" theme-color text-nowrap">'.$sI['number'].'</a>';
                            }
                        ?>
                    </li>
                    <li><i class="icon-black-envelope"></i><a href="mailto:<?php echo $contactInfo['email']; ?>"><?php echo $contactInfo['email']; ?></a></li>
                </ul>
            </div>
            <div class="col-md mt-3 mt-md-0">
                <div class="title-wrap">
                    <h5>Working Time</h5>
                    <div class="h-decor"></div>
                </div>
                <ul class="icn-list-lg">
                    <li><i class="icon-clock"></i>
                        <div>
                            <?php foreach ($workingTimes['czas'] as $wrkTime ): ?>
                            <div class="d-flex">
                                <span><?php echo $wrkTime['day']; ?></span><span class="theme-color"><?php echo $wrkTime['hours']; ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--//section-->
<div class="container row">
    <div class="col-12">