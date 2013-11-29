// Friend action button
(function($, document, undefined) {
	function FriendAction( $el, removeUnFriend ){
		var that = this;
		this.$el			= $el;
		this.$friend_btn	= $el.find('.btn-friend');
		this.$unfriend_btn	= $el.find('.btn-unfriend');
		this.friend_url		= this.$friend_btn.data('url');
		this.unfriend_url	= this.$unfriend_btn.data('url');
		
		this.is_cancel		= this.$friend_btn.data('cancel')
		this.is_remove_friend = removeUnFriend;

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

		this.$unfriend_btn.click( function (e) {
			if (that.$unfriend_btn.hasClass('disabled')) {
				e.preventDefault();

				return false;
			}

			that.remove(that.$unfriend_btn);

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
					$htmlOutput = $.tmpl( $('#cancel-request'), {
						href: that.friend_url,
						id: that.$friend_btn.data('id')
					});
					$(document).trigger('FRIEND_UPDATE_STATUS', [
						3, 
						that.$friend_btn.data('id')
					]);
				}else{
					$htmlOutput = $.tmpl( $('#send-request'), {
						href: that.friend_url,
						id: that.$friend_btn.data('id')
					});
					$(document).trigger('FRIEND_UPDATE_STATUS', [
						4, 
						that.$friend_btn.data('id')
					]);
				}

				that.$el.find('.friend-group').remove();
				that.$el.prepend( $htmlOutput );
				new FriendAction( that.$el );
			}

		});
	};
		
	FriendAction.prototype.remove = function($button){
		var that = this;

		var promise = $.ajax({
			type: 'POST',
			url:  this.unfriend_url,
			dataType: 'json',
			error: function (xhr, error) {
				console.log(error);
			}
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) { 
			if(data.success == 'ok'){
				// Remove friend
				if ( that.is_remove_friend == true ){
					that.$el.parent().remove();

				// Change status to not relationship
				// And show button make friend
				}else{
					var $htmlOutput = $.tmpl( $('#send-request'), {
						href: that.friend_url,
						id: that.$unfriend_btn.data('id')
					});
					that.$el.find('.friend-group').remove();
					that.$el.prepend( $htmlOutput );
					new FriendAction( that.$el );
					
					$(document).trigger('FRIEND_UPDATE_STATUS', [
						4, 
						that.$unfriend_btn.data('id')
					]);
				}
			}
		});
	};

	FriendAction.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-spinner icon-spin"></i>');
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
        $(document).bind('FRIEND_ACTION', function(e, remove) {
            $('.friend-actions').each(function(){
                new FriendAction($(this), remove);
            });
        });
    });
}(jQuery, document));

// Filter friend
(function($, document, undefined) {
	function FriendFilter( $el ){
		this.$el 				= $el;
		this.$inputFilter		= $el.find('#filter-input');
		this.$friendConditions	= $el.find('.friend-condition');

		this.attachEvents();
	}

	FriendFilter.prototype.attachEvents = function () {
		var that = this;

		if(!String.prototype.trim) {
		  String.prototype.trim = function () {
		    return this.replace(/^\s+|\s+$/g,'');
		  };
		}

		that.$inputFilter.keyup(function(){
			var query = $(this).val().toString().trim();
			
		});

		this.$friendConditions.each( function () {
			$(this).click(function(){
				if ( $(this).hasClass('active') ){
					return false;
				}

				that.$friendConditions.each(function(){
					$(this).removeClass('active');
				});
				$(this).addClass('active');

				$('.friend-item').addClass('hidden');
				$('.friend-item.' + $(this).data('friend')).removeClass('hidden');
			});
		});
	}

	$(function(){
		$('#friend-filter').each(function(){
            new FriendFilter( $(this) );
        });
    });
}(jQuery, document));