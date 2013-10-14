function Profiles($element) {
	this.self = $element;
	this.information = new TabsInformation($element.find('#profiles-tabs-information'), $element.height()*9/10);
	this.background = new TabsBackground($element.find('#profiles-tabs-background'), this.information.self.width(), $element.height()*9/10);

	this.afterCreate();
}

Profiles.prototype.afterCreate = function () {
	this.self.width(this.information.self.outerWidth() + this.background.self.outerWidth() + 25*2);
}

function TabsInformation($element, contentHeight) {
	this.self = $element;
	this.contentHeight = contentHeight;
	this.header = $element.find('.profiles-tabs-header');
	this.mainBody = $element.find('.profiles-tabs-main-body');	
	this.btnEdit = $element.find('.profiles-btn-edit');
	this.attachEvents();
	this.afterCreate();
}

TabsInformation.prototype.afterCreate = function () {
	this.mainBody.height(this.contentHeight - this.header.height() - 30);
	this.mainBody.niceScroll();
}

TabsInformation.prototype.attachEvents = function () {
	var self = this;

	this.btnEdit.click(function () {
		if ( self.btnEdit.hasClass( 'disabled' ) ) {
			return false;
		}

		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-add').addClass( 'disabled' );
		$('.profiles-btn-remove').addClass( 'disabled' );
		
		var item = self.self.find( '.basic-profiles-item' );

		var data = {
			'url': item.data('url'),
			'username': item.data('username'),
			'firstname': item.data('firstname'),
			'lastname': item.data('lastname'),
			'fullname': item.data('fullname'),
			'emails': item.data('emails'),
			'emails_js': JSON.stringify(item.data('emails')),
			'phones': item.data('phones'),
			'phones_js': JSON.stringify(item.data('phones')),
			'sex': item.data('sex'),
			'sext': item.data('sext'),
			'birthday': item.data('birthday'),
			'birthdayt': item.data('birthdayt'),
			'address': item.data('address'),
			'location': item.data('location'),
			'cityid': item.data('cityid'),
			'industry': item.data('industry'),
			'industryid': item.data('industryid')
		}
		
		var $form = $.tmpl( $('#profiles-form'), data );
		var form = new ProfilesForm( $form );

		var $control = $.tmpl( $('#profiles-form-control'));
		new ProfilesFormControl( $control, form);

		item.toggle();
		item.after( $form );
		item.remove();
		self.btnEdit.toggle();
		self.self.find('.profiles-tabs-main-header').append($control);
		self.mainBody.getNiceScroll().resize();
	});
}

function ProfilesForm( $element ) {
	this.self = $element;
	this.btnAddPhone = $element.find('.phones-btn-add');
	this.btnAddEmail = $element.find('.emails-btn-add');
	this.inputBirthday = $element.find('.inputBirthday .bfh-datepicker');
	this.attachEvents();
}

