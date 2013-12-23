// Create layout
(function($, document, undefined) {
	function ProfilesLayout($el) {
		this.$el = $el;		
		this.$information = $el.find('#profiles-tabs-information');
		this.$background = $el.find('#profiles-tabs-background');		
		this.$summary = $el.find('#profiles-tabs-background-summary');
		this.$education = $el.find('#profiles-tabs-background-education');
		this.$experience = $el.find('#profiles-tabs-background-experience');
		this.$skill = $el.find('#profiles-tabs-background-skill');		
		this.$header = this.$background.find('.profiles-tabs-header');
		this.$main_profile = $el.find('.profiles-tabs-main');
		this.$contentHeight = this.$el.height();
		this.$gapHeight = 35 + 50 + 2*(20 + 1);

		var contentWidth = this.$information.width();
		//Fix height of main profile:
		this.$main_profile.height(this.$contentHeight - 35 - 2*(20 + 1));

		// Information
		var information_main_body = this.$information.find('.profiles-tabs-main-body');
		this.$information.outerWidth(contentWidth);
		information_main_body.outerHeight(this.$contentHeight - this.$gapHeight);
		information_main_body.makeCustomScroll();

		// Summary
		var summary_main_body = this.$summary.find('.profiles-tabs-main-body');
		this.$summary.outerWidth(contentWidth);
		summary_main_body.outerHeight(this.$contentHeight - this.$gapHeight);
		summary_main_body.makeCustomScroll();
		var textareaCtrl = summary_main_body.find('textarea[name="summary"]');
		textareaCtrl.css('max-height', (summary_main_body.height() - 30) + 'px');
		textareaCtrl.css('min-height', (summary_main_body.height() - 30) + 'px');

		// Education
		var education_main_body = this.$education.find('.profiles-tabs-main-body');
		this.$education.outerWidth(contentWidth);
		education_main_body.outerHeight(this.$contentHeight - this.$gapHeight);
		education_main_body.makeCustomScroll();

		// Experience
		var experience_main_body = this.$experience.find('.profiles-tabs-main-body');
		this.$experience.outerWidth(contentWidth);
		experience_main_body.outerHeight(this.$contentHeight - this.$gapHeight);
		experience_main_body.makeCustomScroll();

		// Skill
		var skill_main_body = this.$skill.find('.profiles-tabs-main-body');
		this.$skill.outerWidth(contentWidth);
		skill_main_body.outerHeight(this.$contentHeight - this.$gapHeight);
		skill_main_body.makeCustomScroll();

		// Background
		this.$background.width((this.$summary.outerWidth() + 25)*4 - 25);
		this.$el.width(this.$information.outerWidth() + this.$background.outerWidth() + 25*2);

		//Handle profile changed:
		var that = this;
		$(document).on('PROFILE_CHANGED', function(e, data) {
			that.updateScroll(data.type);
		});
	}
	ProfilesLayout.prototype.updateScroll = function(type) {
		if(type === 1) {
			var information_main_body = this.$information.find('.profiles-tabs-main-body');
			information_main_body.outerHeight(this.$contentHeight - this.$gapHeight);
			information_main_body.makeCustomScroll();
		}else if (type === 2) {
		}else if (type === 3) {
		}else if (type === 4) {
		}else if(type === 5) {
		}
	}

	function ProfileViewLayout($el){
		this.$el = $el;
		this.$rootContent = $el.parent('#y-content');
		this.$heightContent = $el.height();
		this.$profileColumn = $el.find('.profile-column');
		this.$overviewColumn = $el.find('.profile-overview');
		this.$navigationItem = $el.find('.profile-category-item');
		this.makeLayoutScroll();
		this.attachEvents();
	}
	ProfileViewLayout.prototype.attachEvents = function(){
		var that = this;
		var widthContent = that.$el.width();
		that.$rootContent.scroll(function(e){
			var x = $(this).scrollLeft();
			if(x > 10) {
				that.$overviewColumn.addClass('scrolling');
				that.$el.width(widthContent - that.$overviewColumn.width());
			}else {
				that.$overviewColumn.removeClass('scrolling');
				that.$el.width(widthContent);
			}
		});
		that.$navigationItem.on('click', function(e){
			e.preventDefault();
			var href = $(this).attr('href');
			if($(href).length == 0) return;
			var leftPosition = 0;
			if(href === '#profile-column-information'){
				leftPosition = 200;
			}else if(href === '#profile-column-summary') {
				leftPosition = $('#profile-column-information').width() + 30 ;
			}else if(href === '#profile-column-education') {
				leftPosition = $('#profile-column-information').width() + 30 + $('#profile-column-summary').width() + 30;
			}else if(href === '#profile-column-experience') {
				leftPosition = $('#profile-column-information').width() + 30 + $('#profile-column-summary').width() + 30 + $('#profile-column-education').width() + 30;
			}else if(href === '#profile-column-skill') {
				leftPosition = $('#profile-column-information').width() + 30 + $('#profile-column-summary').width() + 30 + $('#profile-column-education').width() + 30 + $('#profile-column-experience').width() + 30;
			}
			that.$rootContent.animate({scrollLeft: (leftPosition - 200) + 'px'}, 1000);
			that.$profileColumn.removeClass('active');
			that.$navigationItem.removeClass('active');
			$(this).addClass('active');
			$(href).addClass('active');
		});
	}
	ProfileViewLayout.prototype.makeLayoutScroll = function(){
		var that = this;
		var totalOfWidth = 0;

		that.$overviewColumn.height(that.$heightContent);
		that.$profileColumn.each(function(){
			var title = $(this).find('.profile-column-title');
			var wrapper = $(this).find('.profile-column-wrapper');
			var content = $(this).find('.profile-column-content');

			wrapper.height(that.$heightContent - title.outerHeight() - 20 - 30);
			content.makeCustomScroll();
			totalOfWidth += $(this).outerWidth() + 35;
			$(this).css('opacity','1');
		});
		that.$el.width(totalOfWidth);
		that.$rootContent.makeScrollWithoutCalResize();
	}

	$(function(){
		var mainContent = $('#y-main-content');
		if(mainContent.hasClass('profile-view-page')){
			new ProfileViewLayout(mainContent);
		}else {
			new ProfilesLayout(mainContent);
		}		
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
				bootbox.dialog({
				title: "Inform",
				message: "The primary email can't be deleted !",				
				buttons: {
					oke: {
						  label: "OK",
						  className: "btn-primary",
						  callback: function() {
						  }
						}
					}
				});
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
			updater: function (item) {
				that.$el.find('input[name=\"cityid\"]').val(locations[item].id);
	    		return item;
			}
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
			updater: function (item) {
				that.$el.find('input[name=\"industryid\"]').val(industries[item].id);
	    		return item;
			}
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

				$(document).trigger('PROFILE_CHANGED', [{type: 1}]);
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
				$(document).trigger('PROFILE_CHANGED', [{type: 2}]);
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
			that.$degree_id.val( $item.data('degree-id') );
			that.$school_id.val( $item.data('school-id') );
			that.$fieldofstudy_id.val( $item.data('fieldofstudy-id') );

			$item.addClass('hidden');
			that.$formAdd.removeClass('hidden').removeClass('add-form').data('edit', $item.data('edit'));
		});

		this.$btnRemove.click(function(){
			if ( $(this).hasClass('disabled') ) {
				return false;
			}
			var me = $(this);
	        bootbox.dialog({
				title: "Confirm",
				message: "Are you sure you want to delete this item ?",				
				buttons: 
				{
					cancel: {
						label: "Cancel",
						className: "btn",
						callback: function() {							
						}
					},
					oke: {
						label: "OK",
						className: "btn-primary",
						callback: function() {
							me.fadeIn(100);
							that.url = me.parents('.education-item').data('remove');
							that.submit(me, 'remove' );
					  	}
					}
				}
			});
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
						//that.$degree.parent().find('ul.typeahead').css('left', '1631px');
					},
				});
			},
			items: 5,
			minLength: 1,
			updater: function (item) {
				that.$degree_id.val(degrees[item].id);
	    		return item;
			}
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
						//that.$school.parent().find('ul.typeahead').css('left', '1631px');
					},
				});
			},
			items: 5,
			minLength: 1,
			updater: function (item) {
				that.$school_id.val(schools[item].id);
	    		return item;
			}
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
						//that.$fieldofstudy.parent().find('ul.typeahead').css('left', '1631px');
					},
				});
			},
			items: 5,
			minLength: 1,
			updater: function (item) {
				that.$fieldofstudy_id.val(fieldofstudies[item].id);
	    		return item;
			}
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
				$(document).trigger('PROFILE_CHANGED', [{type: 3}]);
			}else if ( data.education_started_ended != null ){
				var $started = that.$formAdd.find('[name=\"started\"]');
				$started.tooltip('destroy');
				$started.parent().removeClass('success');
				$started.parent().addClass('error');
				$started.tooltip({
					animation: true,
					html: false,
					placement: 'top',
					selector: true,
					title: data.education_started_ended,
					trigger:'hover focus',
					delay:0,
					container: false
				});

				var $ended = that.$formAdd.find('[name=\"ended\"]');
				$ended.tooltip('destroy');
				$ended.parent().removeClass('success');
				$ended.parent().addClass('error');
				$ended.tooltip({
					animation: true,
					html: false,
					placement: 'top',
					selector: true,
					title: data.education_started_ended,
					trigger:'hover focus',
					delay:0,
					container: false
				});
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
		this.$self_employed	= this.$formAdd.find('[name=\"self_employed\"]');
		this.$title			= this.$formAdd.find('[name=\"title\"]');
		this.$company		= this.$formAdd.find('[name=\"company\"]');
		this.$location		= this.$formAdd.find('[name=\"location\"]');
		this.$city_id		= this.$formAdd.find('[name=\"city_id\"]');

		this.$specifiedTime = this.$formAdd.find('.specified-time');
		this.$presentTime   = this.$formAdd.find('.present');
		this.$presentCheckbox = this.$formAdd.find('#time_present');

		this.attachEvents();
	}

	Experience.prototype.attachEvents = function(){
		var that = this;

		this.$presentCheckbox.change(function() {
			$(this).val('1');
			if($(this).attr('checked') === 'checked') {
				that.$specifiedTime.fadeOut(100);
			}else {
				that.$specifiedTime.fadeIn(100);
			}
		});

		this.$self_employed.change(function () {
			$(this).val('1');
		})

		this.$btnAdd.click(function(){
			that.$formAdd.removeClass('hidden').addClass('add-form');
		});

		this.$btnCancel.click(function(){
			that.$formAdd.addClass('hidden').removeClass('add-form').find('input').val('');
			that.$formAdd.find('select').val('0');
			if (that.$presentCheckbox.attr('checked') === 'checked') {
				that.$presentCheckbox.trigger('click');
				that.$presentCheckbox.parent().removeClass('checked');
			}
			if (that.$self_employed.attr('checked') === 'checked') {
				that.$self_employed.trigger('click');
				that.$self_employed.parent().removeClass('checked');
			}

			that.$el.find('.experience-item').removeClass('hidden');
		});

		this.$btnEdit.click(function(){
			var $item = $(this).parents('.experience-item');

			that.$strMonth.val( $item.data('startedm') );
			that.$strYear.val( $item.data('startedy') );
			that.$endMonth.val( $item.data('endedm') );
			if ($item.data('current') == '1' && that.$presentCheckbox.attr('checked') !== 'checked') {
				that.$presentCheckbox.trigger('click');
				that.$presentCheckbox.parent().addClass('checked');
			}
			that.$endYear.val( $item.data('endedy') );
			that.$title.val( $item.data('title') );
			that.$company.val( $item.data('company') );
			that.$location.val( $item.data('location') );
			that.$city_id.val( $item.data('city-id') );
			if ($item.data('self-employed') == '1' && that.$self_employed.attr('checked') !== 'checked') {
				that.$self_employed.trigger('click');
				that.$self_employed.parent().addClass('checked');
			}

			$item.addClass('hidden');
			that.$formAdd.removeClass('hidden').data('edit', $item.data('edit'));
		});

		this.$btnRemove.click(function(){
			if ( $(this).hasClass('disabled') ) {
				return false;
			}
			var me = $(this);
	        bootbox.dialog({
				title: "Confirm",
				message: "Are you sure you want to delete this item ?",				
				buttons: 
				{
					cancel: {
						label: "Cancel",
						className: "btn",
						callback: function() {							
						}
					},
					oke: {
						label: "OK",
						className: "btn-primary",
						callback: function() {
							me.fadeIn(100);
							that.url = me.parents('.experience-item').data('remove');
							that.submit(me, 'remove' );
					  	}
					}
				}
			});
			return false;
		});

		this.$btnSave.click(function(){
			if ( $(this).hasClass( 'disabled' ) ) {
				return false;
			}

			var method = 'add';
			if ( that.$formAdd.hasClass('add-form') ){
				that.url = that.$formAdd.data('add');
			}else{
				method = 'edit';
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
				'city_id'			: that.$city_id.val(),
				'self_employed'		: (that.$self_employed.attr('checked') === 'checked') ? 1 : 0,
				'current'		: (that.$presentCheckbox.attr('checked') === 'checked') ? 1 : 0,
			};

			that.submit( $(this), method );

			return false;
		});

		this.$location.typeahead({
			source: function (query, process) {
				that.$city_id.val('');
				return $.ajax({
					type: 'Post',
					url: that.$location.parent().data('autocomplete') + query,
					success: function (json) {
						var parJSON = JSON.parse(json);
						var suggestions = [];
						locations = {};
						$.each(parJSON, function (i, suggestTerm) {
							locations[suggestTerm.name] = suggestTerm;
							suggestions.push(suggestTerm.name);
						});
						process(suggestions);

						// Note
						// Fix for screen 14", Fix it
						//that.$location.parent().find('ul.typeahead').css('left', '2317px');
					},
				});
			},
			items: 5,
			minLength: 1,
			updater: function (item) {
				that.$city_id.val(locations[item].id);
	    		return item;
			}
		});
	}

	Experience.prototype.submit = function($button, method){
		var that = this;
		
		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			data: that.data,
			dataType: 'json',
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) {
			if ( data.message == 'success' ) {
				if ( method == 'remove' ){
					$button.parents('.experience-item').remove();
				}else if ( method == 'edit' ){
					var $item = $.tmpl($('#background-experience-item'), data);

					$('#' + data.id).before($item).remove();

					that.$btnCancel.trigger('click');
					
					$('.experience-label').each(function(){
						new Experience( $(this) );
					});
				}else if ( method == 'add' ){
					that.$btnCancel.trigger('click');

					var $item = $.tmpl($('#background-experience-item'), data);

					that.$formAdd.parent().append($item);

					$('.experience-label').each(function(){
						new Experience( $(this) );
					});
				}
				$(document).trigger('PROFILE_CHANGED', [{type: 4}]);
			}else if ( data.education_started_ended != null ){
				var $started = that.$formAdd.find('[name=\"started\"]');
				$started.tooltip('destroy');
				$started.parent().removeClass('success');
				$started.parent().addClass('error');
				$started.tooltip({
					animation: true,
					html: false,
					placement: 'top',
					selector: true,
					title: data.education_started_ended,
					trigger:'hover focus',
					delay:0,
					container: false
				});

				var $ended = that.$formAdd.find('[name=\"ended\"]');
				$ended.tooltip('destroy');
				$ended.parent().removeClass('success');
				$ended.parent().addClass('error');
				$ended.tooltip({
					animation: true,
					html: false,
					placement: 'top',
					selector: true,
					title: data.education_started_ended,
					trigger:'hover focus',
					delay:0,
					container: false
				});
			}
		});
	}

	Experience.prototype.triggerProgress = function($el, promise){
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
		$('.experience-label').each(function(){
			new Experience( $(this) );
		});
	});
}(jQuery, document));

