function getURLVar(urlVarName) {
	var urlHalves = String(document.location).toLowerCase().split('?');
	var urlVarValue = '';
	
	if (urlHalves[1]) {
		var urlVars = urlHalves[1].split('&');

		for (var i = 0; i <= (urlVars.length); i++) {
			if (urlVars[i]) {
				var urlVarPair = urlVars[i].split('=');
				
				if (urlVarPair[0] && urlVarPair[0] == urlVarName.toLowerCase()) {
					urlVarValue = urlVarPair[1];
				}
			}
		}
	}	
	return urlVarValue;
} 

jQuery.fn.showMessageDialog = function() {
	if($(this).length == 0)
		return;
	var overlay = $('<div></div>').css({
		'position' : 'fixed',
		'top' : '0px',
		'left' : '0px',
		'height' : '100%',
		'width' : '100%',
		'opacity' : '0.7',
		'background-color' : '#000',
		'z-index' : '9999'
	}).appendTo('body').fadeIn(300);
	var title = $(this).data('title');
    var errorMessage = $(this).data('message');
    var titleClass = $(this).data('class');
    new Messi(errorMessage, 
    {
        title: title, 
        titleClass: titleClass, 
        padding : '20px 10px 20px 10px',
        buttons: [{id: 0, label: 'Close', val: 'X'}],
        callback: function() {
        	overlay.fadeOut(500, function(){
        		overlay.remove();
        	});
        }
    });
}

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

jQuery(document).ready(function (){
	$("input:checkbox, input:radio, input:file").not('[data-no-uniform="true"],#uniform-is-ajax').uniform();

	$('.left-menu').each(function(){
		new leftMenu($(this));
	});

	//Close Form:
	function closeLoginForm(){				
		$('#y-frm-register').animate(
			{
				right : '-9990px'
			},500,	
			function(){
				$('#overlay').fadeOut(300, function(){
					$('#intro-bg').css('text-align','center');	
				});												
			}					
		);
	}
	//Join clicked:
	$('#intro-bg img').click(function(e){
		$('#login-form-container').stop().hide();
		$('#overlay').fadeIn(function(){					
			$('#intro-bg').css('text-align','left');					
			$('#y-frm-register').animate(
				{
					right : '50px'
				},600
			);					
		});
	});	
	$('#intro-bg').click(function() {
		$('#login-form-container').stop().slideUp();
	});
	//Login button clicked:
	$('#login-invoke').click(function(e) {
		$('#login-form-container').stop().slideDown(500, function() {
			$(this).find('input[name="email"]').focus();
		}).mouseleave(function(){
			$(this).stop().slideUp();
		});		
	});	
	//if close button is clicked
	$('.y-frm .close').click(function (e) {
		closeLoginForm();
	});					
	//if overlay is clicked
	$('#overlay').click(function () {
		closeLoginForm();
	});	
});