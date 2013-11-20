(function($, document, undefined) {
	var marginPostDefault = 15;
	var widthPostDefault = 350;
	function Status( $el ){
		this.mainContent = $('.account-mywall').first();
		this.blockContent = this.mainContent.find('.block-content');
		this.$el		= $el;
		this.$title		= $el.find('.status-title')
		this.$content	= $el.find('.status-content');
		this.url		= $el.data('url');
		this.$status_btn	= $el.find('.btn-status');
		this.attachEvents();
	}

	Status.prototype.attachEvents = function(){
		var that = this;

		this.$status_btn.click(function(e) {
			if(that.$status_btn.hasClass('disabled')) {
				e.preventDefault();
				return false;
			}
			
			if(that.validate() == false){
				return false;
			}

			if ( that.$el.hasClass('full-post') ){
				that.data = {
					title 		: that.$title.val(),
					content 	: that.$content.html()
				};
			}else{
				that.data = {
					content 	: that.$content.val()
				};
			}

			that.submit(that.$status_btn);

			return false;
		});
	};

	Status.prototype.submit = function($button){
		var that = this;

		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			data: this.data,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) {
			if(data.success == 'ok'){
				var $htmlOutput = $.tmpl( $('#post-item-template'), data.post );
				var $column_first = $('.column').first();
				var $first_post = $column_first.children('.post_status');
				var heightDefault = (that.blockContent.height() - marginPostDefault)/2 - 2*marginPostDefault; 	
				if ( $first_post.length == 0 ){
					heightDefault = that.blockContent.height() - 100 - marginPostDefault - 2*marginPostDefault;
					$htmlOutput.height(heightDefault);
					$column_first.append( $htmlOutput );
				}else{
					$htmlOutput.height(heightDefault);
					$htmlOutput = $htmlOutput.after( $first_post );
					$htmlOutput = $('<div class="column">').append($htmlOutput);
					that.mainContent.width(that.mainContent.width() + widthPostDefault + marginPostDefault);
					$('.column').first().after($htmlOutput );					
				}
				$(document).trigger('POST_BUTTON');
				$(document).trigger('HORIZONTAL_POST');
				jQuery(".timeago").timeago();

				that.$content.val('');
				that.$content.html('');
				that.$title.val('');
			}
		});
	};

	Status.prototype.validate = function(){
		if ( this.$el.hasClass('full-post') && this.$content.html().length == 0 || !this.$el.hasClass('full-post') && this.$content.val().length == 0 ){
			return false;
		}
	};

	Status.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-spinner icon-spin"></i>');
		var f        = function() {
			$el.removeClass('disabled');
			$spinner.remove();
		};

		$el.addClass('disabled').prepend($spinner);

		promise.then(f, f);
	};

	$(function(){
		$('.form-status').each(function(){
			new Status($(this));
		});	
		var firstLoad = 0;
		$('.y-editor').summernote({
			height: 250,  
			focus: true,
  			toolbar: [
		    //['style', ['style']], // no style button
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['fontsize', ['fontsize']],
		    //['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['table', ['table']],
		    ['height', ['height']],
		    ['insert', ['picture', 'link']],		    
		    ['fullscreen', ['fullscreen']],
		    //['help', ['help']] //no help button
		  	],
		  	onfocus: function(e) {
		  		//if(firstLoad != 0){
		  		//	$('.dlg-column').eq(0).hide();
		  		//	$('.dlg-column').eq(1).width('100%');
				//}
				//firstLoad = 1;

		  	},
		  	onblur: function(e) {
		  		//var noteEditor = $(this).parent('.note-editor').find('.note-dialog .modal');
		  		//if(noteEditor.length > 0 && noteEditor.hasClass('in')) {
		  		//	return;
		  		//}	
		  		//$('.dlg-column').eq(0).width('28%').show();
	  			//$('.dlg-column').eq(1).width('68%');	  		
		  	}
		});		
	});
}(jQuery, document));
