(function($, document, undefined) {
	var comment_box = $('#comment-box');

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
		that = this;

		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			data: this.data,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) {
			if(data.success == 'ok'){
				window.location.reload();
			}
		});
	};

	Status.prototype.validate = function(){
		if(this.$content.val().length == 0){
			return false;
		}
	};

	Status.prototype.triggerProgress = function($el, promise)
	{
		var $spinner = $('<i class="icon-refresh icon-spin">');
		var f        = function() {
			$el.removeClass('disabled');
			$spinner.remove();
		};

		$el.addClass('disabled').prepend($spinner);

		promise.then(f, f);
	};

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

			}

			return false;
		});
	};

	CommentBtn.prototype.submit = function($button){
		that = this;

		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			data: that.data,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) {
			if(data.success == 'ok'){
				var htmlOutput = '';
				for (key in data.post.comments) {
					htmlOutput += $.tmpl( $('#item-template'), data.post.comments[key] ).html();
				}

				// console.log(data.post.comments);
				comment_box.find('.comment-body').html(htmlOutput);
				comment_box.find('.y-box-header span').html(that.comment_count);

				comment_box.animate({"right": "0px"}, "slow", function(){
					makeVerticalCommentBox();
				});
			}
		});
	};

	CommentBtn.prototype.triggerProgress = function($el, promise)
	{
		var $spinner = $('<i class="icon-refresh icon-spin">');
		var f        = function() {
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

		$('.comment-container').on('click', '.y-box-header .close', function(){
			$('.open-comment').removeClass('disabled');
			comment_box.animate({"right": "-500px"}, "slow");

			$('.comment-body').html('');
			comment_box.find('.y-box-header span').html('0');
		});
	});
}(jQuery, document));