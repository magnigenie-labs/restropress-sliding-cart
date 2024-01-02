(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$(document).ready(function () {
        var sidebarVisible = false;

        
        // Initially hide the sidebar
        $('.rpress-sidebar-cart').hide();

        

        setInterval(function () {
            var data = {
                'action': 'get_cart_details',
            };

            $.ajax({
                url: ajax_object.ajax_url,
                type: 'post',
                data: data,
                success: function (response) {
                    var subtotal = response.subtotal;
                    var cartDetails = response.cart_details;
                    var enable = response.set_enable;

                    $('#rpress-floating-cart-icon span sup').text(cartDetails);

                    if (enable === 1 && sidebarVisible) {
                        // If sidebar is visible, hide it
                        $("#sliding-cart-window").hide();
                        sidebarVisible = false;
                    } else if (enable === 1 && !sidebarVisible) {
                        // If sidebar is not visible, show it
                        $("#sliding-cart-window").show();
                        sidebarVisible = true;
                    }
                },
                error: function (error) {
                    console.error('error:', error);
                }
            });
        }, 1000); // Check every 1 second (adjust as needed)
    });
	jQuery(document).ready(function($) {
        $("#rpress-floating-cart-icon").on("click", function() {
            // Toggle the visibility of .rpress-sidebar-cart
            $(".rpress-sidebar-cart").toggle("slow", function() {
                 
            });
        });
    });
    
    
      
})( jQuery );

