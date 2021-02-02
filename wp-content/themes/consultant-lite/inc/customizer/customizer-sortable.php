<?php
/**
* Customizer Sortable Options.
*
* @package consultant-lite
*/

$consultant_lite_default = consultant_lite_get_default_theme_options();
	
$wp_customize->add_section( 'consultant_lite_customizer_sections_reorder',
	array(
	'title'      => esc_html__( 'Homepage Sections Rearrange', 'consultant-lite' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'homepage_option_panel',
	)
);

// Home Section Reorder.
$wp_customize->add_setting('customizer_section_reorder_1',
    array(
        'default' => $consultant_lite_default['customizer_section_reorder_1'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'consultant_lite_sortable_sanitize',
    )
);

$wp_customize->add_control( 
	new Consultant_Lite_Customizer_Sections_Sortable_Control (
		$wp_customize, 'customizer_section_reorder_1', array(
			'label'               => esc_html__( 'Home Sections Rorder', 'consultant-lite' ),
			'description'         => esc_html__( 'Drag & Drop and Reorder customizer sections.', 'consultant-lite' ),
			'section'             => 'consultant_lite_customizer_sections_reorder',
			'type'                => 'sortable',
			'choices'			  => consultant_lite_customizer_sortable_options(),
		)
	)
);