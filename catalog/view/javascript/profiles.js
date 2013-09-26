function Profiles($element) {
	this.self = $element;
	this.information = new ProfilesTabsInformation($element.find('#profiles-tabs-information'), $element.height()*9/10);
	this.background = new ProfilesTabsBackground($element.find('#profiles-tabs-background'), this.information.self.width(), $element.height()*9/10);
	this.afterCreate();
}

Profiles.prototype.afterCreate = function () {
	this.self.width(this.information.self.outerWidth() + this.background.self.outerWidth() + 25*2);
}

function ProfilesTabsInformation($element, contentHeight) {
	this.self = $element;

	this.contentHeight = contentHeight;
	this.header = $element.find('.profiles-tabs-header');
	this.mainBody = $element.find('.profiles-tabs-main-body');
	this.inputDescription = $element.find('.input-description');

	this.afterCreate();

	this.btnEdit = $element.find('.profiles-btn-edit');
	this.btnCancel = $element.find('.profiles-btn-cancel');
	this.btnSave = $element.find('.profiles-btn-save');

	this.inputGroups = new ProfilesTabsInputGroups($element.find('.input-group'));

	this.attachEvents();
}

ProfilesTabsInformation.prototype.afterCreate = function () {
	this.inputDescription.outerHeight(this.contentHeight*3/10);
	this.inputDescription.niceScroll();
	this.mainBody.height(this.contentHeight - this.header.height() - 30);
	this.mainBody.niceScroll();
}

ProfilesTabsInformation.prototype.attachEvents = function () {
	var self = this;

	this.btnEdit.click(function () {
		if ( self.btnEdit.hasClass( 'disabled' ) ) {
			return false;
		}
		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-add').addClass( 'disabled' );
		self.btnEdit.toggle();
		self.btnCancel.toggle();
		self.btnSave.toggle();
		self.inputGroups.changeMode();
	});

	this.btnCancel.click(function () {
		$('.profiles-btn-edit').removeClass( 'disabled' );
		$('.profiles-btn-add').removeClass( 'disabled' );
		self.btnEdit.toggle();
		self.btnCancel.toggle();
		self.btnSave.toggle();
		self.inputGroups.changeMode();
	})

	this.btnSave.click(function () {
		var data = {
			'fullname': self.inputGroups.self.find('input[name=\"fullname\"]').val(),
			'email': self.inputGroups.self.find('input[name=\"email\"]').val(),
			'phone': self.inputGroups.self.find('input[name=\"phone\"]').val(),
			'gender': self.inputGroups.self.find('select[name=\"gender\"]').val(),
			'birthday': self.inputGroups.self.find('input[name=\"birthday\"]').val(),
			'address': self.inputGroups.self.find('input[name=\"address\"]').val(),
			'location': self.inputGroups.self.find('input[name=\"location\"]').val(),
			'industry': self.inputGroups.self.find('input[name=\"industry\"]').val()
		};
		$.ajax({
			type: 'POST',
			url: self.self.data('url'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message == 'success' ) {
					self.inputGroups.save();
					self.inputGroups.changeMode();
					$('.profiles-btn-edit').removeClass( 'disabled' );
					$('.profiles-btn-add').removeClass( 'disabled' );
					self.btnEdit.toggle();
					self.btnCancel.toggle();
					self.btnSave.toggle();
				}else {
					alert('Error!');
				}
			}
		});
	})
}

function ProfilesTabsBackground($element, contentWidth, contentHeight) {
	this.self = $element;
	this.header = $element.find('.profiles-tabs-header');
	this.sumary = new ProfilesTabsBackgroundSumary($element.find('#profiles-tabs-background-sumary'), contentWidth, contentHeight - this.header.height() - 30);
	this.experience = new ProfilesTabsBackgroundExperience($element.find('#profiles-tabs-background-experience'), contentWidth, contentHeight - this.header.height() - 30);
	this.skill = new ProfilesTabsBackgroundSkill($element.find('#profiles-tabs-background-skill'), contentWidth, contentHeight - this.header.height() - 30);
	this.education = new ProfilesTabsBackgroundEducation($element.find('#profiles-tabs-background-education'), contentWidth, contentHeight - this.header.height() - 30);
	this.afterCreate();
}

ProfilesTabsBackground.prototype.afterCreate = function () {
	this.self.width((this.sumary.self.outerWidth() + 25)*4 - 25);
}

function ProfilesTabsBackgroundSumary($element, contentWidth, contentHeight) {
	this.self = $element;
	this.contentWidth = contentWidth;
	this.contentHeight = contentHeight;
	this.mainBody = $element.find('.profiles-tabs-main-body');
	this.afterCreate();

	this.btnEdit = $element.find('.profiles-btn-edit');
	this.btnCancel = $element.find('.profiles-btn-cancel');
	this.btnSave = $element.find('.profiles-btn-save');

	this.inputGroups = new ProfilesTabsInputGroups($element.find('.input-group'));
	this.attachEvents();
}

