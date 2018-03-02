<!doctype html>
<!--[if lt IE 7 ]> <html class="ie6 ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href="https://fonts.googleapis.com/css?family=Barlow:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

	<script src="https://use.fontawesome.com/b5f17446fa.js"></script>

	<?php wp_head(); //leave for plugins ?>

</head>

<body <?php body_class(); ?>>

	<div class="header">
			<?php $logo = get_option('logo') ?>
			<div class="logo left">
				<a href="<?php echo get_home_url(); ?>"><img src="<?php echo esc_url($logo) ?>" alt="<?php bloginfo('name'); ?>"></a>
			</div>

			<div class="hamburger right">
				<div class="bar"></div>
			</div>

			<div id="res-nav" class="overlay">
				<div class="overlay-content">
					<div class="mobile-menu" id="menu">
						<?php wp_nav_menu(array('theme_location' => 'top', 'container' => 0, 'menu_id' => 'menuUl' )); ?>
					</div>
				</div>
			</div>
	</div>
