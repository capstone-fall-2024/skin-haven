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
                    var modalContent = 
                    '<div class="modal-content">' +
                    '<div class="modal-header">' +
                        '<span class="close-modal">&times;</span>' +  // Close icon
                    '</div>' +
                    '<div class="modal-body">' +
                        '<h2>' + response.data.event_field + '</h2>' +
                        response.data.event_image +
                        '<div class="event-info">' +  // Wrapper div for event-related info
                            '<div class="popup-flex">' +  // Wrap event_duration in its own div
                                // Insert the calendar SVG icon inside event-duration div
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4" viewBox="0 0 16 16">' +
                                    '<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>' +
                                '</svg>' +
                                '<p>' + response.data.event_duration + '</p>' +
                            '</div>' +
                            '<div class="popup-flex">' +  // Wrap event_cost in its own div
                                // Insert the geo-alt SVG icon at the top of event-cost div
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">' +
                                    '<path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>' +
                                    '<path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>' +
                                '</svg>' +
                                '<p>' + response.data.event_location + '</p>' +
                                // Insert the arrow-up-right SVG icon inside event-cost div
                            '</div>' +
                        '</div>' +  // Close the event-info div
                        
                        // New div for About Event and description
                        '<div class="about-event">' +
                            '<h3>About Event</h3>' +
                            '<p>' + response.data.description + '</p>' +
                        '</div>' +
            
                    '</div>' +
                '</div>';
                    // Display the modal
                    $('#modal .modal-container').html(modalContent).fadeIn();
                    $('#modal').animate({
                        width: 'show'
                    });
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
        $('#modal').animate({
            width: 'hide'
        });
    });

    // Close the modal when clicking on the overlay (outside the modal content)
    $(document).on('click', '.modal-overlay', function() {
        $('#modal').animate({
            width: 'hide'
        });
    });


});


document.querySelectorAll('.event-filters button').forEach(button => {
    button.addEventListener('click', () => {
        document.querySelectorAll('.event-filters button').forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
    });
});