ProfilesTabsBackgroundSumary.prototype.afterCreate = function () {
	this.self.outerWidth(this.contentWidth);
	this.mainBody.outerHeight(this.contentHeight);
	this.mainBody.niceScroll();
}

ProfilesTabsBackgroundSumary.prototype.attachEvents = function () {
	var self = this;

	this.btnEdit.click(function () {
		if ( self.btnEdit.hasClass( 'disabled' ) ) {
			return false;
		}
		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-add').addClass( 'disabled' );
		self.btnEdit.toggle();
		self.btnCancel.toggle();
		self.btnSave.toggle();
		self.inputGroups.changeMode();
	});

	this.btnCancel.click(function () {
		$('.profiles-btn-edit').removeClass( 'disabled' );
		$('.profiles-btn-add').removeClass( 'disabled' );
		self.btnEdit.toggle();
		self.btnCancel.toggle();
		self.btnSave.toggle();
		self.inputGroups.changeMode();
	})

	this.btnSave.click(function () {
		var data = {
			'sumary': self.inputGroups.self.find('textarea[name=\"sumary\"]').val()
		};
		$.ajax({
			type: 'POST',
			url: self.self.data('url'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message == 'success' ) {
					self.inputGroups.save();
					self.inputGroups.changeMode();
					$('.profiles-btn-edit').removeClass( 'disabled' );
					$('.profiles-btn-add').removeClass( 'disabled' );
					self.btnEdit.toggle();
					self.btnCancel.toggle();
					self.btnSave.toggle();
				}else {
					alert('Error!');
				}
			},
			error: function(xhr, error){
		    	alert(xhr.responseText);
		 	}
		});
	})
}

function ProfilesTabsBackgroundEducation($element, contentWidth, contentHeight) {
	this.self = $element;
	this.mainBody = $element.find('.profiles-tabs-main-body');
	this.contentWidth = contentWidth;
	this.contentHeight = contentHeight;
	this.afterCreate();

	this.btnAdd = $element.find('.profiles-btn-add');
	this.formAdd = $element.find('.profiles-form-add');
	this.items = new Array();

	var self = this;
	var i = 0;
	$element.find('.profiles-tabs-item1').each(function () {
		self.items[i] = new ProfilesTabsItem1($(this));
		i++;
	});

	this.attachEvents();
}

ProfilesTabsBackgroundEducation.prototype.afterCreate = function () {
	this.self.outerWidth(this.contentWidth);
	this.mainBody.outerHeight(this.contentHeight);
	this.mainBody.niceScroll();
}

ProfilesTabsBackgroundEducation.prototype.attachEvents = function () {
	var self = this;

	this.btnAdd.click(function () {
		if ( self.btnAdd.hasClass( 'disabled' ) ) {
			return false;
		}
		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-add').addClass( 'disabled' );
		self.btnAdd.toggle();
		self.formAdd.toggle();
	});

	this.formAdd.find('.profiles-btn-cancel').click(function () {
		$('.profiles-btn-edit').removeClass( 'disabled' );
		$('.profiles-btn-add').removeClass( 'disabled' );
		self.btnAdd.toggle();
		self.formAdd.toggle();
	});

	this.formAdd.find('.profiles-btn-save').click(function () {
		var data = {
			'started': self.formAdd.find('[name=\"started\"]').val(),
			'ended': self.formAdd.find('[name=\"ended\"]').val(),
			'degree': self.formAdd.find('input[name=\"degree\"]').val(),
			'school': self.formAdd.find('input[name=\"school\"]').val(),
			'fieldofstudy': self.formAdd.find('input[name=\"fieldofstudy\"]').val()
		};
		var html = '<div class="profiles-tabs-item1">';
		html 	+= '<div>';
		html 	+= '<div class="profiles-tabs-item1-label">From <span class="input-group"><span class="profiles-tabs-value viewers">' + parseInt(data.started) + '</span><input class="editors" type="text" value="' + parseInt(data.started) + '" /></span> to <span class="input-group"><span class="profiles-tabs-value viewers">' + parseInt(data.ended) + '</span><input class="editors" type="text" value="' + parseInt(data.ended) + '" /></span></div>';
		html	+= '</div>'
		html	+= '<div class="profiles-tabs-item1-content">';
		html	+= '<a class="profiles-btn-remove viewers profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>';
		html	+= '<a class="btn profiles-btn viewers profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>';
		html	+= '<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>';
		html	+= '<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>';
		html	+= '<div class="profiles-tabs-value">';
		html	+= '<div class="input-group">';
		html	+= '<div class="profiles-tabs-value-item viewers">' + data.degree + '</div>';
		html	+= '<span class="row-fluid editors"><span class="span4">Degree: </span><input type="text" value="' + data.degree + '" /></span>';
		html	+= '</div>';
		html	+= '<div class="input-group">';
		html	+= '<div class="profiles-tabs-value-item viewers">' + data.school + '</div>';
		html	+= '<span class="row-fluid editors"><span class="span4">School: </span><input type="text" value="' + data.school + '" /></span>';
		html	+= '</div>';
		html	+= '<div class="input-group">';
		html	+= '<div class="profiles-tabs-value-item viewers">' + data.fieldofstudy + '</div>';
		html	+= '<span class="row-fluid editors"><span class="span4">Field Of Study: </span><input type="text" value="' + data.fieldofstudy + '" /></span>';
		html	+= '</div>';
		html	+= '</div>';
		html	+= '</div>';
		html	+= '</div>';
		$.ajax({
			type: 'POST',
			url: self.formAdd.data('url'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message == 'success' ) {
					$('.profiles-btn-edit').removeClass( 'disabled' );
					$('.profiles-btn-add').removeClass( 'disabled' );
					self.btnAdd.toggle();
					self.formAdd.after(html);
					self.formAdd.toggle();
				}else {
					alert('Error!');
				}
			},
			error: function(xhr, error){
		    	alert(xhr.responseText);
		 	}
		});
	});
}

