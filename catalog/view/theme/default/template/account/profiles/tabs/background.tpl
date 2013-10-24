{% use '@template/default/template/account/profiles/tabs/summary.tpl' %}
{% use '@template/default/template/account/profiles/tabs/education.tpl' %}
{% use '@template/default/template/account/profiles/tabs/experience.tpl' %}
{% use '@template/default/template/account/profiles/tabs/skill.tpl' %}

{% block profiles_tabs_background %}
<div id="profiles-tabs-background" class="profiles-tabs">
	<div class="profiles-tabs-header">
		<div class="span7">
			<div class="row-fluid">
				<div class="profiles-tabs-title span5"><i class="icon-list"></i> Background</div>
			</div>
		</div>
		<div class="pull-right profiles-btn-next"><a href="#"><i class="icon-chevron-right"></i></a></div>
		<div class="clear"></div>
	</div>
	{{ block('profiles_tabs_summary') }}
	{{ block('profiles_tabs_education') }}
	{{ block('profiles_tabs_experience') }}
	<div id="profiles-tabs-background-skill" class="profiles-tabs-main pull-left" data-url="{{ link_add_skill }}">
		<div class="profiles-tabs-main-header">
			<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Skill & Expertise</a>
			<a class="btn profiles-btn pull-right btn-add profiles-btn-add"><i class="icon-plus"></i></a>
			<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
			<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
			<div class="pull-right"><input class="profiles-input editors" type="text" name="skill" placeholder="Text here..." /></div>
			<div class="clear"></div>
		</div>

		<div class="profiles-tabs-main-body">
			{% for skill in user.skills %}
			<div class="profiles-tabs-item2 btn" data-id="{{ skill.id }}" data-remove="{{ link_remove_skill }}">{{ skill.skill }}<a class="btn-remove profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
			{% endfor %}
		</div>
	</div>
</div>
{% endblock %}

{% block profiles_tabs_background_javascript %}
{% endblock %}