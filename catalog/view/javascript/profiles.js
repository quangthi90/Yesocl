// Create layout
(function($, document, undefined) {
	function ProfilesLayout($el) {
		this.$el = $el;
		this.$information = $el.find('#profiles-tabs-information');
		this.$background = $el.find('#profiles-tabs-background');
		
		this.$summary = $el.find('#profiles-tabs-background-summary');
		this.$education = $el.find('#profiles-tabs-background-education');
		this.$experience = $el.find('#profiles-tabs-background-experience');
		
		this.$header = this.$background.find('.profiles-tabs-header');

		var contentHeight = this.$el.height()*9/10;
		var contentWidth = this.$information.width();

		// Summary
		var summary_main_body = this.$summary.find('.profiles-tabs-main-body');
		this.$summary.outerWidth(contentWidth);
		summary_main_body.outerHeight(contentHeight - this.$header.height() - 30);
		summary_main_body.niceScroll();

		// Education
		var education_main_body = this.$education.find('.profiles-tabs-main-body');
		this.$education.outerWidth(contentWidth);
		education_main_body.outerHeight(contentHeight - this.$header.height() - 30);
		education_main_body.niceScroll();

		// Experience
		var experience_main_body = this.$experience.find('.profiles-tabs-main-body');
		this.$experience.outerWidth(contentWidth);
		experience_main_body.outerHeight(contentHeight - this.$header.height() - 30);
		experience_main_body.niceScroll();

		// Background
		this.$background.width((this.$summary.outerWidth() + 25)*4 - 25);

		this.$el.width(this.$information.outerWidth() + this.$background.outerWidth() + 25*2);
	}

	$(function(){
		new ProfilesLayout($('#y-main-content'));
	});
}(jQuery, document));

