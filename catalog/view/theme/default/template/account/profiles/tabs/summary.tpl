{% block profiles_tabs_summary %}
<div id="profiles-tabs-background-summary" class="profiles-tabs-main pull-left" data-url="{{ path('ProfileEditSummary') }}">
	<div class="summary-label">
		<div class="profiles-tabs-main-header">
			<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i>  Summary</a>
			<a class="profiles-btn-edit btn profiles-btn pull-right"><i class="icon-pencil"></i></a>
			<div class="clear"></div>
		</div>
		<div class="profiles-tabs-main-body">
			<div class="background-input-summary">{{ user.summary }}</div>
		</div>
	</div>
	<div class="summary-form hidden">
		<div class="profiles-tabs-main-header">
			<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i>  Summary</a>
			<a class="profiles-btn-cancel btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
			<a class="profiles-btn-save btn profiles-btn pull-right"><i class="icon-save"></i></a>
			<div class="clear"></div>
		</div>
		<div class="profiles-tabs-main-body">
			<textarea style="height: 100%; width: 98%;" name="summary">{{ user.summary }}</textarea>
		</div>
	</div>
</div>
{% endblock %}

{% block profiles_tabs_summary_javascript %}
{% endblock %}