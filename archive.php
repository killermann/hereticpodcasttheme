<?php get_header(); ?>

	<main role="main">

		<!-- section -->

		<section class="loop wrap">

			<?php if (have_posts()) :

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

		<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