// Information
(function($, document, undefined) {
	function InfoLabel($el) {
		this.$el = $el;
		this.$btn = $el.find('.profiles-btn-edit');

		this.attachEvents();
	}

	InfoLabel.prototype.attachEvents = function () {
		var that = this;

		this.$btn.click(function () {
			that.$el.addClass('hidden');
			that.$el.parent().find('.profile-form').removeClass('hidden');
		});
	}

	function InfoForm($el){
		this.$el 					= $el;
		this.url 					= $el.data('url');

		this.$btnCancel 			= $el.find('.profiles-btn-cancel');
		this.$btnSave 				= $el.find('.profiles-btn-save');
		this.$btnAddPhone 			= $el.find('.phones-btn-add');
		this.$btnAddEmail 			= $el.find('.emails-btn-add');
		this.$btnRemovePhone 		= $el.find('.phones-btn-remove');
		this.$btnRemoveEmail 		= $el.find('.emails-btn-remove');
		this.$btnPrimaryEmail 		= $el.find('.primary-email-btn');

		this.$locationAutoComplete 	= $el.find('input[name=\"location\"]');
		this.$industryAutoComplete 	= $el.find('input[name=\"industry\"]');

		var $inputBirthday 			= this.$el.find('.inputBirthday .bfh-datepicker');
		$inputBirthday.bfhdatepicker($inputBirthday.data());

		this.attachEvents();
	}

	InfoForm.prototype.attachEvents = function () {
		var that = this;

		this.$btnCancel.click(function () {
			that.$el.addClass('hidden');
			that.$el.parent().find('.profile-label').removeClass('hidden');
		});

		this.$btnSave.click(function () {
			if ( $(this).hasClass( 'disabled' ) ) {
				return false;
			}

			var emails = [];
			that.$el.find('.emails-form').each(function(){
				emails.push({
					email 	: $(this).find('.email').val(),
					primary : $(this).find('.primary').val()
				});
			})

			var phones = [];
			that.$el.find('.phones-form').each(function(){
				phones.push({
					phone: $(this).find('.phone').val(),
					type: $(this).find('.type').val()
				});
			});
			
			that.data = {
				'username'		: that.$el.find('[name=\'username\']').val(),
				'firstname'		: that.$el.find('[name=\'firstname\']').val(),
				'lastname'		: that.$el.find('[name=\'lastname\']').val(),
				'emails'		: emails,
				'phones'		: phones,
				'sex'			: that.$el.find('[name=\'gender\']').val(),
				'birthday'		: that.$el.find('[name=\'birthday\']').val(),
				'address'		: that.$el.find('[name=\'address\']').val(),
				'location'		: that.$el.find('[name=\'location\']').val(),
				'cityid'		: that.$el.find('[name=\'cityid\']').val(),
				'industry'		: that.$el.find('[name=\'industry\']').val(),
				'industryid'	: that.$el.find('[name=\'industryid\']').val(),
			};
			
			that.submit(that.$btnSave);

			return false;
		});

		this.$btnAddPhone.click(function () {
			var data = {
				'index': $(this).attr('data-index')
			}

			var $form = $.tmpl( $('#profiles-phone-form'), data);

			$(this).attr('data-index', parseInt(data.index) + 1);
			$(this).before( $form );

			$form.find('.phones-btn-remove').click(function(){
				$form.remove();
			});
		});

		this.$btnRemovePhone.click(function(){
			$(this).parents('.phones-form').remove();
		});

		this.$btnAddEmail.click(function () {
			var data = {
				'index': $(this).attr('data-index')
			}

			var $form = $.tmpl( $('#profiles-email-form'), data);

			$(this).attr('data-index', parseInt(data.index) + 1);
			$(this).before( $form );

			// Remove Email
			$form.find('.emails-btn-remove').click(function(){
				$form.remove();
			});

			// Set primary email
			$form.find('.primary-email-btn').click(function(){
				that.$el.find('input.primary').each(function(){
					$(this).val('0');
				});

				that.$el.find('.primary-email-btn').each(function(){
					$(this).removeClass('label-success');
				});

				$(this).addClass('label-success').parent().find('input.primary').val('1');
			});
		});

		this.$btnRemoveEmail.click(function(){
			var $emails_form = $(this).parents('.emails-form');
			if ( $emails_form.find('input.primary').val() == 1 ){
				alert('not delete primary email!');
			}else{
				$emails_form.remove();
			}
		});

		this.$btnPrimaryEmail.click(function(){
			that.$el.find('input.primary').each(function(){
				$(this).val('0');
			});

			that.$el.find('.primary-email-btn').each(function(){
				$(this).removeClass('label-success');
			});

			$(this).addClass('label-success').parent().find('input.primary').val('1');
		});

		this.$locationAutoComplete.typeahead({
			source: function (query, process) {
				that.$el.find('input[name=\"cityid\"]').val('');
				return $.ajax({
					type: 'Post',
					url: that.$locationAutoComplete.parent().data('autocomplete') + query,
					success: function (json) {
						var parJSON = JSON.parse(json);
						var suggestions = [];
						locations = {};
						$.each(parJSON, function (i, suggestTerm) {
							locations[suggestTerm.name] = suggestTerm;
							suggestions.push(suggestTerm.name);
						});
						process(suggestions);
					},
				});
			},
			items: 5,
			minLength: 1,
		});

		this.$industryAutoComplete.typeahead({
			source: function (query, process) {
				that.$el.find('input[name=\"industryid\"]').val('');
				return $.ajax({
					type: 'Post',
					url: that.$industryAutoComplete.parent().data('autocomplete') + query,
					success: function (json) {
						var parJSON = JSON.parse(json);
						var suggestions = [];
						industries = {};
						$.each(parJSON, function (i, suggestTerm) {
							industries[suggestTerm.name] = suggestTerm;
							suggestions.push(suggestTerm.name);
						});
						process(suggestions);
					},
				});
			},
			items: 5,
			minLength: 1,
		});
	}

	InfoForm.prototype.submit = function($button){
		var that = this;
		
		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			data: this.data,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) {
			if ( data.message == 'success' ) {
				var $profile_label = $.tmpl($('#profiles-label'), data);

				var $profile_form = $.tmpl($('#profiles-form'), data);

				that.$el.parent().html('').append($profile_label).append($profile_form);

				new InfoLabel($profile_label);
				new InfoForm($profile_form);
			}else if ( data.birthday != null ){
				var $input = that.$el.find('[name=\"birthday\"]');
				$input.tooltip('destroy');
				$input.parent().removeClass('success');
				$input.parent().addClass('error');
				$input.tooltip({
					animation: true,
					html: false,
					placement: 'top',
					selector: true,
					title: data.birthday,
					trigger:'hover focus',
					delay:0,
					container: false
				});
			}
		});
	};

	InfoForm.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-refresh icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f        = function() {
            $spinner.remove();
            $el.removeClass('disabled').html($old_icon);
        };
        
        $el.addClass('disabled').html($spinner);

        promise.then(f, f);
	};

	$(function(){
		$('.profile-label').each(function(){
			new InfoLabel( $(this) );
		});

		$('.profile-form').each(function(){
			new InfoForm( $(this) );
		});
	});
}(jQuery, document));

