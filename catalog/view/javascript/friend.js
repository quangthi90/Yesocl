(function($, document, undefined) {
	function FriendAction( $el ){
		var that = this;
		this.$el			= $el;
		this.$friend_btn	= $el.find('.btn-friend');
		this.friend_url		= this.$friend_btn.data('url');

		this.attachEvents();
	}

	FriendAction.prototype.attachEvents = function(){
		var that = this;

		this.$friend_btn.click(function(e) {
			if(that.$friend_btn.hasClass('disabled')) {
				e.preventDefault();

				return false;
			}

			that.submit(that.$friend_btn);

			return false;
		});
	};
		
	FriendAction.prototype.submit = function($button){
		var that = this;		

		var promise = $.ajax({
			type: 'POST',
			url:  this.friend_url,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) { 
			if(data.success == 'ok'){
				
			}

		});		
	};
		
	FriendAction.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-refresh icon-spin"></i>');
		var $old_icon = $el.find('i');
		var f        = function() {
			$spinner.remove();
			$el.html($old_icon);
		};

		$el.addClass('disabled').html($spinner);

		promise.then(f, f);
	};

	$(function(){
		$('.friend-actions').each(function(){
			new FriendAction( $(this) );
		});
	});
}(jQuery, document));