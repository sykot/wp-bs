<?php get_header(); ?>

	<div class="content-wrap">
    
    	<div class="wrapper">
        
        	<div class="main-content">
            
            	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
					<div class="post" id="post-<?php the_ID(); ?>">

						<h2><?php the_title(); ?></h2>

						<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

						<div class="entry">

							<?php the_content(); ?>

							<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>
							
							<?php the_tags( 'Tags: ', ', ', ''); ?>

						</div>

						<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

					</div>
					
					<?php comments_template(); ?>

				<?php endwhile; ?>
            
                <?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
            
                <?php else : ?>
            
                    <h2>Not Found</h2>
            
                <?php endif; ?>
            
            </div> <!--"main-content" ends-->
        
            <?php get_sidebar(); ?>
            
            <div class="clear"></div>
        
        </div>
    
    </div> <!--"content-wrap" ends-->

<?php get_footer(); ?>

