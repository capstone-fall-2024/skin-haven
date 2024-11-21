jQuery(document).ready(function($) {
    // Event listener for category change (you can replace this with your desired event)
    $('.filter-button').on('click', function() {
        var day = $(this).data('day'); // Get the day from the button

        // Make an AJAX request to get the filtered events
        $.ajax({
            url: ajaxurl, // This is a global variable in WordPress that provides the AJAX URL
            type: 'GET',
            data: {
                action: 'filter_events', // Custom action for our AJAX function
                day: day, // The day to filter events by
            },
            success: function(response) {
                // Replace the events list with the new filtered events
                $('#event-list').html(response);
            }
        });
    });

        $.ajax({
            url: ajaxurl, // This is a global variable in WordPress that provides the AJAX URL
            type: 'GET',
            data: {
                action: 'filter_events', // Custom action for our AJAX function
                day: 'saturday', // The day to filter events by
            },
            success: function(response) {
                // Replace the events list with the new filtered events
                $('#event-list').html(response);
            }
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
                                           '<h2>' + response.data.event_field + '</h2>' +
                                                response.data.event_image +
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