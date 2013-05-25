(function($, document, undefined) {
	function Login( $el ){
		var that = this;

		this.$el		= $el;
		this.$email		= $el.find('input[name=\'email\']');
		this.$password	= $el.find('input[name=\'password\']');

		this.url		= $el.attr('action');
		this.direct_url = $el.data('url');

		this.$login_btn	= $el.find('.btn-login');

		this.attachEvents();
	}

	Login.prototype.attachEvents = function(){
		var that = this;

		this.$login_btn.click(function(e) {
			if(that.$login_btn.hasClass('disabled')) {
				e.preventDefault();

				return false;
			}
			
			if(that.validate() != false){
				that.data = {
					email		: that.$email.val(),
					password	: that.$password.val()
				};

				that.submit(that.$login_btn);

				return false;
			}
		});
	};

	Login.prototype.submit = function($button){
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
			}else{
				window.location.href = that.direct_url;
			}
		});
	};

	Login.prototype.validate = function($button){
		if (this.$email.val() == ''){
			return false;	
		}

		if (this.$password.val() == ''){
			return false;	
		}
	};

	Login.prototype.triggerProgress = function($el, promise)
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
		$('.login-form').each(function(){
			new Login($(this));
		});
	});
}(jQuery, document));