<?php get_header(); ?>

<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' )); ?>

<div id="middle">
	<div id="pageHead">
		<h1><?php echo $term->name; ?></h1>			
		<?php if(strlen($term->description) > 0) echo '<p>'.$term->description.'</p>'; ?>
	</div>	
<div id="content" class="fullProjects clearfix">	
<div id="projects">		
	<div class="thumbs masonry">
	<?php
		$args = array(			
			'posts_per_page' => 200,
			'post_type' => 'project',
			'skill' => $term->slug
		);
		$projects = new WP_Query( $args );
	?>
	<?php query_posts( 'skill='.$term->slug.'&post_type=project&posts_per_page=200' ); ?>			
	<?php  while ($projects->have_posts()) : $projects->the_post(); ?>		
		<?php get_template_part( 'part-project-thumb'); ?>	
	<?php endwhile; ?>
	</div>	
</div>
</div>
</div>

<?php get_footer(); ?>