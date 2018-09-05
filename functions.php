<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

require_once('loops.php');

require_once('admin.php');

function pn_body_class_add_categories( $classes ) {

	// Only proceed if we're on a single post page
	if ( !is_single() )
		return $classes;

	// Get the categories that are assigned to this post
	$post_categories = get_the_category();

	// Loop over each category in the $categories array
	foreach( $post_categories as $current_category ) {

		// Add the current category's slug to the $body_classes array
		$classes[] = 'category-' . $current_category->slug;

	}

	// Finally, return the $body_classes array
	return $classes;
}

add_filter( 'body_class', 'pn_body_class_add_categories' );

function getHostingPlatformsListItems() {
	?>
	<?php if(get_field('itunes_link', 'option')) {
		echo '<li><a target="_blank" data-ot="iTunes" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="itunes" href="';
		echo the_field('itunes_link', 'option');
		echo '" alt="Listen to Podcast on iTunes">iTunes</a></li>';
		};
	?>
	<?php if(get_field('spotify_link', 'option')) {
		echo '<li><a target="_blank" data-ot="Spotify" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="spotify" href="';
		echo the_field('spotify_link', 'option');
		echo '" alt="Listen to Podcast on Spotify">Spotify</a></li>';
		};
	?>
	<?php if(get_field('overcast_link', 'option')) {
		echo '<li><a target="_blank" data-ot="Overcast" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="overcast" href="';
		echo the_field('overcast_link', 'option');
		echo '" alt="Listen to Podcast on Overcast">Overcast</a></li>';
		};
	?>
	<?php if(get_field('anchor_link', 'option')) {
		echo '<li><a target="_blank" data-ot="Anchor" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="anchor" href="';
		echo the_field('anchor_link', 'option');
		echo '" alt="Listen to Podcast on Anchor">Anchor</a></li>';
		};
	?>
	<?php if(get_field('pocketcasts_link', 'option')) {
		echo '<li><a target="_blank" data-ot="Pocket Casts" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="pocketcasts" href="';
		echo the_field('pocketcasts_link', 'option');
		echo '" alt="Listen to Podcast on Pocket Casts">Pocket Casts</a></li>';
		};
	?>
	<?php if(get_field('soundcloud_link', 'option')) {
		echo '<li><a target="_blank" data-ot="Soundcloud" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="soundcloud" href="';
		echo the_field('soundcloud_link', 'option');
		echo '" alt="Listen to Podcast on Soundcloud">Soundcloud</a></li>';
		};
	?>
	<?php if(get_field('stitcher_link', 'option')) {
		echo '<li><a target="_blank" data-ot="Stitcher" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="stitcher" href="';
		echo the_field('stitcher_link', 'option');
		echo '" alt="Listen to Podcast on Stitcher">Stitcher</a></li>';
		};
	?>
	<?php if(get_field('tunein_link', 'option')) {
		echo '<li><a target="_blank" data-ot="TuneIn" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="tunein" href="';
		echo the_field('tunein_link', 'option');
		echo '" alt="Listen to Podcast on TuneIn">TuneIn</a></li>';
		};
	?>
	<?php if(get_field('google_podcasts_link', 'option')) {
		echo '<li><a target="_blank" data-ot="Google Podcasts" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="googlepodcasts" href="';
		echo the_field('google_podcasts_link', 'option');
		echo '" alt="Listen to Podcast on Google Podcasts">Google Podcasts</a></li>';
		};
	?>
	<?php if(get_field('google_play_link', 'option')) {
		echo '<li><a target="_blank" data-ot="Google Play Music" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" id="googleplay" href="';
		echo the_field('google_play_link', 'option');
		echo '" alt="Listen to Podcast on Google Play">Google Play</a></li>';
		};
	?>
<?php }

