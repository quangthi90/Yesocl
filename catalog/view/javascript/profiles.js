function Profiles($element) {
	this.self = $element;
	this.information = new ProfilesTabsInformation($element.find('#profiles-tabs-information'), $element.height()*9/10);
	this.background = new ProfilesTabsBackground($element.find('#profiles-tabs-background'), this.information.self.width(), $element.height()*9/10);
	this.afterCreate();
}

Profiles.prototype.afterCreate = function () {
	this.self.width(this.information.self.outerWidth() + this.background.self.outerWidth() + 15*2);
}

function ProfilesTabsInformation($element, contentHeight) {
	this.self = $element;
	this.contentHeight = contentHeight;
	this.header = $element.find('.profiles-tabs-header');
	this.mainBody = $element.find('.profiles-tabs-main-body');
	this.inputDescription = $element.find('.input-description');
	this.afterCreate();
}

ProfilesTabsInformation.prototype.afterCreate = function () {
	this.inputDescription.outerHeight(this.contentHeight*3/10);
	this.inputDescription.niceScroll();
	this.mainBody.height(this.contentHeight - this.header.height() - 45);
	this.mainBody.niceScroll();
}

function ProfilesTabsBackground($element, contentWidth, contentHeight) {
	this.self = $element;
	this.header = $element.find('.profiles-tabs-header');
	this.sumary = new ProfilesTabsBackgroundSumary($element.find('#profiles-tabs-background-sumary'), contentWidth, contentHeight - this.header.height() - 45);
	this.experience = new ProfilesTabsBackgroundExperience($element.find('#profiles-tabs-background-experience'), contentWidth, contentHeight - this.header.height() - 45);
	this.skill = new ProfilesTabsBackgroundSkill($element.find('#profiles-tabs-background-skill'), contentWidth, contentHeight - this.header.height() - 45);
	this.education = new ProfilesTabsBackgroundExperience($element.find('#profiles-tabs-background-education'), contentWidth, contentHeight - this.header.height() - 45);
	this.afterCreate();
}

ProfilesTabsBackground.prototype.afterCreate = function () {
	this.self.width((this.sumary.self.outerWidth() + 15)*4 - 15);
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