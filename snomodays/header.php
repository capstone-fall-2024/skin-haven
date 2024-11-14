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

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'skin-haven' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$skin_haven_description = get_bloginfo( 'description', 'display' );
			if ( $skin_haven_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $skin_haven_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'skin-haven' ); ?></button>
			<ul class="menu">
        <li><a href="<?php echo home_url( '/' ); ?>">Home</a></li>
        <li><a href="<?php echo home_url( '/about/' ); ?>">About</a></li>
        <li><a href="<?php echo home_url( '/about-us/' ); ?>">About Us</a></li>
        <li><a href="<?php echo home_url( '/off-road-safety/' ); ?>">Off-Road Safety</a></li>
        <li><a href="<?php echo home_url( '/events/' ); ?>">Events</a></li>
        <li><a href="<?php echo home_url( '/gallery/' ); ?>">Gallery</a></li>
        <li><a href="<?php echo home_url( '/get-in-touch/' ); ?>">Get in Touch</a></li>
        <li><a href="<?php echo home_url( '/contact-us/' ); ?>">Contact Us</a></li>
        <li><a href="<?php echo home_url( '/volunteer/' ); ?>">Volunteer</a></li>
        <li><a href="<?php echo home_url( '/results/' ); ?>">Results</a></li>
    </ul>
		</nav><!-- #site-navigation -->
	
