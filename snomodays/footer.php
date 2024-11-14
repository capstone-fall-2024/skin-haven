<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Skin_Haven
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'skin-haven' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'skin-haven' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'skin-haven' ), 'skin-haven', '<a href="http://underscores.me/">TerraForm</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<script>
jQuery(document).ready(function($) {
    // Event listener for category change (you can replace this with your desired event)
    $('#category-filter').on('change', function() {
        var category = $(this).val();

        $.ajax({
            url: ajaxurl, // WordPress AJAX URL
            type: 'GET',
            data: {
                action: 'filter_posts_by_category',
                category: category
            },
            success: function(response) {
                if (response.success) {
                    // Insert the new content into a container
                    $('#event-list').html(response.data.content);
                } else {
                    // Handle error (e.g., display message)
                    alert(response.data.message);
                }
            },
            error: function() {
                alert('An error occurred while fetching posts.');
            }
        });
    });

    // Event listener for clicking on an event to show the modal
    $(document).on('click', '.event', function() {
        var postId = $(this).data('post-id');

        // AJAX request to fetch the post details
        $.ajax({
            url: ajaxurl,
            type: 'GET',
            data: {
                action: 'get_post_details',
                post_id: postId
            },
            success: function(response) {
                if (response.success) {
                    // Create and show the popup with the post details
                    var modalContent = '<div class="modal-content">' +
                                       '<div class="modal-header">' +
                                           '<span class="close-modal">&times;</span>' +  // Close icon
										   '</div>' +
										   '<div class="modal-body">' +
                                           '<h2>' + response.data.title + '</h2>' +
                                           response.data.thumbnail +
                                           '<p>' + response.data.content + '</p>' +
                                       '</div>' +
                                       '</div>';

                    // Display the modal
                    $('#modal .modal-container').html(modalContent).fadeIn();
                    $('#modal').fadeIn();
                } else {
                    alert('Failed to load post details.');
                }
            },
            error: function() {
                alert('An error occurred while fetching post details.');
            }
        });
    });

    // Close the modal when the close button (X) is clicked
    $(document).on('click', '.close-modal', function() {
        $('#modal').fadeOut();
    });

    // Close the modal when clicking on the overlay (outside the modal content)
    $(document).on('click', '.modal-overlay', function() {
        $('#modal').fadeOut();
    });
});

</script>

<?php wp_footer(); ?>

</body>
</html>
