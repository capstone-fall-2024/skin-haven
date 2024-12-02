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
<section class='banner banner-container'>
<h1>Gallery</h1>
<p>Relive the excitement of SnoMo Days through our photo gallery! Browse memorable moments from past events, featuring thrilling activities, happy families, and our vibrant community coming together to celebrate winter fun.</p>
</Section>
</header><!-- #masthead -->
	<main id="primary" class="site-main">
	<div class='gallery container'>	
		<?php
		// args
		$args = array(
			'posts_per_page' => -1,
			'post_type'      => 'gallery',
			'title'     => 'Image Gallery'
		);
		
		
		// query
		$the_query = new WP_Query( $args );
		
		
		?>
		<?php if( $the_query->have_posts() ): ?>
			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php
			$galleries = get_field('gallery');
			foreach($galleries as $gallery){
			?>
			
				<img src="<?php echo $gallery['metadata']['thumbnail']['file_url']; ?>">
				
			<?php } ?>
			<?php endwhile; ?>
		<?php endif; ?>
		
		<?php wp_reset_query(); ?>

	</div>
	</main><!-- #main -->

<?php

get_footer();
