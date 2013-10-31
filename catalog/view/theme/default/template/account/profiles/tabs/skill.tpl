{% block profiles_tabs_skill %}
<div id="profiles-tabs-background-skill" class="profiles-tabs-main pull-left">
	<div class="skill-label">
		<div class="profiles-tabs-main-header">
			<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Skill & Expertise</a>
			<a class="btn profiles-btn pull-right btn-add profiles-btn-add"><i class="icon-plus"></i></a>
			<div class="clear"></div>
		</div>
		<div class="profiles-tabs-main-body">
			<div class="background-skill-form-add hidden" data-add="{{ path('ProfileAddSkill') }}">
				<input class="profiles-input" type="text" name="skill" placeholder="Text here..." />
				<a class="btn profiles-btn-save"><i class="icon-save"></i></a>
				<a class="btn profiles-btn-cancel"><i class="icon-mail-forward"></i></a>
			</div>
			{% for skill in user.skills %}
			<div class="profiles-tabs-item2 btn skill-item" data-id="{{ skill.id }}" data-remove="{{ path('ProfileRemoveSkill', {skill_id: skill.id}) }}">{{ skill.skill }}<a class="btn-remove profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
			{% endfor %}
		</div>
	</div>
</div>
<script id="background-skill-item" type="text/x-jquery-tmpl">
    <div class="profiles-tabs-item2 btn skill-item" data-id="${ id }" data-remove="${ remove }">${ skill }<a class="btn-remove profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
</script>
{% endblock %}

{% block profiles_tabs_skill_javascript %}
{% endblock %}