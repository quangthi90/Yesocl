(function($, document, undefined) {
	var comment_box = $('#comment-box');
	var comment_form = $('.comment-form');
	var list_comment = $('#comment-box .y-box-content');
	var page = 1;

	function LikePostBtn( $el ){
		var that = this;
		this.$el			= $el;
		this.post_slug		= $el.data('post-slug');
		this.post_type		= $el.data('post-type');
		this.isLiked 		= $el.data('post-liked');
		this.iconLike 		= $el.find('i');
		this.url			= $('.common-link .like-post').val();

		this.attachEvents();
	}

	LikePostBtn.prototype.attachEvents = function(){
		var that = this;

		this.$el.click(function(e) {
			if(that.$el.hasClass('disabled')) {
				e.preventDefault();

				return false;
			}

			that.data = {
				post_slug 	: that.post_slug,
				post_type	: that.post_type
			};

			that.submit(that.$el);

			return false;
		});
	};
		
	LikePostBtn.prototype.submit = function($button){
		var that = this;		

		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			data: that.data,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) { 
			if(data.success == 'ok'){ 
				var $curr_item = that.$el.parents('.post'); 
				$curr_item.find('.post_meta .post_like d').html( data.like_count );
				$button.find('d').html( data.like_count );

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
			}

		});		
	};
		
	LikePostBtn.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-refresh icon-spin"></i>');
		var f        = function() {
			$spinner.remove();
			$el.delay(1000).removeClass('disabled');
		};

		$el.addClass('disabled').parent().prepend($spinner);

		promise.then(f, f);
	};

	function LikeCommentBtn( $el ){
		var that = this;

		var $curr_item = $el.parents('.post');

		this.$el			= $el;
		this.id				= $el.data('comment-id');
		this.post_slug		= $curr_item.find('.comment-form').attr('data-post-slug');
		this.post_type		= $curr_item.find('.comment-form').attr('data-post-type');
		this.url			= $('.common-link .like-comment').val();
		this.isLiked 		= $el.data('comment-liked');
		this.iconLike 		= $el.find('i');
		this.attachEvents();
	}

	LikeCommentBtn.prototype.attachEvents = function(){
		var that = this;

		this.$el.click(function(e) {
			if(that.$el.hasClass('disabled')) {
				e.preventDefault();

				return false;
			}

			that.data = {
				comment_id	: that.id,
				post_slug 	: that.post_slug,
				post_type	: that.post_type
			};

			that.submit(that.$el);

			return false;
		});
	};
		
	LikeCommentBtn.prototype.submit = function($button){
		var that = this;

		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			data: that.data,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) { alert(data.success);
			if(data.success == 'ok'){
				that.$el.find('d').html( data.like_count ); 

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
			}
		});
	};
		
	LikeCommentBtn.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-refresh icon-spin"></i>');
		var f        = function() {
			$spinner.remove();
			$el.removeClass('disabled');
		};

		$el.addClass('disabled').parent().append($spinner);

		promise.then(f, f);
	};

	function CommentBtn( $el ){
		var that = this;

		this.$el			= $el;
		this.comment_count	= $el.data('comment-count');
		this.post_slug		= $el.data('post-slug');
		this.post_type		= $el.data('post-type');
		this.type_slug		= $el.data('type-slug');
		this.url			= $el.data('url');

		this.attachEvents();
	}

	CommentBtn.prototype.attachEvents = function(){
		var that = this;

		this.$el.click(function(e) {
			if(that.$el.hasClass('disabled')) {
				e.preventDefault();

				return false;
			}

			$('#comment-box').find('.y-box-header .close').trigger('click');

			that.data = {
				post_slug 	: that.post_slug,
				post_type	: that.post_type
			};

			that.submit(that.$el);

			return false;
		});
	};

	CommentBtn.prototype.submit = function($button){
		var that = this;

		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			data: that.data,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) { 
			if(data.success == 'ok'){
				$('.comment-body').html('');

				var htmlOutput = '';
				for (key in data.comments) {
					htmlOutput += $.tmpl( $('#item-template'), data.comments[key] ).html();
				}
				
				htmlOutput += '<div id="add-more-item"></div>';
				comment_box.find('.comment-body').html(htmlOutput);
				comment_box.find('.y-box-header span').html(that.comment_count);
				comment_form.attr('data-post-slug', that.post_slug);
				comment_form.attr('data-post-type', that.post_type);
				comment_form.attr('data-type-slug', that.type_slug);
				page = 1;

				$('.comment-form').each(function(){
					new CommentForm($(this));
				});

				$('.comment-item .like-comment').each(function(){
					new LikeCommentBtn($(this));			
				});

				jQuery(".timeago").timeago();
			}

			if ( $button.parents('.post').attr('class') != undefined ){
				showCommentForCurrentPost($button.parents('.post'));
			}
		});
	};

	CommentBtn.prototype.triggerProgress = function($el, promise)
	{
		var $spinner = $('<i class="icon-refresh icon-spin"></i>');
		var f        = function() {
			$spinner.remove();
		};

		$el.addClass('disabled').parent().prepend($spinner);

		promise.then(f, f);
	};

	function CommentForm( $el ){
		var that = this;

		this.$el		= $el;
		this.$content	= $el.find('textarea');
		this.post_slug	= $el.attr('data-post-slug');
		this.post_type	= $el.attr('data-post-type');
		this.type_slug	= $el.attr('data-type-slug');
		this.url		= $el.data('url');
		this.$comment_btn	= $el.find('.btn-comment');

		this.attachEvents();
	}

	CommentForm.prototype.attachEvents = function(){
		var that = this;

		this.$comment_btn.click(function(e) {
			if(that.$comment_btn.hasClass('disabled')) {
				e.preventDefault();

				return false;
			}
			
			if(that.validate() == false){
				return false;
			}

			that.post_slug	= that.$el.attr('data-post-slug');
			that.post_type	= that.$el.attr('data-post-type');
			that.type_slug	= that.$el.attr('data-type-slug');

			that.data = {
				content 	: that.$content.val(),
				post_slug	: that.post_slug,
				post_type	: that.post_type,
				type_slug	: that.type_slug
			};

			that.submit(that.$comment_btn);

			return false;
		});
	};

	CommentForm.prototype.submit = function($button){
		var that = this;

		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			data: that.data,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) {
			if(data.success == 'ok'){
				htmlOutput = $.tmpl( $('#item-template'), data.comment ).html();
				$('#add-more-item').before(htmlOutput);
				that.$content.val('');
				//Scroll to last post which have just been added
				list_comment.animate({ 
					scrollTop: $('#add-more-item').offset().top
				}, 1000);

				var comment_count = parseInt(that.$el.parent().find('.counter').html()) + 1;
				that.$el.parent().find('.counter').html( comment_count );

				var $curr_item = $('.open-comment.disabled').parent().parent().parent().parent();
				$curr_item.find('.open-comment').attr('data-comment-count', comment_count).find('d').html( comment_count );
				$curr_item.find('.post_header .post_cm d').html( comment_count );

				$('.comment-item .like-comment').each(function(){
					new LikeCommentBtn($(this));			
				});

				jQuery(".timeago").timeago();
			}
		});
	};

	CommentForm.prototype.validate = function(){
		if(this.$content.val().length == 0){
			return false;
		}
	};

	CommentForm.prototype.triggerProgress = function($el, promise)
	{
		var $spinner = $('<i class="icon-refresh icon-spin"></i>');
		var f = function() {
			$el.removeClass('disabled');
			$spinner.remove();
		};

		$el.addClass('disabled').prepend($spinner);

		promise.then(f, f);
	};

	function showCommentForCurrentPost ($post) {
		
		$('.post').removeClass('post-selecting');
		$post.addClass('post-selecting');
		$('#overlay').show('fast');

		if($post.attr('class').indexOf('last-feed')){ 
			$('#y-main-content').scrollLeft($('#y-main-content').width());
		}

		//Show comment box:
		comment_box.animate({"right": "2px"}, "slow", function(){			
			//list_comment.makeScrollWithoutCalResize();
		});
		// list_comment.animate({ 
		// 	scrollTop: $('#add-more-item').offset().top
		// }, 1000);
	}

	function hideCommentBox () {
		$('#overlay').hide();
		$('.post').removeClass('post-selecting');
		$('.open-comment').removeClass('disabled');
		comment_box.animate({"right": "-500px"}, "slow");
		page = 1;
	}

	$(function(){
		$('.post_action .like-post').each(function(){
			new LikePostBtn($(this));			
		});

		$('.open-comment').each(function(){
			new CommentBtn($(this));			
		});

		$('.comment-container').on('click', '.y-box-header .close', function(){
			hideCommentBox();
		});
		
		$('#overlay').click(function() {
			hideCommentBox ();
		});
		$(document).keyup(function(e) {
		  if (e.keyCode == 27) { 
		  	hideCommentBox ();
		  }
		});

		var getComments = function () {
			list_comment.off('scroll');
			if(list_comment.scrollTop() == (list_comment.height() - list_comment.height()) && (((page + 1)*10 < $('.open-comment.disabled').attr('data-comment-count')) || ((page + 1)*10 - $('.open-comment.disabled').attr('data-comment-count') <= 10)) ) {
				page++;
				var data = {
					'post_slug'	: comment_form.attr('data-post-id'),
					'post_type' : comment_form.attr('data-post-type'),
					'page'		: page
				}
				$.ajax({
					type: 'POST',
					url:  $('.open-comment.disabled').data('url'),
					data: data,
					dataType: 'json',
					progress: function () {
						$('.comment-body').prepend('<span class="loading"><i class="icon-spin icon-refresh"></i>Loading...</span>');
					},
					success: function (data) {
						if(data.success == 'ok') {
							var htmlOutput = '';
							for (key in data.comments) {
								htmlOutput += $.tmpl( $('#item-template'), data.comments[key] ).html();
							}
							$('.comment-body').find('.loading').remove();
							$('.comment-body').prepend(htmlOutput);
						}
					}
				});
    		} 
			list_comment.on('scroll', function () {
				getComments();
			});
		}
		list_comment.on('scroll', function () {
			getComments();
		});
	});
}(jQuery, document));