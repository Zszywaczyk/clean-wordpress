<?php
$args = [
    'post_type'      => 'zsz_services',
    'numberposts'    => 5,
    'orderby'       => 'post__in',
];
$services = get_posts( $args );
$telefony = get_field('telefony', 'options');
$telefon = $telefony[0];
if(empty($telefon)){
    $telefon['telefon'] = "+XX XXX XXX XXX";
    $telefon['telefon-link'] = "+XXXXXXXXXXX";
}
$email = get_field('email', 'options');
if(empty($email)){
    $email = "example@example.com";
}
$lokalizacja = get_field('lokalizacja', 'options');
if(empty($lokalizacja)){
    $lokalizacja = "Przykład lokalizacji, ul. ...";
}
$facebookLink = get_field('facebook-link', 'options');
if(empty($facebookLink)){
    $facebookLink = "https://facebook.com/example/example/example";
}
$adress = get_field('adres', 'options');
$googleMap = $adress['google-map'];
$googleMapKey = $adress['google-map-key'];
if(empty($googleMapKey)){
    $googleMapKey = "XXXXXXXXXXXXXXXXXXXX";
}
$cf7Short = get_field('left-col', 'options')['cf7-short'];
?>
<!--footer-->
<div class="footer mt-0">
    <div class="container">
        <div class="row py-1 py-md-2 px-lg-0">
            <div class="col-lg-4 footer-col1">
                <div class="row flex-column flex-md-row flex-lg-column">
                    <div class="col-md col-lg-auto">

                        <?php zsz_the_logo('#header','footer-logo');?>

                        <div class="mt-2 mt-lg-0"></div>
                        <div class="footer-social d-none d-md-block d-lg-none">
                            <a href="<?php echo $facebookLink; ?>" target="_blank" class="hovicon" rel="nofollow"><i class="icon-facebook-logo"></i></a>
                            <!--<a href="https://www.twitter.com/" target="blank" class="hovicon"><i class="icon-twitter-logo"></i></a>
                            <a href="https://plus.google.com/" target="blank" class="hovicon"><i class="icon-google-logo"></i></a>
                            <a href="https://www.instagram.com/" target="blank" class="hovicon"><i class="icon-instagram"></i></a>-->
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="footer-text mt-1 mt-lg-2">

                            <p>To receive email releases, simply provide
                                <br>us with your email below</p>
                            <?php echo do_shortcode($cf7Short);?>
                        </div>
                        <div class="footer-social d-md-none d-lg-block">
                            <a href="<?php echo $facebookLink; ?>" target="_blank" class="hovicon" rel="nofollow"><i class="icon-facebook-logo"></i></a>
                            <!--<a href="https://www.twitter.com/" target="blank" class="hovicon"><i class="icon-twitter-logo"></i></a>
                            <a href="https://plus.google.com/" target="blank" class="hovicon"><i class="icon-google-logo"></i></a>
                            <a href="https://www.instagram.com/" target="blank" class="hovicon"><i class="icon-instagram"></i></a>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <h3>Oferta</h3>
                <div class="h-decor"></div>
                <?php foreach ($services as $service){
                    echo '<div class="footer-post-title footer-post d-flex">';
                    echo '<a href="'.get_permalink($service).'">'.$service->post_title.'</a>';
                    echo '</div>';
                }?>

            </div>
            <div class="col-sm-6 col-lg-4">
                <h3>Kontakt</h3>
                <div class="h-decor"></div>
                <ul class="icn-list">
                    <li><i class="icon-placeholder2"></i><?php echo $lokalizacja; ?>
                        <br>
                        <a href="contact.html" class="btn btn-xs btn-gradient"><i class="icon-placeholder2"></i><span>Sprawdź dojazd</span><i class="icon-right-arrow"></i></a>
                    </li>
                    <li>
                        <i class="icon-telephone"></i>
                        <b>
                            <span class="phone">
                                <?php
                                foreach ($telefony as $key => $tel){
                                    if( isset($telefony[$key+1]) ){
                                        echo '<span class="text-nowrap"><a href="tel:'.$tel['telefon-link'].'">'.$tel['telefon'].'</a></span>,';
                                    }
                                    else{
                                        echo '<span class="text-nowrap"><a href="tel:'.$tel['telefon-link'].'">'.$tel['telefon'].'</a></span>';
                                    }
                                }
                                ?>
                            </span>
                        </b>
                        <!--<br>(24/7 General inquiry)-->
                    </li>
                    <li><i class="icon-black-envelope"></i><a href="mailto:info@dentco.net"><?php echo $email?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row text-center text-md-left">
                <div class="col-sm">Copyright © 2021 <a href="/"><?php echo get_bloginfo('name');?></a><span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>
                    <a href="/polityka-prywatnosci">Polityka Prywatności</a></div>
                <div class="col-sm-auto ml-auto"><span class="d-none d-sm-inline">Telefon alarmowy&nbsp;&nbsp;&nbsp;</span><i class="icon-telephone"></i>&nbsp;&nbsp;<a href="tel:<?php echo $telefon['telefon-link'];?>"><b><?php echo $telefon['telefon']; ?></b></a></div>
            </div>
        </div>
    </div>