ProfilesForm.prototype.attachEvents = function () {
	var self = this;

	this.self.find('select[name=\"sex\"]').val( this.self.data('sex') ).prop('selected',true);

	this.inputBirthday.bfhdatepicker(this.inputBirthday.data());

	self.self.find('.phones-form').each( function () {
		new PhonesForm( $(this) );
	});

	self.self.find('.emails-form').each( function () {
		new EmailsForm( $(this) );
	});

	this.self.find('input[name=\"location\"]').typeahead({
		source: function (query, process) {
			self.self.find('input[name=\"cityid\"]').val('');
			return $.ajax({
				type: 'GET',
				url: self.self.find('input[name=\"location\"]').parent().data('autocomplete'),
				data: { 'filter_location': query },
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
			self.self.find('input[name=\"cityid\"]').val(locations[item].id);
			self.self.find('[name=\"location\"]').tooltip('destroy');
			self.self.find('[name=\"location\"]').parent().removeClass('error');
			self.self.find('[name=\"location\"]').parent().addClass('success');
    		return item;
		},
	});

	this.self.find('input[name=\"industry\"]').typeahead({
		source: function (query, process) {
			self.self.find('input[name=\"industryid\"]').val('');
			return $.ajax({
				type: 'GET',
				url: self.self.find('input[name=\"industry\"]').parent().data('autocomplete'),
				data: { 'filter_industry': query },
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
			self.self.find('input[name=\"industryid\"]').val(locations[item].id);
			self.self.find('[name=\"industry\"]').tooltip('destroy');
			self.self.find('[name=\"industry\"]').parent().removeClass('error');
			self.self.find('[name=\"industry\"]').parent().addClass('success');
    		return item;
		},
	});

	this.btnAddPhone.click( function () {
		var data = {
			'index': self.btnAddPhone.attr('data-index')
		}

		var $form = $.tmpl( $('#profiles-phone-form'), data);
		new PhonesForm( $form );

		self.btnAddPhone.attr('data-index', parseInt(data.index) + 1);
		$(this).parent().before( $form );
	});

	this.btnAddEmail.click( function () {
		var data = {
			'index': self.btnAddEmail.attr('data-index')
		}

		var $form = $.tmpl( $('#profiles-email-form'), data);
		new EmailsForm( $form );

		self.btnAddEmail.attr('data-index', parseInt(data.index) + 1);
		$(this).parent().before( $form );
	});

	this.self.find('input[name=\"username\"]').blur( function () {
		var data = {
			'username': $(this).val()
		}

		$.ajax({
			type: 'POST',
			url: $(this).parent().data('url'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message != 'success' ) {
					self.self.find('[name=\"username\"]').tooltip('destroy');
					self.self.find('[name=\"username\"]').parent().removeClass('success');
					self.self.find('[name=\"username\"]').parent().addClass('error');
					self.self.find('[name=\"username\"]').tooltip({
						animation: true,
						html: false,
						placement: 'top',
						selector: true,
						title: json.message,
						trigger:'hover focus',
						delay:0,
						container: false
					});
				}else {
					self.self.find('[name=\"username\"]').tooltip('destroy');
					self.self.find('[name=\"username\"]').parent().removeClass('error');
					self.self.find('[name=\"username\"]').parent().addClass('success');
				}
			},
			error: function (xhr, error) {
				alert(xhr.responseText);
			},
		});
	});
}

function ProfilesFormControl( $element, form ) {
	this.self = $element;
	this.form = form;
	this.btnSave = $element.find('.profiles-btn-save');
	this.btnCancel = $element.find('.profiles-btn-cancel');

	this.attachEvents();
}

ProfilesFormControl.prototype.attachEvents = function () {
	var self = this;

	this.btnSave.click( function () {
		if ( self.btnSave.hasClass( 'disabled' ) ) {
			return false;
		}

		$('.profiles-btn-save').addClass( 'disabled' );
		$('.profiles-btn-cancel').addClass( 'disabled' );
		var $spin = $('<i class="icon-refresh icon-spin"></i>');
		var $old_icon = $(this).find('i');
		$old_icon.remove();
		$(this).prepend($spin);

		var phones_arr = [];
		var i = 0;
		self.form.self.find('.phones-form').each( function () {
			phones_arr[i] = {};
			phones_arr[i].phone = $(this).find('input').val();
			phones_arr[i].type = $(this).find('select').val();
			i++;
		});

		var emails_arr = [];
		var j = 0;
		self.form.self.find('.emails-form').each( function () {
			emails_arr[j] = {};
			emails_arr[j].email = $(this).find('[name*=\"[email]\"]').val();
			emails_arr[j].primary = $(this).find('[name*=\"[primary]\"]').val();
			j++;
		});

		var data = {
			'username': self.form.self.find('[name=\"username\"]').val(),
			'firstname': self.form.self.find('[name=\"firstname\"]').val(),
			'lastname': self.form.self.find('[name=\"lastname\"]').val(),
			'emails': emails_arr,
			'phones': phones_arr,
			'sex': self.form.self.find('[name=\"sex\"]').val(),
			'birthday': self.form.self.find('[name=\"birthday\"]').val(),
			'address': self.form.self.find('[name=\"address\"]').val(),
			'location': self.form.self.find('[name=\"location\"]').val(),
			'cityid': self.form.self.find('[name=\"cityid\"]').val(),
			'industry': self.form.self.find('[name=\"industry\"]').val(),
			'industryid': self.form.self.find('[name=\"industryid\"]').val()
		};

		$.ajax({
			type: 'POST',
			url: self.form.self.data('url'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message != null & json.message == 'success' ) {
					var $item = $.tmpl($('#profiles-item'), json);
					new ProfilesItem($item);

					self.form.self.toggle();
					self.form.self.after($item);
					self.form.self.remove();

					self.self.toggle();
					self.self.parent().find('.profiles-btn-edit').toggle();
					self.self.remove();

					$('.profiles-btn-edit').removeClass( 'disabled' );
					$('.profiles-btn-add').removeClass( 'disabled' );
					$('.profiles-btn-remove').removeClass( 'disabled' );
				}else {
					if ( json.username != null ) {
						self.form.self.find('[name=\"username\"]').tooltip('destroy');
						self.form.self.find('[name=\"username\"]').parent().removeClass('success');
						self.form.self.find('[name=\"username\"]').parent().addClass('error');
						self.form.self.find('[name=\"username\"]').tooltip({
							animation: true,
							html: false,
							placement: 'top',
							selector: true,
							title: json.username,
							trigger:'hover focus',
							delay:0,
							container: false
						});
					}else {
						self.form.self.find('[name=\"username\"]').tooltip('destroy');
						self.form.self.find('[name=\"username\"]').parent().removeClass('error');
						self.form.self.find('[name=\"username\"]').parent().addClass('success');
					}

					if ( json.firstname != null ) {
						self.form.self.find('[name=\"firstname\"]').tooltip('destroy');
						self.form.self.find('[name=\"firstname\"]').parent().removeClass('success');
						self.form.self.find('[name=\"firstname\"]').parent().addClass('error');
						self.form.self.find('[name=\"firstname\"]').tooltip({
							animation: true,
							html: false,
							placement: 'top',
							selector: true,
							title: json.firstname,
							trigger:'hover focus',
							delay:0,
							container: false
						});
					}else {
						self.form.self.find('[name=\"firstname\"]').tooltip('destroy');
						self.form.self.find('[name=\"firstname\"]').parent().removeClass('error');
						self.form.self.find('[name=\"firstname\"]').parent().addClass('success');
					}

					if ( json.lastname != null ) {
						self.form.self.find('[name=\"lastname\"]').tooltip('destroy');
						self.form.self.find('[name=\"lastname\"]').parent().removeClass('success');
						self.form.self.find('[name=\"lastname\"]').parent().addClass('error');
						self.form.self.find('[name=\"lastname\"]').tooltip({
							animation: true,
							html: false,
							placement: 'top',
							selector: true,
							title: json.lastname,
							trigger:'hover focus',
							delay:0,
							container: false
						});
					}else {
						self.form.self.find('[name=\"lastname\"]').tooltip('destroy');
						self.form.self.find('[name=\"lastname\"]').parent().removeClass('error');
						self.form.self.find('[name=\"lastname\"]').parent().addClass('success');
					}

					if ( json.emails != null ) {
						self.form.self.find('.emails-form').each( function () {
							$(this).find('[name*=\"[email]\"]').tooltip('destroy');
							$(this).removeClass('success');
							$(this).addClass('error');
							$(this).find('[name*=\"[email]\"]').tooltip({
								animation: true,
								html: false,
								placement: 'top',
								selector: true,
								title: json.emails,
								trigger:'hover focus',
								delay:0,
								container: false
							});
						});
					}

					if ( json.email != null ) {
						self.form.self.find('.emails-form').each( function (i, item) {
							if ( json.email[i] != null ) {
								$(this).find('[name*=\"[email]\"]').tooltip('destroy');
								$(this).removeClass('success');
								$(this).addClass('error');
								$(this).find('[name*=\"[email]\"]').tooltip({
									animation: true,
									html: false,
									placement: 'top',
									selector: true,
									title: json.email[i],
									trigger:'hover focus',
									delay:0,
									container: false
								});
							}else {
								$(this).find('[name*=\"[email]\"]').tooltip('destroy');
								$(this).removeClass('error');
								$(this).addClass('success');
							}
						});
					}else if( json.emails == null ) {
						self.form.self.find('.emails-form').each( function (i, item) {
							$(this).find('[name*=\"[email]\"]').tooltip('destroy');
							$(this).removeClass('error');
							$(this).addClass('success');
						});
					}

					if ( json.phone != null ) {
						self.form.self.find('.phones-form').each( function (i, item) {
							if ( json.phone[i] != null ) {
								$(this).find('[name*=\"[phone]\"]').tooltip('destroy');
								$(this).removeClass('success');
								$(this).addClass('error');
								$(this).find('[name*=\"[phone]\"]').tooltip({
									animation: true,
									html: false,
									placement: 'top',
									selector: true,
									title: json.phone[i],
									trigger:'hover focus',
									delay:0,
									container: false
								});
							}else {
								$(this).find('[name*=\"[phone]\"]').tooltip('destroy');
								$(this).removeClass('error');
								$(this).addClass('success');
							}
						});
					}else {
						self.form.self.find('.phones-form').each( function (i, item) {
							$(this).find('[name*=\"[phone]\"]').tooltip('destroy');
							$(this).removeClass('error');
							$(this).addClass('success');
						});
					}

					if ( json.sex != null ) {
						self.form.self.find('[name=\"sex\"]').tooltip('destroy');
						self.form.self.find('[name=\"sex\"]').parent().removeClass('success');
						self.form.self.find('[name=\"sex\"]').parent().addClass('error');
						self.form.self.find('[name=\"sex\"]').tooltip({
							animation: true,
							html: false,
							placement: 'top',
							selector: true,
							title: json.sex,
							trigger:'hover focus',
							delay:0,
							container: false
						});
					}else {
						self.form.self.find('[name=\"sex\"]').tooltip('destroy');
						self.form.self.find('[name=\"sex\"]').parent().removeClass('error');
						self.form.self.find('[name=\"sex\"]').parent().addClass('success');
					}

					if ( json.birthday != null ) {
						self.form.self.find('[name=\"birthday\"]').tooltip('destroy');
						self.form.self.find('[name=\"birthday\"]').parent().removeClass('success');
						self.form.self.find('[name=\"birthday\"]').parent().addClass('error');
						self.form.self.find('[name=\"birthday\"]').tooltip({
							animation: true,
							html: false,
							placement: 'top',
							selector: true,
							title: json.birthday,
							trigger:'hover focus',
							delay:0,
							container: false
						});
					}else {
						self.form.self.find('[name=\"birthday\"]').tooltip('destroy');
						self.form.self.find('[name=\"birthday\"]').parent().removeClass('error');
						self.form.self.find('[name=\"birthday\"]').parent().addClass('success');
					}

					if ( json.address != null ) {
						self.form.self.find('[name=\"address\"]').tooltip('destroy');
						self.form.self.find('[name=\"address\"]').parent().removeClass('success');
						self.form.self.find('[name=\"address\"]').parent().addClass('error');
						self.form.self.find('[name=\"address\"]').tooltip({
							animation: true,
							html: false,
							placement: 'top',
							selector: true,
							title: json.address,
							trigger:'hover focus',
							delay:0,
							container: false
						});
					}else {
						self.form.self.find('[name=\"address\"]').tooltip('destroy');
						self.form.self.find('[name=\"address\"]').parent().removeClass('error');
						self.form.self.find('[name=\"address\"]').parent().addClass('success');
					}

					if ( json.location != null ) {
						self.form.self.find('[name=\"location\"]').tooltip('destroy');
						self.form.self.find('[name=\"location\"]').parent().removeClass('success');
						self.form.self.find('[name=\"location\"]').parent().addClass('error');
						self.form.self.find('[name=\"location\"]').tooltip({
							animation: true,
							html: false,
							placement: 'top',
							selector: true,
							title: json.location,
							trigger:'hover focus',
							delay:0,
							container: false
						});
					}else {
						self.form.self.find('[name=\"location\"]').tooltip('destroy');
						self.form.self.find('[name=\"location\"]').parent().removeClass('error');
						self.form.self.find('[name=\"location\"]').parent().addClass('success');
					}

					if ( json.industry != null ) {
						self.form.self.find('[name=\"industry\"]').tooltip('destroy');
						self.form.self.find('[name=\"industry\"]').parent().removeClass('success');
						self.form.self.find('[name=\"industry\"]').parent().addClass('error');
						self.form.self.find('[name=\"industry\"]').tooltip({
							animation: true,
							html: false,
							placement: 'top',
							selector: true,
							title: json.industry,
							trigger:'hover focus',
							delay:0,
							container: false
						});
					}else {
						self.form.self.find('[name=\"industry\"]').tooltip('destroy');
						self.form.self.find('[name=\"industry\"]').parent().removeClass('error');
						self.form.self.find('[name=\"industry\"]').parent().addClass('success');
					}

					$('.profiles-btn-save').removeClass( 'disabled' );
					$('.profiles-btn-cancel').removeClass( 'disabled' );
				}
			},
			error: function(xhr, error){
		    	alert(xhr.responseText);
		 	}
		});

		$('.profiles-btn-save').removeClass( 'disabled' );
		$('.profiles-btn-cancel').removeClass( 'disabled' );
		$spin.remove();
		$(this).prepend($old_icon);
	} );

	this.btnCancel.click( function () {
		var data = {
			'url': self.form.self.data('url'),
			'username': self.form.self.data('username'),
			'firstname': self.form.self.data('firstname'),
			'lastname': self.form.self.data('lastname'),
			'fullname': self.form.self.data('fullname'),
			'emails': self.form.self.data('emails'),
			'emails_js': JSON.stringify(self.form.self.data('emails')),
			'phones': self.form.self.data('phones'),
			'phones_js': JSON.stringify(self.form.self.data('phones')),
			'sex': self.form.self.data('sex'),
			'sext': self.form.self.data('sext'),
			'birthday': self.form.self.data('birthday'),
			'birthdayt': self.form.self.data('birthdayt'),
			'address': self.form.self.data('address'),
			'location': self.form.self.data('location'),
			'cityid': self.form.self.data('cityid'),
			'industry': self.form.self.data('industry'),
			'industryid': self.form.self.data('industryid')
		}

		var $item = $.tmpl($('#profiles-item'), data);
		new ProfilesItem($item);

		self.form.self.toggle();
		self.form.self.after($item);
		self.form.self.remove();
		self.self.toggle();
		self.self.parent().find('.profiles-btn-edit').toggle();
		self.self.remove();

		$('.profiles-btn-edit').removeClass( 'disabled' );
		$('.profiles-btn-add').removeClass( 'disabled' );
		$('.profiles-btn-remove').removeClass( 'disabled' );
	} );
}

function PhonesForm( $element ) {
	this.self = $element;
	this.btnRemove = $element.find('.phones-btn-remove');

	this.attachEvents();
}

PhonesForm.prototype.attachEvents = function () {
	var self = this;

	this.self.find('select').val( self.self.data('type') ).prop('selected',true);

	this.btnRemove.click( function () {
		self.self.remove();
	});

	this.self.find('input').blur( function () {
		var data = {
			'phone': $(this).val()
		};

		$.ajax({
			type: 'POST',
			url: self.self.data('url'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message != 'success' ) {
					self.self.find('[name*=\"[phone]\"]').tooltip('destroy');
					self.self.removeClass('success');
					self.self.addClass('error');
					self.self.find('[name*=\"[phone]\"]').tooltip({
						animation: true,
						html: false,
						placement: 'top',
						selector: true,
						title: json.message,
						trigger:'hover focus',
						delay:0,
						container: false
					});
				}else {
					self.self.find('[name*=\"[phone]\"]').tooltip('destroy');
					self.self.removeClass('error');
					self.self.addClass('success');
				}
			},
			error: function(xhr, error){
		    	alert(xhr.responseText);
		 	}
		});
	});
}

function EmailsForm( $element ) {
	this.self = $element;
	this.btnRemove = $element.find('.emails-btn-remove');
	this.btnPrimary = $element.find('span.label');
	this.inputPrimary = $element.find('[name*=\"[primary]\"]');

	this.attachEvents();
}

EmailsForm.prototype.attachEvents = function () {
	var self = this;

	this.btnRemove.click( function () {
		if ( $('.basic-profiles-form .emails-form').length == 1 ) {
			return false;
		}
		self.self.remove();
		self.validate();
	});

	this.btnPrimary.click( function () {
		if ( self.self.hasClass('email-primary') ) {
			return false;
		}

		$('.email-primary [name*=\"[primary]\"]').val(0);
		$('.email-primary .label-success').removeClass('label-success');
		$('.email-primary').attr('data-primary', 0);
		$('.email-primary').removeClass('email-primary');

		self.self.attr('data-primary', 1);
		self.inputPrimary.val(1);
		self.self.addClass('email-primary');
		self.btnPrimary.addClass('label-success');

		self.validate();
	});

	this.self.find('[name*=\"[email]\"]').blur( function () {
		self.validate();
	});
}

EmailsForm.prototype.validate = function () {
		var emails_arr = [];
		var j = 0;
		$('.basic-profiles-form .emails-form').each( function () {
			emails_arr[j] = {};
			emails_arr[j].email = $(this).find('[name*=\"[email]\"]').val();
			emails_arr[j].primary = $(this).find('[name*=\"[primary]\"]').val();
			j++;
		});

		var data = {
			'emails': emails_arr
		};

		$.ajax({
			type: 'POST',
			url: this.self.data('url'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message != 'success' ) {
					$('.basic-profiles-form .emails-form').each( function (i, item) {
						$(this).find('[name*=\"[email]\"]').tooltip('destroy');
						$(this).removeClass('error');
						$(this).addClass('success');
					});
				}else {
					if ( json.emails != null ) {
						$('.basic-profiles-form .emails-form').each( function () {
							$(this).find('[name*=\"[email]\"]').tooltip('destroy');
							$(this).removeClass('success');
							$(this).addClass('error');
							$(this).find('[name*=\"[email]\"]').tooltip({
								animation: true,
								html: false,
								placement: 'top',
								selector: true,
								title: json.emails,
								trigger:'hover focus',
								delay:0,
								container: false
							});
						});
					}

					if ( json.email != null ) {
						$('.basic-profiles-form .emails-form').each( function (i, item) {
							if ( json.email[i] != null ) {
								$(this).find('[name*=\"[email]\"]').tooltip('destroy');
								$(this).removeClass('success');
								$(this).addClass('error');
								$(this).find('[name*=\"[email]\"]').tooltip({
									animation: true,
									html: false,
									placement: 'top',
									selector: true,
									title: json.email[i],
									trigger:'hover focus',
									delay:0,
									container: false
								});
							}else {
								$(this).find('[name*=\"[email]\"]').tooltip('destroy');
								$(this).removeClass('error');
								$(this).addClass('success');
							}
						});
					}else if( json.emails == null ) {
						$('.basic-profiles-form .emails-form').each( function (i, item) {
							$(this).find('[name*=\"[email]\"]').tooltip('destroy');
							$(this).removeClass('error');
							$(this).addClass('success');
						});
					}
				}
			},
			error: function(xhr, error){
		    	alert(xhr.responseText);
		 	}
		});
}

