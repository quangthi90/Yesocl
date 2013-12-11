(function($, document, undefined) {
	var marginPostDefault = 15;
	var widthPostDefault = 420;
	function Status( $el ) {
		this.rootContent 		= $('#y-content');
		this.mainContent 		= $('#y-main-content');
		this.blockContent 		= this.mainContent.find('.block-content');
		
		this.$el				= $el;
		this.$content			= $el.find('.status-content');
		this.url				= $el.data('url');
		this.$status_btn		= $el.find('.btn-status');

		this.$advance_title		= $('#post-advance-popup').find('.post-advance-title');
		this.$advance_content	= $('#post-advance-popup').find('.post-advance-content');
		this.$advance_btn		= $('#post-advance-popup').find('.btn-post-advance');
		this.$editor 			= $('#post-advance-popup').find('.y-editor');
		this.attachEvents();
	}

	Status.prototype.attachEvents = function(){
		var that = this;

		this.$advance_btn.click(function(e) {
			if(that.$advance_btn.hasClass('disabled')) {
				e.preventDefault();
				return false;
			}

			if(that.validate(true) == false){
				return false;
			}

			that.data = {
				title 		: that.$advance_title.val(),
				content 	: that.$advance_content.code(),
				thumb		: $('#post-advance-popup').find('.img-link-popup').attr('href')
			};

			that.submit(that.$advance_btn);

			return false;
		});
		this.$status_btn.click(function(e) {
			if(that.$status_btn.hasClass('disabled')) {
				e.preventDefault();
				return false;
			}
			
			if(that.validate(false) == false){
				return false;
			}

			that.data = {
				content 	: that.$content.val(),
				thumb		: that.$el.find('.img-link-popup').attr('href')
			};

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
				var htmlOutput = $.tmpl( $('#post-item-template'), data.post );	
				var firstColumn = that.blockContent.find('.column:first-child');			
				var newColumn = $('<div class="column">').append(htmlOutput);
				newColumn.children('.post').height(firstColumn.height() - 2*(marginPostDefault + 1));
				newColumn.width(widthPostDefault);
				newColumn.css({
					'opacity':'1', 
					'min-width': widthPostDefault + 'px'
				});
				firstColumn.hide().after(newColumn).show(500);
				that.mainContent.width(that.mainContent.width() + widthPostDefault + marginPostDefault);
				that.rootContent.getNiceScroll().resize();

				$(document).trigger('POST_BUTTON');
				$(document).trigger('POST_SHOW_LIKED_BUTTON');
				$(document).trigger('HORIZONTAL_POST');
				jQuery(".timeago").timeago();
				that.$content.val('');
				that.$advance_content.code('');
				that.$advance_title.val('');
				$('#post-advance-popup').find('.img-previewer-container').html('');
				that.$el.find('.img-previewer-container').html('');
			}
		});
	};

	Status.prototype.validate = function(is_advance){
		if ( is_advance == true ){
			if ( this.$advance_content.code() == '' ){
				return false;
			}
		}else{
			if ( this.$content.val().length == 0 ){
				return false;
			}
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
	});
}(jQuery, document));
