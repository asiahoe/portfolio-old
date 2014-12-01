<?php /*
Template Name: Home
*/ ?>
<?php get_header(); ?>
<div id="middle" class="clearfix">	
<div id="content" class="full">

<?php $homeMessage = of_get_option('ttrust_home_message'); ?>
<?php if($homeMessage) : ?>	
<div id="homeMessage" class="clearfix">
	<p><?php echo $homeMessage; ?></p>		
</div>
<?php endif; ?>
			
<?php get_template_part( 'part-projects-home'); ?>	


<div id="page" class="homeSection clearfix">			
	<?php while (have_posts()) : the_post(); ?>		    						
		<?php the_content(); ?>			
	<?php endwhile; ?>
</div>
</div>
</div>
<?php get_footer(); ?>	