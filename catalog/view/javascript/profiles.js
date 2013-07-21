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

	this.deployed();

	this.btnEdit = $element.find('.profiles-btn-edit');
	this.btnCancel = $element.find('.profiles-btn-cancel');
	this.btnSave = $element.find('.profiles-btn-save');

	this.inputGroups = new ProfilesTabsInputGroups($element.find('.input-group'));

	this.attachEvents();
}

ProfilesTabsInformation.prototype.deployed = function () {
	this.inputDescription.outerHeight(this.contentHeight*3/10);
	this.inputDescription.niceScroll();
	this.mainBody.height(this.contentHeight - this.header.height() - 30);
	this.mainBody.niceScroll();
}

ProfilesTabsInformation.prototype.attachEvents = function () {
	var self = this;

	this.btnEdit.click(function () {
		self.btnEdit.toggle();
		self.btnCancel.toggle();
		self.btnSave.toggle();
		self.inputGroups.changeMode();
	});

	this.btnCancel.click(function () {
		self.btnEdit.toggle();
		self.btnCancel.toggle();
		self.btnSave.toggle();
		self.inputGroups.changeMode();
	})

	this.btnSave.click(function () {
		self.btnEdit.toggle();
		self.btnCancel.toggle();
		self.btnSave.toggle();
		self.inputGroups.save();
		self.inputGroups.changeMode();
	})
}

function ProfilesTabsBackground($element, contentWidth, contentHeight) {
	this.self = $element;
	this.header = $element.find('.profiles-tabs-header');
	this.sumary = new ProfilesTabsBackgroundSumary($element.find('#profiles-tabs-background-sumary'), contentWidth, contentHeight - this.header.height() - 30);
	this.experience = new ProfilesTabsBackgroundExperience($element.find('#profiles-tabs-background-experience'), contentWidth, contentHeight - this.header.height() - 30);
	this.skill = new ProfilesTabsBackgroundSkill($element.find('#profiles-tabs-background-skill'), contentWidth, contentHeight - this.header.height() - 30);
	this.education = new ProfilesTabsBackgroundExperience($element.find('#profiles-tabs-background-education'), contentWidth, contentHeight - this.header.height() - 30);
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
}

ProfilesTabsBackgroundSumary.prototype.afterCreate = function () {
	this.self.outerWidth(this.contentWidth);
	this.mainBody.outerHeight(this.contentHeight);
	this.mainBody.niceScroll();
}

function ProfilesTabsBackgroundExperience($element, contentWidth, contentHeight) {
	this.self = $element;
	this.mainBody = $element.find('.profiles-tabs-main-body');
	this.contentWidth = contentWidth;
	this.contentHeight = contentHeight;
	this.afterCreate();
}

ProfilesTabsBackgroundExperience.prototype.afterCreate = function () {
	this.self.outerWidth(this.contentWidth);
	this.mainBody.outerHeight(this.contentHeight);
	this.mainBody.niceScroll();
}

function ProfilesTabsBackgroundSkill($element, contentWidth, contentHeight) {
	this.self = $element;
	this.contentWidth = contentWidth;
	this.contentHeight = contentHeight;
	this.mainBody = $element.find('.profiles-tabs-main-body');
	this.afterCreate();
}

ProfilesTabsBackgroundSkill.prototype.afterCreate = function () {
	this.self.outerWidth(this.contentWidth);
	this.mainBody.outerHeight(this.contentHeight);
	this.mainBody.niceScroll();
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
				self.find('.input').val(self.find('viewers').html());
			}else if (self.find('.editors').is('select')) {
				self.find("select option").filter(function() {
    				return $(this).text() == self.find('viewers').html(); 
				}).prop('selected', true);
			}else {
				self.find('textarea').text(self.find('viewers').html());
			}
		});
		this.self.find('.viewers').toggle();
		this.self.find('.editors').toggle();
	}
}

ProfilesTabsInputGroups.prototype.save = function () {

}