function getLatestEpisode() { ?>
	<article id="latestEpisodeContainer" class="flexcontainer clearfix">
		<?php
		query_posts(array(
			'post_type' => 'post' ,
			'orderby' => 'date' ,
			'order' => 'DESC' ,
			'showposts' => 1,
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => 'episodes' // this gets the page slug
				)
			)
		));?>

		<?php if ( have_posts()) : while ( have_posts() ) : the_post(); ?>

		<div class="prompt">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<span>Listen to the</span>
				<div style="background-image:url('<?php echo get_template_directory_uri(); ?>/img/heading-latest-episode.svg'); width:228px; height:40px;" class="image-replacement">Latest Episode</div>
			</a>
		</div>
		<div class="actions">

			<a data-ot="Play Latest" data-ot-delay=".2" data-ot-tip-joint="bottom" data-ot-target-joint="top" data-ot-target="true" class="primary" href="<?php the_permalink() ?>/#Listen" rel="bookmark" title="<?php the_title_attribute(); ?>">
				<img alt="Play Latest" rel="Play Latest" src="<?php echo get_template_directory_uri(); ?>/img/icon-play.svg"/ width="32" height="32">
			</a>

			<!-- <a data-ot="Download" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true"class="secondary" href="<?php echo the_field('podcast_download');?>" alt="Download this Episode">
				<img alt="Download" rel="Download" src="<?php echo get_template_directory_uri(); ?>/img/icon-download.svg"/ width="32" height="32">
			</a> -->

			<?php endwhile; else: endif; wp_reset_query();
		?>
		</div>

	</article><!--/latestEpisode-->
<?php
}

function getHereticNav() {?>
	<ul class="hereticNav">
		<li>
			<a id="subscribe" href="<?php echo home_url(); ?>/subscribe" alt="">
				<svg viewBox="0 0 100 100" class="icon">
				  <use xlink:href="#subscribeIcon">
				</svg>
				<div>
					Subscribe
					<span>on your favorite podcast app</span>
				</div>
			</a>
		</li>
		<li>
			<a id="about" href="<?php echo home_url(); ?>/about" alt="">
				<svg viewBox="0 0 100 100" class="icon">
				  <use xlink:href="#learnIcon">
				</svg>
				<div>
					About
					<span>read more about heretic</span>
				</div>
			</a>
		</li>
		<li>
			<a id="join" class="mobileHide" href="<?php echo home_url(); ?>/join" alt="">
				<svg viewBox="0 0 100 100" class="icon">
				  <use xlink:href="#joinIcon">
				</svg>
				<div>
					Join
					<span>become a heretic</span>
				</div>
			</a>
		</li>
	</ul>

<?php }

function getShowcaseSection() {?>
	<?php if( have_rows('showcase_section') ): ?>
	<section class="showcase">

		<?php while( have_rows('showcase_section') ): the_row();

			// vars
			$image = get_sub_field('showcase_image');
			$content = get_sub_field('showcase_content');
			$link = get_sub_field('showcase_link');
			$linktext = get_sub_field('showcase_link_text');
			?>
			<div class="showcaseSection">

			<?php if( $image ): ?>
				<div class="showcaseImage">

					<?php if( $link ): ?>
						<a href="<?php echo $link; ?>">
					<?php endif; ?>

						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

					<?php if( $link ): ?>
						</a>
					<?php endif; ?>

				</div>
			<?php endif; ?>
				<div class="showcaseContent">
					<?php echo $content; ?>

					<?php if( $link ): ?>
						<span class="showcaseLink">
							<a class="button" href="<?php echo $link; ?>">
								<?php if( $linktext ): ?>
									<?php echo $linktext; ?>
								<?php else: ?>
									Read More
								<?php endif; ?>
							</a>
						</span>
					<?php endif; ?>
				</div>

			</div><!--/showcase-section-->

		<?php endwhile; ?>

	</section>	<!-- /section -->
	<?php endif; ?>
<?php }

