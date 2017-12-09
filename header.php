<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107776626-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-107776626-1');
		</script>

		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">
		<link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="theme-color" content="#3bb0e0">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<!-- <script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script> -->

	</head>
	<body <?php body_class(); ?>>

	<!--SVG ICONS FOR INLINE ABOVE-->

	<svg id="joinIcon" xmlns="http://www.w3.org/2000/svg" class="dont-render-dawg" viewBox="0 0 100 100"><title>icon-join</title><path d="M21.81,29.87c-5.39.41-2.23,17.65-2.06,21.19.13,2.58.31,19.38,6.47,13.16,2.14-2.16-.1-10.22-.25-13.07-.19-3.61,1.56-21.72-4.17-21.27Z"/><path d="M31.9,10.92c-5.85.44-2.12,26-1.89,30.65.12,2.44-.33,27.68,6.61,21,2.32-2.23.58-9,.4-11.86-.34-5.23-.59-10.46-.84-15.7-.19-4,1.59-24.55-4.29-24.1Z"/><path d="M45.5.28c-6,.45-2.74,27.34-2.71,32.25,0,3.63-2.43,27.6,3.48,28.46s3-8.05,2.91-10.91c-.27-6.6-.07-13.21-.16-19.81-.08-6.38-.47-12.75-.49-19.13,0-2.85,2.13-11.26-3-10.86Z"/><path d="M60,10c-5.95.45-2.37,24.94-2.25,29.33.08,2.9-.88,23.89,6,19,2.39-1.69.66-7.72.51-10.28-.31-5.42-.28-10.85-.46-16.27C63.68,28.45,65.55,9.6,60,10Z"/><path d="M74.61,40.83C69.26,41.24,73,51,73.55,54c1.11,5.93,2.37,11.71.94,17.7C73.45,76.06,70.7,78.13,69,82c-1.89,4.33,1.05,7.58,4.8,4.11,4.38-4.06,6.93-11.83,7.45-17.48.41-4.52-.91-28.27-6.65-27.83Zm-.33,44.35c-.3.44,0,0,0,0Zm-.32.6Z"/><path d="M59.88,63c-6.28,3.86-16.4,4.44-23.66,4.91-8.76.57-14-.21-12.49,10.37,1,6.89,2.65,15.23,9.1,19,6.68,3.91,17,3,23.28-1.58,3.86-2.8,10.11-12.1,9.27-17.09-1.06-6.28-10.9-3-15-2.64-2.23.2-17.82.26-12.91,6.31,2.46,3,17-.36,20.77-.9-3.09,7.61-8.2,13-17,12.1-9.43-.91-11.43-11.29-11.8-19.34,7.74-.49,15.13-1.18,22.82-2.26,3-.42,9.1-1.14,11.11-3.8s.61-7.58-3.43-5.09Z"/></svg>
	<svg id="subscribeIcon" xmlns="http://www.w3.org/2000/svg" class="dont-render-dawg" viewBox="0 0 100 100"><title>icon-subscribe</title><path d="M87.23,54c-2.5-1.95-4.91-3.78-7.53-5.59-1.55-1.07-3.06-2.24-4.57-3.37-.45-.34-5.26-3.86-2.81-2.22C64,37.08,56.25,30.63,47.83,25.11,42.54,21.63,31,9.17,28.36,19.65c-2.2,8.76-.18,21,.57,29.89.41,4.83,1.89,10.72,1,15.45-.75,3.89-.45,1.69-2.85,3.88a80.21,80.21,0,0,1-7.45,5.54c0-18.13-.89-36.2-1.19-54.31-.06-3.64,1.47-13.75-1-17-6-7.76-6.64,7.85-6.58,10.54C11.22,30.62,12,47.55,12.14,64.5c0,5.16-3,20.27,5.49,19.52,3.31-.29,6.9-4.07,9.32-6a53.88,53.88,0,0,1,7.89-4.71,171.8,171.8,0,0,0,18-10.66c1.8-1.17,6.58-5,8.31-4.81s7.15,5.21,8.42,6.1C58,68.63,46.08,75.36,35.23,81.63c-3,1.76-5.67,4.12-8.74,5.85-2.85,1.61-6.39,2.49-8.9,4.6-1.94,1.63-4,3.45-2.13,6.18,2.07,3,4.11.88,6.38-.2,12.91-6.12,25.11-14.17,37.86-20.88,3.41-1.79,6.69-3.77,10.19-5.39,2.49-1.15,7.61-2.21,9.33-4.54,3.94-5.35-6.11-10-9.41-12.22-1.54-1-6.29-5.17-9.3-7.16,2.39,1.6-2.45-1.79-2.39-1.74-3.43-2.29-9.32-6.7-13.58-9.72C40,33.22,35.75,32,35.61,26.18c15.29,8,29.07,20.54,43,30,2.07,1.38,4.52,5,7.31,4.66A3.69,3.69,0,0,0,87.23,54ZM38.54,41.08C44,45,49.36,48.9,54.82,52.78c-5.53,3.82-11.32,7.9-17.31,10.85-.31-8-1-16-1.61-24.06Q37.25,40.28,38.54,41.08Z"/></svg>

	<svg id="learnIcon" xmlns="http://www.w3.org/2000/svg" class="dont-render-dawg" viewBox="0 0 100 100"><title>icon-learn</title><path d="M36.22,44.68c-1-10.59,4.53-22.63,17.2-22.08,9.84.42,9.19,10.45,4.74,16.55-3.1,4.25-6,5.31-9.8,8.1-3.57,2.59-3.66,6.55-3.76,10.68-.08,3.43-1.49,13.54,3.36,14.39,5.79,1,4.41-7,4.33-10.21,0-1.68-.9-7,.13-8.52.51-.77,3.17-1.31,4.06-1.91A34,34,0,0,0,66.62,40c4.71-9.42,2.28-21-8.66-24.15-9.39-2.69-21.66,3.26-26.55,11.53-2.61,4.42-3.33,10.17-2.88,15.22.18,2.06.11,4.71,2.32,5.78A3.77,3.77,0,0,0,36.22,44.68Zm16,9.18C52.28,53.71,52.39,53.42,52.25,53.86Zm.25-.65C52.52,53.09,53.08,52.35,52.5,53.21Z"/><path d="M49.07,75.62c-5.83,0-6.51,9-.88,10.19C55.64,87.45,56.88,75.62,49.07,75.62Z"/><path d="M83.6,27.17C81.08.86,49-7,30.3,9.6c-9.72,8.63-16.76,23.62-13,36.73.9,3.18,4.61,11.27,8.88,6.55,2.34-2.59-2.48-10.38-2.29-14-.14,3,.61-4.42.59-4.33A40,40,0,0,1,26,28.24a29,29,0,0,1,6.16-10c5.58-6.36,12.1-9,20.47-9.72C70.8,6.91,82.31,26,72.93,42c-4.24,7.2-14.31,10.54-14.67,19-.09,2.13-1,7.09-.06,9.08,1.72,3.53,5.81,3.17,7.43-.14,1.31-2.67-.95-7.16.25-9.78,1.68-3.67,8.29-7.44,11-10.79A30.49,30.49,0,0,0,83.6,27.17Z"/><path d="M63.36,84.16c-5.21-4.55-6.23,4.09-6.32,7-5.44-1.12-11.35.1-16.83.17,0-6.65-.65-13.3-.85-20-.11-3.61.87-11.22-1.36-14.31-3.9-5.4-6.81.5-6.68,4.57.21,6.7.43,13.46.85,20.15.27,4.33-1,12.34,2.28,15.54s12.08.88,16.39.74c3.5-.11,9.43,2.38,12.09-.12C65.34,95.7,65.68,86.22,63.36,84.16Zm-2.9,7.9C60.6,92.07,61.43,92.38,60.46,92.06Z"/></svg>
	<!-- /SVG -->

		<!-- header -->
		<header class="header clearfix" role="banner">
		<?php if ( is_front_page() ) {?>
			<div class="clearfix">
				<div class="logo sixcol first">
					<a href="<?php echo home_url(); ?>">
						<!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
						<img src="<?php echo get_template_directory_uri(); ?>/img/heretic-logo-animated-600.gif" alt="Logo" class="logo-img">
					</a>

				</div>
				<div class="sixcol last">
					<h2 class="tagline">Social Justice,<br/> Minus Dogma</h2>
					<small>Listen on...</small>
					<ul class="hostingPlatforms">
						<?php echo getHostingPlatformsListItems();?>
					</ul>
				</div>

			</div><!--Cleafix-->



		<?php }

		elseif ( is_page() ) {?>

			<div class="flexcontainer">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/heretic-logo-animated-150.gif" alt="Logo" class="logo-img">
				</a>
				<?php echo getHereticNav();?>
				<nav id="mainNav" class="nav" role="navigation">
					<?php html5blank_nav(); ?>
				</nav>
			</div>
			<div class="pageTitleWrap">

				<?php
				// Get $post if you're inside a function
				global $post;

				if ( has_excerpt( $post->ID ) ) {?>
					<div class="hasExcerpt">
						<h1><?php the_title(); ?></h1>
						<h2 class="subtitle"><?php the_excerpt();?></h2>
					</div>

				<?php } else {?>
				    <h1><?php the_title(); ?></h1>
				<?php };
				?>

				<div class="pageDetails">
					<?php custom_breadcrumbs(); ?>
					<?php echo getLatestEpisode();?>
				</div>
			</div>

		<?php }

		elseif ( is_page('for-guests') ) {?>

			<div class="flexcontainer">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/heretic-logo-animated-150.gif" alt="Logo" class="logo-img">
				</a>
				<?php echo getHereticNav();?>
				<nav id="mainNav" class="nav" role="navigation">
					<?php html5blank_nav(); ?>
				</nav>
			</div>
			<div class="pageTitleWrap">

				<?php
				// Get $post if you're inside a function
				global $post;

				if ( has_excerpt( $post->ID ) ) {?>
					<div class="hasExcerpt">
						<h1><?php the_title(); ?></h1>
						<h3 class="subtitle"><?php the_excerpt();?></h3>
					</div>

				<?php } else {?>
				    <h1><?php the_title(); ?></h1>
				<?php };
				?>
			</div>

		<?php }

		elseif ( is_author() ) {?>

			<div class="flexcontainer">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/heretic-logo-animated-150.gif" alt="Logo" class="logo-img">
				</a>
				<?php echo getHereticNav();?>
				<nav id="mainNav" class="nav" role="navigation">
					<?php html5blank_nav(); ?>
				</nav>
			</div>
			<div class="pageTitleWrap flexcontainer">
				<?php echo get_avatar(get_the_author_meta('user_email')); ?>
				<h1>
					<?php echo get_the_author_meta('display_name'); ?>
				</h1>
			</div>

		<?php }

		elseif ( is_archive()) {?>
			<div class="flexcontainer">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/heretic-logo-animated-150.gif" alt="Heretic" class="logo-img">
				</a>
				<?php echo getHereticNav();?>
				<nav id="mainNav" class="nav" role="navigation">
					<?php html5blank_nav(); ?>
				</nav>
			</div>
			<div class="pageTitleWrap flexcontainer">
				<?php if (is_category()) { ?><h1><?php single_cat_title(); ?></h1>
				<?php } elseif (is_tag()) { ?><h1><?php single_tag_title(); ?></h1>
				<?php } elseif (is_day()) { ?><h1><?php the_time('l, F j, Y'); ?></h1>
				<?php } elseif (is_month()) { ?><h1><?php the_time('F Y'); ?></h1>
				<?php } elseif (is_year()) { ?><h1><?php the_time('Y'); ?></h1><?php }?>
			</div><!--/page-title-->
		<?php }
		else { ?>

			<div class="flexcontainer">
				<a href="<?php echo home_url(); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/img/heretic-logo-animated-150.gif" alt="Heretic" class="logo-img">
				</a>
				<?php echo getHereticNav();?>
				<nav id="mainNav" class="nav" role="navigation">
					<?php html5blank_nav(); ?>
				</nav>
			</div>

		<?php } ?>

		<?php if ( is_front_page()) {?>
			<div class="clearfix wrap">
				<?php echo getLatestEpisode();?>
			</div>
		<?php } ?>


		</header>
		<!-- /header -->
