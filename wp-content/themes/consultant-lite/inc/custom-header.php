<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Consultant_Lite
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses consultant_lite_header_style()
 */
function consultant_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'consultant_lite_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'consultant_lite_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'consultant_lite_custom_header_setup' );

if ( ! function_exists( 'consultant_lite_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see consultant_lite_custom_header_setup().
	 */
	function consultant_lite_header_style() {
		$header_text_color = get_header_textcolor();
		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.tm-main-header .site-branding .site-title a,
			.tm-main-header .site-branding .site-title a:visited,
			.tm-main-header .tm-site-features .tm-address-section,
			.tm-main-header .tm-site-features .tm-address-section a,
			.tm-main-header .tm-site-features .tm-address-section a:visited,
			.tm-main-header .site-branding{
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
			.tm-main-header .site-branding .site-title a:hover,
			.tm-main-header .tm-site-features .tm-address-section a:hover{
				color: #eee;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