function getPageFooter() {?>
	<div class="pageFooter">
		<section class="relatedResources">
			<?php //SHOW RELATED RESOURCES FOR THIS PAGE
			global $post;
			$page_slug=$post->post_name;
			$tagslug = $page_slug;

			$args = array(
				'showposts' => -1,
				'post_type' => 'resources',
				'tag_slug__in' => $tagslug,
				'orderby' => 'published',
				'order' => 'DESC'
			);

			$resources_query = new WP_Query( $args );


			if ( $resources_query->have_posts() ) :

				echo '<h3 style="text-align:center">🔗 Linked Resources</h3><div id="links" class="wrap"><div class="loop">';

				while ( $resources_query->have_posts() ) : $resources_query->the_post();

					loopLinks();

				endwhile;

				echo '</div></div>';
				wp_reset_postdata();

			endif; ?>
		</section>
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
					echo '"><h3>🔭 Explore</h3><div class="wrap flexcontainer">';

					while ( $child_query->have_posts() ) : $child_query->the_post();

					childPageLoop();

					endwhile;
					echo '</div></div>';
					wp_reset_postdata();
				endif;
				?>
		</section>
		<?php get_sidebar(); ?>
	</div>
<?php }


function getMailingList() { ?>

	<div class="hereticMailingListWrap clearfix">
		<div class="hereticMailingList clearfix">
			<h3>💌 Do you want an email when<br/> new episodes come out?</h3>
			<ul class="buttonList flexcontainer">
				<li>
					<a class="button" alt="Get emails with new episodes" target="_blank" href="<?php echo the_field('mailing_list', 'option');?>">
						🤓 Yes, please.
					</a>
				</li>
				<li>
					<a class="button button-grey" href="<?php echo home_url(); ?>/subscribe" alt="Subscribe to the Podcast">
						🖱 Other options?
					</a>
				</li>
			</ul>
		</div>
	</div>

<?php }


function getLoopSubscribe() { ?>

	<article class="subscribeLoop clearfix yellow-bg rounded">
		<h3 class="subscribe-heading">Subscribe</h3>
		<h4>Never miss a new episode<br/>
			<small>(unless you want to)</small></h4>
		<ul class="hostingPlatforms">
			<li>
				<a data-ot="Email List" data-ot-delay=".2" data-ot-tip-joint="top" data-ot-target-joint="bottom" data-ot-target="true" target="_blank" id="email" href="<?php echo the_field('mailing_list', 'option');?>">
					💌
				</a>
			</li>
			<?php echo getHostingPlatformsListItems();?>
		</ul>
	</article>

<?php }


