<?php
/**
 * Sample implementation of the Custom Header feature.
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 * @package steady blogging
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses steady_blogging_header_style()
 */
function steady_blogging_custom_header_setup() {
	add_theme_support( 'custom-logo', array(
		'width'       => 155,
		'height'      => 44,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
		) );
	add_theme_support( 'custom-header', array(
		'default-text-color'	=> 'fff',
		'width'					=> 1400,
		'height'				=> 500,
		'flex-width'			=> true,
		'flex-height'			=> true,
		'wp-head-callback'		=> 'steady_blogging_header_style',
		) );
}
add_action( 'after_setup_theme', 'steady_blogging_custom_header_setup' );

if ( ! function_exists( 'steady_blogging_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog.
 *
 * @see steady_blogging_custom_header_setup().
 */
function steady_blogging_header_style() {
	$header_text_color = get_header_textcolor();
	$header_image = get_header_image();

	if ( empty( $header_image ) && $header_text_color == get_theme_support( 'custom-header', 'default-text-color' ) ){
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	#site-header {
		background-image: url(<?php header_image(); ?>);
		background-size: cover;
	}

	<?php if ( ! display_header_text() ) : ?>
	.site-title,
	.site-description,
	.site-logo {
		position: absolute;
		clip: rect(1px, 1px, 1px, 1px);
	}
	<?php else : ?>
	.site-branding .site-title,
	.site-branding .site-description,
	.primary-navigation.header-activated #navigation .site-logo a{
		color: #<?php echo esc_attr( $header_text_color ); ?>;
	}
	<?php endif; ?>
	</style>
	<?php
}
endif;
