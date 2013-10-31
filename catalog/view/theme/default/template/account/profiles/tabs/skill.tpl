{% block profiles_tabs_skill %}
<div id="profiles-tabs-background-skill" class="profiles-tabs-main pull-left" data-url="{{ link_add_skill }}">
	<div class="skill-label">
		<div class="profiles-tabs-main-header">
			<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Skill & Expertise</a>
			<a class="btn profiles-btn pull-right btn-add profiles-btn-add"><i class="icon-plus"></i></a>
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

{% block profiles_tabs_skill_javascript %}
{% endblock %}