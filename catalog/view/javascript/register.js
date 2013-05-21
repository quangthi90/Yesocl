(function($, document, undefined) {
	function Register( $el ){
		var that = this;

		this.$el		= $el;
		this.$firstname	= $el.find('input[name=\'firstname\']');
		this.$lastname	= $el.find('input[name=\'lastname\']');
		this.$email		= $el.find('input[name=\'email\']');
		this.$password	= $el.find('input[name=\'password\']');
		this.$confirm	= $el.find('input[name=\'confirm\']');
		this.$day		= $el.find('select[name=\'day\']');
		this.$month		= $el.find('select[name=\'month\']');
		this.$year		= $el.find('select[name=\'year\']');
		this.$sex		= $el.find('select[name=\'sex\']');

		this.url		= $el.attr('action');

		this.$reg_btn	= $el.find('.btn-ystandard');

		this.attachEvents();
	}

	Register.prototype.attachEvents = function(){
		var that = this;

		this.$el.find('.warning').hide();

		this.$reg_btn.click(function(e) {
			if(that.$reg_btn.hasClass('disabled')) {
				e.preventDefault();

				return false;
			}
			
			that.validate();
			
			that.data = {
				firstname 	: that.$firstname.val(),
				lastname 	: that.$lastname.val(),
				email		: that.$email.val(),
				password	: that.$password.val(),
				day			: that.$day.val(),
				month		: that.$month.val(),
				year		: that.$year.val(),
				sex			: that.$sex.val()
			};

			that.submit(that.$reg_btn);
		});
	};

	Register.prototype.validate = function($button){
		if (this.$firstname.val() == ''){
			this.$firstname.parent().find('.warning').show();
			return false;	
		}

		if (this.$lastname.val() == ''){
			this.$lastname.parent().find('.warning').show();
			return false;	
		}

		if (this.$email.val() == ''){
			this.$email.parent().find('.warning').show();
			return false;	
		}

		if (this.$password.val() == ''){
			this.$password.parent().find('.warning').show();
			return false;	
		}

		if (this.$confirm.val() == ''){
			this.$confirm.parent().find('.warning').show();
			return false;	
		}

		if (this.$password.val() != this.$confirm.val()){
			this.$password.parent().find('.warning').show();
			return false;	
		}

		if (this.$day.val() == 0){
			this.$day.parent().find('.warning').show();
			return false;	
		}

		if (this.$month.val() == 0){
			this.$month.parent().find('.warning').show();
			return false;	
		}

		if (this.$year.val() == 0){
			this.$year.parent().find('.warning').show();
			return false;	
		}

		if (this.$sex.val() == 0){
			this.$sex.parent().find('.warning').show();
			return false;	
		}
	};

	/*AddToCartBtn.prototype.triggerProgress = function($el, promise)
	{
		var $spinner = $('<i class="icon-refresh icon-spin">');
		var f        = function() {
			$el.removeClass('disabled');
			$spinner.remove();
		};

		$el.addClass('disabled').prepend($spinner);

		promise.then(f, f);
	};*/

	$(function(){
		$('.reg-form').each(function(){
			new Register($(this));
		});
	});
}(jQuery, document));