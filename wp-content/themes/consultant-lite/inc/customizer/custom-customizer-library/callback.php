<?php
/**
 * Customizer callback functions for active_callback.
 *
 * @package Consultant Lite
 */

/*select page for slider*/
if ( ! function_exists( 'consultant_lite_is_select_page_slider' ) ) :

	/**
	 * Check if slider section page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $consultant_lite_control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function consultant_lite_is_select_page_slider( $consultant_lite_control ) {

		if ( 'from-page' === $consultant_lite_control->manager->get_setting( 'select_slider_from' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

/*select cat for slider*/
if ( ! function_exists( 'consultant_lite_is_select_cat_slider' ) ) :

	/**
	 * Check if slider section form page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $consultant_lite_control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function consultant_lite_is_select_cat_slider( $consultant_lite_control ) {

		if ( 'from-category' === $consultant_lite_control->manager->get_setting( 'select_slider_from' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

/*select page for testimonial*/
if ( ! function_exists( 'consultant_lite_is_select_page_testimonial' ) ) :

	/**
	 * Check if testimonial section page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $consultant_lite_control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function consultant_lite_is_select_page_testimonial( $consultant_lite_control ) {

		if ( 'from-page' === $consultant_lite_control->manager->get_setting( 'select_testimonial_from' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

/*select cat for testimonial*/
if ( ! function_exists( 'consultant_lite_is_select_cat_testimonial' ) ) :

	/**
	 * Check if testimonial section form page/post is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $consultant_lite_control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function consultant_lite_is_select_cat_testimonial( $consultant_lite_control ) {

		if ( 'from-category' === $consultant_lite_control->manager->get_setting( 'select_testimonial_from' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;