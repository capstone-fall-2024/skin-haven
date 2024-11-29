<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Skin_Haven
 */

get_header();
?>
<section class="banner banner-container">
	<h1>
		WELCOME TO SnoMo Days
		Winter Festival
	</h1>
	<p>
		Join us for SnoMo Days, hosted by the Lions Club! Celebrate Alberta’s winter with family-friendly activities,
		from thrilling sports to cozy community fun. Entry fees support local charities, making every moment count!
	</p>
	<button>
		<a href="<?php echo home_url( '/about-us/' ); ?>">Learn More</a>
	</button>
</section>

</div> <!--   header overlay-->

</header><!-- #masthead -->

<main id="primary" class="site-main">
	<!-- Featured events section !-->
	<div class="container">
		<section class="featured">
			<div class="title-container">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/img/homepage-snowflake-left2.png"
					alt="Snowflake Left" class="snowflake snowflake-left" />
				<h2 class="title-text">Featured</h2>
				<img src="<?php bloginfo('stylesheet_directory'); ?>/img/homepage-snowflake-right2.png"
					alt="Snowflake Right" class="snowflake snowflake-right" />
			</div>
			<div id='featuredEvents'>
				<?php 

// args
$args = array(
	'posts_per_page' => 3,
    'post_type'     => 'event',
    'meta_key'      => 'featured',
    'meta_value'    => '1'
);


// query
$the_query = new WP_Query( $args );
?>
				<?php if( $the_query->have_posts() ): ?>
				<?php while( $the_query->have_posts() ) : $the_query->the_post();  $image = get_field('event_image'); ?>
				<div class='event' data-post-id="<?php the_ID(); ?>">
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<h3>
						<?php echo get_the_title(); ?>
					</h3>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>

				<?php wp_reset_query();   // Restore global post data stomped by the_post(). ?>
			</div>
			<div class="button">
				<button>
					<a href="<?php echo home_url( '/events/' ); ?>">view all events</a>
				</button>
			</div>
		</section>
	</div>
	<!-- Modal Structure -->
	<div id="modal" class="modal" style="display:none;">
		<div class="modal-overlay"></div>
		<div class="modal-container">
			<!-- Modal Content will be inserted here dynamically -->
		</div>
	</div>
	<!-- About us section !-->
	<div class="container">
		<section class="about-us">
			<h2>About Us</h2>
			<div>
				<Section class="snomodays">
					<div class="overlay">
						<h3>SNOMO DAYS</h3>
						<p>
							SnoMo Days is an Alberta Winter Festival, dedicated to supporting motorized and
							non-motorized winter
							sports and family orientated winter leisure activities.
						</p>
						<button>
							<a href="<?php echo home_url( '/about-us/#about-snomo' ); ?>">READ MORE</a>
						</button>
					</div>
				</Section>
				<section class="lionsclub">
					<div class="overlay">
						<h3>LIONS CLUB</h3>
						<p>Lions of Alberta Foundation was created to facilitate a body of individuals to unite the
							Lions Clubs of
							Alberta in order to better serve the communities of our province.</p>
						<button>
							READ MORE
						</button>
					</div>
				</section>
			</div>
		</section>
	</div>

	<!-- Testimonials section !-->
	<section class="container">
		<h2>Voices from the Festival</h2>
		<!-- query loop for testimonials goes here !-->
	</section>

	<!-- Volunteer section !-->

	<section class="volunteer">
		<div class="container">
			<div>
				<div>
					<h2>Be Part of the Magic: <br> Volunteer with us</h2>
					<p>Help bring the excitement to life! Join our team and help make this winter festival
						unforgettable.</p>
					
					<button><a href="<?php echo home_url( '/volunteer/' ); ?>">SIGN UP NOW</a></button>
				
				</div>
				<img src="<?php bloginfo('stylesheet_directory');?>/img/snowcabin.jpg" alt="Snow Cabin" />
			</div>
		</div>
	</section>

	<!-- Sponsors section !-->
	<section class="sponsors">
		<div class="container">
			<h2>Sponsors</h2>
			<div>
				<img src="<?php bloginfo('stylesheet_directory');?>/img/tim-hay.png" alt="tim hay sponsor" />
				<img src="<?php bloginfo('stylesheet_directory');?>/img/trucking-construction.png"
					alt="trucking construction sponsor" />
				<img src="<?php bloginfo('stylesheet_directory');?>/img/agriculture.png" alt="agriculture sponsor" />
				<img src="<?php bloginfo('stylesheet_directory');?>/img/rock-island.png" alt="rock island sponsor" />
				<img src="<?php bloginfo('stylesheet_directory');?>/img/alberta-beach.png"
				alt="alberta beach sponsor" />
				<img src="<?php bloginfo('stylesheet_directory');?>/img/lacste.png" alt="lacste anne county" />
			</div>
		</div>
	</section>


</main><!-- #main -->

<?php
get_footer();