// Summary
(function($, document, undefined) {
	function SummaryLabel($el){
		this.$el = $el;
		this.$btn = $el.find('.profiles-btn-edit');

		this.attachEvents();
	}

	SummaryLabel.prototype.attachEvents = function () {
		var that = this;

		this.$btn.click(function () {
			that.$el.addClass('hidden');
			that.$el.parent().find('.summary-form').removeClass('hidden');
		});
	}

	function SummaryForm($el){
		this.$el = $el;
		this.$input = $el.find('[name=\"summary\"]');
		this.$btnCancel = $el.find('.profiles-btn-cancel');
		this.$btnSave = $el.find('.profiles-btn-save');
		
		this.url = $el.parent().data('url');

		this.attachEvents();
	}

	SummaryForm.prototype.attachEvents = function () {
		var that = this;

		this.$btnCancel.click(function () {
			that.$el.addClass('hidden');
			that.$el.parent().find('.summary-label').removeClass('hidden');
		});

		this.$btnSave.click(function(){
			if ( $(this).hasClass('disabled') || that.$input.val().length < 50 ) {
				return false;
			}

			that.data = {
				'summary': that.$input.val()
			};

			that.submit( $(this) );

			return false;
		});
	}

	SummaryForm.prototype.submit = function($button){
		var that = this;
		
		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			data: this.data,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) {
			if ( data.message == 'success' ) {
				that.$input.val(that.data.summary);
				that.$el.parent().find('.background-input-summary').html(that.data.summary);
				that.$btnCancel.trigger('click');
			}
		});
	};

	SummaryForm.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-refresh icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f        = function() {
            $spinner.remove();
            $el.removeClass('disabled').html($old_icon);
        };
        
        $el.addClass('disabled').html($spinner);

        promise.then(f, f);
	};

	$(function(){
		$('.summary-label').each(function(){
			new SummaryLabel( $(this) );
		});

		$('.summary-form').each(function(){
			new SummaryForm( $(this) );
		});
	});
}(jQuery, document));

