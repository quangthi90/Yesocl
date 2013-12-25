{% block profiles_tabs_skill_view %}
<div class="fl profile-column profile-column-skill" id="profile-column-skill">
	<h3 class="profile-column-title"><i class="icon-list"></i> Skill Sets</h3>
	<div class="profile-column-wrapper">
		<div class="profile-column-content">
			{% for skill in user.skills %}
			<div class="profile-info-item skill-item">
				<div class="profile-info-basic">
					<div class="profile-info-title">
						{#<h4 class="skill-title">{{ skill }}</h4>#}
						<span class="year-exp">{{ skill }}</span>
						{#<div class="rate-point-bar">
							<span class="rate-point" data-rate="80"></span>
						</div>#}
					</div>					
				</div>
				{#<div class="profile-info-decription">
					- Have 2 years experience working as front-end developer <br/>
					- Expert in reponsive, HTML5, CSS3 <br/>
				</div>#}
			</div>
			{% endfor %}
		</div>
	</div>
</div>
{% endblock %}

{% block profiles_tabs_skill_view_javascript %}
{% endblock %}