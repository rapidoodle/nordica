<?php
/**
 * Template Name: Front/Home Page Template
**/ 
?>
<?php get_header();

$consultant_lite_default = consultant_lite_get_default_theme_options();
$consultant_lite_home_section_rearrange = esc_html( get_theme_mod( 'customizer_section_reorder_1',$consultant_lite_default['customizer_section_reorder_1'] ) );

if( empty( $consultant_lite_home_section_rearrange ) ){ $consultant_lite_home_section_rearrange = 'slider-section,about-section,service-section,cta-section,portfolio-section,testimonial-section,contact-section,blog-section,front-page-content';}

if( $consultant_lite_home_section_rearrange ){

	$consultant_lite_home_section_rearrange = explode(',', $consultant_lite_home_section_rearrange);

	foreach( $consultant_lite_home_section_rearrange as $consultant_lite_home_section_re_arrange ){

		if( $consultant_lite_home_section_re_arrange == 'slider-section' ){ 
			// slider section
			do_action( 'consultant_lite_action_front_page_slider' );
		}elseif( $consultant_lite_home_section_re_arrange == 'about-section' ){
			// about section
			do_action( 'consultant_lite_action_front_page_about' );
		}elseif( $consultant_lite_home_section_re_arrange == 'service-section' ){
			// service section
			do_action( 'consultant_lite_action_front_page_service' );
		}elseif( $consultant_lite_home_section_re_arrange == 'cta-section' ){
			// cta section
			do_action( 'consultant_lite_action_front_page_cta' );
		}elseif( $consultant_lite_home_section_re_arrange == 'portfolio-section' ){
			// portfolio section
			do_action( 'consultant_lite_action_front_page_portfolio' );
		}elseif( $consultant_lite_home_section_re_arrange == 'testimonial-section' ){
			// testimonial section
			do_action( 'consultant_lite_action_front_page_testimonial' );
		}elseif( $consultant_lite_home_section_re_arrange == 'contact-section' ){
			// contact section
			do_action( 'consultant_lite_action_front_page_contact' );
		}elseif( $consultant_lite_home_section_re_arrange == 'blog-section' ){
			// blog section
			do_action( 'consultant_lite_action_front_page_blog' );
		}elseif( $consultant_lite_home_section_re_arrange == 'front-page-content' ){ ?>
			<!-- front page/post content -->
			<?php if (consultant_lite_get_option('show_selected_page_content_on_homepage') == 1) {?>
				<div id="content" class="site-content">
					<div id="primary" class="content-area">
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class("tm-article-post"); ?>>
							
							<?php if (consultant_lite_get_option('show_selected_page_title') == 1) {?>
								<header class="entry-header">
									<?php the_title( '<h2 class="entry-title">', '</h1>' ); ?>
								</header><!-- .entry-header -->
							<?php } ?>
							
							<?php $consultant_lite_post_options = get_post_meta( $post->ID, 'consultant-lite-meta-checkbox', true );
							if (!empty( $consultant_lite_post_options ) ) { ?>
								<?php if (has_post_thumbnail()) { ?>
									<div class="tm-post-thumbnail">
										<?php consultant_lite_post_thumbnail(); ?>
									</div>
								<?php } ?>
							<?php } ?>


							<div class="entry-content">
								<?php the_content(); ?>
							</div><!-- .entry-content -->

						</article><!-- #post-<?php the_ID(); ?> -->
					<?php endwhile; // End of the loop.?>
					</div><!-- #primary -->
					<aside id="secondary" class="widget-area">
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</aside><!-- #secondary -->
				</div>
			<?php }
		}
	}
}
get_footer();