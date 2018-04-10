<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
        <?php global $mytheme; ?>
	</head>
	<body <?php body_class(); ?>>
    <div id="custom-my-overlay"></div>
    <div class="contact-stripe" style="background:<?php echo $mytheme['header-background-img']['background-color'];?>">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 text-right">
                    <div class="phone"><a href="tel:<?php echo $mytheme['telephone-text'];?>"><?php echo $mytheme['telephone-text'];?></a> </div>
                    <div class="address"><?php echo $mytheme['adress-street-text'].$mytheme['adress-city-text'];?></div>
                </div>
            </div>
        </div>
    </div>
	<!-- wrapper -->
	<div class="wrapper">
		<header class="header" role="banner">
			<div id="navigation"  class="">
                <div class="row">
                    <div class="search-wrap">
                        <div class="col-lg-offset-1 col-sm-3 logo-wrap"><a href="<?php echo get_home_url(); ?>"><img src="<?php echo $mytheme['logo-header-general']['url'];?>" /></a> </div>
                        <div class="col-sm-5 col-xs-9">
                           <?php get_search_form(true); ?>
                        </div>
                        <div class="col-sm-2 col-xs-3">
                            <div class="minicart-wrap">
                                <?php $quantityInCart=WC()->cart->get_cart_item_quantities();//GET QUANTITY ITEMS TO VIEW IN SHORT-CART_BUTTON ?>
                                <a class="btn-minicart" href="<?php echo wc_get_cart_url();?>"><img src="<?php echo $mytheme['cart-img']['url'];?>"/><span class="items-count" id="minicart-quantity"><?php if($quantityInCart==null) echo 0; else echo array_sum($quantityInCart);?></span> </a>
                                <!--    -->
                                <div class="col-sm-5 col-xs-3 user-customer"><?php echo do_action('my_show_user');?></div>
                                <!--    -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main-nav-wrap">
                    <nav class="navbar custom-nav" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" id="clicked-show-menu">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <?php my_nav(); ?>
                            </div>
                            <div class="mobile"><?php my_nav(); ?></div>
                        </div>
                    </nav>
                </div>


		</header>				
