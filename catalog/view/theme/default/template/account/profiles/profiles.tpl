{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/account/profiles/tabs/information.tpl' %}
{% use '@template/default/template/account/profiles/tabs/background.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('libs/bootstrap-formhelpers.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset_css('profiles.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
	<div id="y-main-content">
		{{ block('profiles_tabs_information') }}
		{{ block('profiles_tabs_background') }}
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript" src="{{ asset_js('libs/bootstrap-formhelpers-datepicker.en_US.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/bootstrap-formhelpers-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/bootstrap-formhelpers-phone.format.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/bootstrap-formhelpers-phone.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('profiles.js') }}"></script>
<script id="background-summary-form" type="text/x-jquery-tmpl">
    <textarea name="summary">${ summary }</textarea>
</script>
<script id="background-education-form" type="text/x-jquery-tmpl">
	<div class="background-education-form-add" data-url="${ url }" data-id="${ id }" data-started="${ started }" data-ended="${ ended }" data-degree="${ degree }" data-school="${ school }" data-fieldofstudy="${ fieldofstudy }">
		<div class="profiles-tabs-item1-label">From <select name="started">{% for i in current_year..before_year %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select> to <select name="ended">{% for i in current_year..before_year %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select></div>
		<div class="profiles-tabs-item1-content">
			<a class="profiles-btn-cancel btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
			<a class="profiles-btn-save btn profiles-btn pull-right"><i class="icon-save"></i></a>
			<div class="profiles-tabs-value">
				<div class="row-fluid"><div class="span4">Degree: </div><input type="text" name="degree" value="${ degree }" /></div>
				<div class="row-fluid"><div class="span4">Shool: </div><input type="text"  name="school" value="${ school }" /></div>
				<div class="row-fluid"><div class="span4">Field Of Study: </div><input type="text" name="fieldofstudy" value="${ fieldofstudy }" /></div>
			</div>
		</div>
	</div>
</script>
<script id="background-education-item" type="text/x-jquery-tmpl">
	<div class="profiles-tabs-item1" data-id="${ id }" data-url="${ url }" data-started="${ started }" data-ended="${ ended }" data-degree="${ degree }" data-school="${ school }" data-fieldofstudy="${ fieldofstudy }" data-remove="${ remove }">
		<div>
			<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">${ started }</span> to <span class="profiles-tabs-value">${ ended }</span></div>
		</div>
		<div class="profiles-tabs-item1-content">
			<a class="profiles-tabs-value btn profiles-btn pull-right btn-remove profiles-btn-remove"><i class="icon-trash"></i></a>
			<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
			<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
			<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
			<div class="profiles-tabs-value">
				<div class="profiles-tabs-value-item">${ degree }</div>
				<div class="profiles-tabs-value-item">${ school }</div>
				<div class="profiles-tabs-value-item viewers">${ fieldofstudy }</div>
			</div>
		</div>
	</div>
</script>
<script id="background-experience-form" type="text/x-jquery-tmpl">
	<div class="background-education-form-add" data-url="${ url }" data-id="${ id }" data-startedt="${ started_text }" data-endedt="${ ended_text }" data-startedy="${ started_year }" data-endedy="${ ended_year }" data-startedm="${ started_month }" data-endedm="${ ended_month }" data-title="${ title }" data-company="${ company }" data-location="${ location }">
		<div class="profiles-tabs-item1-label">From <select class="span1" name="started_month">{% for i in 1..12 %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select> <select class="span1" name="started_year">{% for i in current_year..before_year %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select> to <select class="span1" name="ended_month">{% for i in 1..12 %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select> <select class="span1" name="ended_year">{% for i in current_year..before_year %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select></div>
		<div class="profiles-tabs-item1-content">
			<a class="profiles-btn-cancel btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
			<a class="profiles-btn-save btn profiles-btn pull-right"><i class="icon-save"></i></a>
			<div class="profiles-tabs-value">
				<div class="row-fluid"><div class="span4">Title: </div><input type="text" name="title" value="${ title }" /></div>
				<div class="row-fluid"><div class="span4">Company: </div><input type="text"  name="company" value="${ company }" /></div>
				<div class="row-fluid"><div class="span4">Location: </div><input type="text" name="location" value="${ location }" /></div>
			</div>
		</div>
	</div>
</script>
<script id="background-experience-item" type="text/x-jquery-tmpl">
	<div class="profiles-tabs-item1" data-id="${ id }" data-url="${ url }" data-startedt="${ started_text }" data-endedt="${ ended_text }" data-startedy="${ started_year }" data-endedy="${ ended_year }" data-startedm="${ started_month }" data-endedm="${ ended_month }" data-title="${ title }" data-company="${ company }" data-location="${ location }" data-remove="${ remove }">
		<div>
			<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">${ started_text }</span> to <span class="profiles-tabs-value">${ ended_text }</span></div>
		</div>
		<div class="profiles-tabs-item1-content">
			<a class="profiles-tabs-value btn profiles-btn pull-right btn-remove profiles-btn-remove"><i class="icon-trash"></i></a>
			<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
			<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
			<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
			<div class="profiles-tabs-value">
				<div class="profiles-tabs-value-item">${ title }</div>
				<div class="profiles-tabs-value-item">${ company }</div>
				<div class="profiles-tabs-value-item viewers">${ location }</div>
			</div>
		</div>
	</div>
</script>
<script id="background-skill-item" type="text/x-jquery-tmpl">
    <div class="profiles-tabs-item2 btn" data-id="${ id }" data-remove="${ remove }">${ skill }<a class="btn-remove profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
</script>
<script type="text/javascript">
	function addScroll(warper, column, width, height) {
		$(warper).outerWidth(width);
		$(warper + ' ' + column).outerHeight(height);
		$(warper + ' ' + column).niceScroll();
	}

	$(document).ready( function () {
		$('#y-content').niceScroll();
	} );

	window.onresize=function() {
		window.setTimeout('location.reload()', 1);
	};
</script>
{% endblock %}