function ProfilesItem( $element ) {
	this.self = this;
}

function TabsBackground($element, contentWidth, contentHeight) {
	this.self = $element;
	this.header = $element.find('.profiles-tabs-header');
	this.sumary = new TabsBackgroundSumary($element.find('#profiles-tabs-background-sumary'), contentWidth, contentHeight - this.header.height() - 30);
	this.experience = new TabsBackgroundExperience($element.find('#profiles-tabs-background-experience'), contentWidth, contentHeight - this.header.height() - 30);
	this.skill = new TabsBackgroundSkill($element.find('#profiles-tabs-background-skill'), contentWidth, contentHeight - this.header.height() - 30);
	this.education = new TabsBackgroundEducation($element.find('#profiles-tabs-background-education'), contentWidth, contentHeight - this.header.height() - 30);

	this.afterCreate();
}

TabsBackground.prototype.afterCreate = function () {
	this.self.width((this.sumary.self.outerWidth() + 25)*4 - 25);
}

function TabsBackgroundSumary($element, contentWidth, contentHeight) {
	this.self = $element;
	this.contentWidth = contentWidth;
	this.contentHeight = contentHeight;
	this.mainBody = $element.find('.profiles-tabs-main-body');
	this.afterCreate();

	this.btnEdit = $element.find('.profiles-btn-edit');
	this.btnCancel = $element.find('.profiles-btn-cancel');
	this.btnSave = $element.find('.profiles-btn-save');
	this.inputSumary = $element.find('.background-input-sumary');

	this.attachEvents();
}

