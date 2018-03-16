<?php

// scripts

function scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js');
	wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css' );
}

add_action( 'wp_enqueue_scripts', 'scripts' );


// customizer

add_action( 'customize_register', 'supesu_customizer_settings' );
function supesu_customizer_settings( $wp_customize ) {

	// logo

	$wp_customize->add_setting( 'logo', array(
		'type' => 'option',
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_control(  new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => 'Upload a logo',
		'section' => 'title_tagline',
	) ) );

	// colours

	$wp_customize->add_section( 'site_colours' , array(
    'title' => 'Colours',
    'priority' => 40,
	) );

	// heading colour

	$wp_customize->add_setting( 'heading_colour' , array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'heading_colour', array(
		'section' => 'site_colours',
		'settings' => 'heading_colour',
		'label' => 'Heading Colour',
	) ) );

	// subheading colour

	$wp_customize->add_setting( 'subheading_colour' , array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'subheading_colour', array(
		'section' => 'site_colours',
		'settings' => 'subheading_colour',
		'label' => 'Subheading Colour',
	) ) );

	// link colour

	$wp_customize->add_setting( 'link_colour' , array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'link_colour', array(
		'section' => 'site_colours',
		'settings' => 'link_colour',
		'label' => 'Link Colour',
	) ) );

	// button colour

	$wp_customize->add_setting( 'button_colour' , array(
    'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'button_colour', array(
		'section' => 'site_colours',
		'settings' => 'button_colour',
		'label' => 'Button Colour',
	) ) );

	// social icons

  $wp_customize->add_section( 'social_settings', array(
      'title' => __( 'Social Media'),
      'priority' => 60,
  ));

  $social_sites = supesu_get_social_icons();
  $priority = 5;

  foreach( $social_sites as $social_site ) {

      $wp_customize->add_setting( "$social_site", array(
          'type' => 'theme_mod',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'esc_url_raw',
      ));

      $wp_customize->add_control( $social_site, array(
          'label' => ucwords( __( "$social_site URL:", 'social_icon' ) ),
          'section' => 'social_settings',
          'type' => 'text',
          'priority' => $priority,
      ));

      $priority += 5;
  }

	// remove

	$wp_customize->remove_section( 'custom_css' );
	$wp_customize->remove_section( 'static_front_page' );

}

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
         'email'
     );
 return $social_sites;
}

function supesu_social_icons() {
     $social_sites = supesu_get_social_icons();

     foreach( $social_sites as $social_site ) {
         if ( strlen( get_theme_mod( $social_site ) ) > 0 ) {
             $active_sites[] = $social_site;
         }
     }

     if ( !empty( $active_sites ) ) {
         echo "<ul class='social-media-icons'>";

         foreach ( $active_sites as $active_site ) { ?>

             <li>
             <a href="<?php echo get_theme_mod( $active_site ); ?>">
             <?php if( $active_site == 'facebook' ) { ?>
                 <i class="fa fa-<?php echo $active_site; ?>-square"></i> <?php
             } else if( $active_site == 'email' ) { ?>
                 <i class="fa fa-envelope"></i> <?php
             } else { ?>
                 <i class="fa fa-<?php echo $active_site; ?>"></i> <?php
             } ?>
             </a>
             </li> <?php
         }
         echo "</ul>";
     }
}

add_action( 'wp_head', 'supesu_customizer_css');
function supesu_customizer_css()
{
	?>
		<style type="text/css">

		/* heading colour */

			h2{
				color: <?php echo get_theme_mod('heading_colour', '#000000'); ?>;
			}

		/* subheading colour */

			h4{
				color: <?php echo get_theme_mod('subheading_colour', '#000000'); ?>;
			}

		/* link colour */

			p a,
			.overlay-content ul li.menu-item a,
			#comments li.comment .reply a,
			.social-media-icons li a{
				color: <?php echo get_theme_mod('link_colour', '#000000'); ?>;
			}

		/* button colour */

			.content_wrap .wp-block-button .wp-block-button__link,
			.content_wrap .wp-block-button .wp-block-button__link a,
			.button, .button input,
			.button a, .button input a{
				color: <?php echo get_theme_mod('button_colour', '#000000'); ?>;
			}

			.content_wrap .wp-block-button .wp-block-button__link:hover,
			.button:hover, .button input:hover{
				background: <?php echo get_theme_mod('button_colour', '#000000'); ?>;
				border: 1px solid <?php echo get_theme_mod('button_colour', '#000000'); ?>;
			}

			#comments #respond .button{
				background: <?php echo get_theme_mod('button_colour', '#000000'); ?>;
			}
		</style>
	<?php
}

// theme support

add_action( 'after_setup_theme', 'supesu_functions' );
function supesu_functions() {

    add_theme_support( 'title-tag' );

		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'custom-background' );

		add_theme_support( 'post-thumbnails' );

}

// comment reply

if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

// content width

if ( ! isset( $content_width ) )
	$content_width = 860;

// rearrange comment fields

function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

?>
