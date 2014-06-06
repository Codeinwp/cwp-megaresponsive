<?php get_header(); ?>	

<div id="primary" class="content-area">		
    <div id="content" class="site-content" role="main">
        
        <div id="side-content">				
            <?php get_template_part('/inc/left-menu'); ?>        	
        </div><!-- .side-content -->              			

            <div id="main-content">
	            <div id="main-content-inner" class="list-posts">
                </div>
            </div>

    </div><!-- #content -->	
</div><!-- #primary -->	

<input type="hidden" id="load_posts" value="<?php echo get_template_directory_uri(); ?>" /> 

<?php get_sidebar(); ?>
<?php get_footer(); ?>