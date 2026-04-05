<?php
$telefon = get_field('telefony', 'options')[0];
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
$googleMapKey = get_field('adres', 'options')['google-map-key'];
if(empty($googleMapKey)){
    $googleMapKey = "XXXXXXXXXXXXXXXXXXXX";
}
$priceIDDepo = get_field('price-id-depo', 'options');
$priceIDOnline = get_field('price-id-online', 'options');
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php is_home() ? bloginfo('description') : wp_title('|', true, 'right'); ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!-- /Google Fonts -->
    <!-- Google map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $googleMapKey; ?>"></script>
    <!-- /Google map -->
    <!-- Stripe Script -->
    <script src="https://js.stripe.com/v3"></script>
    <!-- /Stripe Script -->

    <!-- Wp head -->

    <?php wp_head(); ?>

    <!-- /Wp head -->
</head>

<body <?php body_class(); ?>>

<!--header-->
<header class="header" id="header">
    <div class="header-quickLinks js-header-quickLinks d-lg-none">
        <div class="quickLinks-top js-quickLinks-top"></div>
        <div class="js-quickLinks-wrap-m">
        </div>
    </div>
    <div class="header-topline d-none d-lg-flex">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto d-flex align-items-center">
                    <div class="header-phone"><i class="icon-telephone"></i><a href="tel:<?php echo $telefon['telefon-link']; ?>"><?php echo $telefon['telefon']; ?></a></div>
                    <div class="header-info"><i class="icon-placeholder2"></i><a href="/kontakt"><?php echo $lokalizacja; ?></a></div>
                    <div class="header-info"><i class="icon-black-envelope"></i><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></div>
                </div>
                <div class="col-auto ml-auto d-flex align-items-center">
                    <!--<a href="" class="btn btn-light"><i class="fas fa-calendar-check"></i><span>Umów wizytę online</span></a>-->
                    <?php
                    $short1 = do_shortcode('[wp_stripe_checkout_v3 price="price_1IfdEtEcRtYhAWcQV3Fa4p17" button_text="123&&Umów wizytę online"]');
                    $short2 = do_shortcode('[wp_stripe_checkout_v3 price="price_1IfdE7EcRtYhAWcQetWfzSxE" button_text="123&&Wpłać depozyt"]');
                    //$short1 = do_shortcode('[wp_stripe_checkout_v3 price="'.$priceIDOnline.'" button_text="123&&Umów wizytę online"]');
                    //$short2 = do_shortcode('[wp_stripe_checkout_v3 price="'.$priceIDDepo.'" button_text="123&&Wpłać depozyt"]');
                    $slice1 = explode('>123&&',$short1);
                    $slice2 = explode('>123&&',$short2);
                    $btn1 = $slice1[0].' class="btn btn-light mr-1">'.$slice1[1];
                    $btn2 = $slice2[0].' class="btn btn-light">'.$slice2[1];
                    echo $btn1.' '.$btn2;
                    ?>
                    <!--<a href="" class="btn btn-light"><span>Wpłać depozyt</span></a>-->
                </div>
            </div>
        </div>
    </div>
    <div class="header-content">
        <div class="container">
            <div class="row align-items-lg-center">
                <button class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbarNavDropdown">
                    <span class="icon-menu"></span>
                </button>
                <div class="col-lg-auto col-lg-2 d-flex align-items-lg-center" style="position: static">

                    <?php zsz_the_logo('/','header-logo'); ?>

                </div>
                <div class="col-lg ml-auto header-nav-wrap" style="position: static">
                    <div class="header-nav js-header-nav">
                        <nav class="navbar navbar-expand-lg btco-hover-menu">
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <!-- Main Manu -->
                                <?php zsz_the_main_menu();?>
                                <!-- /Main Menu -->
                            </div>
                        </nav>
                    </div>

                    <!-- Ikony -->
                    <?php get_search_form()?>
                    <div class="header-icons">
                        <a href="<?php echo $facebookLink; ?>" class="icon icon-facebook-logo-circle" target="_blank" rel="nofollow"></a>
                    </div>
                    <div class="header-lang lang-toggler">
                        <div class="header-lang-dropdown">
                        <!--<a href="#" class="icon icon-globe1"></a>

                            <ul>
                                <li><a href="#"><span class="header-lang-flag"><img src="<?php /*echo get_template_directory_uri() */?>/assets/img/flag/flag_en.png" alt=""></span><span>English</span></a></li>
                                <li><a href="#"><span class="header-lang-flag"><img src="<?php /*echo get_template_directory_uri() */?>/assets/img/flag/flag_fr.png" alt=""></span><span>French</span></a></li>
                                <li><a href="#"><span class="header-lang-flag"><img src="<?php /*echo get_template_directory_uri() */?>/assets/img/flag/flag_de.png" alt=""></span><span>Denmark</span></a></li>
                                <li><a href="#"><span class="header-lang-flag"><img src="<?php /*echo get_template_directory_uri() */?>/assets/img/flag/flag_ru.png" alt=""></span><span>Russian</span></a></li>
                            </ul>
                        --></div>
                    </div>
                    <!-- /Ikony -->

                </div>
            </div>
        </div>
    </div>
</header>
<!--//header-->