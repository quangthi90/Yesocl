{% block profiles_tabs_summary_view %}
<div class="fl profile-column profile-column-summary" id="profile-column-summary">
	<h3 class="profile-column-title"><i class="icon-list"></i> Summary</h3>
	<div class="profile-column-wrapper">
		<div class="profile-column-content">{{ user.summary }}</div>
	</div>
</div>
{% endblock %}
{% block profiles_tabs_summary_view_javascript %}
{% endblock %}