// Education
(function($, document, undefined) {
	function Education($el){
		this.$el 			= $el;
		this.$formAdd 		= $el.find('.background-education-form-add');
		
		this.$btnAdd 		= $el.find('.profiles-btn-add');
		this.$btnSave 		= $el.find('.profiles-btn-save');
		this.$btnCancel 	= $el.find('.profiles-btn-cancel');
		this.$btnEdit 		= $el.find('.profiles-btn-edit');
		this.$btnRemove 	= $el.find('.profiles-btn-remove');

		this.$started 		= this.$formAdd.find('[name=\"started\"]');
		this.$ended 		= this.$formAdd.find('[name=\"ended\"]');

		this.$degree 		= this.$formAdd.find('[name=\"degree\"]');
		this.$degree_id 	= this.$formAdd.find('[name=\"degree_id\"]');
		this.$school 		= this.$formAdd.find('[name=\"school\"]');
		this.$school_id 	= this.$formAdd.find('[name=\"school_id\"]');
		this.$fieldofstudy 	= this.$formAdd.find('[name=\"fieldofstudy\"]');
		this.$fieldofstudy_id 	= this.$formAdd.find('[name=\"fieldofstudy_id\"]');

		this.attachEvents();
	}

	Education.prototype.attachEvents = function(){
		var that = this;

		this.$btnAdd.click(function(){
			console.log(that.$formAdd.attr('class'));
			that.$formAdd.removeClass('hidden').addClass('add-form');
		});

		this.$btnCancel.click(function(){
			that.$formAdd.addClass('hidden').removeClass('add-form').find('input').each(function(){
				$(this).val('');
			});

			that.$started.val('0');
			that.$ended.val('0');

			that.$el.find('.education-item').removeClass('hidden');
		});

		this.$btnEdit.click(function(){
			var $item = $(this).parents('.education-item');

			that.$started.val( $item.data('started') );
			that.$ended.val( $item.data('ended') );
			that.$degree.val( $item.data('degree') );
			that.$school.val( $item.data('school') );
			that.$fieldofstudy.val( $item.data('fieldofstudy') );

			$item.addClass('hidden');
			that.$formAdd.removeClass('hidden').removeClass('add-form').data('edit', $item.data('edit'));
		});

		this.$btnRemove.click(function(){
			if ( $(this).hasClass('disabled') ) {
				return false;
			}

			if ( confirm("You sure delete this ?") == false ){
				return false;
			}

			that.url = $(this).parents('.education-item').data('remove');

			that.submit( $(this), 'remove' );

			return false;
		});

		this.$btnSave.click(function(){
			if ( $(this).hasClass('disabled') ) {
				return false;
			}

			that.data = {
				'started'			: that.$started.val(),
				'ended'				: that.$ended.val(),
				'degree'			: that.$degree.val(),
				'degree_id'			: that.$degree_id.val(),
				'school'			: that.$school.val(),
				'school_id'			: that.$school_id.val(),
				'fieldofstudy'		: that.$fieldofstudy.val(),
				'fieldofstudy_id'	: that.$fieldofstudy_id.val(),
			};

			if ( that.$formAdd.hasClass('add-form') ){
				that.url = that.$formAdd.data('add');

				that.submit( $(this), 'add' );
			}else{
				that.url = that.$formAdd.data('edit');

				that.submit( $(this), 'edit' );
			}

			return false;
		});

		this.$degree.typeahead({
			source: function (query, process) {
				that.$degree_id.val('');
				return $.ajax({
					type: 'Post',
					url: that.$el.data('degree') + query,
					success: function (json) {
						var parJSON = JSON.parse(json);
						var suggestions = [];
						degrees = {};
						$.each(parJSON, function (i, suggestTerm) {
							degrees[suggestTerm.name] = suggestTerm;
							suggestions.push(suggestTerm.name);
						});
						process(suggestions);

						// Note
						// Fix for screen 14", Fix it
						that.$degree.parent().find('ul.typeahead').css('left', '1631px');
					},
				});
			},
			items: 5,
			minLength: 1,
		});

		this.$school.typeahead({
			source: function (query, process) {
				that.$school_id.val('');
				return $.ajax({
					type: 'Post',
					url: that.$el.data('school') + query,
					success: function (json) {
						var parJSON = JSON.parse(json);
						var suggestions = [];
						schools = {};
						$.each(parJSON, function (i, suggestTerm) {
							schools[suggestTerm.name] = suggestTerm;
							suggestions.push(suggestTerm.name);
						});
						process(suggestions);

						// Note
						// Fix for screen 14", Fix it
						that.$school.parent().find('ul.typeahead').css('left', '1631px');
					},
				});
			},
			items: 5,
			minLength: 1,
		});

		this.$fieldofstudy.typeahead({
			source: function (query, process) {
				that.$fieldofstudy_id.val('');
				return $.ajax({
					type: 'Post',
					url: that.$el.data('fieldofstudy') + query,
					success: function (json) {
						var parJSON = JSON.parse(json);
						var suggestions = [];
						fieldofstudies = {};
						$.each(parJSON, function (i, suggestTerm) {
							fieldofstudies[suggestTerm.name] = suggestTerm;
							suggestions.push(suggestTerm.name);
						});
						process(suggestions);

						// Note
						// Fix for screen 14", Fix it
						that.$fieldofstudy.parent().find('ul.typeahead').css('left', '1631px');
					},
				});
			},
			items: 5,
			minLength: 1,
		});
	}

	Education.prototype.submit = function($button, method){
		var that = this;
		
		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			data: that.data,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) {
			if ( data.message == 'success' ) {
				if ( method == 'remove' ){
					$button.parents('.education-item').remove();
				}else if ( method == 'edit' ){
					var $item = $.tmpl($('#background-education-item'), data);

					$('#' + data.id).before($item).remove();

					that.$btnCancel.trigger('click');

					$('.education-label').each(function(){
						new Education( $(this) );
					});
				}else if ( method == 'add' ){
					that.$btnCancel.trigger('click');

					var $item = $.tmpl($('#background-education-item'), data);

					that.$formAdd.parent().append($item);

					$('.education-label').each(function(){
						new Education( $(this) );
					});
				}
			}
		});
	}

	Education.prototype.triggerProgress = function($el, promise){
		var $spinner = $('<i class="icon-refresh icon-spin"></i>');
        var $old_icon = $el.find('i');
        var f        = function() {
            $spinner.remove();
            $el.removeClass('disabled').html($old_icon);
        };
        
        $el.addClass('disabled').html($spinner);

        promise.then(f, f);
	};

	$(function(){
		$('.education-label').each(function(){
			new Education( $(this) );
		});
	});
}(jQuery, document));

