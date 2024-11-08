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
    <Section>
<h1>Events</h1>
<p>Enjoy a weekend of winter fun with daily activities for all ages, including snowmobile rallies, ice skating, monster trucks, and evening fireworks. Don’t miss out on the festivities at Alberta Beach!</p>
</Section>
</header><!-- #masthead -->
    
	<main id="primary" class="site-main">
    
        <section class='events'>
            <div>
            
            </div>
            <section class='cancelled'>
                <h3>CANCELLED EVENTS</h3>
                <!-- query loop for cancelled events -->
            </section>
        </section>
    
	</main><!-- #main -->

<?php

get_footer();
