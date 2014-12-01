<?php
$temp_post = $post;
$args = array(
	'ignore_sticky_posts' => 1,
	'posts_per_page' => 20,
	'post_type' => 'slide'
);
$slides = new WP_Query( $args );
?>
<?php if(have_posts()) :?>
<div id="homeSlideshow" class="clearfix">
			
	<div id="sequence">
		<ul class="sequence-canvas">
			<?php $i = 1; while ($slides->have_posts()) : $slides->the_post(); ?>
			<?php
			//Get slide options
			$slide_description = get_post_meta($post->ID, "_ttrust_slide_description_value", true);
			$slide_hide_title = get_post_meta($post->ID, "_ttrust_hide_title_value", true);
			$slide_text_position = get_post_meta($post->ID, "_ttrust_slide_text_position_value", true);
			$slide_text_animation = get_post_meta($post->ID, "_ttrust_slide_text_animation_value", true);
			$slide_img_position = get_post_meta($post->ID, "_ttrust_slide_image_position_value", true);
			$slide_img_animation = get_post_meta($post->ID, "_ttrust_slide_image_animation_value", true);
			$slide_full_image = (get_post_meta($post->ID, "_ttrust_full_image_value", true)) ? "full" : "";
			?>					
		
			<li class="slide slide-<?php echo $i?>">
				<div class="image <?php echo $slide_img_position. ' ' .$slide_img_animation. ' ' .$slide_full_image; ?>">
					<?php the_content(); ?>
				</div>
				<?php if(!$slide_hide_title) : ?>
				<div class="text <?php echo $slide_text_position. ' ' .$slide_text_animation; ?>">
					<h2><span><?php the_title(); ?></span></h2>
					<?php echo wpautop(do_shortcode($slide_description)); ?>
				</div>
				<?php endif; ?>
			</li>		
			
			<?php $i++; ?>			
		
			<?php endwhile; ?>
		</ul>
	</div>
	<?php if($i>2) : //if there is more than one slide, show controls ?>
	<span class="sequence-prev"/></span>
	<span class="sequence-next"/></span>
	<div class="controls">
	<ul class="clearfix">	
	<?php for ($k = 1; $k < $i; $k++) {?>
		<li class="button<?php echo $k;?>"></li>
	<?php } ?>		
	</ul>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
<?php $post = $temp_post; ?>