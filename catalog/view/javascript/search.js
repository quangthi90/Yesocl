// Search submit
(function($, document, undefined) {
	function SearchBtn( $el ){
		this.$el			= $el;
		this.url			= $el.data('url');
		this.$keyword 		= $el.find('input[name=\'keyword\']');
		this.$btn 			= $el.find('.btn-search');

		this.attachEvents();
	}
	SearchBtn.prototype.attachEvents = function(){
		var that = this;

		this.$keyword.keydown(function(e){
			if (e.which == 13){
				url = that.generateUrl();
				if (url){
					location = url;
				}
				return false;
			}
		});

		this.$btn.click(function(e) {
			e.preventDefault();			
			if(that.$el.hasClass('disabled')) {
				return false;
			}			
			url = that.generateUrl();
			if (url){
				location = url;
			}
			return false;
		});
	};	
	SearchBtn.prototype.generateUrl = function(){
		var url = this.url;
				 
		var search = this.$keyword.val();
		if(!String.prototype.trim) {
		  String.prototype.trim = function () {
		    return this.replace(/^\s+|\s+$/g,'');
		  };
		}
		if(search.toString().trim().length === 0) {
			return false;
		}
		url += encodeURIComponent(search);		
		return url;
	};

	$(document).ready(function() {
		$('.search-form').each(function(){
			new SearchBtn( $(this) );
		});
	});
}(jQuery, document));

// Search auto complete
(function($, document, undefined) {
	function SearchAutoComplete($el) {
		this.$root 				= $el;
		this.$autoCtrl 			= $el.find('.search-ctrl');
		this.$invokeCtrl 		= $el.data('invoke-search');
		this.$template 			= $el.find('.search-result-item-template');	
		this.$suggestContainer 	= $el.find('.suggestion-container');
		this.$btn 				= $el.find('.btn-search');

		this.url 				= $el.data('url-typeahead');

		this.attachEvents();
		this.initAutoComplete();
	}
	SearchAutoComplete.prototype.attachEvents = function() {
		var that = this;
		$(that.$invokeCtrl).click(function(e) {
			e.preventDefault();
			if($(this).hasClass('active')) {
				that.closeSearchPanel();
				$(this).removeClass('active');
			}else{
				that.openSearchPanel();
			}
		});
		that.$root.hover(function(){
				that.$autoCtrl.focus();
			}
		);
		that.$root.click(function(){
				that.$autoCtrl.focus();
			}
		);
		that.$autoCtrl.keyup(function(){
			if($(this).val().length === 0) {
				that.resizePanel();
			}
		});

		//Auto invoke search:
		$(document).keypress(function(e){
			//Check if any input is focused, if so, don't continue:
			var isFocus = false;		
			if($(this).find('.mfp-ready').length > 0) {
				isFocus = true;
			}else {
				$('input,textarea').each(function(){
					if ($(this).is(":focus")) isFocus = true;
				});
			}			
			if (isFocus) return;
			if((e.which >= 48 && e.which <= 90) || (e.which >= 97 && e.which <= 122)) {
				that.openSearchPanel();				
				if(!that.$autoCtrl.is(':focus')) {
					that.$autoCtrl.focus();
				}
				if($.browser.mozilla) {
					that.$autoCtrl.val(String.fromCharCode(e.which));
				}		
			}
		});
		$(document).keyup(function(e) {
		    if (e.keyCode == 27) { 
		        that.closeSearchPanel();
		    }
		});
	}
	SearchAutoComplete.prototype.initAutoComplete = function() {
		var that = this;

		//Get datasource:
		var tempImg = "http://findicons.com/icon/download/51187/clipping_picture/48/png";
		var dbPost = [
			{id:"6", category:"Post", image: tempImg, value: "Bieu do chung khoan", url:"#", metaInfo:"100 likes - 30 comments - 1k views"},
			{id:"7", category:"Post", image: tempImg, value: "Lang kinh thi truong hom nay", url:"#", metaInfo:"100 likes - 30 comments - 1k views"},
			{id:"8", category:"Post", image: tempImg, value: "Chi so VN-Index hom nay", url:"#", metaInfo:"100 likes - 30 comments - 1k views"}
		];
		that.$autoCtrl.typeaheadCustom([
		  {
		    name: 'dataset-friend',
		    remote: {
		    	url: that.url + '%QUERY/',
		    	cache: true,
		    	maxParallelRequests: 1
		    },
		    limit: 5,
		    limitLength: 2,	    
		    valueKey: 'username',
		    template: function(data){		    	
		    	var regex = new RegExp( '(' + that.$autoCtrl.val() + ')', 'gi' );
	            var boldItem = data.username.replace( regex, "<strong>$1</strong>" );
	            var htmlContent = '<div class="data-detail">'
	                            + '<img src="' + data.avatar + '" alt="' + data.username + '" />'
	                            + '<div class="data-meta-info">'
	                            + '<div class="data-name">' + boldItem + '</div>' 
	                            + '<div class="data-more">' + data.metaInfo + '</div>'   
	                            + '</div>'
	                            + '</div>';
	            return htmlContent;
		    },
		    header: '<h3 class="category-name">Friend</h3>'
		  },
		  {
		    name: 'dataset-post',
		    local: dbPost,
		    limit: 5,		    
		    valueKey: 'value',
		    template: function(data){		    	
		    	var regex = new RegExp( '(' + that.$autoCtrl.val() + ')', 'gi' );
	            var boldItem = data.value.replace( regex, "<strong>$1</strong>" );
	            var htmlContent = '<div class="data-detail">'
	                            + '<img src="' + data.image + '" alt="' + data.value + '" />'
	                            + '<div class="data-meta-info">'
	                            + '<div class="data-name">' + boldItem + '</div>' 
	                            + '<div class="data-more">' + data.metaInfo + '</div>'   
	                            + '</div>'
	                            + '</div>';
	            return htmlContent;
		    },
		    header: '<h3 class="category-name">Post</h3>'
		  }
	  	]).on('typeahead:opened', function(){
	  		that.resizePanel();
	  	}).on('typeahead:closed', function(){
	  		that.resizePanel();
	  	});
		$('span.tt-dropdown-menu').on('typeahead:suggestionsRendered', function (e, data) {
		    that.resizePanel();
		});
	}
	SearchAutoComplete.prototype.openSearchPanel = function() {
		var that = this;
		that.$root.slideDown(200, function(){			
			$(that.$invokeCtrl).addClass('active');	
		});	
		that.$autoCtrl.focus();
	}
	SearchAutoComplete.prototype.closeSearchPanel = function() {
		var that = this;		
		this.$root.slideUp(200, function(){
			that.$autoCtrl.typeaheadCustom('setQuery', '');
			$(that.$invokeCtrl).removeClass('active');			
		});
		$(that.$invokeCtrl).focus();
	}
	SearchAutoComplete.prototype.resizePanel = function() {
		var that = this;

		var inputContainer = $('span.twitter-typeahead');
		var dropDownContainer = $('span.tt-dropdown-menu');
		var minHeight = parseInt(that.$root.css('min-height'));
		if(dropDownContainer.height() == 0) {
			that.$root.animate({ 'height' : minHeight + 'px' }, 100);
		}else {
			that.$root.animate({ 'height' : (minHeight + dropDownContainer.height() + 40) + 'px' }, 200);
		}
	}

	$(document).ready(function() {
		$('.search-form').each(function(){
			new SearchAutoComplete($(this));
		});
	});
}(jQuery, document));