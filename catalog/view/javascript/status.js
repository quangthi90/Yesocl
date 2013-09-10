(function($, document, undefined) {
	function Status( $el ){
		var that = this;

		this.$el		= $el;
		this.$content	= $el.find('textarea');

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
			
			that.data = {
				content 	: that.$content.val()
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
				// console.log('ok');
				// window.location.reload();
			}
		});
	};

	Status.prototype.validate = function(){
		if(this.$content.val().length == 0){
			return false;
		}
	};

	Status.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-refresh icon-spin"></i>');
		var f        = function() {
			$el.removeClass('disabled');
			$spinner.remove();
		};

		$el.addClass('disabled').prepend($spinner);

		promise.then(f, f);
	};

	function initToolbarBootstrapBindings() {
        $('a[title]').tooltip({ container: 'body' });
        $('.dropdown-menu input').click(function () { 
			return false; 
		}).change(function () { 
			$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle'); 
		}).keydown('esc', function () {
			this.value = ''; 
			$(this).change(); 
		});
        $('[data-role=magic-overlay]').each(function () {
            var overlay = $(this), target = $(overlay.data('target'));
            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset())
            .width(target.outerWidth()).height(target.outerHeight());            
        });
    };

	$(function(){
		$('.form-status').each(function(){
			new Status($(this));
		});

		initToolbarBootstrapBindings();		
		$('.y-editor').wysiwyg();		
	});
}(jQuery, document));