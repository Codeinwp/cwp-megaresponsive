<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package CWP-MegaR
 */
 
get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

            <div id="side-content">
				<?php get_template_part('/inc/left-menu'); ?> 
        	</div><!-- .side-content -->        
            
            <div id="main-content">
	            <div id="main-content-inner" class="list-posts">


			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();
							$cat_name = single_cat_title('',false);
							$cat_id = get_cat_ID($cat_name);
						?>	
							<input type="hidden" id="catid" value="<?php echo $cat_id; ?>" />		
						<?php	
						elseif ( is_tag() ) :
							single_tag_title();
							$tag_name = single_tag_title('',false);
						?>	
							<input type="hidden" id="tag_id" value="<?php echo $tag_name; ?>" />		
						<?php	

						elseif ( is_author() ) :
							$author_archive = get_query_var('author_name');
						?>								
							<input type="hidden" id="author_id" value="<?php  echo $author_archive;  ?>" />							
						<?php	
							the_post();
							printf( __( 'Author: %s', 'cwp-megar' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
							
							rewind_posts();

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'cwp-megar' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :							
							$month_archive = get_query_var('monthnum');							
							$year_archive = get_query_var('year');
						?>								
							<input type="hidden" id="year_id" value="<?php  echo $year_archive;  ?>" />							
							<input type="hidden" id="month_id" value="<?php echo $month_archive; ?>" />
						<?php	
							printf( __( 'Month: %s', 'cwp-megar' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

						elseif ( is_year() ) :							
							$year_archive = get_query_var('year');
						?>								
							<input type="hidden" id="year_id" value="<?php  echo $year_archive;  ?>" />							
						<?php	
							printf( __( 'Year: %s', 'cwp-megar' ), '<span>' . get_the_date( 'Y' ) . '</span>' );							

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'cwp-megar' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'cwp-megar');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'cwp-megar' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'cwp-megar' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'cwp-megar' );

						else :
							_e( 'Archives', 'cwp-megar' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->			

			

				</div><!-- #main-content-inner -->
			</div><!-- #main-content -->


		</div><!-- #content -->
	</section><!-- #primary -->

    <input type="hidden" id="load_posts" value="<?php echo get_template_directory_uri(); ?>" /> 

<?php get_sidebar(); ?>
<?php get_footer(); ?>
