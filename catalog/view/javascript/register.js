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
		this.$agree		= $el.find('input[name=\'agree\']');

		this.url		= $el.attr('action');

		this.$reg_btn	= $el.find('.btn-reg');

		this.attachEvents();
	}

	Register.prototype.attachEvents = function(){
		var that = this;

		this.$reg_btn.click(function(e) {
			that.$el.find('.warning').addClass('hidden');

			if(that.$reg_btn.hasClass('disabled')) {
				e.preventDefault();

				return false;
			}
			
			var validate = that.validate();
			if(validate == false){
			}else if(validate == "confirm"){
				return false;
			}else{
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

				return false;
			}
		});
	};

	Register.prototype.submit = function($button){
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
				$('.top-warning').html(data.warning).removeClass("hidden");
			}
		});
	};

	Register.prototype.validate = function(){
		if (this.$firstname.val() == ''){
			return false;	
		}

		if (this.$lastname.val() == ''){
			return false;	
		}

		if (this.$email.val() == ''){
			return false;	
		}

		if (this.$password.val() == ''){
			return false;	
		}

		if (this.$confirm.val() == ''){
			return false;	
		}

		if (this.$password.val() != this.$confirm.val()){
			that.$confirm.parent().find('.warning').removeClass('hidden');
			return "confirm";	
		}

		if (this.$day.val() == ""){
			return false;	
		}

		if (this.$month.val() == ""){
			return false;	
		}

		if (this.$year.val() == ""){
			return false;	
		}

		if (this.$sex.val() == ""){
			return false;	
		}
		
		if (!this.$agree.parent().hasClass('checked')){
			return false;	
		}

		if (this.$day.val() == 31 && this.$month.val() == (4 || 6 || 9 || 11)){
			this.$day.val() = "";
			return false;
		}
	};

	Register.prototype.triggerProgress = function($el, promise)
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
		$('.reg-form').each(function(){
			new Register($(this));
		});
	});
}(jQuery, document));