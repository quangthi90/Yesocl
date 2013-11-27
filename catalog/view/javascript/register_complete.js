(function($, document, undefined) {
	function RegisterComplete($element) {
		this.$el = $element;
		this.step1 = new RegisterCompleteStep1($element.find('.register-step1'));
	}

	function RegisterCompleteStep1($element) {
		this.$el = $element;

		this.attachEvents();
	}

	RegisterCompleteStep1.prototype.attachEvents = function () {
		var that = this;

		this.$el.find('input[name=\"current\"]').click(function () {
			if ($(this).val() == 2) {
				that.$el.find('.employed-input').remove();
				that.$el.find('.job-seeker-input').remove();
				that.$el.find('.student-input').remove();
				that.$el.find('#current-input-step1').after($.tmpl($('#employed-inputs')));
			}else if ($(this).val() == 0) {
				that.$el.find('.employed-input').remove();
				that.$el.find('.job-seeker-input').remove();
				that.$el.find('.student-input').remove();
				that.$el.find('#current-input-step1').after($.tmpl($('#job-seeker-inputs')));
			}else if ($(this).val() == 1) {
				that.$el.find('.employed-input').remove();
				that.$el.find('.job-seeker-input').remove();
				that.$el.find('.student-input').remove();
				that.$el.find('#current-input-step1').after($.tmpl($('#student-inputs')));
			}
		});
	}

	$(function(){
		new RegisterComplete($('#y-main-content'));
	});
}(jQuery, document));