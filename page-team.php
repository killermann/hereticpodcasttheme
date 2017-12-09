<?php /* Template Name: Team Page */ get_header(); ?>

	<div class="clearfix">
		<main role="main">
			<!-- section -->
			<section>

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
				<!-- /article -->

			<?php endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article>

					<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

				</article>
				<!-- /article -->

			<?php endif; ?>

			</section>

			<div id="belowPage">
				<section class="morePages">

						<?php $args = array(
							'post_parent' => $post->ID,
							'post_type' => 'page',
							'orderby' => 'menu_order'
						);

						$child_query = new WP_Query( $args );

						$postcount = $child_query->post_count;

						if ( $child_query->have_posts() ) :
							echo '<div id="childPageContainer" class="count';
							echo $postcount;
							echo '"><div class="wrap flexcontainer">';

							while ( $child_query->have_posts() ) : $child_query->the_post();?>

							<a href="<?php the_permalink() ?>" <?php post_class('clearfix childPage teamMember'); ?> rel="bookmark" title="<?php the_title_attribute(); ?>">
								<article id="post-<?php the_ID(); ?>" role="article">
									<div>
										<?php the_post_thumbnail('medium'); ?>
										<h4><?php the_title(); ?></h4>
										<?php if (has_excerpt()){
											echo '<h5>';
											echo the_excerpt();
											echo '</h5>';
										};?>
									</div>

								</article> <!-- end blogged -->
							</a>

							<?php endwhile;
							echo '</div></div>';
							wp_reset_postdata();
						endif;
						?>
				</section>
			</div><!--/belowPage-->

		</main>
</div>
<?php get_footer(); ?>
