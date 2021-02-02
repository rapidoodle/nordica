<?php 
/**
 * Consultant Lite Theme Customizer.
 *
 * @package Consultant Lite
 */

//customizer core option
require get_template_directory() . '/inc/customizer/custom-customizer-library/customizer-option.php';

//customizer 
require get_template_directory() . '/inc/customizer/custom-customizer-library/default.php';
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function consultant_lite_customize_register( $wp_customize ) {

	// Load custom controls.
	require get_template_directory() . '/inc/customizer/custom-customizer-library/control.php';

	// Load customize sanitize.
	require get_template_directory() . '/inc/customizer/custom-customizer-library/sanitize.php';

	// Load customize callback.
	require get_template_directory() . '/inc/customizer/custom-customizer-library/callback.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	
	/*theme option panel details*/
	require get_template_directory() . '/inc/customizer/front-page-template-option.php';	
	require get_template_directory() . '/inc/customizer/customizer-sortable.php';	
	require get_template_directory() . '/inc/customizer/theme-option.php';	

	// Register custom section types.
	$wp_customize->register_section_type( 'Consultant_Lite_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Consultant_Lite_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Consultant Lite Pro', 'consultant-lite' ),
				'pro_text' => esc_html__( 'Buy Now', 'consultant-lite' ),
				'pro_url'  => 'http://www.thememattic.com/theme/consultant-lite-pro/',
				'priority'  => 1,
			)
		)
	);
}
add_action( 'customize_register', 'consultant_lite_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since 1.0.0
 */
function consultant_lite_customize_preview_js() {

	wp_enqueue_script( 'consultant_lite_customizer', get_template_directory_uri() . '/lib-tm/customizer.js', array( 'customize-preview' ), '20130508', true );

}
add_action( 'customize_preview_init', 'consultant_lite_customize_preview_js' );


function consultant_lite_customizer_panel() {
	wp_enqueue_script('consultant_lite_customize_admin_js', get_template_directory_uri().'/lib-tm/admin.js', array('customize-controls'));

	wp_enqueue_style( 'consultant_lite_customize_controls', get_template_directory_uri() . '/lib-tm/customizer-admin.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'consultant_lite_customizer_panel',0 );