function getCommentsBox() {?>

	<svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="768" height="800" viewBox="0 0 768 800"><defs><g id="icon-close"><path class="cls-1" d="M37.62.29c-1.06-1.06-2.68,1.05-3.35,1.64C33.5,1.74,32,3.32,31.88,3.42c4.84-4.71,1-3.41-2.18-.75C30.76.3,27,3.15,26.87,3.3c.71-.71,1.44-2.13-.4-1.77-.79.16-2.1,2.09-2.65,2.63C21.57,6.38,19.3,8.6,17,10.77c-2.85-3-5.65-6.13-8.7-8.95-2-1.89-5-2.62-2.47.74C2.21-1.09.88.08,4.89,4.21c-1.14.81.72,2.58,1,3,.05,1.92,4.7,6.84,5.93,8.47h0l-.17.16C10.57,14.68,1.92,4.46.76,5.63S9.21,15.72,10.42,17C7.19,20.17,3.5,23.66,1,27.42c-2.67,4,.89,1.83,2.77-.13-2.61,3.13-1.55,4.09,1.32,1.29s5.44-5.8,8.13-8.68c.1.11.2.22.31.32Q9,25.08,4.43,29.92C2.34,32.14,1.9,35.17,5,32a1,1,0,0,0,.19.22.69.69,0,0,0,0,.35.86.86,0,0,0-.1.32c-.67,1-2.94,3-3,4-.14,3.06,2.4.48,3.45-.53,4.05-3.9,7.88-8.09,11.75-12.17,3.31,3.5,6.57,7.05,9.92,10.5,2.91,3,4.91,2.22,1.81-1.25a14.37,14.37,0,0,0,2.54,1.11c.48.41,1.61,1.44,2.29.67,2.78.6,1.39-1.49-.68-2.13a27.53,27.53,0,0,0-2.31-2.4,1,1,0,0,0,.34.06c.55.52,2.38,1,2.3-.29,1.45,1.32,1.31-.86,1.29-1.3,0-1.07-2-2.29-2.7-3-2.79-2.92-5.63-5.79-8.47-8.66C25.11,15.88,39.38,2.06,37.62.29Z"/></svg>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

	<section id="comments" class="fishbowl">
		<a class="commentsModal-toggle" alt="Leave a Comment">
			<h3 class="fishbowl-heading comment">💬 Comment</h3>
		</a>
	</section>

	<div class="commentsModal modal">
		<div class="modal-overlay commentsModal-toggle"></div>
		<div class="modal-wrapper modal-transition">
			<button class="modal-close commentsModal-toggle"><svg class="icon-close icon"><use xlink:href="#icon-close"></use></svg></button>
			<div class="modal-header">
				<h3 class="modal-heading">💬 Comments<br/> Coming Soon</h3>
			</div>
			<div class="modal-body">
				<div class="modal-content">
				<p>We're still adding stuff to this platform, and community features are goal number one. <strong>Want an email when we add comments?</strong> Submit a good address below and you'll be first to know.</p>

				<!-- Begin MailChimp Signup Form -->
				<div id="mc_embed_signup">
				<form action="https://hereticpodcast.us16.list-manage.com/subscribe/post?u=e26f6dbb684880ab664c6b05c&amp;id=479126e048" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				    <div id="mc_embed_signup_scroll">
				<div class="mc-field-group">

					<input type="email" value="" name="EMAIL" class="required email" placeholder="your@email.com" id="mce-EMAIL">
				</div>

					<div id="mce-responses" class="clear">
						<div class="response" id="mce-error-response" style="display:none"></div>
						<div class="response" id="mce-success-response" style="display:none"></div>
					</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
				    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_e26f6dbb684880ab664c6b05c_479126e048" tabindex="-1" value=""></div>
				    <div class="clear"><input type="submit" value="Lemme know!" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
				    </div>
				</form>
				</div>

				<!--End mc_embed_signup-->
				</div>
			</div>
		</div>
	</div><!--/modal-->

	<section id="join" class="fishbowl">
		<a class="joinModal-toggle" alt="Join the Heretic Community">
			<h3 class="fishbowl-heading join">Join</h3>
		</a>
	</section>

	<div class="joinModal modal">
		<div class="modal-overlay joinModal-toggle"></div>
		<div class="modal-wrapper modal-transition">
			<button class="modal-close joinModal-toggle"><svg class="icon-close icon"><use xlink:href="#icon-close"></use></svg></button>
			<div class="modal-header">
				<h3 class="modal-heading">🤗 Join the</br> Community</h3>
			</div>
			<div class="modal-body">
				<div class="modal-content">
				<p>You're interested in becoming a Heretic? Great to hear! <strong>Would you rather sign up on this site or using Patreon</strong> (third party platform for creators)?</p>
				<a target="_blank" class="button" href="http://eepurl.com/c_ZGbz" alt="Sign up to join at HereticPodcast.com">👇 Here</a>
				<a target="_blank" class="button" href="http://patreon.com/HereticPodcast" alt="Join the Community on Patreon">👋 Patreon</a>
				</div>
			</div>
		</div>
	</div><!--/modal-->

	<script >// Quick & dirty toggle to demonstrate modal toggle behavior https://codepen.io/anon/pen/oopvOP
		$('.commentsModal-toggle').on('click', function(e) {
		  $('.commentsModal').toggleClass('is-visible');
		});
		$('.joinModal-toggle').on('click', function(e) {
		  $('.joinModal').toggleClass('is-visible');
		});
	</script>


<?php }

