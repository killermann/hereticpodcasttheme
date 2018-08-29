<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			<div class="titleWrap">
				<!-- post title -->
				<h1>
					<?php if(get_field('episode_number')) {
						echo '<span style="font-size:.666em" class="epNumber">';
						echo 'EP';
						echo the_field('episode_number');
						echo ':</span><br/>';
						};
					?>
					<?php the_title(); ?>
				</h1>
				<?php if (in_category('codex')) {?>
				<h2 class="subtitle">An entry from the <a href="https://hereticpodcast.com/codex/" title="The Heretic Codex of Social Justice Dogma">Codex</a> of Social Justice Dogma</h2>
				<?php }?>

				<!-- /post title -->

				<div class="podcastEpisodeLinks flexcontainer last">
					<h4>View this episode on</h4>
					<!-- podcast links -->
					<ul class="hostingPlatforms">
						<?php if(get_field('itunes_link')) {
								echo '<li><a data-ot="iTunes" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="itunes" href="';
								echo the_field('itunes_link');
								echo '" alt="Listen to Podcast on iTunes">iTunes</a></li>';
							}
							elseif(get_field('itunes_link', 'option')) {
								echo '<li><a data-ot="iTunes" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="itunes" href="';
								echo the_field('itunes_link', 'option');
								echo '" alt="Listen to Podcast on iTunes">iTunes</a></li>';
							};
						?>
						<?php if(get_field('spotify_link')) {
								echo '<li><a data-ot="Spotify" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="spotify" href="';
								echo the_field('spotify_link');
								echo '" alt="Listen to Podcast on Spotify">Spotify</a></li>';
							}
							elseif(get_field('spotify_link', 'option')) {
								echo '<li><a data-ot="Spotify" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="spotify" href="';
								echo the_field('spotify_link', 'option');
								echo '" alt="Listen to Podcast on Spotify">Spotify</a></li>';
							};
						?>
						<?php if(get_field('stitcher_link')) {
								echo '<li><a data-ot="Stitcher" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="stitcher" href="';
								echo the_field('stitcher_link');
								echo '" alt="Listen to Podcast on Stitcher">Stitcher</a></li>';
							}
							elseif(get_field('stitcher_link', 'option')) {
								echo '<li><a data-ot="Stitcher" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="stitcher" href="';
								echo the_field('stitcher_link', 'option');
								echo '" alt="Listen to Podcast on Stitcher">Stitcher</a></li>';
							};
						?>
						<?php if(get_field('tunein_link')) {
								echo '<li><a data-ot="TuneIn" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="tunein" href="';
								echo the_field('tunein_link');
								echo '" alt="Listen to Podcast on TuneIn">TuneIn</a></li>';
							}
							elseif(get_field('tunein_link', 'option')) {
								echo '<li><a data-ot="TuneIn" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="tunein" href="';
								echo the_field('tunein_link', 'option');
								echo '" alt="Listen to Podcast on TuneIn">TuneIn</a></li>';
							};
						?>
						<?php if(get_field('google_play_link')) {
							echo '<li><a data-ot="Google Play Music" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="googleplay" href="';
							echo the_field('google_play_link');
							echo '" alt="Listen to Podcast on Google Play">Google Play</a></li>';
							}
							elseif(get_field('google_play_link', 'option')) {
								echo '<li><a data-ot="Google Play Music" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="googleplay" href="';
								echo the_field('google_play_link', 'option');
								echo '" alt="Listen to Podcast on Google Play">Google Play</a></li>';
							};
						?>
					</ul>
				</div>

				<?php if(get_field('podcast')) { ?>
					<div class="podcast">
						<?php the_field('podcast');?>
					</div>
				<?php }
				else {
					if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
						<div style="margin-top:-6px" class="featuredImage">
							<?php the_post_thumbnail(); // Fullsize image for the single post ?>
						</div><?php
					endif;
				};?>

			</div>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<!-- post details -->
				<div class="postDeets fourcol last">
					<?php if(get_field('podcast')) { ?>
						<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
							<p style="margin-top:0;" class="featuredImage">
								<?php the_post_thumbnail(); // Fullsize image for the single post ?>
							</p>
						<?php endif; ?>
					<?php }?>
					<span class="author">👩‍💻 by <?php the_author_posts_link(); ?></span>
					<span class="date">📆 on <?php the_time('M j, Y'); ?></span>
					<span class="category">🗄 in <?php $parentscategory ="";foreach((get_the_category()) as $category) {if ($category->category_parent == 0) {$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';}} echo substr($parentscategory,0,-2); ?></span>
					<span class="comments">💬 <?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Comment', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
				</div>
				<!-- /post details -->

				<div class="entry-content">
					<?php the_content(); // Dynamic Content ?>
				</div>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>
	<section id="belowSingle" class="sectionWide clearfix">

		<div class="sixcol clearfix last">
		<?php if(get_field('episode_number')) {

			$episodepre = "ep";
			$episodeNumber = get_field('episode_number');
			$tagslug = $episodepre . $episodeNumber;

			$args = array(
				'showposts' => -1,
				'post_type' => 'resources',
				'tag_slug__in' => $tagslug,
				'orderby' => 'published',
				'order' => 'DESC'
			);

			$resources_query = new WP_Query( $args );


			if ( $resources_query->have_posts() ) :

				echo '<div id="links" class="wrap"><h3>🔗 Linked Resources</h3><div class="loop">';

				while ( $resources_query->have_posts() ) : $resources_query->the_post();

					loopLinks();

				endwhile;

				echo '</div></div>';
				wp_reset_postdata();


			else: echo '<div id="links" class="wrap"><h3>🔗 Linked Resources</h3><div class="loop">No related links for this episode 😿 <strong>Sorry, friend!</strong></div></div>';

			endif; };?>
		</div>
		<div class="sixcol clearfix first">
			<?php getCommentsBox();?>
		</div>

		<div id="sidebar" class="sixcol last clearfix">
			<?php get_sidebar(); ?>
		</div>
	</section>

<?php get_footer(); ?>
