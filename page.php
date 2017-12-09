<?php get_header(); ?>
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
				<?php getShowcaseSection();?>
				<?php getPageFooter();?>
			</div><!--/belowPage-->

		</main>


</div>
<?php get_footer(); ?>
