<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skin_Haven
 */

get_header();
?>

<Section class="banner-container">
<h1>About Us</h1>
<p>Celebrating winter fun and community spirit, SnoMo Days is proudly hosted by the Alberta Beach & District Lions Club—a dedicated nonprofit serving our community through charity and service</p>
</Section>
</header><!-- #masthead -->
	<main id="primary" class="site-main">
		<!-- about snomo -->
		<a id='snomoDays'>
		<section class="snomo container">
			<div class="title">
				<h2>ABOUT SNOMO DAYS</h2>
				<div class="line"></div>
			</div>
			<?php
		// args
		$args = array(
			'posts_per_page' => -1,
			'post_type'      => 'about',
			'title'     => 'snoMo Days'
		
		);
		
		
		// query
		$the_query = new WP_Query( $args );
		
		
		?>
		<?php if( $the_query->have_posts() ): ?>
			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<p><?php echo get_field('content')?></p>
			<?php endwhile; ?>
		<?php endif; ?>
		
		<?php wp_reset_query(); ?>
		</section>
		</a>
		<div class="background-container">
		
		<div class="floating-container"><img src="<?php bloginfo('stylesheet_directory');?>/img/about-us.webp" class="floating-image" alt="about us image" /></div>

		</div>
		
		<!-- about lions club -->
		<a id="lionsClub">
		<section class="lions-club">
			<div class="container">
				<div class="title">
					<h2>ABOUT LIONS CLUB</h2>
					<div class="line"></div>
				</div>
								
				<p>To read more about Lions Club, visit our page!</p>
				<button>
					<a href="https://www.facebook.com/profile.php?id=100064778316943">Lions Club</a>
				</button>
			</div>
		</section>
		</a>
	</main><!-- #main -->

<?php

get_footer();

