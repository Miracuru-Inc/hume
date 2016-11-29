<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hume
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php hume_category_list(); ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' );	?>

		<div class="entry-meta">
			<?php hume_posted_on(); ?>
		</div><!-- .entry-meta -->
		
	</header><!-- .entry-header -->
	
	<?php
	// Conditinoal Featured Image
	if ( has_post_thumbnail() ) { ?>
		<figure class="featured-image full-bleed">
			<?php 
				the_post_thumbnail( 'hume-full-bleed' );
			?>
		</figure><!-- .featured-image -->
	<?php } ?>

	<article class="post-content">
		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hume' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hume' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php hume_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	
		<?php
		// Previous/next post navigation.
		the_post_navigation( array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'hume' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Next post:', 'hume' ) . '</span> ' .
				'<span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'hume' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Previous post:', 'hume' ) . '</span> ' .
				'<span class="post-title">%title</span>',
		) );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>
		
	</article><!-- .post-content -->
	
	<?php 
	get_sidebar();
	?>
</section><!-- #post-## -->