// Skill
(function($, document, undefined) {
	function Skill($el){
		this.$el 			= $el;
		this.$formAdd 		= $el.find('.background-skill-form-add');
		
		this.$btnAdd 		= $el.find('.profiles-btn-add');
		this.$btnSave 		= $el.find('.profiles-btn-save');
		this.$btnCancel 	= $el.find('.profiles-btn-cancel');
		this.$btnRemove 	= $el.find('.profiles-btn-remove');

		this.$skill 		= this.$formAdd.find('[name=\"skill\"]');

		this.attachEvents();
	}

	Skill.prototype.attachEvents = function(){
		var that = this;

		this.$btnAdd.click(function(){
			that.$formAdd.removeClass('hidden');
		});

		this.$btnCancel.click(function(){
			that.$formAdd.addClass('hidden').find('input').each(function(){
				$(this).val('');
			});
		});

		this.$btnRemove.click(function(){
			if ( $(this).hasClass('disabled') ) {
				return false;
			}
			var me = $(this);
	        bootbox.dialog({
				title: "Confirm",
				message: "Are you sure you want to delete this item ?",				
				buttons: 
				{
					cancel: {
						label: "Cancel",
						className: "btn",
						callback: function() {							
						}
					},
					oke: {
						label: "OK",
						className: "btn-primary",
						callback: function() {
							me.fadeIn(100);
							that.url = me.parents('.skill-item').data('remove');
							that.submit(me, 'remove' );
					  	}
					}
				}
			});
			return false;
		});

		this.$btnSave.click(function(){
			if ( $(this).hasClass('disabled') ) {
				return false;
			}

			that.data = {
				'skill': that.$skill.val()
			};

			that.url = that.$formAdd.data('add');

			that.submit( $(this), 'add' );

			return false;
		});
	}

	Skill.prototype.submit = function($button, method){
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
					$button.parents('.skill-item').remove();
				}else if ( method == 'add' ){
					that.$btnCancel.trigger('click');

					var $item = $.tmpl($('#background-skill-item'), data);

					that.$formAdd.parent().append($item);

					$('.skill-label').each(function(){
						new Skill( $(this) );
					});
				}
				$(document).trigger('PROFILE_CHANGED', [{type: 5}]);
			}
		});
	}

	Skill.prototype.triggerProgress = function($el, promise){
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
		$('.skill-label').each(function(){
			new Skill( $(this) );
		});
	});
}(jQuery, document));