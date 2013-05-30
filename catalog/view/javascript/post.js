(function($, document, undefined) {
	var comment_box = $('#comment-box');
	var comment_form = $('.comment-form');

	function CommentBtn( $el ){
		var that = this;
		this.$el			= $el;
		this.comment_count	= $el.data('comment-count');
		this.post_id		= $el.data('post-id');
		this.post_type		= $el.data('post-type');
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

			if (that.comment_count > 0){
				that.data = {
					post_id 	: that.post_id,
					post_type	: that.post_type
				};

				that.submit(that.$el);
			}else{
				alert('No comment found');
			}

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
				for (key in data.post.comments) {
					htmlOutput += $.tmpl( $('#item-template'), data.post.comments[key] ).html();
				}
				htmlOutput += '<div id="add-more-item"></div>';
				
				comment_box.find('.comment-body').html(htmlOutput);
				comment_box.find('.y-box-header span').html(that.comment_count);
				comment_form.attr('data-post-id', data.post.id);

				comment_box.animate({"right": "0px"}, "slow", function(){
					makeVerticalCommentBox();
				});
			}
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

			that.post_id	= that.$el.data('post-id');
			
			that.data = {
				content 	: that.$content.val(),
				post_id		: that.post_id
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
			data: this.data,
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

	$(function(){
		$('.form-status').each(function(){
			new Status($(this));
		});

		$('.open-comment').each(function(){
			new CommentBtn($(this));			
		});

		$('.comment-form').each(function(){
			new CommentForm($(this));
		});

		$('.comment-container').on('click', '.y-box-header .close', function(){
			$('.open-comment').removeClass('disabled');
			comment_box.animate({"right": "-500px"}, "slow");
		});
	});
}(jQuery, document));