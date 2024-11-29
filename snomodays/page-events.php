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
    <h1>Events</h1>
    <p>Enjoy a weekend of winter fun with daily activities for all ages, including snowmobile rallies, ice skating,
        monster trucks, and evening fireworks. Don’t miss out on the festivities at Alberta Beach!</p>
</Section>
</header><!-- #masthead -->

<main id="primary" class="site-main">
    <div class="container">
        <section class="event-page">
                <div>
                    <div class="event-filters">
                        <button class="filter-button" data-day="saturday"><span>SAT</span></button>
                        <button class="filter-button" data-day="sunday"><span>SUN</span></button>
                        <button class="filter-button" data-day="monday"><span>MON</span></button>
                    </div>
                    <div id="event-list">
                        <!-- Events will be loaded here via AJAX -->
                    </div>
                </div>
            <!-- Modal Structure -->
            <div id="modal" class="modal" style="display:none;">
                <div class="modal-overlay"></div>
                <div class="modal-container">
                    <!-- Modal Content will be inserted here dynamically -->
                </div>
            </div>
                <section class="cancelled">
                    <h2>CANCELLED EVENTS</h3>
                    <hr class="section-line">
                    <div id="cancelledEvents">
                        <?php
        
                    // args
                    $args = array(
                        'posts_per_page'    => -1,
                        'post_type'     => 'event',
                        'meta_key'      => 'cancelled',
                        'meta_value'    => 1
                    );
        
        
                    // query
                    $the_query = new WP_Query( $args );
                    ?>
                        <?php if( $the_query->have_posts() ): ?>
                        <?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div>
                            <h3>
                                <?php echo get_the_title( $post_id ); ?>
                            </h3>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_query();   // Restore global post data stomped by the_post(). ?>
                    </div>
                </section>
        </section>
    </div>
</main><!-- #main -->
<?php

get_footer();