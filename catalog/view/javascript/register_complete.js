(function ($, document, undefined) {
	function RegisterComplete = function ($element) {
		this.$el = $element;
	}

	function RegisterCompleteStep1 = function ($element) {
		this.$el = $element;
		this.$inputIamcurrent = $element.find('.iamcurrent');
		this.$inputJobTitle = $element.find('.jobtitle');
		this.$inputSelfEmployed = $element.find('.selfemployed');
		this.$inputCompany = $element.find('.company');

		this.attachEvents();
	}

	RegisterCompleteStep1.prototype.attachEvents = function () {
		this.$inputIamcurrent.change(function () {
			var that = this;

			if ($(this).find('input[checked=\"checked\"].employed').length != 0) {
				if (that.$inputJobTitle.is(':hidden')) {
					that.$inputJobTitle.toggle();
				}
				if (that.$inputSelfEmployed.is(':hidden')) {
					that.$inputSelfEmployed.toggle();
				}
				if (that.$inputCompany.is(':hidden')) {
					that.$inputCompany.toggle();
				}
			}else if ($(this).find('input[checked=\"checked\"].jobseeker').length != 0) {
				
			}else if ($(this).find('input[checked=\"checked\"].student').length != 0) {
				
			}
		});
	}
})(jQuery, document);