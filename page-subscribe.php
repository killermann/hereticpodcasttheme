<?php
/*
Template Name: Subscribe
*/

 get_header(); ?>

	<main role="main">
		<!-- section -->
		<section id="subscribeIntro" class="wrap">
    		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    			<!-- article -->
    			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php the_content(); ?>
                        <?php edit_post_link(); ?>
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
		<!-- /section -->
	</main>

    <section id="subscribeList" class="clearfix">
        <h3 class="subscribe-heading">Subscribe</h3>
        <div class="subscribeLists clearfix wrap">
            <a id="email" alt="Get emails with new episodes" target="_blank" href="<?php echo the_field('mailing_list', 'option');?>">
                <span class="icon">
                    💌
                </span>
                <span class="title">
                    Heretic Emails
                </span>
                <span class="blurb">
                    Get an email when we drop new episodes (and only then!). We'll also include links to articles, community stuff, and other things we think you'll love. But never ads, never corporate "sponsored content," and never spam.
                </span>
            </a>
        </div>

        <h4 class="wrap"><?php echo get_bloginfo('title');?> is available on the following platforms:</h4>
        <ul class="subscribeLists">
            <?php if(get_field('itunes_link', 'option')) {
        		echo '<li><a id="itunes" href="';
        		echo the_field('itunes_link', 'option');
        		echo '" alt="Subscribe to Podcast on iTunes"><span class="icon">iTunes</span> <span class="title">iTunes</span></a></li>';
        		};
        	?>
            <?php if(get_field('spotify_link', 'option')) {
        		echo '<li><a id="spotify" href="';
        		echo the_field('spotify_link', 'option');
        		echo '" alt="Subscribe to Podcast on Spotify"><span class="icon">Spotify</span> <span class="title">Spotify</span></a></li>';
        		};
        	?>
            <?php if(get_field('overcast_link', 'option')) {
        		echo '<li><a id="overcast" href="';
        		echo the_field('overcast_link', 'option');
        		echo '" alt="Subscribe to Podcast on Overcast"><span class="icon">Overcast</span> <span class="title">Overcast</span></a></li>';
        		};
        	?>
            <?php if(get_field('anchor_link', 'option')) {
        		echo '<li><a id="anchor" href="';
        		echo the_field('anchor_link', 'option');
        		echo '" alt="Subscribe to Podcast on Anchor"><span class="icon">Anchor</span> <span class="title">Anchor</span></a></li>';
        		};
        	?>
            <?php if(get_field('pocketcasts_link', 'option')) {
        		echo '<li><a id="pocketcasts" href="';
        		echo the_field('pocketcasts_link', 'option');
        		echo '" alt="Subscribe to Podcast on Pocket Casts"><span class="icon">Pocket Casts</span> <span class="title">Pocket Casts</span></a></li>';
        		};
        	?>
            <?php if(get_field('soundcloud_link', 'option')) {
        		echo '<li><a id="soundcloud" href="';
        		echo the_field('soundcloud_link', 'option');
        		echo '" alt="Subscribe to Podcast on Soundcloud"><span class="icon">Soundcloud</span> <span class="title">Soundcloud</span></a></li>';
        		};
        	?>
            <?php if(get_field('stitcher_link', 'option')) {
        		echo '<li><a id="stitcher" href="';
        		echo the_field('stitcher_link', 'option');
        		echo '" alt="Subscribe to Podcast on Stitcher"><span class="icon">Stitcher</span> <span class="title">Stitcher</span></a></li>';
        		};
        	?>
            <?php if(get_field('tunein_link', 'option')) {
        		echo '<li><a id="tunein" href="';
        		echo the_field('tunein_link', 'option');
        		echo '" alt="Subscribe to Podcast on TuneIn"><span class="icon">TuneIn</span> <span class="title">TuneIn</span></a></li>';
        		};
        	?>
            <?php if(get_field('google_podcasts_link', 'option')) {
        		echo '<li><a id="googlepodcasts" href="';
        		echo the_field('google_podcasts_link', 'option');
        		echo '" alt="Subscribe to Podcast on Google Podcasts"><span class="icon">Google Podcasts</span> <span class="title">Google Podcasts</span></a></li>';
        		};
        	?>
            <?php if(get_field('google_play_link', 'option')) {
        		echo '<li><a id="googleplay" href="';
        		echo the_field('google_play_link', 'option');
        		echo '" alt="Subscribe to Podcast on Google Play Music"><span class="icon">Google Play Music</span> <span class="title">Google Play</span></a></li>';
        		};
        	?>
        </ul>

        <h4>And the following social networks:</h4>
        <ul class="subscribeLists socialLinks">
            <?php if(get_field('facebook_link', 'option')) {
        		echo '<li><a id="facebook" href="';
        		echo the_field('facebook_link', 'option');
        		echo '" alt="Subscribe to Podcast on Facebook"><span class="icon">Facebook</span> <span class="title">Facebook</span></a></li>';
        		};
        	?>
            <?php if(get_field('twitter_link', 'option')) {
        		echo '<li><a id="twitter" href="';
        		echo the_field('twitter_link', 'option');
        		echo '" alt="Follow the Podcast on Twitter"><span class="icon">Twitter</span> <span class="title">Twitter</span></a></li>';
        		};
        	?>
            <?php if(get_field('youtube_link', 'option')) {
        		echo '<li><a id="youtube" href="';
        		echo the_field('youtube_link', 'option');
        		echo '" alt="Subscribe to Podcast on YouTube"><span class="icon">YouTube</span> <span class="title">YouTube</span></a></li>';
        		};
        	?>
            <?php if(get_field('instagram_link', 'option')) {
        		echo '<li><a id="instagram" href="';
        		echo the_field('instagram_link', 'option');
        		echo '" alt="Follow the Podcast on Instagram"><span class="icon">Instagram</span> <span class="title">Instagram</span></a></li>';
        		};
        	?>
        </ul>

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
                echo '<div id="childPageContainer" class="clearfix count';
                echo $postcount;
                echo '"><h3>🔭 Explore</h3><div class="flexcontainer">';

                while ( $child_query->have_posts() ) : $child_query->the_post();

                childPageLoop();

                endwhile;
                echo '</div></div>';
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </section>

<?php get_footer(); ?>
