(function($, document, undefined) {
	function FriendAction( $el ){
		var that = this;
		this.$el			= $el;
		this.$make_friend	= $el.find('.')
		this.url			= $el.data('url');
		this.isLiked 		= $el.data('post-liked');
		this.iconLike 		= $el.find('i');

		this.attachEvents();
	}

	FriendAction.prototype.attachEvents = function(){
		var that = this;

		this.$el.click(function(e) {
			if(that.$el.hasClass('disabled')) {
				e.preventDefault();

				return false;
			}

			that.submit(that.$el);

			return false;
		});
	};
		
	FriendAction.prototype.submit = function($button){
		var that = this;		

		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) { 
			if(data.success == 'ok'){ 
				var $curr_item = that.$el.parents('.post'); 
				$curr_item.find('.post_meta .post_like d').html( data.like_count );
				$button.find('d').html( data.like_count );
				$curr_item.find('.view-list-liker d').html( data.like_count );
				that.$el.parent().find('d').html( data.like_count );

				var $likeIcon = $('<i class="icon-thumbs-up medium-icon"></i>');
				var $unLikeIcon = $('<i class="icon-thumbs-down medium-icon"></i>');
				
				//Unlike
				if(that.isLiked == 1) {
					that.iconLike.replaceWith($likeIcon);
					that.iconLike = $likeIcon;
					that.isLiked = 0;
				}else { //Like
					that.iconLike.replaceWith($unLikeIcon);
					that.iconLike = $unLikeIcon;
					that.isLiked = 1;
				}

				that.$el.removeClass('disabled');
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