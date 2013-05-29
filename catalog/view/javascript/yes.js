jQuery(document).ready(function (){
	$("input:checkbox, input:radio, input:file").not('[data-no-uniform="true"],#uniform-is-ajax').uniform();

	function leftMenu($el){
		var that = this;

		this.$el = $el;
		this.$item = $el.find('.menu-item');

		this.attachEvents();
	}

	leftMenu.prototype.attachEvents = function(){
		var that = this;

		this.$item.click(function(e) {
			if($(this).hasClass('disabled')) {
				e.preventDefault();

				return false;
			}

			if($(this).find('a').attr('href') != '#'){
				window.location.href = $(this).find('a').attr('href');
			}
			
			that.$el.find('li.active').removeClass('active');
			$(this).addClass('active');

			return false;
		});
	}

	$(function(){
		// check again when apply SEO url
		route = getURLVar('route');
	
		if (!route) {
			$('#home-menu').addClass('active');
		} else {
			part = route.split('/');

			part = part[1].split('#');
			
			url = part[0];
			
			$('#' + url + '-menu').addClass('active');
		}

		$('.left-menu').each(function(){
			new leftMenu($(this));
		});
	});
});