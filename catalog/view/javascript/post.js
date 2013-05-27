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

	function Comment( $el ){
		var that = this;

		this.$el			= $el;
		this.comment_count	= $el.data('comment-count');
		this.post_id		= $el.data('post-id');
		this.url			= $el.data('url');

		this.attachEvents();
	}

	Comment.prototype.attachEvents = function(){
		var that = this;

		this.$el.click(function(e) {
			$('.comment-body').html('');

			if(that.$el.hasClass('disabled')) {
				e.preventDefault();

				return false;
			}

			if (that.comment_count > 0){
				that.data = {
					post_id 	: that.post_id
				};

				that.submit(that.$el);
			}else{

			}

			return false;
		});
	};

	Comment.prototype.submit = function($button){
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
				for (var i = 0; i < data.post.comments.length; i++) {
					htmlOutput += $.tmpl( $('#item-template'), data.post.comments[i] ).html();
				}
				// console.log(data.post.comments);
				$('.comment-body').html(htmlOutput);
		
				$('#comment-box').animate({"right": "0px"}, "slow", function(){
					makeVerticalCommentBox();
				});
			}
		});
	};

	Comment.prototype.triggerProgress = function($el, promise)
	{
		var $spinner = $('<i class="icon-refresh icon-spin">');
		var f        = function() {
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
			new Comment($(this));
		});
	});
}(jQuery, document));