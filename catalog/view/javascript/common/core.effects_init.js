/* Remove Envato Frame */
if (window.location != window.parent.location)
	top.location.href = document.location.href;

(function($, Y, window) {
	var globalSettings = Y.Constants.SettingKeys, 
		globalTriggers = Y.Constants.Triggers;

	// fix for safari back button issue
	window.onunload = function(){};

	$.expr[':'].scrollable = function( elem ) {
      var scrollable = false,
          props = [ '', '-x', '-y' ],
          re = /^(?:auto|scroll)$/i,
          elem = $(elem);
      
      $.each( props, function(i,v){
        return !( scrollable = scrollable || re.test( elem.css( 'overflow' + v ) ) );
      });
      
      return scrollable;
    };

	window.beautify = function (source) {
		var output,
			opts = {};

	 	opts.preserve_newlines = false;
		output = html_beautify(source, opts);
	    return output;
	};

	window.enableNavbarMenusHover = function() {
		$('.navbar.main [data-toggle="dropdown"]')
		.add('#menu-top [data-toggle="dropdown"]')
		.addClass('dropdown-hover');
	};

	window.disableNavbarMenusHover = function() {
		$('.navbar.main [data-toggle="dropdown"]')
		.add('#menu-top [data-toggle="dropdown"]')
		.removeClass('dropdown-hover');
	};

	window.enableResponsiveNavbarSubmenus = function(){
		$('.navbar .dropdown-submenu > a').on('click', function(e){
			e.preventDefault();
			e.stopPropagation();
			$(this).parent().toggleClass('open');
		});
	};

	window.disableResponsiveNavbarSubmenus = function(){
		$('.navbar .dropdown-submenu > a')
		.off('click')
		.parent()
		.removeClass('open');
	};

	window.enableContentNiceScroll = function(hide) {
		if ($('html').is('.ie') || Modernizr.touch)
			return;

		if (typeof $.fn.niceScroll == 'undefined')
			return;

		if (typeof hide == 'undefined')
			var hide = true;

		$('#content .col-app, .col-separator, .applyNiceScroll')
		.filter(':scrollable')
		.not('.col-unscrollable')
		.filter(function(){
			return !$(this).find('> .col-table').length;
		})
		.addClass('hasNiceScroll')
		.each(function()
		{
			$(this).niceScroll({
				horizrailenabled: false,
				zindex: 2,
				cursorborder: "none",
				cursorborderradius: "0",
				cursorcolor: primaryColor
			});

			if (hide == true)
				$(this).getNiceScroll().hide();
			else
				$(this).getNiceScroll().resize().show();
		});
	};

	window.makeNiceScroll = function(jEle) {
		if (typeof $.fn.niceScroll == 'undefined' || jEle.length === 0)
			return;

		if(!jEle.hasClass("hasNiceScroll")){
			jEle.addClass("hasNiceScroll");
		}
		var niceInstance = jEle.getNiceScroll();
		if(niceInstance && niceInstance.length > 0){
			niceInstance.resize().show();
			return;
		}
		jEle.niceScroll({
			horizrailenabled: false,
			zindex: 2,
			cursorborder: "none",
			cursorborderradius: "0",
			cursorcolor: primaryColor
		});
		jEle.off(Y.Constants.Triggers.ELEMENT_REMOVED_BY_KO);
		jEle.on(Y.Constants.Triggers.ELEMENT_REMOVED_BY_KO, function(){
			var niceInstance = $(this).getNiceScroll();
            if(niceInstance.length > 0){
            	niceInstance.remove();
            }
		});
	};

	window.disableContentNiceScroll = function() {
		if (typeof $.fn.niceScroll == 'undefined')
			return;

		$('#content .hasNiceScroll').getNiceScroll().remove();
	};

	window.resizeNiceScroll = function() {
		if (typeof $.fn.niceScroll == 'undefined')
			return;

		setTimeout(function(){
			$('.hasNiceScroll, #menu-right, #menu').getNiceScroll().show().resize();
			if ($('.container-fluid').is('.menu-hidden'))
				$('#menu-right, #menu').getNiceScroll().hide();
		}, 100);
	};

	// scroll to element animation
	function scrollTo(id) {
		if ($(id).length)
		{
			var ns = $(id).closest('.hasNiceScroll');
			if (ns.length)
			{
				var nso = ns.getNiceScroll();
				if (nso.length)
				{
					var e = nso[0]
						idOffset = $(id).offset().top,
						nsOffset = ns.offset().top,
						eOffset = e.getScrollTop(),
						scrollDown = idOffset - nsOffset + eOffset;

					nso[0].doScrollTop(scrollDown);
				}
			}
			else
				$('html,body').animate({scrollTop: $(id).offset().top },'slow');
		}
	}
	
	/* ================================ INIT GLOBAL EVENTS ================================ */
	// tooltips
	$('body').tooltip({ selector: '[data-toggle="tooltip"]' });
	
	// popovers
	$('[data-toggle="popover"]').popover();

	$('[data-toggle="scrollTo"]').on('click', function(e) {
		e.preventDefault();
		scrollTo($(this).attr('href'));
	});

	$('ul.collapse').on('show.bs.collapse', function(e) {
		e.stopPropagation();
		$(this).closest('li').addClass('active');
	}).on('hidden.bs.collapse', function(e) {
		e.stopPropagation();
		$(this).closest('li').removeClass('active');
	});

	enableContentNiceScroll();

	if ($('html').is('.ie'))
		$('html').removeClass('app');

	if (typeof $.fn.niceScroll != 'undefined') {
		$('#menu > div')
		.add('#menu-right > div')
		.addClass('hasNiceScroll')
		.niceScroll({
			horizrailenabled: false, 
			zindex: 2,
			cursorborder: "none",
			cursorborderradius: "0",
			cursorcolor: primaryColor
		}).hide();
	}

	if (typeof coreInit == 'undefined') {
		$('body')
		.on('mouseenter', '[data-toggle="dropdown"].dropdown-hover', function()
		{ 
			if (!$(this).parent('.dropdown').is('.open'))
				$(this).click();
		});
	}
	else {
		$('[data-toggle="dropdown"]').dropdown();
	}

	$('.navbar.main').add('#menu-top').on('mouseleave', function() {
		$(this).find('.dropdown.open').find('> [data-toggle="dropdown"]').click();
	});

	$('[data-height]').each(function() {
		$(this).css({ 'height': $(this).data('height') });
	});

	if (typeof $.fn.niceScroll != 'undefined') {
		$('.app [data-toggle="tab"]')
		.on('shown.bs.tab', function(e)
		{
			$('.hasNiceScroll').getNiceScroll().resize();
		});
	}

	if (typeof $.fn.setBreakpoints !== 'undefined') {
		$(window).setBreakpoints({
			distinct: false,
			breakpoints: [ 768, 992 ]
		});

		$(window).bind('exitBreakpoint768',function() {		
			$('.container-fluid').addClass('menu-hidden');
			disableNavbarMenusHover();
			enableResponsiveNavbarSubmenus();
		});

		$(window).bind('enterBreakpoint768',function() {
			if(Y.Utils.getSetting(globalSettings.SHOW_LEFT_SIDEBAR) === "1") {
				$('.container-fluid').removeClass('menu-hidden');
			}
			enableNavbarMenusHover();
			disableResponsiveNavbarSubmenus();
		});

		$(window).bind('exitBreakpoint992',function() {		
			disableContentNiceScroll();
		});

		$(window).bind('enterBreakpoint992',function() {
			enableContentNiceScroll(false);
		});
	}
	/* ============================== END INIT GLOBAL EVENTS =======================  */
		
	window.coreInit = true;
	/* ======================= HANDLE EVENTS =============================	*/
	$(window).on('load', function() {
		window.loadTriggered = true;

		if ($(window).width() < 992 && typeof $.fn.niceScroll != 'undefined')
			$('.hasNiceScroll').getNiceScroll().stop();

		if ($(window).width() < 768)
			enableResponsiveNavbarSubmenus();
		else
			enableNavbarMenusHover();

		if (typeof animations == 'undefined' && typeof $.fn.niceScroll != 'undefined')
			$('.hasNiceScroll, #menu-right, #menu').getNiceScroll().show().resize();
	});

	/* ======================= END HANDLE EVENTS ========================= */

	// weird chrome bug, sometimes the window load event isn't triggered
	setTimeout(function() {
		if (!window.loadTriggered)
			$(window).trigger('load');
	}, 2000);

})(jQuery, YesGlobal,window);