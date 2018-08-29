<?php
/*
Template Name: Home
*/

 get_header(); ?>

    <div id="homeSam" class="mobileHide">
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
        </ul>
    </div>

	<main role="main">
		<!-- section -->
		<section id="homeHuh" class="wrap">
            <h3 style="display:block; background-image:url('<?php echo get_template_directory_uri(); ?>/img/heading-huh.png'); width:100px; height:56px;" class="image-replacement">Huh? What is Heretic?</h3>

    		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

    			<!-- article -->
    			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    				<?php the_content(); ?>
    				<?php edit_post_link(); ?>
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

    <div id="hereticNavHome">
        <?php echo getHereticNav();?>
    </div>

	<div class="loop wrap">
		<?php

		query_posts(array(
		    'showposts' => -1,
		    'post_type' => 'post',
		    'orderby' => 'published',
		    'order' => 'DESC')
		);

        if (have_posts()) :

            $count = 0;

        while (have_posts()) : the_post();


    		if ($count == 1) :

                getLoopSubscribe();

            endif;

            if ($count == 6) :?>

            </div><!--/wrap-->
            <div class="loop light-blue-bg">
                <div class="wrap">
                    <?php getMailingList();?>
                </div>
            </div>
            <div class="wrap loop">

    	  	<?php

            else :

    	          loopDefault();

    	 	endif;

            $count++;

        endwhile; else: endif; ?>

	</div>

<?php get_footer(); ?>
