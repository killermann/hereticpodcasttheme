<?php
/*
Template Name: All
*/

get_header(); ?>

<div id="page">

		<div id="inner-content" class="wrap archive clearfix">

				<div id="main" class="clearfix" role="main">
						<header class="page-header">
							<div class="featuredImage">
								<?php the_post_thumbnail('600') ?>
							</div>
							<h1 class="page-title">All <?php $numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
	if (0 < $numposts) $numposts = number_format($numposts); ?>
	<?php echo $numposts.' Thoughts Published So Far:'; ?>
		</h1>
		           		</header>

					<ul id="archive-list">
						<?php
						$myposts = get_posts('numberposts=-1&');
						foreach($myposts as $post) : ?>
							<li>
								<span class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>

								<span class="postDeets">
									<?php
										$category = get_the_category();
										if ($category) {
										  echo '<a href="' . get_category_link( $category[0]->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category[0]->name ) . '" ' . '>' . $category[0]->name.'</a> ';
										}
										?>
									<?php the_time('m/d/y') ?>
								</span>
							</li>

						<?php endforeach; ?>
					</ul>

				</div> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>
