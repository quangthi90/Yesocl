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
		e.preventDefault();
		$('#login-form-container').stop().slideDown(500, function() {
			$(this).find('input[name="email"]').focus();
		});		
	});	
	//if close button is clicked
	$('.y-frm .close').click(function (e) {
		e.preventDefault();
		closeLoginForm();
	});					
	//if overlay is clicked
	$('#overlay').click(function (e) {
		e.preventDefault();
		closeLoginForm();
	});	
});


//Define HashTable in JS
function HashTable(obj)
{
    this.length = 0;
    this.items = {};
    for (var p in obj) {
        if (obj.hasOwnProperty(p)) {
            this.items[p] = obj[p];
            this.length++;
        }
    }
    //Add new item to hashtable
    this.setItem = function(key, value)
    {
        var previous = undefined;
        if (this.hasItem(key)) {
            previous = this.items[key];
        }
        else {
            this.length++;
        }
        this.items[key] = value;
        return previous;
    }
    //Get existed item by key
    this.getItem = function(key) {
        return this.hasItem(key) ? this.items[key] : undefined;
    }
    //Check whether item has key existed 
    this.hasItem = function(key)
    {
        return this.items.hasOwnProperty(key);
    }   
    //Remove existed item from hastable
    this.removeItem = function(key)
    {
        if (this.hasItem(key)) {
            previous = this.items[key];
            this.length--;
            delete this.items[key];
            return previous;
        }
        else {
            return undefined;
        }
    }
    //Return list of keys of hashtable
    this.keys = function()
    {
        var keys = [];
        for (var k in this.items) {
            if (this.hasItem(k)) {
                keys.push(k);
            }
        }
        return keys;
    }
    //Return list of values of hashtable
    this.values = function()
    {
        var values = [];
        for (var k in this.items) {
            if (this.hasItem(k)) {
                values.push(this.items[k]);
            }
        }
        return values;
    }
    //Foreach implement
    this.each = function(fn) {
        for (var k in this.items) {
            if (this.hasItem(k)) {
                fn(k, this.items[k]);
            }
        }
    }
    //Clear hashtable
    this.clear = function()
    {
        this.items = {}
        this.length = 0;
    }
}

window.yListFriends = null;
var is_send_ajax = 0;

// Language
(function($, document, undefined) {
    function LanguageBtn( $el ){
        var that = this;
        
        this.$el   = $el;
        this.code 			= this.$el.data('code');

        this.attachEvents();
    }
    LanguageBtn.prototype.attachEvents = function(){
        var that = this;

        this.$el.click(function(e) {
        	if ( that.$el.data('selected') == false ){
	            if(that.$el.hasClass('disabled')) {
	                e.preventDefault();

	                return false;
	            }

	            that.submit(that.$el);

	            return false;
	        }
        });
    };
    LanguageBtn.prototype.submit = function($button){
        var that = this;        
        
        var promise = $.ajax({
            type: 'POST',
            url:  yRouting.generate('SetLanguage'),
            data: {language: this.code},
            dataType: 'json'
        });

        this.triggerProgress($button, promise);

        promise.then(function(data) { 
            if(data.success == 'ok'){ 
                window.location.reload();
            }
        });     
    };
    LanguageBtn.prototype.triggerProgress = function($el, promise){
        var $spinner = $('<i class="icon-spinner icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f        = function() {
            $spinner.remove();
            $el.removeClass('disabled').prepend($old_icon);
        };

        $old_icon.remove();
        $el.addClass('disabled').prepend($spinner);

        promise.then(f, f);
    };

    $(function(){
        $('.js-language-btn .language-item').each(function(){
            new LanguageBtn($(this));           
        });

        $('.js-language-btn').find('.language-item').each(function(){
        	if ( $(this).data('selected') == true ){
        		var $img = $(this).find('img').clone();
        		$('.js-language').find('.js-language-label img').replaceWith( $img );
        		var text = $(this).find('span').html();
        		$('.js-language').find('.js-language-label span').html( text );
        	}
        });
    });
}(jQuery, document));