TabsBackgroundSumary.prototype.afterCreate = function () {
	this.self.outerWidth(this.contentWidth);
	this.mainBody.outerHeight(this.contentHeight);
	this.mainBody.niceScroll();
}

TabsBackgroundSumary.prototype.attachEvents = function () {
	var self = this;

	this.btnEdit.click(function () {
		if ( self.btnEdit.hasClass( 'disabled' ) ) {
			return false;
		}
		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-add').addClass( 'disabled' );
		$('.profiles-btn-remove').addClass( 'disabled' );

		self.btnEdit.toggle();
		self.btnCancel.toggle();
		self.btnSave.toggle();
		self.inputSumary.toggle();

		var data = { 
			'sumary': self.inputSumary.data('sumary') 
		};

		self.mainBody.append($.tmpl($('#background-sumary-form'), data));
		$('textarea[name=\"sumary\"]').niceScroll();
	});

	this.btnCancel.click(function () {
		self.btnCancel.toggle();
		self.btnSave.toggle();
		self.btnEdit.toggle();
		$('textarea[name=\"sumary\"]').remove();
		self.inputSumary.toggle();
		$('.profiles-btn-edit').removeClass( 'disabled' );
		$('.profiles-btn-add').removeClass( 'disabled' );
		$('.profiles-btn-remove').removeClass( 'disabled' );
	})

	this.btnSave.click(function () {
		if ( self.btnSave.hasClass('disabled') ) {
			return false;
		}

		$('.profiles-btn-save').addClass( 'disabled' );
		$('.profiles-btn-cancel').addClass( 'disabled' );
		var $spin = $('<i class="icon-refresh icon-spin"></i>');
		var $old_icon = $(this).find('i');
		$old_icon.remove();
		$(this).prepend($spin);

		var data = {
			'sumary': self.mainBody.find('[name=\"sumary\"]').val()
		};

		$.ajax({
			type: 'POST',
			url: self.self.data('url'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message != 'success' ) {
					alert('Error!');
				}else {
					self.btnCancel.toggle();
					self.btnSave.toggle();
					self.btnEdit.toggle();
					$('textarea[name=\"sumary\"]').remove();
					self.inputSumary.html(data.sumary);
					self.inputSumary.toggle();
					$('.profiles-btn-edit').removeClass( 'disabled' );
					$('.profiles-btn-add').removeClass( 'disabled' );
					$('.profiles-btn-remove').removeClass( 'disabled' );
					self.mainBody.getNiceScroll().resize();
				}
			},
			error: function(xhr, error){
		    	alert(xhr.responseText);
		 	}
		});

		$('.profiles-btn-save').removeClass( 'disabled' );
		$('.profiles-btn-cancel').removeClass( 'disabled' );
		$spin.remove();
		$(this).prepend($old_icon);
	})
}

