(function($, document, undefined) {
	var comment_box = $('#comment-box');
	var comment_form = $('.comment-form');
	var list_comment = $('#comment-box .y-box-content');
	var page = 1;

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
				console.log(that.$el.attr('data-comment-count'));
				comment_box.find('.comment-body').html(htmlOutput);
				comment_box.find('.y-box-header span').html(that.$el.attr('data-comment-count'));
				comment_form.attr('data-post-slug', that.post_slug);
				comment_form.attr('data-post-type', that.post_type);
				comment_form.attr('data-type-slug', that.type_slug);	
				page = 1;	
			}

			showCommentForCurrentPost($button.parents('.post'));
		});
	};

	CommentBtn.prototype.triggerProgress = function($el, promise)
	{
		var $spinner = $('<i class="icon-refresh icon-spin"></i>');
		var f        = function() {
			$spinner.remove();
		};

		$el.addClass('disabled').prepend($spinner);

		promise.then(f, f);
	};

	function CommentForm( $el ){
		var that = this;

		this.$el		= $el;
		this.$content	= $el.find('textarea');
		this.post_slug	= $el.data('post-slug');
		this.post_type	= $el.data('post-type');
		this.type_slug	= $el.data('type-slug');
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

			that.data = {
				content 	: that.$content.val(),
				post_slug		: that.$el.attr('data-post-id'),
				post_type	: that.$el.attr('data-post-type'),
				type_slug		: that.$el.attr('data-type-slug')
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
				data.comment['avatar'] = $('.sidebar-user-avatar').find('img').attr('src');
				data.comment['href_user'] = $('.sidebar-user-avatar').find('a').attr('href');
				htmlOutput = $.tmpl( $('#item-template'), data.comment ).html();
				$('#add-more-item').before(htmlOutput);
				that.$content.val('');
				//Scroll to last post which have just been added
				list_comment.animate({ 
					scrollTop: $('#add-more-item').offset().top
				}, 1000);
				that.$el.parent().find('.counter').html( parseInt(that.$el.parent().find('.counter').html()) + 1);
				$('.counter' + that.$el.attr('data-post-id')).html( parseInt(that.$el.parent().find('.counter').html()) );
				$('.open-comment[data-post-id=\'' + that.$el.attr('data-post-id') + '\']').attr('data-comment-count', parseInt(that.$el.parent().find('.counter').html()) )
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
		list_comment.animate({ 
			scrollTop: $('#add-more-item').offset().top
		}, 1000);
	}

	function hideCommentBox () {
		$('#overlay').hide();
		$('.post').removeClass('post-selecting');
		page = 1;
	}

	$(function(){
		$('.open-comment').each(function(){
			new CommentBtn($(this));			
		});

		$('.comment-form').each(function(){
			new CommentForm($(this));
		});

		$('.comment-container').on('click', '.y-box-header .close', function(){
			$('.open-comment').removeClass('disabled');
			comment_box.animate({"right": "-500px"}, "slow");
			hideCommentBox();
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