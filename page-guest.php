<?php /* Template Name: Guest Info Page */ get_header(); ?>


	<script src="https://code.jquery.com/jquery-1.10.2.min.js" integrity="sha256-C6CB9UYIS9UJeqinPHWTHVqh/E1uhG5Twh+Y5qFQmYg=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/toc.min.js"></script>

	<div class="clearfix">
		<main role="main">
			<nav id="tocWrap" class="mobileHide fourcol first">
				<span class="heading">🗺 On this Page</span>
				<div id="toc"></div>
			</nav>
			<!-- section -->
			<section class="eightcol last">

			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="tocEntry entry-content">
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

		</main>
	</div>

<script type="text/javascript">
$(document).ready(function() {

    // Generate table of content
    $('#toc').toc({
        elementClass: 'toc',
		selector: 'h2',
        ulClass: 'nav',
    });

    // Scroll to the table of content section when user scroll the mouse
    $('body').scrollspy({
        target: '#toc',
    });

	$(function() {

    var offset = $("#tocWrap").offset();
    var topPadding = 60;

    $(window).scroll(function() {
        if ($(window).scrollTop() > offset.top) {
            $("#tocWrap").stop().animate({
                marginTop: $(window).scrollTop() - offset.top + topPadding
            });
        } else {
            $("#tocWrap").stop().animate({
                marginTop: 0
            });
        }
    });

});


});
</script>

<div id="huesBar" class="clearfix" style="background:rgba(0,0,0,.7); padding:0 12px">
	<p style="margin:12px; line-height:1.1; font-size:12px; color:rgba(255,255,255,.7); text-align:right;">
		This project is part of <em style="font-family:georgia,serif;"><a style="text-decoration:none;" href="http://hues.xyz" alt="hues Global Justice Collective"><span style="color:#f5a81c">h</span><span style="color:#e81d76">u</span><span style="color:#42b4e3">e</span><span style="color:#00a897">s</span></a></em>, a global justice collective
	</p>
</div>
<!-- /footer -->

<?php wp_footer(); ?>


</body>
</html>
