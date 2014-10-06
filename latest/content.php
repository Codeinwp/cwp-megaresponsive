<?php
/**
 * @package megaresponsive-lite
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <?php
	 		if ( has_post_thumbnail() ):
						the_post_thumbnail('thumbnail', array('class' => 'alignleft'));
					echo '</a>';
			endif;
		?>
    
		<div class="entry-meta meta-top">
			<div class="post-categories">
				<?php the_category(' / ', 'single'); ?>
			</div>
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php cwp_megar_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>	
		</div>
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
    </header><!-- .entry-header -->

	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : 
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'megaresponsive-lite' ),
				'after'  => '</div>',
			) );
</article><!-- #post-## -->