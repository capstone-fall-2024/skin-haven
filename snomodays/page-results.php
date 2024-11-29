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
    <h1>Results</h1>
    <p>Discover this year’s raffle and 50/50 winners, along with highlights from SnoMo Days events.

        Thank you to everyone for your participation and support!</p>
</Section>
</header><!-- #masthead -->
<main id="primary" class="site-main results">
<div class="container">
        <div class="fifty-fifty">
            <div class="sub-container">
                <img src="<?php bloginfo('stylesheet_directory');?>/img/snowcabin.jpg" alt="Snow Cabin" />
                <div>
                    <h2>50/50 Winner</h2>
                    <p>$4808.00</p>
                    <p>Mohamad Khalid</p>
                 </div>
            </div>
        </div>
    </div>
    <div class="container grid-layout">
        <div>
            <img src="<?php bloginfo('stylesheet_directory');?>/img/snowcabin.jpg" alt="Snow Cabin" />
            <div>
                <h2>Snowmobile Drag Races</h2>
                <p>Winner Name</p>
            </div>
        </div>
        <div>
            <img src="<?php bloginfo('stylesheet_directory');?>/img/snowcabin.jpg" alt="Snow Cabin" />
            <div>
                <h2>Snowmobile Poker Rally</h2>
                <p>Winner Name</p>
            </div>
        </div>
        <div>
            <img src="<?php bloginfo('stylesheet_directory');?>/img/snowcabin.jpg" alt="Snow Cabin" />
            <div>
                <h2>Over the Line Snowball Tournament</h2>
                <p>Winner Name</p>
            </div>
        </div>
        <div>
            <img src="<?php bloginfo('stylesheet_directory');?>/img/snowcabin.jpg" alt="Snow Cabin" />
            <div>
                <h2>Broom Ball Tournament</h2>
                <p>Winner Name</p>
            </div>
        </div>
    </div>
</main><!-- #main -->

<?php

get_footer();