</div>
<!--//footer-->
<div class="backToTop js-backToTop">
    <i class="icon icon-up-arrow"></i>
</div>
<div class="modal modal-form modal-form-sm fade" id="modalQuestionForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <button aria-label='Close' class='close' data-dismiss='modal'>
                <i class="icon-error"></i>
            </button>
            <div class="modal-body">
                <div class="modal-form">
                    <h3>Ask a Question</h3>
                    <form class="mt-15" id="questionForm" method="post" novalidate>
                        <div class="successform">
                            <p>Your message was sent successfully!</p>
                        </div>
                        <div class="errorform">
                            <p>Something went wrong, try refreshing and submitting the form again.</p>
                        </div>
                        <div class="input-group">
								<span>
								<i class="icon-user"></i>
							</span>
                            <input type="text" name="name" class="form-control" autocomplete="off" placeholder="Your Name*" />
                        </div>
                        <div class="input-group">
								<span>
									<i class="icon-email2"></i>
								</span>
                            <input type="text" name="email" class="form-control" autocomplete="off" placeholder="Your Email*" />
                        </div>
                        <div class="input-group">
								<span>
									<i class="icon-smartphone"></i>
								</span>
                            <input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Your Phone" />
                        </div>
                        <textarea name="message" class="form-control" placeholder="Your comment*"></textarea>
                        <div class="text-right mt-2">
                            <button type="submit" class="btn btn-sm btn-hover-fill">Ask Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-form fade" id="modalBookingForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <button aria-label='Close' class='close' data-dismiss='modal'>
                <i class="icon-error"></i>
            </button>
            <div class="modal-body">
                <div class="modal-form">
                    <h3>Book an Appointment</h3>
                    <form class="mt-15" id="bookingForm" method="post" novalidate>
                        <div class="successform">
                            <p>Your message was sent successfully!</p>
                        </div>
                        <div class="errorform">
                            <p>Something went wrong, try refreshing and submitting the form again.</p>
                        </div>
                        <div class="input-group">
								<span>
								<i class="icon-user"></i>
							</span>
                            <input type="text" name="bookingname" class="form-control" autocomplete="off" placeholder="Your Name*" />
                        </div>
                        <div class="row row-xs-space mt-1">
                            <div class="col-sm-6">
                                <div class="input-group">
										<span>
											<i class="icon-email2"></i>
										</span>
                                    <input type="text" name="bookingemail" class="form-control" autocomplete="off" placeholder="Your Email*" />
                                </div>
                            </div>
                            <div class="col-sm-6 mt-1 mt-sm-0">
                                <div class="input-group">
										<span>
											<i class="icon-smartphone"></i>
										</span>
                                    <input type="text" name="bookingphone" class="form-control" autocomplete="off" placeholder="Your Phone" />
                                </div>
                            </div>
                        </div>
                        <div class="row row-xs-space mt-1">
                            <div class="col-sm-6">
                                <div class="input-group">
										<span>
											<i class="icon-birthday"></i>
										</span>
                                    <input type="text" name="bookingage" class="form-control" autocomplete="off" placeholder="Your age" />
                                </div>
                            </div>
                        </div>
                        <div class="selectWrapper input-group mt-1">
								<span>
									<i class="icon-tooth"></i>
								</span>
                            <select name="bookingservice" class="form-control">
                                <option selected="selected" disabled="disabled">Select Service</option>
                                <option value="Cosmetic Dentistry">Cosmetic Dentistry</option>
                                <option value="General Dentistry">General Dentistry</option>
                                <option value="Orthodontics">Orthodontics</option>
                                <option value="Children`s Dentistry">Children`s Dentistry</option>
                                <option value="Dental Implants">Dental Implants</option>
                                <option value="Dental Emergency">Dental Emergency</option>
                            </select>
                        </div>
                        <div class="input-group flex-nowrap mt-1">
								<span>
									<i class="icon-calendar2"></i>
								</span>
                            <div class="datepicker-wrap">
                                <input name="bookingdate" type="text" class="form-control datetimepicker" placeholder="Date" readonly>
                            </div>
                        </div>
                        <div class="input-group flex-nowrap mt-1">
								<span>
									<i class="icon-clock"></i>
								</span>
                            <div class="datepicker-wrap">
                                <input name="bookingtime" type="text" class="form-control timepicker" placeholder="Time">
                            </div>
                        </div>
                        <textarea name="bookingmessage" class="form-control" placeholder="Your comment"></textarea>
                        <div class="text-right mt-2">
                            <button type="submit" class="btn btn-sm btn-hover-fill">Book now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Google map options
    var googleMapOption = {
        latitude: <?php echo $googleMap['lat']?>,
        longitude: <?php echo $googleMap['lng']?>,
        zoom: 14,
        marker: [
            ['Your Location', <?php echo $googleMap['lat']?>, <?php echo $googleMap['lng']?>, 1, '<?php echo get_template_directory_uri(); ?>/assets/img/map-marker.png']
        ]
    }
</script>
<?php wp_footer(); ?>

</body>

</html>