function ProfilesTabsBackgroundExperience($element, contentWidth, contentHeight) {
	this.self = $element;
	this.mainBody = $element.find('.profiles-tabs-main-body');
	this.contentWidth = contentWidth;
	this.contentHeight = contentHeight;
	this.afterCreate();

	this.btnAdd = $element.find('.profiles-btn-add');
	this.formAdd = $element.find('.profiles-form-add');
	this.items = new Array();

	var self = this;
	var i = 0;
	$element.find('.profiles-tabs-item1').each(function () {
		self.items[i] = new ProfilesTabsItem1($(this));
		i++;
	});

	this.attachEvents();
}

ProfilesTabsBackgroundExperience.prototype.afterCreate = function () {
	this.self.outerWidth(this.contentWidth);
	this.mainBody.outerHeight(this.contentHeight);
	this.mainBody.niceScroll();
}

ProfilesTabsBackgroundExperience.prototype.attachEvents = function () {
	var self = this;

	this.btnAdd.click(function () {
		if ( self.btnAdd.hasClass( 'disabled' ) ) {
			return false;
		}
		$('.profiles-btn-edit').addClass( 'disabled' );
		$('.profiles-btn-add').addClass( 'disabled' );
		self.btnAdd.toggle();
		self.formAdd.toggle();
	});

	this.formAdd.find('.profiles-btn-cancel').click(function () {
		$('.profiles-btn-edit').removeClass( 'disabled' );
		$('.profiles-btn-add').removeClass( 'disabled' );
		self.btnAdd.toggle();
		self.formAdd.toggle();
	});

	this.formAdd.find('.profiles-btn-save').click(function () {
		alert('save');
		/*var data = {
			'degree': self.self.formAdd.find('input[name=\"degree\"]').val(),
			'school': self.self.formAdd.find('input[name=\"school\"]').val(),
			'fieldofstudy': self.self.formAdd.find('input[name=\"fieldofstudy\"]').val(),
		};
		$.ajax({
			type: 'POST',
			url: self.self.formAdd.data('url'),
			data: data,
			dataType: 'json',
			success: function (json) {
				if ( json.message == 'success' ) {
					$('.profiles-btn-edit').removeClass( 'disabled' );
					$('.profiles-btn-add').removeClass( 'disabled' );
					self.btnAdd.toggle();
					self.formAdd.toggle();
				}else {
					alert('Error!');
				}
			}
		});*/
	});
}

function ProfilesTabsBackgroundSkill($element, contentWidth, contentHeight) {
	this.self = $element;
	this.contentWidth = contentWidth;
	this.contentHeight = contentHeight;
	this.mainBody = $element.find('.profiles-tabs-main-body');
	this.afterCreate();
	this.attachEvents();
}

ProfilesTabsBackgroundSkill.prototype.afterCreate = function () {
	this.self.outerWidth(this.contentWidth);
	this.mainBody.outerHeight(this.contentHeight);
	this.mainBody.niceScroll();
}

ProfilesTabsBackgroundSkill.prototype.attachEvents = function () {

}

function ProfilesTabsInputGroups($element) {
	this.self = $element;
}

