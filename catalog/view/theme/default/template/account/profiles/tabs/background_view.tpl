{% use '@template/default/template/account/profiles/tabs/summary_view.tpl' %}
{% use '@template/default/template/account/profiles/tabs/education_view.tpl' %}
{% use '@template/default/template/account/profiles/tabs/experience_view.tpl' %}
{% use '@template/default/template/account/profiles/tabs/skill_view.tpl' %}

{% block profiles_tabs_background_view %}
	{{ block('profiles_tabs_summary_view') }}
	{{ block('profiles_tabs_education_view') }}
	{{ block('profiles_tabs_experience_view') }}
	{{ block('profiles_tabs_skill_view') }}	
{% endblock %}

{% block profiles_tabs_background_view_javascript %}
{% endblock %}