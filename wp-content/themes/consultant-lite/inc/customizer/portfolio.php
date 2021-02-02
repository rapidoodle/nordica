<?php
/**
 * portfolio section
 *
 * @package consultant-lite
 */

$consultant_lite_default = consultant_lite_get_default_theme_options();

// Portfolio Section.
$wp_customize->add_section( 'portfolio_section_settings',
	array(
		'title'      => __( 'Portfolio Section', 'consultant-lite' ),
		'priority'   => 40,
		'capability' => 'edit_theme_options',
		'panel'      => 'homepage_option_panel',
	)
);

// Setting - show_portfolio_section.
$wp_customize->add_setting( 'show_portfolio_section',
	array(
		'default'           => $consultant_lite_default['show_portfolio_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_portfolio_section',
	array(
		'label'    => __( 'Enable portfolio', 'consultant-lite' ),
		'section'  => 'portfolio_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - main_title_portfolio_section.
$wp_customize->add_setting( 'main_title_portfolio_section',
	array(
		'default'           => $consultant_lite_default['main_title_portfolio_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'main_title_portfolio_section',
	array(
		'label'    => __( 'Section Title', 'consultant-lite' ),
		'section'  => 'portfolio_section_settings',
		'type'     => 'text',
		'priority' => 100,

	)
);
/*No of portfolio*/
$wp_customize->add_setting( 'number_of_home_portfolio',
	array(
		'default'           => $consultant_lite_default['number_of_home_portfolio'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_select',
	)
);
$wp_customize->add_control( 'number_of_home_portfolio',
	array(
		'label'    => __( 'Select no of portfolio', 'consultant-lite' ),
        'description'     => __( 'Choose the number of portfolio you wish to show between 1 to 20', 'consultant-lite' ),
		'section'  => 'portfolio_section_settings',
		'type'     => 'number',
		'input_attrs'     => array( 'min' => 1, 'max' => 20, 'style' => 'width: 150px;' ),
		'priority' => 105,
	)
);

$consultant_lite_category_type = 'category';
for ( $consultant_lite_j=1; $consultant_lite_j <=  6 ; $consultant_lite_j++ ) {
	// Setting - drop down category for portfolio.
	$wp_customize->add_setting( 'select_category_for_portfolio_'. $consultant_lite_j,
		array(
			'default'           => $consultant_lite_default['select_category_for_portfolio'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( new Consultant_Lite_Dropdown_Taxonomies_Control( $wp_customize, 'select_category_for_portfolio_'. $consultant_lite_j,
		array(
	        'label'           => __( 'Category For portfolio Section', 'consultant-lite' ) . ' - ' . $consultant_lite_j ,
	        'description'     => __( 'If category is selected the latest post from category will be published', 'consultant-lite' ),
	        'section'         => 'portfolio_section_settings',
	        'type'            => 'dropdown-taxonomies',
	        'taxonomy'        => $consultant_lite_category_type,
			'priority'    	  => 110,
	    ) ) );
}

/*button text*/
$wp_customize->add_setting( 'portfolio_button_text',
	array(
		'default'           => $consultant_lite_default['portfolio_button_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'portfolio_button_text',
	array(
		'label'    		=> __( 'Button Text', 'consultant-lite' ),
		'description'	=> __( 'Removing the text from this section will disable the button on portfolio section', 'consultant-lite' ),
		'section'  		=> 'portfolio_section_settings',
		'type'     		=> 'text',
		'priority' 		=> 120,
	)
);

/*button url*/
$wp_customize->add_setting( 'portfolio_button_link',
	array(
		'default'           => $consultant_lite_default['portfolio_button_link'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'portfolio_button_link',
	array(
		'label'    		=> __( 'URL Link', 'consultant-lite' ),
		'section'  		=> 'portfolio_section_settings',
		'type'     		=> 'text',
		'priority' 		=> 130,
	)
);



