<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Consultant_Lite
 */

?>
<?php if (!is_page_template()) { ?>
	</div>
<?php } ?>
	<!-- #content -->
	<?php 
	$consultant_lite_footer_widgets_number = consultant_lite_get_option('number_of_footer_widget');
	if( 1 == $consultant_lite_footer_widgets_number ){
		$col = 'tm-col-12';
	}
	elseif( 2 == $consultant_lite_footer_widgets_number ){
		$col = 'tm-col-6';
	}
	elseif( 3 == $consultant_lite_footer_widgets_number ){
		$col = 'tm-col-4';
	}
	elseif( 4 == $consultant_lite_footer_widgets_number ){
		$col = 'tm-col-3';
	}
	else{
		$col = 'tm-col-3';
	}
	if(is_active_sidebar( 'footer-col-one' ) || is_active_sidebar( 'footer-col-two' ) || is_active_sidebar( 'footer-col-three' ) || is_active_sidebar( 'footer-col-four' )){ ?>
		<?php $consultant_lite_footer_overlay = esc_attr(consultant_lite_get_option('select_footer_section_overlay'));
		switch ($consultant_lite_footer_overlay) {
		    case 'no-overlay':
		        $consultant_lite_footer_overlay = 'no-overlay';
		    break;
		    case 'color-overlay':
		        $consultant_lite_footer_overlay = 'tm-overlay';
		    break;
		    case 'pattern-overlay':
		        $consultant_lite_footer_overlay = 'tm-overlay-pattern';
		    break;

		    default:
		    break;
		}?>
		<?php 
		$consultant_lite_svg_enable = '';
		if (1 == consultant_lite_get_option('enable_footer_border_svg')) {
			$consultant_lite_svg_enable = 'tm-svg-enable';
		} ?>
		<?php if ($consultant_lite_footer_widgets_number != 0) { ?>
			<div class="tm-footer-widget data-bg <?php echo esc_attr($consultant_lite_footer_overlay); ?>  <?php echo esc_attr($consultant_lite_svg_enable); ?>" data-background="<?php echo esc_url(consultant_lite_get_option('footer_section_background_image')); ?>">
	            <?php if (1 == consultant_lite_get_option('enable_footer_border_svg')) { ?>
					<div class="tm-svg tm-svg-multiple-layer">
						<svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 1920 435">    
							<path class="tm-layer-1" d="M1920,435.1H0V49c32.8,32,92.7,82.1,180,108.3C486.8,249.6,554.4-28.5,918,9.1C1152.9,33.4,1328.5,180,1602,176 c137.7-2,248.9-43,318-75C1920,229.7,1920,306.4,1920,435.1z"></path>
							<path class="tm-layer-2" d="M1920,288.1c-228,42-357.8,100.5-489,54c-254.1-90-325.1-324.6-603-315C619.8,34.3,532.8,150,280.5,228.8	c-136.7,42.7-178-42.7-280.5-48.6v255h1920V288.1z"></path>
							<path class="tm-layer-3" d="M1920,435.1H0v-215c81,5,135,77,243,41c199.3-66.4,294.5-143.1,405-162c315-54,384.2,131.1,585,207 c165,62.4,385,129,687-120C1920,236.1,1920,385.1,1920,435.1z"></path>    
						</svg>
					</div>
				<?php } ?>

				<div class="container">
					<div class="tm-row">
						<?php if( is_active_sidebar( 'footer-col-one' ) && $consultant_lite_footer_widgets_number > 0 ) : ?>
							<div class="<?php echo esc_attr( $col );?>">
								<?php dynamic_sidebar( 'footer-col-one' ); ?>
							</div>
						<?php endif; ?>
						<?php if( is_active_sidebar( 'footer-col-two' ) && $consultant_lite_footer_widgets_number > 1 ) : ?>
							<div class="<?php echo esc_attr( $col );?>">
								<?php dynamic_sidebar( 'footer-col-two' ); ?>
							</div>
						<?php endif; ?>
						<?php if( is_active_sidebar( 'footer-col-three' ) && $consultant_lite_footer_widgets_number > 2 ) : ?>
							<div class="<?php echo esc_attr( $col );?>">
								<?php dynamic_sidebar( 'footer-col-three' ); ?>
							</div>
						<?php endif; ?>
						<?php if( is_active_sidebar( 'footer-col-four' ) && $consultant_lite_footer_widgets_number > 3 ) : ?>
							<div class="<?php echo esc_attr( $col );?>">
								<?php dynamic_sidebar( 'footer-col-four' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php }?>

	<footer id="colophon" class="site-footer tm-bg-primary">
		<div class="container site-info">
			<?php
			$consultant_lite_copyright_text = wp_kses_post(consultant_lite_get_option('copyright_text'));
			if(!empty ($consultant_lite_copyright_text)){
				echo wp_kses_post(consultant_lite_get_option('copyright_text') );
			}
			?>
			<?php
			if (consultant_lite_get_option('enable_copyright_credit') == 1 ) { ?>
				<?php _e( ' | Theme: Consultant Lite by', 'consultant-lite' ); ?>
				<a href="<?php echo esc_url( __( 'https://thememattic.com/', 'consultant-lite' ) ); ?>" target = "_blank" rel="designer"> <?php _e( 'Thememattic', 'consultant-lite'); ?> </a>
			<?php  } ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<!-- offcanvas on click -->
<?php if ( is_active_sidebar('consultant-lite-off-canvas-widget') ): ?>
    <div id="sidr-nav">
        <div class="sidr-area">
            <div class="sidr-close-holder">
                <a class="sidr-class-sidr-button-close" href="#sidr">
            		<i class="ion ion-ios-close"></i>
                </a>
            </div>
            <?php dynamic_sidebar('consultant-lite-off-canvas-widget'); ?>
        </div>
    </div>
<?php endif; ?>
<div class="tm-scroll-top" id="scroll-top">
	<span><i class="ion ion-ios-arrow-up"></i></span>
</div>

<?php wp_footer(); ?>

</body>
</html>
