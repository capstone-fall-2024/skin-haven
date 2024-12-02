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
<?php 

// args
$args = array(
'posts_per_page' => -1,
'post_type'     => 'result',
);


// query
$the_query = new WP_Query( $args );


?>
<?php if( $the_query->have_posts() ): ?>
<?php while( $the_query->have_posts() ) : $the_query->the_post();  $image = get_field('5050_winner_image'); ?>
        <div class="fifty-fifty">
            <div class="sub-container">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <div>
                    <h2>50/50 Winner</h2>
                    <p>$<?php echo get_field('5050_amount_won'); ?></p>
                    <p><?php echo get_field('5050_raffle_winner');?></p>
                 </div>
                 <img src="<?php bloginfo('stylesheet_directory');?>/img/snowflake-long.png" alt="snowflake"
							class="snowflake snowflake-long" />
            </div>
        </div>
    </div>
    <div class="container grid-layout">
        <div>
            <img src="<?php bloginfo('stylesheet_directory');?>/img/drag-race.png" alt="Snowmobile Drag Races" />
            <div>
                <h2>Snowmobile Drag Races</h2>
                <p><?php echo get_field('snowmobile_drag_races');?></p>
            </div>
        </div>
        <div>
            <img src="<?php bloginfo('stylesheet_directory');?>/img/poker-rally.png" alt="Snowmobile Poker Rally" />
            <div>
                <h2>Snowmobile Poker Rally</h2>
                <p><?php echo get_field('snowmobile_poker_rally');?></p>
            </div>
        </div>
        <div>
            <img src="<?php bloginfo('stylesheet_directory');?>/img/over-the-line.png" alt="Over the Line Snowball Tournament" />
            <div>
                <h2>Over the Line Snowball Tournament</h2>
                <p><?php echo get_field('over_the_line_snowball_tournament');?></p>
            </div>
        </div>
        <div>
            <img src="<?php bloginfo('stylesheet_directory');?>/img/broomball.png" alt="Broom Ball Tournament" />
            <div>
                <h2>Broom Ball Tournament</h2>
                <p><?php echo get_field('broom_ball_tournament');?></p>
            </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query();   // Restore global post data stomped by the_post(). ?>
    </div>
</main><!-- #main -->

<?php

get_footer();
