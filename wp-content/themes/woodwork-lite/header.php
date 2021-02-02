<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Woodwork Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()) { ?>
	<link rel="pingback" href="<?php echo esc_url(get_bloginfo( 'pingback_url' )); ?>">
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain">
	<?php esc_html_e( 'Skip to content', 'woodwork-lite' ); ?>
</a>

<div id="header">
	<div class="header-inner">
		<div class="header-left">
			  <div class="logo">
			   <?php woodwork_lite_the_custom_logo(); ?>
								<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>

							<?php $description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p><?php echo esc_html($description); ?></p>
							<?php endif; ?>
			</div><!-- .logo -->                 
    	</div><!-- hedaer-left -->
		<div class="header-right">
				<div class="cont-info">
						 <?php echo esc_html(get_theme_mod('phone-txt')); ?>          
				</div><!-- cont-info -->
		</div><!-- header-right -->
</div><!-- .header-inner-->
		
		<div id="navigation">
			<div class="container">
			<div class="toggle">
					<a class="toggleMenu" href="#"><?php esc_html_e('Menu','woodwork-lite'); ?></a>
			</div><!-- toggle --> 	
			<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">					
					<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>	
			</nav><!-- main-navigation -->
			</div><!-- container -->
		</div><!-- navigation --><div class="clear"></div>
</div><!-- #header -->