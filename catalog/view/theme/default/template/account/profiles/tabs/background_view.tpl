{% use '@template/default/template/account/profiles/tabs/summary_view.tpl' %}
{% use '@template/default/template/account/profiles/tabs/education_view.tpl' %}
{% use '@template/default/template/account/profiles/tabs/experience_view.tpl' %}
{% use '@template/default/template/account/profiles/tabs/skill_view.tpl' %}

{% block profiles_tabs_background_view %}
<div id="profiles-tabs-background" class="profiles-tabs">
	<div class="profiles-tabs-header">
		<div class="profiles-tabs-title"><i class="icon-list"></i> Background</div>
	</div>
	{{ block('profiles_tabs_summary_view') }}
	{{ block('profiles_tabs_education_view') }}
	{{ block('profiles_tabs_experience_view') }}
	{{ block('profiles_tabs_skill_view') }}	
</div>
{% endblock %}

{% block profiles_tabs_background_view_javascript %}
{% endblock %}