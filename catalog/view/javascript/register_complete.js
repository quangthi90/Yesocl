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
		this.$el.find('input[name=\"current\"]').click(function () {alert($(this).val());
			if ($(this).val() == 2) {
				that.$el.find('.employed-input').remove();
				that.$el.find('.job-seeker-input').remove();
				that.$el.find('.student-input').remove();
				that.$el.find('#current-input-step1').before($.tmpl($('#employed-input')));
			}else if ($(this).val() == 0) {
				that.$el.find('.employed-input').remove();
				that.$el.find('.job-seeker-input').remove();
				that.$el.find('.student-input').remove();
				that.$el.find('#current-input-step1').before($.tmpl($('#job-seeker-input')));
			}else if ($(this).val() == 1) {
				that.$el.find('.employed-input').remove();
				that.$el.find('.job-seeker-input').remove();
				that.$el.find('.student-input').remove();
				that.$el.find('#current-input-step1').before($.tmpl($('#student-input')));
			}
		});
	}

	$(function(){
		new RegisterComplete($('#y-main-content'));
	});
}(jQuery, document));