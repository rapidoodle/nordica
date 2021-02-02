<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Consultant_Lite
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return arraytp-pagination-numeric
 */
function consultant_lite_body_classes( $classes ) {
  global $post;
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
  $global_layout = consultant_lite_get_option( 'global_layout' );
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

  if ( $post && is_singular() ) {
      $post_options = get_post_meta( $post->ID, 'consultant-lite-meta-select-layout', true );

      if (empty( $post_options ) ) {
          $global_layout = esc_attr( consultant_lite_get_option('global_layout') );
      } else{
          $global_layout = esc_attr($post_options);
      }
  }

  if ($global_layout == 'left-sidebar') {
      $classes[]= 'left-sidebar';
  }
  elseif ($global_layout == 'no-sidebar') {
      $classes[]= 'no-sidebar';
  }
  else{
      $classes[]= 'right-sidebar';

  }

  $classes[] = 'tm-svg-enable';

	return $classes;
}
add_filter( 'body_class', 'consultant_lite_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function consultant_lite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'consultant_lite_pingback_header' );


/**
* Returns word count of the sentences.
*
* @since consultant-lite 1.0.0
*/
if ( ! function_exists( 'consultant_lite_words_count' ) ) :
	function consultant_lite_words_count( $length = 25, $consultant_lite_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $consultant_lite_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}
endif;


/*
* Tgmpa plugin activation.
*/
require get_template_directory().'/assets/libraries/TGM-Plugin/class-tgm-plugin-activation.php';

if( ! function_exists( 'consultant_lite_recommended_plugins' ) ) :

  /**
   * Recommended plugins
   *
   */
  function consultant_lite_recommended_plugins(){
      $consultant_lite_plugins = array(
        array(
          'name'     => __('Contact Form 7', 'consultant-lite'),
          'slug'     => 'contact-form-7',
          'required' => false,
        ),        
        array(
          'name'     => __('WP Google Map Plugin', 'consultant-lite'),
          'slug'     => 'wp-google-map-plugin',
          'required' => false,
        ),
      );
      $consultant_lite_plugins_config = array(
          'dismissable' => true,
      );
      
      tgmpa( $consultant_lite_plugins, $consultant_lite_plugins_config );
  }
endif;
add_action( 'tgmpa_register', 'consultant_lite_recommended_plugins' );


if( ! function_exists( 'consultant_lite_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  consultant-lite 1.0.0
     *
     * @param null
     * @return int
     */
    function consultant_lite_excerpt_length( $length ){
        if ( is_admin() ) {
                return $length;
        }
        $excerpt_length = consultant_lite_get_option('excerpt_length_global');
        if ( empty( $excerpt_length) ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );

    }

endif;
add_filter( 'excerpt_length', 'consultant_lite_excerpt_length', 999 );


if ( ! function_exists( 'consultant_lite_custom_posts_navigation' ) ) :
    /**
     * Posts navigation.
     *
     * @since 1.0.0
     */
    function consultant_lite_custom_posts_navigation() {

        $pagination_type = consultant_lite_get_option( 'pagination_type' );

        switch ( $pagination_type ) {

            case 'default':
                echo '<div class="tm-pagination">';
                    the_posts_navigation();
                echo '</div>';
            break;

            case 'numeric':
                echo '<div class="tm-pagination-numeric">';
                    the_posts_pagination(array(
                            'mid_size' => 4,
                            'prev_text' => __('Previous', 'consultant-lite'),
                            'next_text' => __('Next', 'consultant-lite'),
                        ));
                echo '</div>';
            break;

            default:
            break;
        }

    }
endif;

add_action( 'consultant_lite_action_posts_navigation', 'consultant_lite_custom_posts_navigation' );

if ( ! function_exists( 'consultant_lite_customizer_sortable_options' ) ) :
    
    // Home Section Sortable Options.
    function consultant_lite_customizer_sortable_options() {

        $sections = array(
            'slider-section'    => esc_html__( 'Banner Slider Section', 'consultant-lite' ),
            'about-section'    => esc_html__( 'About Section', 'consultant-lite' ),
            'service-section' => esc_html__( 'Service Section', 'consultant-lite' ),
            'cta-section' => esc_html__( 'Call To Action Section', 'consultant-lite' ),
            'portfolio-section' => esc_html__( 'Portfolio Section', 'consultant-lite' ),
            'testimonial-section' => esc_html__( 'Testimonial Section', 'consultant-lite' ),
            'contact-section' => esc_html__( 'Contact Section', 'consultant-lite' ),
            'blog-section'     => esc_html__( 'Blog Section', 'consultant-lite' ),
            'front-page-content'     => esc_html__( 'Selected Page Content', 'consultant-lite' ),
        );
        return $sections;

    }
endif;

if (!function_exists('consultant_lite_trigger_custom_css_action')) :
    /**
     * Do action theme custom CSS.
     *
     * @since 1.0.0
     */
  function consultant_lite_trigger_custom_css_action() {
  $consultant_lite_background_color = consultant_lite_get_option('background_color');
   ?>
    <style type="text/css">
      <?php if( !empty($consultant_lite_background_color)){ ?>
        .custom-background .tm-main-header .tm-address-section:after,
        .custom-background .tm-main-header .tm-menu-button-section .tm-menu-section:after{
          border-bottom-color: #<?php echo esc_html($consultant_lite_background_color); ?>;
        }
        /***RTL***/
        .rtl.custom-background .tm-main-header .tm-address-with-social-section .tm-address-section:after,
        .rtl.custom-background .tm-main-header .tm-menu-button-section .tm-menu-section:after{
          border-bottom-color: transparent;
          border-left-color: #<?php echo esc_html($consultant_lite_background_color); ?>;
        }
        /*---RTL---*/

        .custom-background .tm-svg-multiple-layer svg{
          color:  #<?php echo esc_html($consultant_lite_background_color); ?>;
        }
        .custom-background .tm-section-bg-color{
          background-color:  #<?php echo esc_html($consultant_lite_background_color); ?>;
        }
      <?php } ?>
    </style>
  <?php }
endif;
