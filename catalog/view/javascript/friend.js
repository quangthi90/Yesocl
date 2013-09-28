(function($, document, undefined) {
	function FriendAction( $el ){
		var that = this;
		this.$el			= $el;
		this.$friend_btn	= $el.find('.btn-friend');
		this.friend_url		= this.$friend_btn.data('url');
		this.is_cancel		= this.$friend_btn.data('cancel')

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
				var $htmlOutput = '';
				if ( that.is_cancel == 0 ){
					$htmlOutput = $.tmpl( $('#cancel-request'), {href: that.friend_url} );
				}else{
					$htmlOutput = $.tmpl( $('#send-request'), {href: that.friend_url} );
				}

				that.$el.find('.friend-group').remove();
				that.$el.prepend( $htmlOutput );
				new FriendAction( that.$el );
			}

		});		
	};
		
	FriendAction.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-refresh icon-spin"></i>');
		var $old_icon = $el.find('i');
		var f        = function() {
			$spinner.remove();
			$el.prepend($old_icon);
		};

		$old_icon.remove();
		$el.addClass('disabled').prepend($spinner);

		promise.then(f, f);
	};

	$(function(){
		$('.friend-actions').each(function(){
			new FriendAction( $(this) );
		});
	});
}(jQuery, document));