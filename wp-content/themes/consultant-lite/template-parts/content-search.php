<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Consultant_Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("tm-article-post"); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php
			consultant_lite_posted_on();
			consultant_lite_posted_by();
			?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="tm-article-content-wrapper tm-d-flex">
		<?php if (has_post_thumbnail()) { ?>
			<div class="tm-post-thumbnail">
				<?php consultant_lite_post_thumbnail(); ?>
			</div>
		<?php } ?>

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	</div>

	<footer class="entry-footer">
		<?php consultant_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