function TabsBackgroundEducation($element, contentWidth, contentHeight) {
	this.self = $element;
	this.mainBody = $element.find('.profiles-tabs-main-body');
	this.contentWidth = contentWidth;
	this.contentHeight = contentHeight;
	this.afterCreate();

	this.btnAdd = $element.find('.profiles-btn-add');
	this.items = $element.find('.profiles-tabs-item1');

	this.attachEvents();
}

TabsBackgroundEducation.prototype.afterCreate = function () {
	this.self.outerWidth(this.contentWidth);
	this.mainBody.outerHeight(this.contentHeight);
	this.mainBody.niceScroll();
}

TabsBackgroundEducation.prototype.attachEvents = function () {
	var self = this;

	this.items.each( function () {
		new EducationItem($(this));
	})

	this.btnAdd.click(function () {
		if ( self.btnAdd.hasClass( 'disabled' ) ) {
			return false;
		}

		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-add').addClass( 'disabled' );
		$('.profiles-btn-remove').addClass( 'disabled' );

		var data = {
			'url': self.self.data('url'),
			'id': '',
			'started': (new Date()).getFullYear(),
			'ended': (new Date()).getFullYear(),
			'degree': '',
			'school': '',
			'fieldofstudy': '',
		}

		var $form = $.tmpl($('#background-education-form'), data);
		new FormAddEducation($form);

		self.mainBody.prepend($form);
		self.mainBody.getNiceScroll().resize();
	});
}

