(function($, document, undefined) {
	function ProfilesLayout($el) {
		this.$el = $el;
		this.$information = $el.find('#profiles-tabs-information');
		this.$background = $el.find('#profiles-tabs-background');
		this.$el.width(this.$information.outerWidth() + this.$background.outerWidth() + 25*2);
	}

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
		this.$el = $el;
		this.url = $el.data('url');
		this.$btnCancel = $el.find('.profiles-btn-cancel');
		this.$btnSave = $el.find('.profiles-btn-save');

		this.$btnAddPhone = $el.find('.phones-btn-add');
		this.$btnAddEmail = $el.find('.emails-btn-add');

		this.$btnRemovePhone = $el.find('.phones-btn-remove');
		this.$btnRemoveEmail = $el.find('.emails-btn-remove');

		this.$btnPrimaryEmail = $el.find('.primary-email-btn');

		this.$locationAutoComplete = $el.find('input[name=\"location\"]');
		this.$industryAutoComplete = $el.find('input[name=\"industry\"]');

		var $inputBirthday = this.$el.find('.inputBirthday .bfh-datepicker');
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
			updater: function (item) {
				that.$el.find('input[name=\"cityid\"]').val(locations[item].id);
				that.$locationAutoComplete.tooltip('destroy');
				that.$locationAutoComplete.parent().removeClass('error');
				that.$locationAutoComplete.parent().addClass('success');
	    		return item;
			},
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
				that.$el.find('input[name=\"industryid\"]').val(locations[item].id);
				that.$industryAutoComplete.tooltip('destroy');
				that.$industryAutoComplete.parent().removeClass('error');
				that.$industryAutoComplete.parent().addClass('success');
	    		return item;
			},
		});
	}

	InfoForm.prototype.submit = function($button){
		that = this;
		
		var promise = $.ajax({
			type: 'POST',
			url:  this.url,
			data: this.data,
			dataType: 'json'
		});

		this.triggerProgress($button, promise);

		promise.then(function(data) {
			if ( data.message != null & data.message == 'success' ) {
				var $profile_label = $.tmpl($('#profiles-label'), data);

				var $profile_form = $.tmpl($('#profiles-form'), data);

				that.$el.parent().html('').append($profile_label).append($profile_form);

				new InfoLabel($profile_label);
				new InfoForm($profile_form);
			}
		});
	};

	InfoForm.prototype.triggerProgress = function($el, promise)
	{
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
		new ProfilesLayout($('#y-main-content'));

		// Information
		$('.profile-label').each(function(){
			new InfoLabel( $(this) );
		});

		$('.profile-form').each(function(){
			new InfoForm( $(this) );
		});
	});
}(jQuery, document));