<!-- sidebar -->
<aside class="sidebar wrap" role="complementary">
	<div class="loop">
		<h3>⏰ Recent Episodes</h3>
		<?php

		query_posts(array(
			'showposts' => 3,
			'post_type' => 'post',
			'category_name' => 'podcasts',
			'orderby' => 'published',
			'order' => 'DESC')
		);

		if ( have_posts() ) : while ( have_posts() ) : the_post();

			loopDefault();

		endwhile; else: endif; ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
	</div>

	<div class="sidebar-widget">
		<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>
	</div>

</aside>
<!-- /sidebar -->