/*------------------------------------*\
	ADVANCED CUSTOM FIELDS
\*------------------------------------*/

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Podcast Platforms & Social Links',
		'menu_title'	=> 'Podcast',
		'menu_slug' 	=> 'podcast-settings',
		'icon_url' 		=> 'dashicons-editor-table',
		'position' 		=> 7,
		'capability'	=> 'manage_options',
	));
}

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_59de5375a8731',
	'title' => 'Resource',
	'fields' => array (
		array (
			'key' => 'field_59de5383dc33e',
			'label' => 'Link URL',
			'name' => 'link_url',
			'type' => 'url',
			'instructions' => 'Copy/paste the entire URL (including "http://www."...)',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'http://www...',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'resources',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'the_content',
		1 => 'custom_fields',
		2 => 'discussion',
		3 => 'comments',
		4 => 'revisions',
		5 => 'author',
		6 => 'format',
		7 => 'page_attributes',
		8 => 'featured_image',
		9 => 'send-trackbacks',
	),
));

acf_add_local_field_group(array (
	'key' => 'group_59de522c446e7',
	'title' => 'Podcast Embed',
	'fields' => array (
		array (
			'key' => 'field_59de523dac989',
			'label' => 'Embed Podcast Episode',
			'name' => 'podcast',
			'type' => 'textarea',
			'instructions' => 'Copy/paste embed code from Soundcloud (or wherever).',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 3,
			'new_lines' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'post',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => array (
		0 => 'send-trackbacks',
	),
));

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_59ee0bab43225',
	'title' => 'Podcast Platform Links',
	'fields' => array (
		array (
			'key' => 'field_59ee0bd44e9dc',
			'label' => 'Spotify Link',
			'name' => 'spotify_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_59ee1bd44e9dc',
			'label' => 'Google Podcasts Link',
			'name' => 'google_podcasts_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_52ee1bd40e9dc',
			'label' => 'Anchor Link',
			'name' => 'anchor_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_69ee1bd99e9dc',
			'label' => 'Overcast Link',
			'name' => 'overcast_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_69ee3bd18e9dc',
			'label' => 'Pocket Casts Link',
			'name' => 'pocketcasts_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_59ee0bf24e9dd',
			'label' => 'iTunes Link',
			'name' => 'itunes_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_59ee0bffe920f',
			'label' => 'Soundcloud Link',
			'name' => 'soundcloud_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_59ee0c06e9210',
			'label' => 'Stitcher Link',
			'name' => 'stitcher_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_59ee0c0ee9211',
			'label' => 'TuneIn Link',
			'name' => 'tunein_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_59ee0c33e9212',
			'label' => 'Google Play Link',
			'name' => 'google_play_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'podcast-settings',
			),
		),
		array (
			array (
				'param' => 'post_category',
				'operator' => '==',
				'value' => 'category:episodes',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;

acf_add_local_field_group(array (
	'key' => 'group_59df962c21af9',
	'title' => 'Postcast Social Links',
	'fields' => array (
		array (
			'key' => 'field_59df962c248e8',
			'label' => 'Mailing List',
			'name' => 'mailing_list',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_59df962c247e7',
			'label' => 'Facebook Link',
			'name' => 'facebook_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_59df962c247f1',
			'label' => 'Twitter Link',
			'name' => 'twitter_link',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_59df962c247fb',
			'label' => 'Youtube Link',
			'name' => 'youtube_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
		),
		array (
			'key' => 'field_59df962c24814',
			'label' => 'Instagram Link',
			'name' => 'instagram_link',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'podcast-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_59de55c0edff8',
	'title' => 'Podcast Episode Attributes',
	'fields' => array (
		array (
			'key' => 'field_59de55cd737d2',
			'label' => 'Episode Number',
			'name' => 'episode_number',
			'type' => 'number',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'min' => '',
			'max' => '',
			'step' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_59df92bbc9b2d',
			'label' => 'Podcast Download File',
			'name' => 'podcast_download',
			'type' => 'file',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_category',
				'operator' => '==',
				'value' => 'category:episodes',
			),
		),
	),
	'menu_order' => 1,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5a04aa0f3cdb9',
	'title' => 'Additional Social Media Profiles & Links',
	'fields' => array (
		array (
			'key' => 'field_5a04aa7fb0b79',
			'label' => 'Snapchat Username',
			'name' => 'snapchat_username',
			'type' => 'text',
			'instructions' => 'Not the link, just the username',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Your Snapchat Name',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5a04ab99889aa',
			'label' => 'LinkedIn Username',
			'name' => 'linkedin_username',
			'type' => 'text',
			'instructions' => 'Not the link, just the username',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'http://linkedin.com/in/[THIS PART]',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5a04abb9889ab',
			'label' => 'Instagram Username',
			'name' => 'instagram_username',
			'type' => 'text',
			'instructions' => 'Not the link, just the username',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '@[THIS PART]',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_5a04abde8d2bb',
			'label' => 'YouTube Username',
			'name' => 'youtube_username',
			'type' => 'text',
			'instructions' => 'Not the link, just the username',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'https://www.youtube.com/user/[THIS PART]',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'user_form',
				'operator' => '==',
				'value' => 'all',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'acf_after_title',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
));

endif;
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5a05e3ff3cf5e',
	'title' => 'Page Showcase',
	'fields' => array(
		array(
			'key' => 'field_5a05e621ae0fc',
			'label' => 'Showcase Section',
			'name' => 'showcase_section',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 0,
			'max' => 0,
			'layout' => 'row',
			'button_label' => 'Add Section',
			'sub_fields' => array(
				array(
					'key' => 'field_5a05e648ae0fd',
					'label' => 'Image',
					'name' => 'showcase_image',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'array',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_5a05e668ae0fe',
					'label' => 'Content',
					'name' => 'showcase_content',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
				array(
					'key' => 'field_5a05e691ae0ff',
					'label' => 'Link',
					'name' => 'showcase_link',
					'type' => 'page_link',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'post_type' => array(
					),
					'taxonomy' => array(
					),
					'allow_null' => 1,
					'allow_archives' => 1,
					'multiple' => 0,
				),
				array(
					'key' => 'field_5a061bc2852a5',
					'label' => 'Link Text',
					'name' => 'showcase_link_text',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'Read More',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
			),
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

/*

	ENABLE EXCERPTS FOR PAGES

*/

add_post_type_support( 'page', 'excerpt' );

/*

	BREADCRUMBS

*/
function custom_breadcrumbs() {

    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Home';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            } else {

                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }

        echo '</ul>';

    }

}
/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	// wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        // wp_enqueue_script('conditionizr'); // Enqueue it!
        //
        // wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        // wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('html5blank', get_template_directory_uri() . '/css/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts

// add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar

add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'resources'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'resources');
    register_post_type('resources', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Resources', 'html5blank'), // Rename these to suit
            'singular_name' => __('Resource', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New Resource', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit Resource', 'html5blank'),
            'new_item' => __('New Resource', 'html5blank'),
            'view' => __('View Resources', 'html5blank'),
            'view_item' => __('View Resource', 'html5blank'),
            'search_items' => __('Search Resources', 'html5blank'),
            'not_found' => __('No Resources found', 'html5blank'),
            'not_found_in_trash' => __('No Resources found in Trash', 'html5blank')
        ),
        'public' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-admin-links',
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'excerpt'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

/*------------------------------------*\
	Customize Admin Area
\*------------------------------------*/

function remove_dashboard_widgets() {
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['jetpack_summary_widget']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['wpseo-dashboard-overview']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['pressable_dashboard_widget']);
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


function set_default_admin_color($user_id) {
    $args = array(
        'ID' => $user_id,
        'admin_color' => 'blue'
    );
    wp_update_user( $args );
}
add_action('user_register', 'set_default_admin_color');

// SHOW/HIDE MENU ITEMS BASED ON USER role
add_action( 'admin_init', 'my_customize_menu_pages' );
function my_customize_menu_pages() {

    global $user_ID;

    if ( current_user_can( 'contributor' ) ) {
		remove_menu_page('tools.php');
		remove_menu_page('jetpack.php');
		remove_menu_page('options-general.php'); // Settings
		remove_menu_page('edit-comments.php'); // Comments
		remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
		remove_action( 'personal_options', 'personal_options' );

		add_filter( 'show_admin_bar', '__return_false' );

		//HIDES POSTS BY OTHER USERS

		if ( ! isset( $_GET['author'] ) ) {
           wp_redirect( add_query_arg( 'author', $user_ID ) );
           exit;
        }

		// WECOME MESSAGE FOR DASHBOARD

		function contributor_welcome_widget() {
			echo '
			<h2>🆘‍ Need help getting started?</h2>
			<p><big>Here are a few helpful links to get things moving smoothly for you:</big></p>
			<ul>
				<li>
					<a href="profile.php" alt="Edit your Profile"><strong>👨🏽‍🎨 Create/Edit Your Profile</a></strong>: Click "Profile" in the menu, or <a href="profile.php" alt="Edit your Profile">click this link</a>. We will use this information when we promote your stuff.
				</li>
				<li>
					<a href="edit.php?post_type=resources" alt="Recommend a Resource"><strong>🔗 Recommend a Resource</a></strong>: Click "Resources" in the menu then "Add New", or <a href="edit.php?post_type=resources" alt="Recommend a Resource">click this link</a> if you want to suggest an article, book, video, or other resource you think the community will appreciate (self promotion is <em>TOTALLY</em> okay here!).
				</li>
				<li>
					<a href="edit.php" alt="Contribute a Blog Post/Article"><strong>👩‍💻 Contribute a Blog Post/Article</a></strong>: Click "Posts" in the menu then "Add New", or <a href="edit.php" alt="Contribute a Blog Post/Article">click this link</a> if you want to contribute a blog post. Write it, submit it when ready, and an editor will review and publish it.
				</li>
			</ul>
			';
		}
		function add_contributor_welcome_widget() {
			wp_add_dashboard_widget('contributor_welcome_widget', 'Welcome to the Heretic Podcast Site', 'contributor_welcome_widget');
		}
		add_action('wp_dashboard_setup', 'add_contributor_welcome_widget');

		function podcast_guest_welcome_widget() {
			echo '
			<h2>🎙 For Future Podcast Guests</h2>
			<p><big>We created a mini-site within this site that we hope will help answer any questions you might have.</big></p>
			<p>
				<a href="http://hereticpodcast.com/for-guests" alt="Guesting on Heretic" class="button">
					📖 Guesting on Heretic: A Primer
				</a>
			</p>
			';
		}
		function add_podcast_guest_welcome_widget() {
			wp_add_dashboard_widget('podcast_guest_welcome_widget', 'A Primer for Guests', 'podcast_guest_welcome_widget');
		}
		add_action('wp_dashboard_setup', 'add_podcast_guest_welcome_widget');
    }

	if ( current_user_can( 'administrator' ) ) {
		//WECOME MESSAGE FOR DASHBOARD

		function custom_dashboard_widget() {
			echo '
			<h2>New Podcast Post Checklist</h2>
			<p><big>Here are the required steps:</big></p>
			<ul>
				<li>
					<label for="sop1"><input id="sop1" type="checkbox"> Title for Post (with keywords and guest name)</label>
				</li>
				<li>
					<label for="sop2"><input id="sop2" type="checkbox"> Podcast embed (from Soundcloud)</label>
				</li>
				<li>
					<label for="sop3"><input id="sop3" type="checkbox"> Select "Episodes" Category</label>
				</li>
				<li>
					<label for="sop4"><input id="sop4" type="checkbox"> Add episode number (following numbering convention)</label>
				</li>
				<li>
					<label for="sop5"><input id="sop5" type="checkbox"> Upload .mp3 to download field</label>
				</li>
				<li>
					<label for="sop6"><input id="sop6" type="checkbox"> Enter show notes in the post box (with H2 headings for the show notes, and guest bio)</label>
				</li>

			</ul>
			<p><big>Optional, but recommended:</big></p>
			<ul>
				<li>
					<label for="sop7"><input id="sop7" type="checkbox"> Create related Resource posts tagged with episode number</label>
				</li>
				<li>
					<label for="sop8"><input id="sop8" type="checkbox"> Featured image (social-friendly 1,200 x 630 pixels)</label>
				</li>
				<li>
					<label for="sop9"><input id="sop9" type="checkbox"> Add 5 - 7 tags (guest name, themes discussed, etc.)</label>
				</li>
				<li>
					<label for="sop10"><input id="sop10" type="checkbox"> Enter individual episode links (to episode on iTunes, etc.)</label>
				</li>
			</ul>
			';
		}
		function add_custom_dashboard_widget() {
			wp_add_dashboard_widget('custom_dashboard_widget', 'A Heretic Theme SOP®', 'custom_dashboard_widget');
		}
		add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');
	}
}

// removes admin color scheme options
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );

// remove Personal Options

if ( ! function_exists( 'cor_remove_personal_options' ) ) {
    /**
    * Removes the leftover 'Visual Editor', 'Keyboard Shortcuts' and 'Toolbar' options.
    */
    function cor_remove_personal_options( $subject ) {
        $subject = preg_replace( '#<h2>Personal Options</h2>.+?/table>#s', '', $subject, 1 );
        return $subject;
    }

    function cor_profile_subject_start() {
        ob_start( 'cor_remove_personal_options' );
    }

    function cor_profile_subject_end() {
        ob_end_flush();
    }
}
add_action( 'admin_head', 'cor_profile_subject_start' );
add_action( 'admin_footer', 'cor_profile_subject_end' );

// remove_menu_page('edit.php'); // Posts
// remove_menu_page('upload.php'); // Media
// remove_menu_page('link-manager.php'); // Links
// remove_menu_page('edit-comments.php'); // Comments
// remove_menu_page('edit.php?post_type=page'); // Pages
// remove_menu_page('plugins.php'); // Plugins
// remove_menu_page('themes.php'); // Appearance
// remove_menu_page('users.php'); // Users
// remove_menu_page('tools.php'); // Tools
// remove_menu_page('options-general.php'); // Settings


// Custom Backend Footer
function custom_admin_footer() {
	echo '<span id="footer-thankyou">The Heretic Podcast <a href="http://wordpress.org" alt="Created with Wordpress">Wordpress</a> Theme was designed/developed by <a href="http://samuelkillermann.com" target="_blank">Sam Killermann</a> for <a href="http://hues.xyz" alt="hues">hues</a>, uncopyrighted and open source.<br/> It is built upon <a href="http://html5blank.com" target="_blank">HTML5Blank</a>, with <a href="https://jquery.com/" alt="jQuery">jQuery</a>, <a href="https://www.advancedcustomfields.com/pro/" alt="ACF Pro">ACF Pro</a>, and several gallons of coffee.</span>';
}

// adding it to the admin area
add_filter('admin_footer_text', 'custom_admin_footer');

// // example custom dashboard widget
// function custom_dashboard_widget() {
// 	echo '
// 	<p>A few helpful links to keep things moving smoothly for you</p>
// 	<ul>
// 		<li>
// 			<a href="" alt="">The "Official" How-To for this theme.</a>
// 		</li>
// 	</ul>
// 	';
// }
// function add_custom_dashboard_widget() {
// 	wp_add_dashboard_widget('custom_dashboard_widget', 'Using the Heretic Podcast Site', 'custom_dashboard_widget');
// }
// add_action('wp_dashboard_setup', 'add_custom_dashboard_widget');

/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}

function myUrl($atts, $content = null) {
	extract(shortcode_atts(array(
	"href" => 'http://',
	"thumb" => '',
	), $atts));

	if ($thumb != ''){
		return'
		<div class="prettyLink">
			<a class="flexcontainer" href="'.$href.'">
				<img alt="'.$content.'" src="'.$thumb.'"/>
				<span>'.$content.'</span>
			</a>
		</div>';
	}
	else {
		return '
		<div class="prettyLink">
				<a class="flexcontainer" href="'.$href.'">
				🔗
				<span>'.$content.'</span>
			</a>
		</div>
		';
	}
}

add_shortcode("prettylink", "myUrl");

?>
