<?php
/**
 * The Template for displaying all single posts.
 *
 * @package CWP-MegaR
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

            <div id="main-content">
	            <div id="main-content-inner">


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php //cwp_megar_content_nav( 'nav-below' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

				</div><!-- #main-content-inner -->
			</div><!-- #main-content -->

			<div id="side-content">
				<?php get_template_part('/inc/left-menu'); ?>
        	</div><!-- .side-content -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>