// Experience
(function($, document, undefined) {
	function Experience($el){
		this.$el 			= $el;
		this.$formAdd 		= $el.find('.background-experience-form-add');

		this.$btnAdd 		= $el.find('.profiles-btn-add');
		this.$btnCancel 	= $el.find('.profiles-btn-cancel');
		this.$btnEdit 		= $el.find('.profiles-btn-edit');
		this.$btnRemove		= $el.find('.profiles-btn-remove');
		this.$btnSave 		= $el.find('.profiles-btn-save');

		this.$strMonth		= this.$formAdd.find('[name=\"started_month\"]');
		this.$strYear		= this.$formAdd.find('[name=\"started_year\"]');
		this.$endMonth		= this.$formAdd.find('[name=\"ended_month\"]');
		this.$endYear		= this.$formAdd.find('[name=\"ended_year\"]');
		this.$title			= this.$formAdd.find('[name=\"title\"]');
		this.$company		= this.$formAdd.find('[name=\"company\"]');
		this.$location		= this.$formAdd.find('[name=\"location\"]');

		this.attachEvents();
	}

	Experience.prototype.attachEvents = function(){
		var that = this;

		this.$btnAdd.click(function(){
			that.$formAdd.removeClass('hidden').addClass('add-form');
		});

		this.$btnCancel.click(function(){
			that.$formAdd.addClass('hidden').removeClass('add-form').find('input').val('');
			that.$formAdd.find('select').val('0');
		});

		this.$btnEdit.click(function(){
			var $item = $(this).parents('.experience-item');

			that.$formAdd.removeClass('hidden');
			that.$formAdd.data('edit', $(this).data('edit'));

			that.$strMonth.val( $item.data('startedm') );
			that.$strYear.val( $item.data('startedy') );
			that.$endMonth.val( $item.data('endedm') );
			that.$endYear.val( $item.data('endedy') );
			that.$title.val( $item.data('startedm') );
			that.$company.val( $item.data('startedm') );
			that.$location.val( $item.data('startedm') );
		});

		this.$btnSave.click(function(){
			if ( this.$formAdd.hasClass('add-form') ){
				that.url = that.$formAdd.data('add');
			}else{
				that.url = that.$formAdd.data('edit');
			}

			that.data = {
				'started_month'		: that.$strMonth.val(),
				'ended_month'		: that.$endMonth.val(),
				'started_year'		: that.$strYear.val(),
				'ended_year'		: that.$endYear.val(),
				'title'				: that.$title.val(),
				'company'			: that.$company.val(),
				'location'			: that.$location.val(),
			};

			this.submit( $(this) );
		});
	}

	$(function(){
		$('.experience-label').each(function(){
			new Experience( $(this) );
		});
	});
}(jQuery, document));