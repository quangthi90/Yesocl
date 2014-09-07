{% block profiles_tabs_education_view %}
<div class="fl profile-column profile-column-education" id="profile-column-education">
	<h3 class="profile-column-title"><i class="icon-list"></i> {% trans %}Education Background{% endtrans %}</h3>
	<div class="profile-column-wrapper">
		<div class="profile-column-content">
			{% if user.educations|length > 0 %}
				{% for education in user.educations %}
				<div class="profile-info-item education-item">
					<div class="profile-info-basic">
						<div class="profile-info-title">
							<h4 class="school-name">{{ education.school }}</h4>
							<span class="degree-name">{{ education.degree }}</span>
							<span class="major-name">{{ education.field }}</span>
						</div>
						<div class="profile-info-time">
							<span class="time-from">{{ education.started }}</span><span class="time-to">{{ education.ended }}</span>
						</div>
					</div>
					{#<div class="profile-info-decription">
						Success graduation thesis defence: 9.5/10, graduation with GPA 8.12/10
					</div>#}
				</div>
				{% endfor %}
			{% else %}
				<div class="profile-info-item empty-data">
					{% trans %}No information found{% endtrans %}
				</div>
			{% endif %}
		</div>
	</div>
</div>
{% endblock %}

{% block profiles_tabs_education_view_javascript %}
{% endblock %}