<?php get_header(); ?>

	<main role="main">
		<div class="wrap">
			<section class="loop">

				<h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>

				<?php get_template_part('loop'); ?>

				<?php get_template_part('pagination'); ?>

			</section>
		</div>
	</main>

<?php get_footer(); ?>
