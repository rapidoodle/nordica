<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Consultant_Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("tm-article-post"); ?>>
	<header class="entry-header">
		<div class="tm-row">
			<div class="tm-author-section">
				<div class="entry-meta">
					<?php
					
						if ( 'post' === get_post_type() ) :
						?>
						<div class="entry-meta">
							<?php
							consultant_lite_posted_by();
							?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</div>
			</div>
			<div class="tm-desc">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
				endif;
		
				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						consultant_lite_posted_on();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</div>

		</div>
	</header><!-- .entry-header -->
	<?php 
	$post_options = get_post_meta( $post->ID, 'consultant-lite-meta-checkbox', true );
	if (!empty( $post_options ) ) { ?>
		<?php if (has_post_thumbnail()) { ?>
			<div class="tm-post-thumbnail">
				<?php consultant_lite_post_thumbnail(); ?>
			</div>
		<?php } ?>
	<?php } ?>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'consultant-lite' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'consultant-lite' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php consultant_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
