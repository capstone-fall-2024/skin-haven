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
<section class="banner">
	<h1>
	WELCOME TO SnoMo Days 
	Winter Festival
	</h1>
	<p>
	Join us for SnoMo Days, hosted by the Lions Club! Celebrate Alberta’s winter with family-friendly activities, from thrilling sports to cozy community fun. Entry fees support local charities, making every moment count!
	</p>
	<button>
		Learn More
	</button>
</section>
</header><!-- #masthead -->

	<main id="primary" class="site-main">
		<!-- Site Banner !-->

		<!-- Featured events section !-->
		<section class="featured">
			<h2>Featured</h2>
			<!-- query loop for featured events goes here !-->
			<button>
				view all events
			</button>
		</section>
		<!-- About us section !-->
		<section>
			<h2>About Us</h2>
			<Section class='snomodays'>
				<h3>SNOMO DAYS</h3>
				<p>
				SnoMo Days is an Alberta Winter Festival, dedicated to supporting motorized and non-motorized winter sports and family orientated winter leisure activities. 
				</p>
				<button>
					READ MORE
				</button>
			</Section>
			<section class='lionsclub'>
				<h3>LIONS CLUB</h3>
				<p>Lions of Alberta Foundation was created to facilitate a body of individuals to unite the Lions Clubs of Alberta in order to better serve the communities of our province.</p>
				<button>
					READ MORE
				</button>
			</section>
		</section>
		
		<!-- Testimonials section !-->
		 <section>
			<h2>Voices from the Festival</h2>
			<!-- query loop for testimonials goes here !-->
		 </section>

		 <!-- Volunteer section !-->

		<section class='volunteer'>
			<div>
				<h2>Be the Magic: <br> Volunteer with us</h2>
				<p>Help bring the excitement to life! Join our team and help make this winter festival unforgettable.</p>
				<button> Sign up now</button>
			</div>
			<img src="" alt="">
		</section>

		 <!-- Sponsors section !-->
		  <section>
			<h2>Sponsors</h2>
			<img src="" alt="">
			<img src="" alt="">
			<img src="" alt="">
			<img src="" alt="">
			<img src="" alt="">
		  </section>
	</main><!-- #main -->

<?php
get_footer();
