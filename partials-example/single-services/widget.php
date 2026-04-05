<?php
$worktime = get_field('worktime', 'options');
$contact = get_field('contact', 'options');
?>
<div class="row d-flex flex-column flex-sm-row flex-md-column mb-3">
    <div class="col-auto col-sm col-md-auto">
        <div class="contact-box contact-box-1">
            <h5 class="contact-box-title"><?php echo $worktime['title']; ?></h5>
            <ul class="icn-list">
                <li><i class="icon-clock"></i>
                <?php foreach ($worktime['time'] as $time ): ?>
                    <?php echo $time['day']; ?> <?php echo $time['hours']; ?><br>
                <?php endforeach;?>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-auto col-sm col-md-auto">
        <div class="contact-box contact-box-2">
            <h5 class="contact-box-title"><?php echo $contact['title']; ?></h5>
            <ul class="icn-list">

                <li>
                    <i class="icon-telephone"></i>
                    <div class="d-flex flex-wrap">
                        <span>Phone:&nbsp;&nbsp;</span>
                            <span>
                                    <?php foreach ($contact['phones'] as $key => $phone){
                                        $phone = $phone['number'];
                                        echo $phone;
                                        if(!empty($contact['phones'][$key+1])) echo '<br>';
                                    }?>
                            </span>
                    </div>
                </li>
                <li><i class="icon-black-envelope"></i><a href="mailto:<?php echo $contact['email']; ?>"><?php echo $contact['email']; ?></a></li>
            </ul>
        </div>
    </div>
</div>
