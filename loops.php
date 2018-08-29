<?php

/**************************************
DEFAULT LOOP
**************************************/

function loopDefault() {?>
	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php
			if(get_field('podcast')) { ?>
				<div class="flexcontainer">
					<h4 class="postTitle">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<?php if(get_field('episode_number')) {
								echo '<span class="epNumber">';
								echo 'EP';
								echo the_field('episode_number');
								echo ':</span> ';
								};
							?>
							<?php echo the_title();	?>
						</a>
					</h4>
					<a class="readmore button button-grey" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						View Episode
					</a>
				</div>

				<div class="podcast">
					<?php the_field('podcast');?>
				</div>
			<?php }

			elseif (in_category('codex')) {?>
				<h4>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_title(); ?>
					</a>
				</h4>
				<div class="codex--banner"><em>From the <a href="https://hereticpodcast.com/codex/" title="The Heretic Codex of Social Justice Dogma">Codex</a> of Social Justice Dogma</em></div>

				<?php the_content() ?>

			<?php }

			else {?>
				<h4>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_title(); ?>
					</a>
				</h4>
				<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
					<a class="featuredImage" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail(); // Declare pixel size you need inside the array ?>
					</a>
				<?php endif; ?>
				<div class="clearfix">
					<div class="postDeets fourcol last">
						<span class="author">👩‍💻 by <?php the_author_posts_link(); ?></span>
						<span class="date">📆 on <?php the_time('M j, Y'); ?></span>
						<span class="category">🗄 in <?php $parentscategory ="";foreach((get_the_category()) as $category) {if ($category->category_parent == 0) {$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';}} echo substr($parentscategory,0,-2); ?></span>
						<span class="comments">💬 <?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Comment', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></span>
					</div>
					<!-- /post details -->
					<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
				</div>
			<?php }
		?>

	</article>
	<!-- /article -->
<?php }

/**************************************
LINKS LOOP
**************************************/

function loopLinks() {?>
	<!-- article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if(get_field('link_url')) {
			echo '<a href="';
			echo the_field('link_url');
			echo '" alt="';
			echo the_title();
			echo '">';
			};
		?>
			<h4><?php the_title(); ?></h4>
			<?php html5wp_excerpt('html5wp_index');?>
		</a>
	</article>
<?php }

/**************************************
CHILD PAGE LOOP
**************************************/

function childPageLoop(){?>
<a href="<?php the_permalink() ?>" <?php post_class('clearfix childPage'); ?> rel="bookmark" title="<?php the_title_attribute(); ?>">
	<article id="post-<?php the_ID(); ?>" role="article">
		<div>
			<h4><?php the_title(); ?></h4>
			<?php if (has_excerpt()){
				echo '<h5>';
				echo the_excerpt();
				echo '</h5>';
			};?>
		</div>

	</article> <!-- end blogged -->
</a>
<?php }
