// Notification for make friend
(function($, document, undefined) {
	function NotifyFriendBtn( $el ){
		this.$el			= $el;
		this.$accept_btn	= $el.find('.btn-accept');
		this.accept_url		= this.$accept_btn.data('url');
		this.$ignore_btn	= $el.find('.btn-ignore');
		this.ignore_url		= this.$ignore_btn.data('url');

		this.attachEvents();
	}
	NotifyFriendBtn.prototype.attachEvents = function(){
		var that = this;

		this.$accept_btn.click(function(e) {
			e.preventDefault();
			
			if(that.$el.hasClass('disabled')) {
				return false;
			}

			that.submit( that.$accept_btn, that.accept_url );

			return false;
		});

		this.$ignore_btn.click(function(e) {
			e.preventDefault();
			
			if(that.$el.hasClass('disabled')) {
				return false;
			}

			that.submit( that.$ignore_btn, that.ignore_url );

			return false;
		});
	};	
	NotifyFriendBtn.prototype.submit = function($button, url){
		var that = this;

		var promise = $.ajax({
			type: 'POST',
			url: url,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) { 
			if(data.success == 'ok'){			
				var $group = that.$el.parents('.notification-item').find('.notification-item-count');
				
				var count_request = parseInt($group.data('count'), 10) - 1;
				
				$group.data('count', count_request);

				$group.html(count_request).addClass('hidden');
				
				that.$el.remove();
			}
		});	
	};
	NotifyFriendBtn.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-spinner icon-spin"></i>');
		var $old_icon = $el.find('i');
		var f        = function() {
			$spinner.remove();
			$el.html($old_icon);
		};

		$el.addClass('disabled').html($spinner);

		promise.then(f, f);
	};

	$(document).ready(function() {
		if($('#user-notification').length > 0){
			new Notification($('#user-notification'));
		}
		
		$('.notify-actions').each(function(){
			new NotifyFriendBtn( $(this) );
		});
	});
}(jQuery, document));