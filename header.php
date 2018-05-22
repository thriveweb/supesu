<?php
/**
 * Template to display theme header.
 *
 * @link https://thriveweb.com.au/the-lab/supesu-responsive-wordpress-5-theme/
 *
 * @package Supesu Theme
 * @version 1.0.7
 */

?>

<!doctype html>
<!--[if lt IE 7 ]> <html class="ie6 ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7 ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8 ie" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

	<?php
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div class="header">
			<?php $logo = get_option( 'logo' ) ?>
			<div class="logo left">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $logo ) ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
			</div>

			<div class="hamburger right">
				<div class="bar"></div>
			</div>

			<div id="res-nav" class="overlay">
				<div class="overlay-content">
					<div class="mobile-menu" id="menu">
						<?php wp_nav_menu( array(
							'theme_location' => 'main',
							'container' => 0,
							'menu_id' => 'menuUl',
						) ); ?>
					</div>
				</div>
			</div>
	</div>
