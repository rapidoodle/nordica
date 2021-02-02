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
								<?php consultant_lite_posted_by(); ?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</div><!-- .entry-meta -->
				</div>
				<div class="tm-desc">
					<?php
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
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

	<div class="tm-article-content-wrapper tm-d-flex">
		<?php if (has_post_thumbnail()) { ?>
			<div class="tm-post-thumbnail">
				<?php consultant_lite_post_thumbnail(); ?>
			</div>
		<?php } ?>
	
		<div class="entry-content">
			<div class="wrappper">
				<?php
				the_excerpt();
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'consultant-lite' ),
					'after'  => '</div>',
				) );
				?>
			</div>
		</div><!-- .entry-content -->
	</div>

	<footer class="entry-footer">
		<?php consultant_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