function FormAddEducation($element) {
	this.self = $element;
	this.btnSave = $element.find('.profiles-btn-save');
	this.btnCancel = $element.find('.profiles-btn-cancel');

	this.attachEvents();
}

FormAddEducation.prototype.attachEvents = function () {
	var self = this;

	this.self.find('select[name=\"started\"]').val( this.self.data('started') ).prop('selected',true);
	this.self.find('select[name=\"ended\"]').val( this.self.data('ended') ).prop('selected',true);

	this.btnSave.click( function () {
		if ( self.btnSave.hasClass( 'disabled' ) ) {
			return false;
		}

		$('.profiles-btn-save').addClass( 'disabled' );
		$('.profiles-btn-cancel').addClass( 'disabled' );
		var $spin = $('<i class="icon-refresh icon-spin"></i>');
		var $old_icon = $(this).find('i');
		$old_icon.remove();
		$(this).prepend($spin);

		var data = {
			'id': self.self.data('id'),
			'started': self.self.find('[name=\"started\"]').val(),
			'ended': self.self.find('[name=\"ended\"]').val(),
			'degree': self.self.find('input[name=\"degree\"]').val(),
			'school': self.self.find('input[name=\"school\"]').val(),
			'fieldofstudy': self.self.find('input[name=\"fieldofstudy\"]').val()
		};

		$.ajax({
			type: 'POST',
			url: self.self.data('url'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message != 'success' ) {
					alert('Error!');
				}else {
					var $item = $.tmpl($('#background-education-item'), json);
					new EducationItem($item);
					self.self.toggle();
					if ( self.self.data('id') == '' ) {
						self.self.parent().append($item);
					}else {
						self.self.after($item);
					}
					self.self.remove();
					$('.profiles-btn-edit').removeClass( 'disabled' );
					$('.profiles-btn-add').removeClass( 'disabled' );
					$('.profiles-btn-remove').removeClass( 'disabled' );
				}
			},
			error: function(xhr, error){
		    	alert(xhr.responseText);
		 	}
		});

		$('.profiles-btn-save').removeClass( 'disabled' );
		$('.profiles-btn-cancel').removeClass( 'disabled' );
		$spin.remove();
		$(this).prepend($old_icon);
	} );

	this.btnCancel.click( function () {
		var data = {
			'id': self.self.data('id'),
			'url': self.self.data('url'),
			'remove': self.self.data('remove'),
			'started': self.self.data('started'),
			'ended': self.self.data('ended'),
			'degree': self.self.data('degree'),
			'school': self.self.data('school'),
			'fieldofstudy': self.self.data('fieldofstudy')
		}

		if ( self.self.data('id') != '' ) {
			var $item = $.tmpl($('#background-education-item'), data);
			new EducationItem($item);
			self.self.toggle();
			self.self.after($item);
		}

		self.self.remove();

		$('.profiles-btn-edit').removeClass( 'disabled' );
		$('.profiles-btn-add').removeClass( 'disabled' );
		$('.profiles-btn-remove').removeClass( 'disabled' );
	} );
}

function EducationItem($element) {
	this.self = $element;
	this.btnSave = $element.find('.profiles-btn-save');
	this.btnCancel = $element.find('.profiles-btn-cancel');
	this.btnEdit = $element.find('.profiles-btn-edit');
	this.btnRemove = $element.find('.profiles-btn-remove');

	this.attachEvents();
}

EducationItem.prototype.attachEvents = function () {
	var self = this;

	this.btnEdit.click( function () {
		if ( self.btnEdit.hasClass( 'disabled' ) ) {
			return false;
		}

		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-add').addClass( 'disabled' );
		$('.profiles-btn-remove').addClass( 'disabled' );

		var data = {
			'id': self.self.data('id'),
			'url': self.self.data('url'),
			'remove': self.self.data('remove'),
			'started': self.self.data('started'),
			'ended': self.self.data('ended'),
			'degree': self.self.data('degree'),
			'school': self.self.data('school'),
			'fieldofstudy': self.self.data('fieldofstudy')
		}

		var $form = $.tmpl($('#background-education-form'), data);
		new FormAddEducation($form);

		self.self.toggle();
		self.self.after($form);
		self.self.remove();
	});

	this.btnRemove.click( function () {
		if ( self.btnRemove.hasClass( 'disabled' ) ) {
			return false;
		}

		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-add').addClass( 'disabled' );
		$('.profiles-btn-remove').addClass( 'disabled' );

		var data = {
			'id': self.self.data('id')
		};

		$.ajax({
			type: 'POST',
			url: self.self.data('remove'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message != 'success' ) {
					alert('Error!');
				}else {
					self.self.remove();
					$('.profiles-btn-edit').removeClass( 'disabled' );
					$('.profiles-btn-add').removeClass( 'disabled' );
					$('.profiles-btn-remove').removeClass( 'disabled' );
				}
			},
			error: function(xhr, error){
		    	alert(xhr.responseText);
		 	}
		});
	});
}

