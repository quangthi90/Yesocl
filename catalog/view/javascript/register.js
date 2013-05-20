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

		this.$reg_btn	= $el.find('.btn-ystandard');

		this.attachEvents();	
	}

	Register.prototype.attachEvents = function()
	{
		var that = this;

		this.$reg_btn.click(function(e) {
			if(that.$reg_btn.hasClass('disabled')) {
				e.preventDefault();

				return false;
			}
		});
	};
}(jQuery, document));