jQuery(document).ready(function($) {
    // Handle button clicks
    $('.category-filter').on('click', function() {
        var category = $(this).data('category');
        
        // AJAX request to fetch posts by category
        $.ajax({
            url: ajaxurl, // WordPress uses this global variable for AJAX requests
            type: 'GET',
            data: {
                action: 'filter_posts_by_category',  // The action hook to trigger
                category: category
            },
            beforeSend: function() {
                $('#posts-container').html('<p>Loading posts...</p>');
            },
            success: function(response) {
                $('#posts-container').html(response);  // Load the posts into the container
            },
            error: function() {
                $('#posts-container').html('<p>Error loading posts. Please try again.</p>');
            }
        });
    });
});


