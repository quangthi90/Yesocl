(function($, ko, window, Y, undefined) {
	'use strict';

	$(".owl-carousel").owlCarousel({
        slideSpeed : 300,
        paginationSpeed : 400,
        navigation: false,
        autoPlay: false,
        items: 3,
        navigationText: ['Newer', 'Older']
    });
    //Apply Knockout
    ko.applyBindings(Y.GlobalKoModel);
	
}(jQuery, ko, window, YesGlobal));