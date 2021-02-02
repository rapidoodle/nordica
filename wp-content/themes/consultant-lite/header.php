<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Consultant_Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
	}
?>
<?php if (consultant_lite_get_option('enable_preloader') == 1) { ?>
	<div class="tm-preloader" id="preloader">
		<div class="status" id="status">
			<div class="tm-preloader-wrapper" style="--n: 5">
				<div class="tm-dot" style="--i: 0"> </div>
				<div class="tm-dot" style="--i: 1"> </div>
				<div class="tm-dot" style="--i: 2"> </div>
				<div class="tm-dot" style="--i: 3"> </div>
				<div class="tm-dot" style="--i: 4"> </div>
			</div>
		</div>
	</div>
<?php } ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'consultant-lite' ); ?></a>
		<!-- header start -->
		<header class="tm-main-header" id="header">
			<div class="tm-container-fluid">
				<div class="tm-d-flex">
					<!-- logo section -->
					<div class="site-branding">
						<?php 
						$tm_site_logo = "tm-site-logo-disable";
						if ( has_custom_logo() ) {
							$tm_site_logo = "tm-site-logo-with-title";
							if ( ! display_header_text() ) {
								$tm_site_logo = "tm-only-logo-enable";
							}
						} ?>
						<div class="tm-logo-section <?php echo esc_attr($tm_site_logo); ?>">
							<div class="tm-logo"><?php the_custom_logo(); ?></div>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php	
							$consultant_lite_description = get_bloginfo( 'description', 'display' );
							if ( $consultant_lite_description || is_customize_preview() ) :
								?>
								<p class="site-description"><?php echo esc_html($consultant_lite_description); /* WPCS: xss ok. */ ?></p>
							<?php endif; ?>
						</div>
					</div><!-- .site-branding -->
					<div class="tm-site-features">
						<div class="tm-address-with-social-section" id="tm-address-with-social-icon">
							<!-- top address bat -->
							<div class="tm-address-section tm-d-flex tm-font-semi-bold">
								<!-- location -->
								<?php if (!empty(consultant_lite_get_option('top_header_location'))) { ?>
									<div class="tm-address">
										<div class="tm-icon-section">
											<i class="ion ion-ios-pin"></i>
										</div>
										<div class="tm-desc">
											<h5 class="icon-box-title"><?php esc_html_e( 'Location', 'consultant-lite' ); ?></h5>
											<?php echo esc_html(consultant_lite_get_option('top_header_location'));?>
										</div>
										
									</div>
								<?php } ?>
								
								<!-- telephone -->
								<?php if (!empty(consultant_lite_get_option('top_header_telephone'))) { ?>
									<div class="tm-telephone">
										<div class="tm-icon-section">
											<i class="ion ion-ios-call"></i>
										</div>
										<div class="tm-desc">
											<h5 class="icon-box-title"><?php esc_html_e( 'Telephone', 'consultant-lite' ); ?></h5>
											<a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( consultant_lite_get_option('top_header_telephone') ) ); ?>">
												<?php echo esc_attr( consultant_lite_get_option('top_header_telephone') ); ?>
											</a>
										</div>
									</div>
								<?php } ?>

								<?php if (!empty(consultant_lite_get_option('top_header_email'))) { ?>
									<div class="tm-email">
										<div class="tm-icon-section">
											<i class="ion ion-ios-mail"></i>
										</div>
										<div class="tm-desc">
											<h5 class="icon-box-title"><?php esc_html_e( 'Email', 'consultant-lite' ); ?></h5>
											<a href="mailto:<?php echo esc_attr(consultant_lite_get_option('top_header_email') ); ?>">
												<?php echo esc_attr( antispambot(consultant_lite_get_option('top_header_email'))); ?>
											</a>
										</div>
									</div>
								<?php } ?>
	
							</div>
							<!-- social menu -->
							<div class="tm-social-section">
								<?php wp_nav_menu(
									array('theme_location' => 'social-menu',
										'link_before' => '<span>',
										'link_after' => '</span>',
										'menu_id' => 'social-menu',
										'fallback_cb' => false,
										'menu_class'=> 'tm-social-icons tm-social-icons-no-text'
								)); ?>
							</div>
							<!-- primary menu -->
							
						</div>
	
						<div class="tm-menu-button-section">
							<div class="tm-menu-section desktop">
								<div class="tm-menu-icon-section">
									<div class="tm-menu-btn" id="tm-menu-icon">
										<button>
											<?php esc_html_e( 'Menu', 'consultant-lite' ); ?>
											<span><i class="ion ion-ios-list"></i></span> 
										</button>
									</div>
									<div class="tm-social-menu-icon" id="tm-social-menu-icon">
										<button>
											<span></span>
										</button>
									</div>
								</div>
								<nav id="site-navigation" class="main-navigation">
									<?php
									wp_nav_menu( array(
										'theme_location' => 'primary-menu',
										'menu_id'        => 'primary-menu',
										'container' => 'div',
										'container_class' => 'tm-nav-menu-section',
										'menu_class' => 'tm-nav-menu'
									) );
									?>
								</nav><!-- #site-navigation -->
							</div>
							<?php if ( is_active_sidebar( 'consultant-lite-off-canvas-widget' ) ) { ?>
								<!-- button -->
								<div class="tm-btn-section">
									<button  class="tm-btn-border tm-btn-border-primary" id="tm-nav-off-canvas">
										<?php echo esc_html(consultant_lite_get_option('top_call_to_action_button_title')); ?>
										<i class="ion ion-md-arrow-forward"></i>
									</button>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				
			</div>
		</header>
		<div class="tm-mobile-menu">
			<div class="tm-mobile-close-section">
				<div class="tm-close-icon" id="tm-mobile-close">
					<span></span>
					<span></span>
				</div>
			</div>
		</div>
		
	<div id="tm-body-overlay" class="tm-body-overlay"></div>
	<?php if (is_home() &&  is_front_page()) {
		do_action( 'consultant_lite_action_front_page_slider' );
	} ?>
	<?php if (!is_page_template()) { ?>
		<div id="content" class="site-content">
	<?php } ?>
