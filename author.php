<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<?php if ( get_the_author_meta('description', $post->post_author)) : ?>
		<section class="authorBio wrap">
			<?php echo get_the_author_meta('description'); ?>
			<nav class="authorLinks">
				<ul class="subscribeLists socialLinks">
					<?php $author_id = get_the_author_meta('ID');?>

		            <?php if(get_the_author_meta( 'facebook', $post->post_author )) {
		        		echo '<li><a target="_blank" id="facebook" href="';
		        		echo get_the_author_meta( 'facebook', $post->post_author );
		        		echo '" alt="Follow the Author on Facebook"><span class="icon">Facebook</span> <span class="title">Facebook</span></a></li>';
		        		};
		        	?>
					<?php if(get_the_author_meta( 'twitter', $post->post_author )) {
		        		echo '<li><a target="_blank" id="twitter" href="http://twitter.com/';
		        		echo get_the_author_meta( 'twitter', $post->post_author );
		        		echo '" alt="Follow the Author on Twitter"><span class="icon">Twitter</span> <span class="title">Twitter</span></a></li>';
		        		};
		        	?>
		            <?php if(get_field('youtube_username', 'user_'.$author_id)) {
		        		echo '<li><a target="_blank" id="youtube" href="https://www.youtube.com/user/';
		        		echo the_field('youtube_username', 'user_'.$author_id);
		        		echo '" alt="Subscribe to Author on YouTube"><span class="icon">YouTube</span> <span class="title">YouTube</span></a></li>';
		        		};
		        	?>
		            <?php if(get_field('instagram_username', 'user_'.$author_id)) {
		        		echo '<li><a target="_blank" id="instagram" href="https://instagram.com/';
		        		echo the_field('instagram_username', 'user_'.$author_id);
		        		echo '" alt="Follow the Author on Instagram"><span class="icon">Instagram</span> <span class="title">Instagram</span></a></li>';
		        		};
		        	?>
					<?php if(get_field('linkedin_username', 'user_'.$author_id)) {
		        		echo '<li><a target="_blank" id="linkedin" href="https://linkedin.com/in/';
		        		echo the_field('linkedin_username', 'user_'.$author_id);
		        		echo '" alt="Follow the Author on LinkedIn"><span class="icon">LinkedIn</span> <span class="title">LinkedIn</span></a></li>';
		        		};
		        	?>
					<?php if(get_field('snapchat_username', 'user_'.$author_id)) {
		        		echo '<li><a target="_blank" id="snapchat" href="http://snapchat.com/add/';
		        		echo the_field('snapchat_username', 'user_'.$author_id);
		        		echo '" alt="Follow the Author on Instagram"><span class="icon">Snapchat</span> <span class="title">Snapchat</span></a></li>';
		        		};
		        	?>
					<?php if(get_the_author_meta( 'user_url', $post->post_author )) {
		        		echo '<li><a target="_blank" id="website" href="';
		        		echo get_the_author_meta( 'user_url', $post->post_author );
		        		echo '" alt="Website of Author"><span class="icon">Website</span> <span class="title">Website</span></a></li>';
		        		};
		        	?>
		        </ul>
			</nav>
		</section>
		<?php endif;?>
		<?php

		$author_id = get_the_author_meta('ID');

		$args = array(
			'showposts' => -1,
			'author' => $author_id,
			'post_type' => 'resources',
			'orderby' => 'published',
			'order' => 'DESC'
		);

		$resources_query = new WP_Query( $args );


		if ( $resources_query->have_posts() ) :

			echo '<h2><span>🔗 Resources shared by ';
			echo get_the_author_meta( 'first_name' );
			echo '</span> 👇</h2><div id="links" class="wrap"><div class="loop">';

			while ( $resources_query->have_posts() ) : $resources_query->the_post();

				loopLinks();

			endwhile;

			echo '</div></div>';
			wp_reset_postdata();

		endif;

		?>

		<?php if (have_posts()): the_post(); ?>
		<section class="loop wrap">
			<h2><span>📰 Posts written by <?php echo get_the_author_meta( 'first_name' ); ?></span> 👇</h2>

			<?php rewind_posts(); while (have_posts()) : the_post(); ?>

			<?php loopDefault();?>

			<?php endwhile; ?>

			<?php else: ?>

		<?php endif; ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
