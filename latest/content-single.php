<?php
/**
 * @package CWP-MegaR
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
	    	<div class="post-categories">
				<?php the_category(' / '); ?>
			</div>
            
            <?php cwpmegar_content_nav(); ?>
            
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php cwp_megar_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>	
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">		
		<?php
			the_content(); 		
		
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'cwp-megar' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'cwp-megar' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'cwp-megar' ) );

			if ( ! cwp_megar_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'cwp-megar' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'cwp-megar' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'cwp-megar' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'cwp-megar' );
				}

			} // end check for categories on this blog

			$meta_text = __( 'Tags: %1$s','cwp' );

			printf(
				$meta_text,
//				$category_list,
				$tag_list,
//				get_permalink(),
				the_title_attribute( 'echo=0' )
			);
		?>

		<?php edit_post_link( __( 'Edit', 'cwp-megar' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
