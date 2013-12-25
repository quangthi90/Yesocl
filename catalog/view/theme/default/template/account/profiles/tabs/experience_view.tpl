{% block profiles_tabs_experience_view %}
<div class="fl profile-column profile-column-experience" id="profile-column-experience">
	<h3 class="profile-column-title"><i class="icon-list"></i> Work Experience</h3>
	<div class="profile-column-wrapper">
		<div class="profile-column-content">
			{% for experience in user.experiences %}
			<div class="profile-info-item work-item">
				<div class="profile-info-basic">
					<div class="profile-info-title">
						<h4 class="work-title">{{ experience.title }}</h4>
						<span class="company-name">{{ experience.company }}</span>
						 at 
						<span class="company-address">{{ experience.location }}</span>
					</div>
					<div class="profile-info-time">
						<span class="time-from">{{ experience.started|date('d/m/Y') }}</span><span class="time-to">{% if experience.ended != null %}{{ experience.ended|date('d/m/Y') }}{% else %}Present{% endif %}</span>
					</div>
				</div>
				{#<div class="profile-info-decription">
					- Joined in Java, .NET projects as a developer. <br/>
					- Got rate A. <br/>
					- Got Employee of Month. <br/>
				</div>#}
			</div>
			{% endfor %}
		</div>
	</div>
</div>
{% endblock %}
{% block profiles_tabs_experience_view_javascript %}
{% endblock %}