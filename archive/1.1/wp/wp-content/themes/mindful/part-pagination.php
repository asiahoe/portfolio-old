<?php $num_pages = $wp_query->max_num_pages; if($num_pages > 1) : ?>
    	
	<?php if(function_exists('wp_pagenavi')) : ?>
		<div class="pagination clearfix">
		<?php wp_pagenavi(); ?>
		</div><!-- end pagination -->
	<?php else: ?>	
		<?php kriesi_pagination(); ?>	
	<?php endif; ?>

<?php endif; // endif num_pages ?>