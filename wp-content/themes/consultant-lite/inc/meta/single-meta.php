<?php
/**
 * Implement theme metabox.
 *
 * @package Consultant Lite
 */
if (!function_exists('consultant_lite_add_theme_meta_box')) :

    /**
     * Add the Meta Box
     *
     * @since 1.0.0
     */
    function consultant_lite_add_theme_meta_box()
    {

        $screens = array('post', 'page');

        foreach ($screens as $screen) {
            add_meta_box(
                'consultant-lite-theme-settings',
                esc_html__('Single Page/Post Layout Settings', 'consultant-lite'),
                'consultant_lite_render_theme_settings_metabox',
                $screen,
                'side',
                'low'


            );
        }

    }

endif;

add_action('add_meta_boxes', 'consultant_lite_add_theme_meta_box');


if ( ! function_exists( 'consultant_lite_render_theme_settings_metabox' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 */
	function consultant_lite_render_theme_settings_metabox( $post, $metabox ) {

		$post_id = $post->ID;
		$consultant_lite_post_meta_value = get_post_meta($post_id);

		// Meta box nonce for verification.
		wp_nonce_field( basename( __FILE__ ), 'consultant_lite_meta_box_nonce' );
		// Fetch Options list.
		$page_layout = get_post_meta($post_id,'consultant-lite-meta-select-layout',true);
	?>
	<div id="consultant-lite-settings-metabox-container" class="consultant-lite-settings-metabox-container">
		<div id="consultant-lite-settings-metabox-tab-layout">
			<h4><?php echo __( 'Layout Settings', 'consultant-lite' ); ?></h4>
			<div class="consultant-lite-row-content">
				 <!-- Checkbox Field-->
				     <p>
				     <div class="consultant-lite-row-content">
				         <label for="consultant-lite-meta-checkbox">
				             <input type="checkbox" name="consultant-lite-meta-checkbox" id="consultant-lite-meta-checkbox" value="yes" <?php if ( isset ( $consultant_lite_post_meta_value['consultant-lite-meta-checkbox'] ) ) checked( $consultant_lite_post_meta_value['consultant-lite-meta-checkbox'][0], 'yes' ); ?> />
				             <?php _e( 'Check To Enable Featured Image On Single Page', 'consultant-lite' )?>
				         </label>
				     </div>
				     </p>
			     <!-- Select Field-->
			        <p>
			            <label for="consultant-lite-meta-select-layout" class="consultant-lite-row-title">
			                <?php _e( 'Single Page/Post Layout', 'consultant-lite' )?>
			            </label>
			            <select name="consultant-lite-meta-select-layout" id="consultant-lite-meta-select-layout">
				            <option value="right-sidebar" <?php selected('right-sidebar',$page_layout);?>>
				            	<?php _e( 'Content - Primary Sidebar', 'consultant-lite' )?>
				            </option>
				            <option value="left-sidebar" <?php selected('left-sidebar',$page_layout);?>>
				            	<?php _e( 'Primary Sidebar - Content', 'consultant-lite' )?>
				            </option>
				            <option value="no-sidebar" <?php selected('no-sidebar',$page_layout);?>>
				            	<?php _e( 'No Sidebar', 'consultant-lite' )?>
				            </option>
			            </select>
			        </p>
			</div><!-- .consultant-lite-row-content -->
		</div><!-- #consultant-lite-settings-metabox-tab-layout -->
	</div><!-- #consultant-lite-settings-metabox-container -->

    <?php
	}

endif;



if ( ! function_exists( 'consultant_lite_save_theme_settings_meta' ) ) :

	/**
	 * Save theme settings meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post object.
	 */
	function consultant_lite_save_theme_settings_meta( $post_id, $post ) {

		// Verify nonce.
		if ( ! isset( $_POST['consultant_lite_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['consultant_lite_meta_box_nonce'], basename( __FILE__ ) ) ) {
			  return; }

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check permission.
		if ( 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return; }
		} else if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		$consultant_lite_meta_checkbox =  isset( $_POST[ 'consultant-lite-meta-checkbox' ] ) ? esc_attr($_POST[ 'consultant-lite-meta-checkbox' ]) : '';
		update_post_meta($post_id, 'consultant-lite-meta-checkbox', sanitize_text_field($consultant_lite_meta_checkbox));

		$consultant_lite_meta_select_layout =  isset( $_POST[ 'consultant-lite-meta-select-layout' ] ) ? esc_attr($_POST[ 'consultant-lite-meta-select-layout' ]) : '';
		if(!empty($consultant_lite_meta_select_layout)){
			update_post_meta($post_id, 'consultant-lite-meta-select-layout', sanitize_text_field($consultant_lite_meta_select_layout));
		}
	}

endif;

add_action( 'save_post', 'consultant_lite_save_theme_settings_meta', 10, 3 );