ProfilesTabsInputGroups.prototype.changeMode = function () {
	if (this.self.find('.viewers').is(':hidden')) {
		this.self.find('.editors').toggle();
		this.self.find('.viewers').toggle();
	}else {
		this.self.each(function () {
			var self = $(this);
			if (self.find('.editors').is('input')) {
				self.find('input').val(self.find('.viewers').html());
			}else if (self.find('.editors').is('select')) {
				self.find("select option").filter(function() {
    				return $(this).text() == self.find('.viewers').html(); 
				}).prop('selected', true);
			}else {
				self.find('textarea').text(self.find('.viewers').html());
			}
		});
		this.self.find('.viewers').toggle();
		this.self.find('.editors').toggle();
	}
}

ProfilesTabsInputGroups.prototype.save = function () {
	this.self.each(function () {
		var self = $(this);
		if (self.find('.editors').is('input')) {
			self.find('.viewers').html(self.find('input').val());
		}else if (self.find('.editors').is('select')) {
			self.find('.viewers').html(self.find('select').text());
		}else {
			self.find('.viewers').html(self.find('textarea').val());
		}
	});
}

ProfilesTabsInputGroups.prototype.getData = function () {
	return {
		'fullname': this.self.find('input[name=\"fullname\"]').val(),
		'email': this.self.find('input[name=\"email\"]').val(),
		'phone': this.self.find('input[name=\"phone\"]').val(),
		'gender': this.self.find('select[name=\"gender\"]').val(),
		'birthday': this.self.find('input[name=\"birthday\"]').val(),
		'address': this.self.find('input[name=\"address\"]').val(),
		'location': this.self.find('input[name=\"location\"]').val(),
		'industry': this.self.find('input[name=\"industry\"]').val()
	}
}

function ProfilesTabsItem1($element) {
	this.self = $element;

	this.btnEdit = $element.find('.profiles-btn-edit');
	this.btnCancel = $element.find('.profiles-btn-cancel');
	this.btnSave = $element.find('.profiles-btn-save');
	this.btnRemove = $element.find('.profiles-btn-remove');

	this.inputGroups = $element.find('.input-group');

	this.attachEvents();
}

ProfilesTabsItem1.prototype.attachEvents = function () {
	var self = this;

	this.btnEdit.click(function () {
		if (self.btnEdit.hasClass('disabled')) {
			return false;
		}
		$('.profiles-btn-edit').addClass('disabled');
		$('.profiles-btn-add').addClass('disabled');
		$('.profiles-btn-remove').addClass('disabled');
		self.btnEdit.toggle();
		self.btnRemove.toggle();
		self.btnCancel.toggle();
		self.btnSave.toggle();
		self.changeMode();
	});

	this.btnCancel.click(function () {
		$('.profiles-btn-edit').removeClass('disabled');
		$('.profiles-btn-add').removeClass('disabled');
		$('.profiles-btn-remove').removeClass('disabled');
		self.btnEdit.toggle();
		self.btnRemove.toggle();
		self.btnCancel.toggle();
		self.btnSave.toggle();
		self.changeMode();
	});

	this.btnSave.click(function () {
		alert('save');
		/*var data = {
	
		};
		
		$.ajax({
			type: 'POST',
			url: ,
			data: data,
			dataType: 'json',
			success: function (json) {
	
			}
		});
		*/
	});

	this.btnRemove.click(function () {
		alert('delete');
		/*var data = {
	
		};
		
		$.ajax({
			type: 'POST',
			url: ,
			data: data,
			dataType: 'json',
			success: function (json) {
	
			}
		});
		*/
	});
}

ProfilesTabsItem1.prototype.changeMode = function () {
	if (this.inputGroups.find('.viewers').is(':hidden')) {
		this.inputGroups.find('.editors').toggle();
		this.inputGroups.find('.viewers').toggle();
	}else {
		this.inputGroups.each(function () {
			var self = $(this);
			if (self.find('.editors').is('input')) {
				self.find('input').val(self.find('.viewers').html());
			}else if (self.find('.editors').is('select')) {
				self.find("select option").filter(function() {
    				return $(this).text() == self.find('.viewers').html(); 
				}).prop('selected', true);
			}else {
				self.find('textarea').val(self.find('.viewers').html());
			}
		});
		this.inputGroups.find('.viewers').toggle();
		this.inputGroups.find('.editors').toggle();
	}
}

ProfilesTabsItem1.prototype.save = function () {
	this.self.each(function () {
		var self = $(this);
		if (self.find('.editors').is('input')) {
			self.find('.viewers').html(self.find('input').val());
		}else if (self.find('.editors').is('select')) {
			self.find('.viewers').html(self.find('select').text());
		}else {
			self.find('.viewers').html(self.find('textarea').text());
		}
	});
}