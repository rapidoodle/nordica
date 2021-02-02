<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Consultant_Lite
 */

get_header();
?>


	<section class="error-404 not-found tm-not-found">
		<div class="tm-wrapper">
			<header class="page-header">
				<div class="tm-error-title"><?php esc_html_e( '404...', 'consultant-lite' ); ?></div>
				<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'consultant-lite' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
		</div>
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'consultant-lite' ); ?></p>

			<?php
				get_search_form();
			?>

		</div><!-- .page-content -->
	</section><!-- .error-404 -->


<?php
get_footer();
