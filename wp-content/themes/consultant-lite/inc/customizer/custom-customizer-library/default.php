<?php
/**
 * Default theme options.
 *
 * @package Consultant Lite
 */

if ( ! function_exists( 'consultant_lite_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function consultant_lite_get_default_theme_options() {

		$defaults = array();

		//header top bar
		$defaults['top_header_location']				        = '';
		$defaults['top_header_telephone']				        = '';
		$defaults['top_header_email']				        	= '';
		$defaults['top_call_to_action_button_title']			= esc_html__( 'Book Appointment', 'consultant-lite' );

		// Slider Section.
		$defaults['show_slider_section']				= 1;
		$defaults['enable_slider_border_svg']			= 1;
		$defaults['select_slider_section_overlay']		= 'pattern-overlay';
		$defaults['number_of_home_slider']				= 3;
		$defaults['number_of_content_home_slider']		= 30;
		$defaults['select_slider_from']					= 'from-category';
		$defaults['select-page-for-slider']				= 1;
		$defaults['select_category_for_slider']			= 0;
		$defaults['button_text_on_slider']				= esc_html__( 'Browse More', 'consultant-lite' );
		
		/*portfolio section*/
		$defaults['show_portfolio_section']				= 1;
		$defaults['number_of_home_portfolio']			= 12;
		$defaults['main_title_portfolio_section']		= esc_html__( 'Portfolio', 'consultant-lite' );
		$defaults['select_category_for_portfolio']		= 0;
		$defaults['portfolio_button_text']				= esc_html__( 'View More', 'consultant-lite' );
		$defaults['portfolio_button_link']				= '';


		// About Section.
		$defaults['show_about_section']					= 1;
		$defaults['enable_about_border_svg']			= 1;
		$defaults['select_page_for_about']				= 0;
		$defaults['number_of_content_home_about']		= 30;
		$defaults['video_url_to_pop_up']				= '';
		$defaults['button_text_on_about']				= esc_html__( 'Read More', 'consultant-lite' );

		
		/*testimonial*/
		$defaults['show_testimonial_section']			= 0;
		$defaults['select_testimonial_section_overlay']	= 'pattern-overlay';
		$defaults['testimonial_section_background_image']= '';
		$defaults['title_testimonial_section']			= esc_html__( 'What people say?', 'consultant-lite' );
		$defaults['select_testimonial_from']					= 'from-page';
		$defaults['number_of_home_testimonial']			= 3;
		$defaults['select_page_for_testimonial_1']			= 1;
		$defaults['number_of_content_home_testimonial']	= 30;
		$defaults['select_category_for_testimonial']	= 0;

		// Service Section.
		$defaults['show_service_section']				= 1;
		$defaults['service_section_title']				= esc_html__( 'Our Service', 'consultant-lite' );
		$defaults['number_of_home_service']				= 4;
		$defaults['show_service_feature_img']			= 0;
		$defaults['number_of_content_home_service']		= 30;
		$defaults['number_of_home_service_icon_1']		= 'ion-android-bulb';
		$defaults['select_page_for_service_1']			= 0;
		$defaults['button_text_on_service']				= esc_html__( 'Browse More', 'consultant-lite' );
		
		/*callback section*/
		$defaults['show_our_callback_section']			= 1;
		$defaults['enable_callback_border_svg']			= 1;
		$defaults['select_callback_section_overlay']	= 'pattern-overlay';
		$defaults['select_callback_page']				= 0;
		$defaults['number_of_content_home_callback']	= 30;
		$defaults['show_page_link_button']				= 1;
		$defaults['callback_button_text']				= esc_html__( 'Buy Now', 'consultant-lite' );
		$defaults['callback_button_link']				= '';


		/*Latest Blog Default Value*/
		$defaults['show_blog_section']					= 1;
		$defaults['main_title_blog_section']			= esc_html__( 'Latest Blog', 'consultant-lite' );
		$defaults['number_of_excerpt_home_blog']		= 40;
		$defaults['select_category_for_blog']			= 0;

		/*contact section*/
		$defaults['show_contact_section']				= 1;
		$defaults['main_title_contact_section']			= esc_html__( 'Contact US', 'consultant-lite' );
		$defaults['show_top_contact_details']			= 1;
		$defaults['show_social_nav']					= 1;
		$defaults['contact_form_shortcode']				='';
		$defaults['show_contact_map_section']			= 0;
		$defaults['google_map_shortcode']				= '';
		// selected page
		$defaults['show_selected_page_content_on_homepage']		= 1;
		$defaults['show_selected_page_title']					= 1;

		
		$defaults['customizer_section_reorder_1'] 			= 'slider-section,about-section,service-section,cta-section,portfolio-section,testimonial-section,contact-section,blog-section,front-page-content';

		
		//Layout options.
		$defaults['global_layout']					= 'right-sidebar';
		$defaults['excerpt_length_global']			= 50;
		$defaults['pagination_type']				= 'numeric';
		$defaults['footer_section_background_image']= '';
		$defaults['enable_footer_border_svg']		= 1;
		$defaults['select_footer_section_overlay']	= 'pattern-overlay';
		$defaults['enable_copyright_credit']     	= 1;
		$defaults['copyright_text']					= '';
		$defaults['number_of_footer_widget']		= 4;
		$defaults['enable_preloader']				= 1;

		// Pass through filter.
		$defaults = apply_filters( 'consultant_lite_filter_default_theme_options', $defaults );

		return $defaults;

	}

endif;
