<?php get_header(); ?>

	<div class="content-wrap">
    
    	<div class="wrapper">
        
        	<div class="main-content">
            
            	<?php if (have_posts()) : ?>

					<h2>Search Results</h2>

					<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

					<?php while (have_posts()) : the_post(); ?>

						<div <?php post_class() ?> id="post-<?php the_ID(); ?>">

							<h2><?php the_title(); ?></h2>

							<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

							<div class="entry">

								<?php the_excerpt(); ?>

							</div>

						</div>

					<?php endwhile; ?>

					<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

				<?php else : ?>

					<h2>No posts found.</h2>

				<?php endif; ?>
            
            </div> <!--"main-content" ends-->
        
            <?php get_sidebar(); ?>
            
            <div class="clear"></div>
        
        </div>
    
    </div> <!--"content-wrap" ends-->

<?php get_footer(); ?>
