{% use '@template/default/template/account/profiles/tabs/summary.tpl' %}
{% use '@template/default/template/account/profiles/tabs/education.tpl' %}
{% use '@template/default/template/account/profiles/tabs/experience.tpl' %}
{% use '@template/default/template/account/profiles/tabs/skill.tpl' %}

{% block profiles_tabs_background %}
<div id="profiles-tabs-background" class="profiles-tabs">
	<div class="profiles-tabs-header">
		<div class="profiles-tabs-title"><i class="icon-list"></i> Background</div>
	</div>
	{{ block('profiles_tabs_summary') }}
	{{ block('profiles_tabs_education') }}
	{{ block('profiles_tabs_experience') }}
	{{ block('profiles_tabs_skill') }}
	
</div>
{% endblock %}

{% block profiles_tabs_background_javascript %}
{% endblock %}