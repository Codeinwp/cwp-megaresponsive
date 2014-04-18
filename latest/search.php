<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package CWP-MegaR
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

            <div id="main-content">
	            <div id="main-content-inner">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'cwp-megar' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php cwp_megar_content_nav( 'nav-below' ); ?>

		<?php else : ?>

			<?php get_template_part( 'no-results', 'search' ); ?>

		<?php endif; ?>

				</div><!-- #main-content-inner -->
			</div><!-- #main-content -->

			<div id="side-content"> 
				<?php get_template_part('/inc/left-menu'); ?>
        	</div><!-- .side-content -->

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>