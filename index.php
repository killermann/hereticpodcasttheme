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

	<main id="all" role="main">
		<div id="blogAbout" role="sidebar" class="wrap">
			<h3 style="display:block; background-image:url('<?php echo get_template_directory_uri(); ?>/img/heading-huh.svg'); width:100px; height:56px;" class="image-replacement">Huh? What is Heretic?</h3>
			<p>Heretic is a podcast about the social justice movement and the unwritten rules that underpin (and may undermine) it. With guest activists, authors, and artists who have who have been pushed to the fringes by the movement, spent their lives fighting for social justice, or fighting against it, it’s a light conversation about the darkness in society.</p>
			<?php echo getHereticNav();?>
		</div>
		<div class="wrap">
			<section class="loop">
				<div class="post-filters">
					<form class="flexcontainer">
						<span>🎚 Filter Posts: </span>
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
										'episodes' => 'Episodes',
										'articles' => 'Articles',
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

				<?php get_template_part('loop'); ?>

				<?php get_template_part('pagination'); ?>

			</section>
		</div>

		<div role="sidebar" class="hiImSam wrap">
			<a href="https://hereticpodcast.com/about/about-the-host/" alt="About the host, Sam Killermann">
	            <img src="<?php echo get_template_directory_uri(); ?>/img/hi-im-sam-bottom-shadow.png" alt="Meet Sam Killermann">
	        </a>
	        <p>
	            <strong>Hi! I’m your host, <a href="https://hereticpodcast.com/about/about-the-host/" alt="About the host, Sam Killermann">Sam Killermann</a></strong>, a long-time activist, educator, and artist.
	        </p>
	        <ul>
	            <li>
	                <a href="https://hereticpodcast.com/about/about-the-host/" alt="Read Sam's Story">
	                    Read why I’m a social justice heretic.
	                </a>
	            </li>
	            <li>
	                <a target="_blank" href="http://m.me/hereticpodcast" alt="Write a Facebook Message to Heretic">
	                    Message me.
	                </a>
	            </li>
				<li>
	                <a target="_blank" href="https://hereticpodcast.com/guest-submissions-voting/" title="Nominate or Vote on a Guest for the Podcast">
	                    Nominate a guest.
	                </a>
	            </li>
	        </ul>
		</div>
	</main>

<?php get_footer(); ?>
