<?php
/**
 * Theme Functions.
 * @package Supesu Theme
 */

function supesu_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'supesu', get_template_directory_uri() . '/js/main.js' );
	wp_enqueue_script( 'fontawesome', get_template_directory_uri() . '/js/fontawesome.js' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_style( 'supesu', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'Barlow', 'https://fonts.googleapis.com/css?family=Barlow:300,300i,400,400i,500,500i,600,600i,700,700i' );
}

	add_action( 'wp_enqueue_scripts', 'supesu_scripts' );

/** Add editor styles.*/
function supesu_add_editor_styles() {
	add_editor_style( get_stylesheet_uri() );
}

	add_action( 'init', 'supesu_add_editor_styles' );

/** Theme customiser tools.*/
function supesu_customizer_settings( $wp_customize ) {

	/** Add custom logo.*/
	$wp_customize->add_setting( 'logo', array(
		'default' => 'image.jpg',
		'type' => 'option',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'esc_url',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
		'label' => __( 'Upload a Logo', 'supesu'),
		'section' => 'title_tagline',
	) ) );

	/** Add custom colours.*/
	$wp_customize->add_section( 'site_colours' , array(
		'title' => __( 'Colours', 'supesu'),
		'priority' => 40,
	) );

	$wp_customize->add_setting( 'heading_colour' , array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_colour', array(
		'section' => 'site_colours',
		'settings' => 'heading_colour',
		'label' => __( 'Heading Colour', 'supesu'),
	) ) );

	$wp_customize->add_setting( 'subheading_colour' , array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'subheading_colour', array(
		'section' => 'site_colours',
		'settings' => 'subheading_colour',
		'label' => __( 'Subheading Colour', 'supesu'),
	) ) );

	$wp_customize->add_setting( 'link_colour' , array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour', array(
		'section' => 'site_colours',
		'settings' => 'link_colour',
		'label' => __( 'Link Colour', 'supesu'),
	) ) );

	$wp_customize->add_setting( 'button_colour' , array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_colour', array(
		'section' => 'site_colours',
		'settings' => 'button_colour',
		'label' => __( 'Button Colour', 'supesu'),
	) ) );

	/** Add custom social icons.*/
	$wp_customize->add_section( 'social_settings', array(
		'title' => __( 'Social Media', 'supesu'),
		'priority' => 60,
	) );

	$social_sites = supesu_get_social_icons();
	$priority = 5;

	foreach ( $social_sites as $social_site ) {

		$wp_customize->add_setting( "$social_site", array(
			'type' => 'theme_mod',
			'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$wp_customize->add_control( $social_site, array(
			'label' => ucwords( "$social_site URL:" ),
			'section' => 'social_settings',
			'type' => 'text',
			'priority' => $priority,
		) );

		$priority += 5;
	}


}

	add_action( 'customize_register', 'supesu_customizer_settings' );

/** Add dynamic sidebar.*/
function supesu_register_sidebars() {
	register_sidebar( array(
		'name' => 'Page Sidebar',
		'id' => 'Page_Sidebar',
		'before_widget' => '<div class="sidebar_widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
}

add_action( 'widgets_init', 'supesu_register_sidebars' );

/** Add social media options.*/
function supesu_get_social_icons() {
	$social_sites = array(
		'twitter',
		'facebook',
		'instagram',
		'youtube',
		'linkedin',
		'google-plus',
		'flickr',
		'pinterest',
		'vimeo',
		'tumblr',
		'dribbble',
		'rss',
		'email',
	);

	return $social_sites;
}

/** Add social media icons.*/
function supesu_social_icons() {
	$social_sites = supesu_get_social_icons();

	foreach ( $social_sites as $social_site ) {
		if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
			$active_sites[] = $social_site;
		}
	}

	if ( ! empty( $active_sites ) ) {
		echo "<ul class='social-media-icons'>";

		foreach ( $active_sites as $active_site ) { ?>
			<li>
				<a href="<?php echo esc_textarea( get_theme_mod( $active_site ) ); ?>">
					<?php if ( $active_site === 'facebook' ) { ?>
					<i class="fa fa-<?php echo $active_site; ?>-square"></i> <?php
} elseif ( $active_site === 'email' ) { ?>
					<i class="fa fa-envelope"></i> <?php
} else { ?>
					<i class="fa fa-<?php echo $active_site; ?>"></i> <?php
} ?>
				</a>
			</li> <?php
		}

		echo '</ul>';

	}
}

/** Add theme customiser CSS.*/
function supesu_customizer_css() {
	?>
		<style type="text/css">

		/** Custom heading colour.*/
			h2{
				color: <?php echo get_theme_mod( 'heading_colour', '#000000' ); ?>;
			}

		/** Custom subheading colour.*/
			h4{
				color: <?php echo get_theme_mod( 'subheading_colour', '#000000' ); ?>;
			}

		/** Custom link colour.*/
			p a,
			.overlay-content ul li.menu-item a,
			#comments li.comment .reply a,
			.social-media-icons li a{
				color: <?php echo get_theme_mod( 'link_colour', '#000000' ); ?>;
			}

		/** Custom link colour. */
			.content_wrap .wp-block-button .wp-block-button__link,
			.content_wrap .wp-block-button .wp-block-button__link a,
			.button, .button input,
			.button a, .button input a{
				color: <?php echo get_theme_mod( 'button_colour', '#000000' ); ?>;
			}

			.content_wrap .wp-block-button .wp-block-button__link:hover,
			.button:hover, .button input:hover{
				background: <?php echo get_theme_mod( 'button_colour', '#000000' ); ?>;
				border: 1px solid <?php echo get_theme_mod( 'button_colour', '#000000' ); ?>;
			}

			#comments #respond .button{
				background: <?php echo get_theme_mod( 'button_colour', '#000000' ); ?>;
			}
		</style>
	<?php
}

	add_action( 'wp_head', 'supesu_customizer_css' );

/** Add theme support.*/
function supesu_functions() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
}

	add_action( 'after_setup_theme', 'supesu_functions' );

/** Custom content width.*/
if ( ! isset( $content_width ) )
	$content_width = 860;

/** Comment reply. */
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

/** Rearrange comment layout.*/
function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

	add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );


/** Custom menu.*/
function supesu_custom_menu() {
	register_nav_menu('main', 'Main Menu');
}

	add_action('init', 'supesu_custom_menu');

?>
