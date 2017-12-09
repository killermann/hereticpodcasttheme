			<!-- footer -->
			<footer class="footer" role="contentinfo">
				<h2 class="tagline"><?php echo get_bloginfo('description');?></h2>
				<ul class="hostingPlatforms">
					<li class="instruction">
						<span>Listen &amp; subscribe free on the following platforms:</span>
					</li>
					<?php echo getHostingPlatformsListItems();?>
				</ul>
			</footer>

			<div id="huesBar" class="clearfix" style="background:rgba(0,0,0,.7); padding:0 12px">
                <p style="margin:12px; line-height:1.1; font-size:12px; color:rgba(255,255,255,.7); text-align:right;">
                    This project is part of <em style="font-family:georgia,serif;"><a style="text-decoration:none;" href="http://hues.xyz" alt="hues Global Justice Collective"><span style="color:#f5a81c">h</span><span style="color:#e81d76">u</span><span style="color:#42b4e3">e</span><span style="color:#00a897">s</span></a></em>, a global justice collective
                </p>
            </div>
			<!-- /footer -->

		<?php wp_footer(); ?>


	</body>
</html>