function TabsBackgroundExperience($element, contentWidth, contentHeight) {
	this.self = $element;
	this.mainBody = $element.find('.profiles-tabs-main-body');
	this.contentWidth = contentWidth;
	this.contentHeight = contentHeight;
	this.afterCreate();

	this.btnAdd = $element.find('.profiles-btn-add');
	this.items = $element.find('.profiles-tabs-item1');

	this.attachEvents();
}

TabsBackgroundExperience.prototype.afterCreate = function () {
	this.self.outerWidth(this.contentWidth);
	this.mainBody.outerHeight(this.contentHeight);
	this.mainBody.niceScroll();
}

TabsBackgroundExperience.prototype.attachEvents = function () {
	var self = this;

	this.items.each( function () {
		new ExperienceItem($(this));
	})

	this.btnAdd.click(function () {
		if ( self.btnAdd.hasClass( 'disabled' ) ) {
			return false;
		}
		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-add').addClass( 'disabled' );
		$('.profiles-btn-remove').addClass( 'disabled' );

		var data = {
			'url': self.self.data('url'),
			'id': '',
			'started_month': 1,
			'ended_month': 1,
			'started_year': (new Date()).getFullYear(),
			'ended_year': (new Date()).getFullYear(),
			'started_text': 'January ' + (new Date()).getFullYear(),
			'ended_text': 'January ' + (new Date()).getFullYear(),
			'title': '',
			'company': '',
			'location': '',
		}

		var $form = $.tmpl($('#background-experience-form'), data);
		new FormAddExperience($form);

		self.mainBody.prepend($form);
		self.mainBody.getNiceScroll().resize();
	});
}

function FormAddExperience($element) {
	this.self = $element;
	this.btnSave = $element.find('.profiles-btn-save');
	this.btnCancel = $element.find('.profiles-btn-cancel');

	this.attachEvents();
}

FormAddExperience.prototype.attachEvents = function () {
	var self = this;

	this.self.find('select[name=\"started_month\"]').val( this.self.data('startedm') ).prop('selected',true);
	this.self.find('select[name=\"ended_month\"]').val( this.self.data('endedm') ).prop('selected',true);
	this.self.find('select[name=\"started_year\"]').val( this.self.data('startedy') ).prop('selected',true);
	this.self.find('select[name=\"ended_year\"]').val( this.self.data('endedy') ).prop('selected',true);

	this.btnSave.click( function () {
		if ( self.btnSave.hasClass( 'disabled' ) ) {
			return false;
		}

		$('.profiles-btn-save').addClass( 'disabled' );
		$('.profiles-btn-cancel').addClass( 'disabled' );
		var $spin = $('<i class="icon-refresh icon-spin"></i>');
		var $old_icon = $(this).find('i');
		$old_icon.remove();
		$(this).prepend($spin);

		var data = {
			'id': self.self.data('id'),
			'started_month': self.self.find('[name=\"started_month\"]').val(),
			'ended_month': self.self.find('[name=\"ended_month\"]').val(),
			'started_year': self.self.find('[name=\"started_year\"]').val(),
			'ended_year': self.self.find('[name=\"ended_year\"]').val(),
			'title': self.self.find('input[name=\"title\"]').val(),
			'company': self.self.find('input[name=\"company\"]').val(),
			'location': self.self.find('input[name=\"location\"]').val()
		};

		$.ajax({
			type: 'POST',
			url: self.self.data('url'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message != 'success' ) {
					alert('Error!');
				}else {
					var $item = $.tmpl($('#background-experience-item'), json);
					new ExperienceItem($item);
					self.self.toggle();
					if ( self.self.data('id') == '' ) {
						self.self.parent().append($item);
					}else {
						self.self.after($item);
					}
					self.self.remove();
					$('.profiles-btn-edit').removeClass( 'disabled' );
					$('.profiles-btn-add').removeClass( 'disabled' );
					$('.profiles-btn-remove').removeClass( 'disabled' );
				}
			},
			error: function(xhr, error){
		    	alert(xhr.responseText);
		 	}
		});

		$('.profiles-btn-save').removeClass( 'disabled' );
		$('.profiles-btn-cancel').removeClass( 'disabled' );
		$spin.remove();
		$(this).prepend($old_icon);
	} );

	this.btnCancel.click( function () {
		var data = {
			'id': self.self.data('id'),
			'url': self.self.data('url'),
			'remove': self.self.data('remove'),
			'started_text': self.self.data('startedt'),
			'ended_text': self.self.data('endedt'),
			'started_month': self.self.data('startedm'),
			'ended_month': self.self.data('endedm'),
			'started_year': self.self.data('startedy'),
			'ended_year': self.self.data('endedy'),
			'title': self.self.data('title'),
			'company': self.self.data('company'),
			'location': self.self.data('location')
		}

		if ( self.self.data('id') != '' ) {
			var $item = $.tmpl($('#background-experience-item'), data);
			new ExperienceItem($item);
			self.self.toggle();
			self.self.after($item);
		}

		self.self.remove();

		$('.profiles-btn-edit').removeClass( 'disabled' );
		$('.profiles-btn-add').removeClass( 'disabled' );
		$('.profiles-btn-remove').removeClass( 'disabled' );
	} );
}

function ExperienceItem($element) {
	this.self = $element;
	this.btnSave = $element.find('.profiles-btn-save');
	this.btnCancel = $element.find('.profiles-btn-cancel');
	this.btnEdit = $element.find('.profiles-btn-edit');
	this.btnRemove = $element.find('.profiles-btn-remove');

	this.attachEvents();
}

