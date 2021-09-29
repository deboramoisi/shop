// Initialize the owl carousel using JQuery

$(document).ready(function() {

	// banner owl carousel
	$("#banner-area .owl-carousel").owlCarousel({
		// Specify parameters
		loop: true,
		dots: true,
		items: 1
	});

	// most-recent owl carousel
	$("#most-recent .owl-carousel").owlCarousel({
		// Parameters
		loop: true,
		nav: true,
		dots: false,
		responsive: {
			// 0 viewport
			0: {
				items: 1
			},
			// >600 px viewport
			600: {
				items: 3
			},
			// window > 1000 px, display 5 products
			1000: {
				items: 5
			}
		}
	})

});

