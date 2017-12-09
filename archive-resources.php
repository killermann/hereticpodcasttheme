<?php

global $wp_query;
$modifications = array();
if( !empty( $_GET['catname'] ) ) {
	$modifications['category_name'] = $_GET['catname'];
}

$args = array_merge(
	$wp_query->query_vars,
	$modifications
);

query_posts( $args );

get_header(); ?>

	<main role="main">
		<!-- section -->
		<section id="resources" class="loop wrap clearfix">
			<h1>🔗 All Resources</h1>
			<div class="post-filters">
				<form class="flexcontainer">
					<span>🎚 Filter Resources: </span>
					<div>
						<label for="orderby">Order By</label>
						<select id="orderby" name="orderby">
							<?php
								$orderby_options = array(
									'post_date' => 'Date',
									'post_title' => 'Title',
								);
								foreach( $orderby_options as $value => $label ) {
									echo "<option ".selected( $_GET['orderby'], $value )." value='$value'>$label</option>";
								}
							?>
						</select>
					</div>
					<div>
						<select id="order" name="order">
							<?php
								$order_options = array(
									'DESC' => 'Descending',
									'ASC' => 'Ascending',
								);
								foreach( $order_options as $value => $label ) {
									echo "<option ".selected( $_GET['order'], $value )." value='$value'>$label</option>";
								}
							?>
						</select>
					</div>
					<div>
						<label for="catname">Type</label>
						<select id="catname" name="catname">
							<?php
								$order_options = array(
									'' => 'All',
									'articles' => 'Articles',
									'books' => 'Books',
									'downloads' => 'Downloads',
									'videos' => 'Videos',
								);
								foreach( $order_options as $value => $label ) {
									echo "<option ".selected( $_GET['catname'], $value )." value='$value'>$label</option>";
								}
							?>
						</select>
					</div>
					<button class="button button-grey" type="submit">⚙️ Filter</button>
				</form>
			</div><!--/post-filters-->

			<?php if (have_posts()): while (have_posts()) : the_post();

				loopLinks();

			endwhile; ?>

			<?php else: ?>

				<!-- article -->
				<article class="sad-message">
					<big>Oh no! We don't have what you're looking for. 😿 <strong>Sorry, friend!</strong></big>
				</article>
				<!-- /article -->

			<?php endif; ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
