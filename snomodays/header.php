<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skin_Haven
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
		rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary">
			<?php esc_html_e( 'Skip to content', 'skin-haven' ); ?>
		</a>

		
		<header id="masthead" class="site-header">
			<div class="header-overlay">
			<div class="container">
				<img src="<?php bloginfo('stylesheet_directory');?>/img/snomo-logo.png" alt="Snomo Logo" class="logo" />
				<button class="tog-btn" aria-label="Navigation Menu" aria-expanded="false" aria-controls="menu">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="size-6">
						<path fill-rule="evenodd"
							d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z"
							clip-rule="evenodd" />
						<title>navigation</title>
					</svg>
				</button>
				<nav id="menu">
					<div class="active-header container">
						<img src="<?php bloginfo('stylesheet_directory');?>/img/snomo-logo.png" alt="Snomo Logo"
							class="logo" />
						<button class="active-tog-btn">
							<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
								stroke="currentColor" class="size-6">
								<path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
							</svg>
						</button>
					</div>
					<ul>
						<div>
							<li><a href="<?php echo home_url( '/' ); ?>">Home</a></li>
						</div>
						<div>
							<li><a  class="first-level"  href="<?php echo home_url( '/about-us/' ); ?>">About Us</a></li>
							<li><a class="indent" href="#">Snomo Days</a></li>
							<li><a class="indent" href="#">Lions Club</a></li>
							<li><a class="indent" href="<?php echo home_url( '/off-road-safety/' ); ?>">Off-Road
									Safety</a></li>
						</div>
						<div>
							<li><a href="<?php echo home_url( '/events/' ); ?>">Events</a></li>
						</div>
						<div>
							<li><a href="<?php echo home_url( '/gallery/' ); ?>">Gallery</a></li>
						</div>
						<div>
							<li><a class="first-level" href="<?php echo home_url( '/contact-us/' ); ?>">Contact Us</a></li>
							<li><a class="indent" href="<?php echo home_url( '/volunteer/' ); ?>">Volunteer</a></li>
						</div>
						<div>
							<li><a href="<?php echo home_url( '/results/' ); ?>">Results</a></li>
						</div>
					</ul>

				</nav>
			</div>