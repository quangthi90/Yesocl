(function($) {
	$(window).on('gridalicious-loaded', function(){
		$('[data-toggle*="gridalicious"]').each(function() {
			var $that = $(this);
			var gutter = $that.attr('data-gridalicious-gutter') ? parseInt($that.attr('data-gridalicious-gutter')) : 13;
			var width = $that.attr('data-gridalicious-width') ? parseInt($that.attr('data-gridalicious-width')) : 200;
			var	selector = $that.attr('data-gridalicious-selector') || '.widget';

			$(this).find('.loading').remove().end()
			.find('.loaded').removeClass('hide2').end()
			.gridalicious(
			{
				gutter: gutter, 
				width: width,
				selector: selector
			});
		});
	});
})(jQuery);