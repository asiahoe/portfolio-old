<?php $temp_post = $post; ?>
<?php $home_project_count = intval(of_get_option('ttrust_home_project_count')); ?>
<?php if($home_project_count > 0) : ?>	
<div id="projects" class="full homeSection clearfix">			
	<h3><span><?php echo of_get_option('ttrust_recent_projects_title'); ?></span></h3>		
	<?php	
		$args = array(
			'ignore_sticky_posts' => 1,			  			
    		'posts_per_page' => of_get_option('ttrust_home_project_count'),
    		'post_type' => array(				
				'project'					
				)
		);
		$projects = new WP_Query( $args );			
	?>		
					
	<div class="thumbs masonry clearfix">			
		<?php  while ($projects->have_posts()) : $projects->the_post(); ?>		
			<?php get_template_part( 'part-project-thumb'); ?>
		<?php endwhile; ?>			
	</div>
</div>
<?php endif; ?>
<?php $post = $temp_post; ?>