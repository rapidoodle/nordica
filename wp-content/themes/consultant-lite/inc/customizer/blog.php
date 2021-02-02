<?php
/**
 * Blog section
 *
 * @package Consultant Lite
 */

$consultant_lite_default = consultant_lite_get_default_theme_options();

// Latest Blog Section.
$wp_customize->add_section( 'latest_blog_section_settings',
	array(
		'title'      => __( 'Latest Blog Section', 'consultant-lite' ),
		'priority'   => 90,
		'capability' => 'edit_theme_options',
		'panel'      => 'homepage_option_panel',
	)
);

// Setting - show_blog_section.
$wp_customize->add_setting( 'show_blog_section',
	array(
		'default'           => $consultant_lite_default['show_blog_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_blog_section',
	array(
		'label'    => __( 'Enable Blog', 'consultant-lite' ),
		'section'  => 'latest_blog_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - main_title_blog_section.
$wp_customize->add_setting( 'main_title_blog_section',
	array(
		'default'           => $consultant_lite_default['main_title_blog_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'main_title_blog_section',
	array(
		'label'    => __( 'Section Title', 'consultant-lite' ),
		'section'  => 'latest_blog_section_settings',
		'type'     => 'text',
		'priority' => 100,

	)
);

/*content excerpt in blog*/
$wp_customize->add_setting( 'number_of_excerpt_home_blog',
	array(
		'default'           => $consultant_lite_default['number_of_excerpt_home_blog'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'consultant_lite_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'number_of_excerpt_home_blog',
	array(
		'label'    => __( 'No words of blog', 'consultant-lite' ),
		'section'  => 'latest_blog_section_settings',
		'type'     => 'number',
		'priority' => 110,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

// Setting - drop down category for blog.
$wp_customize->add_setting( 'select_category_for_blog',
	array(
		'default'           => $consultant_lite_default['select_category_for_blog'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Consultant_Lite_Dropdown_Taxonomies_Control( $wp_customize, 'select_category_for_blog',
	array(
        'label'           => __( 'Category For blog Section', 'consultant-lite' ),
        'description'     => __( 'If category is selected the latest post from category will be published', 'consultant-lite' ),
        'section'         => 'latest_blog_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 230,
    ) ) );