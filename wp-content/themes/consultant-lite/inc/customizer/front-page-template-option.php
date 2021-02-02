<?php
/**
 * Header Option
 *
 * @package Consultant Lite
 */

// Add Theme Options Homepage Panel.
$wp_customize->add_panel( 'homepage_option_panel',
	array(
		'title'      => esc_html__( 'Front/Home Page Template Options', 'consultant-lite' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

require get_template_directory() . '/inc/customizer/slider.php';
require get_template_directory() . '/inc/customizer/about.php';
require get_template_directory() . '/inc/customizer/service.php';
require get_template_directory() . '/inc/customizer/call-to-action.php';
require get_template_directory() . '/inc/customizer/blog.php';
require get_template_directory() . '/inc/customizer/contact.php';
require get_template_directory() . '/inc/customizer/portfolio.php';
require get_template_directory() . '/inc/customizer/testimonial.php';
require get_template_directory() . '/inc/customizer/selected-page-content.php';