<?php get_header(); ?>	

<div id="primary" class="content-area">		
    <div id="content" class="site-content" role="main">
        
		<?php 
			if( has_nav_menu('sidebar_menu') ):	
				echo '<div id="side-content">';
					get_template_part('/inc/left-menu');
				echo '</div>';
			endif; 
		?>

            <div id="main-content">
	            <div id="main-content-inner" class="list-posts">
                </div>
            </div>

    </div><!-- #content -->	
</div><!-- #primary -->	

<input type="hidden" id="load_posts" value="<?php echo get_template_directory_uri(); ?>" /> 

<?php get_sidebar(); ?>
<?php get_footer(); ?>