ExperienceItem.prototype.attachEvents = function () {
	var self = this;

	this.btnEdit.click( function () {
		if ( self.btnEdit.hasClass( 'disabled' ) ) {
			return false;
		}

		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-add').addClass( 'disabled' );
		$('.profiles-btn-remove').addClass( 'disabled' );

		var data = {
			'id': self.self.data('id'),
			'url': self.self.data('url'),
			'remove': self.self.data('remove'),
			'started_text': self.self.data('startedt'),
			'ended_text': self.self.data('endedt'),
			'started_month': self.self.data('startedm'),
			'ended_month': self.self.data('endedm'),
			'started_year': self.self.data('startedy'),
			'ended_year': self.self.data('endedy'),
			'title': self.self.data('title'),
			'company': self.self.data('company'),
			'location': self.self.data('location')
		}

		var $form = $.tmpl($('#background-experience-form'), data);
		new FormAddExperience($form);

		self.self.toggle();
		self.self.after($form);
		self.self.remove();
	});

	this.btnRemove.click( function () {
		if ( self.btnRemove.hasClass( 'disabled' ) ) {
			return false;
		}

		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-add').addClass( 'disabled' );
		$('.profiles-btn-remove').addClass( 'disabled' );

		var data = {
			'id': self.self.data('id')
		};

		$.ajax({
			type: 'POST',
			url: self.self.data('remove'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message != 'success' ) {
					alert('Error!');
				}else {
					self.self.remove();
					$('.profiles-btn-edit').removeClass( 'disabled' );
					$('.profiles-btn-add').removeClass( 'disabled' );
					$('.profiles-btn-remove').removeClass( 'disabled' );
				}
			},
			error: function(xhr, error){
		    	alert(xhr.responseText);
		 	}
		});
	});
}

function TabsBackgroundSkill($element, contentWidth, contentHeight) {
	this.self = $element;
	this.contentWidth = contentWidth;
	this.contentHeight = contentHeight;
	this.mainBody = $element.find('.profiles-tabs-main-body');
	this.afterCreate();

	this.btnAdd = $element.find('.profiles-btn-add');
	this.btnSave = $element.find('.profiles-btn-save');
	this.btnCancel = $element.find('.profiles-btn-cancel');
	this.inputSkill = $element.find('.profiles-input');
	this.attachEvents();
}

TabsBackgroundSkill.prototype.afterCreate = function () {
	this.self.outerWidth(this.contentWidth);
	this.mainBody.outerHeight(this.contentHeight);
	this.mainBody.niceScroll();
}

TabsBackgroundSkill.prototype.attachEvents = function () {
	var self = this;

	this.btnAdd.click( function () {
		if ( self.btnAdd.hasClass( 'disabled' ) ) {
			return false;
		}

		$('.profiles-btn-add').addClass( 'disabled' );
		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-remove').addClass( 'disabled' );

		self.btnAdd.toggle();
		self.btnSave.toggle();
		self.btnCancel.toggle();
		self.inputSkill.toggle();
	});

	this.btnCancel.click( function () {
		self.btnAdd.toggle();
		self.btnSave.toggle();
		self.inputSkill.toggle();
		self.btnCancel.toggle();

		self.inputSkill.val('');

		$('.profiles-btn-add').removeClass( 'disabled' );
		$('.profiles-btn-edit').removeClass( 'disabled' );
		$('.profiles-btn-remove').removeClass( 'disabled' );
	});

	this.btnSave.click( function () {
		if ( self.btnSave.hasClass( 'disabled' ) ) {
			return false;
		}

		$('.profiles-btn-save').addClass( 'disabled' );
		$('.profiles-btn-cancel').addClass( 'disabled' );
		var $spin = $('<i class="icon-refresh icon-spin"></i>');
		var $old_icon = $(this).find('i');
		$old_icon.remove();
		$(this).prepend($spin);

		var data = {
			'skill': self.inputSkill.val()
		}

		$.ajax({
			type: 'POST',
			url: self.self.data('url'),
			data: data,
			dataType: 'json',
			success: function ( json ) {
				if ( json.message != 'success' ) {
					alert('Error!');
				}else {
					var $item = $.tmpl( $('#background-skill-item'), json );
					new SkillItem( $item );

					self.mainBody.append( $item );
					self.mainBody.getNiceScroll().resize();

					self.btnAdd.toggle();
					self.btnSave.toggle();
					self.inputSkill.toggle();
					self.btnCancel.toggle();

					self.inputSkill.val('');

					$('.profiles-btn-add').removeClass( 'disabled' );
					$('.profiles-btn-edit').removeClass( 'disabled' );
					$('.profiles-btn-remove').removeClass( 'disabled' );
				}
			},
			error: function ( xhr, error ) {
				alert( xhr.responseText );
			}
		});

		$('.profiles-btn-save').removeClass( 'disabled' );
		$('.profiles-btn-cancel').removeClass( 'disabled' );
		$spin.remove();
		$(this).prepend($old_icon);
	});

	this.self.find( '.profiles-tabs-item2' ).each( function () {
		new SkillItem( $(this) );
	});
}

function SkillItem( $element ) {
	this.self = $element;
	this.btnRemove = $element.find('.profiles-btn-remove');

	this.attachEvents();
}

SkillItem.prototype.attachEvents = function () {
	var self = this;

	this.btnRemove.click( function () {
		if ( self.btnRemove.hasClass( 'disabled' ) ) {
			return false;
		}

		$('.profiles-btn-add').addClass( 'disabled' );
		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-remove').addClass( 'disabled' );

		var data = {
			'id': self.self.data('id'),
		}

		$.ajax({
			type: 'POST',
			url: self.self.data('remove'),
			data: data,
			dataType: 'json',
			success: function ( json ) {
				if ( json.message != 'success' ) {
					alert('Error!');
				}else {
					self.self.remove();

					$('.profiles-btn-add').removeClass( 'disabled' );
					$('.profiles-btn-edit').removeClass( 'disabled' );
					$('.profiles-btn-remove').removeClass( 'disabled' );
				}
			},
			error: function ( xhr, error ) {
				alert( xhr.responseText );
			}
		});
	});
}