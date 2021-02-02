<?php
/**
 * selected page section
 *
 * @package consultant-lite
 */

$consultant_lite_default = consultant_lite_get_default_theme_options();

// selected page Section.
$wp_customize->add_section( 'selected_page_section',
    array(
        'title'      => __( 'Selected Page Section', 'consultant-lite' ),
        'priority'   => 100,
        'capability' => 'edit_theme_options',
        'panel'      => 'homepage_option_panel',
    )
);


// Setting - show-selected-page-template-section.
$wp_customize->add_setting( 'show_selected_page_content_on_homepage',
    array(
        'default'           => $consultant_lite_default['show_selected_page_content_on_homepage'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control( 'show_selected_page_content_on_homepage',
    array(
        'label'    => __( 'Display Selected Page', 'consultant-lite' ),
        'section'  => 'selected_page_section',
        'type'     => 'checkbox',
        'priority' => 100,
    )
);

// Setting - show-selected-page-title.
$wp_customize->add_setting( 'show_selected_page_title',
    array(
        'default'           => $consultant_lite_default['show_selected_page_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'consultant_lite_sanitize_checkbox',
    )
);
$wp_customize->add_control( 'show_selected_page_title',
    array(
        'label'    => __( 'Enable Selected Page title', 'consultant-lite' ),
        'section'  => 'selected_page_section',
        'type'     => 'checkbox',
        'priority' => 100,
    )
);