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

    <!-- Wp head -->
    <?php wp_head(); ?>
    <!-- /Wp head -->
</head>

<body <?php body_class(); ?>>

<!--header-->
<header class="header" id="header">
    <?php zsz_the_logo('/','header-logo'); ?>
    <!-- Main Manu -->
    <?php zsz_the_main_menu();?>
    <!-- /Main Menu -->
</header>
<!--//header-->