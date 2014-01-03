{% block profiles_tabs_education %}
<div id="profiles-tabs-background-education" class="profiles-tabs-main pull-left" data-url="{{ link_add_education }}">
	<div class="education-label" data-degree="{{ path('DegreeAutoComplete') }}" data-school="{{ path('SchoolAutoComplete') }}" data-fieldofstudy="{{ path('FieldOfStudyAutoComplete') }}">
		<div class="profiles-tabs-main-header">
			<a href="#" class="btn sub-profile-header">
				<i class="icon-paper-clip"></i> Education</a>
			<a class="btn profiles-btn pull-right btn-add profiles-btn-add">
				<i class="icon-plus"></i></a>
			<div class="clear"></div>
		</div>
		<div class="profiles-tabs-main-body">
			<div class="background-education-form-add hidden" data-add="{{ path('ProfileAddEducation') }}">
				<div class="profiles-tabs-item1-label">
					From 
					<select name="started">
						{% for i in current_year..before_year %}
						<option value="{{ i }}">{{ i }}</option>
						{% endfor %}
					</select> 
					to 
					<select name="ended">
						{% for i in current_year..before_year %}
						<option value="{{ i }}">{{ i }}</option>
						{% endfor %}
					</select>
				</div>
				<div class="profiles-tabs-item1-content">
					<a class="profiles-btn-cancel btn profiles-btn pull-right">
						<i class="icon-mail-forward"></i></a>
					<a class="profiles-btn-save btn profiles-btn pull-right">
						<i class="icon-save"></i></a>
					<div class="profiles-tabs-value">
						<div class="row-fluid">
							<div class="span4">Degree: </div>
							<input type="text" name="degree" />
							<input type="hidden" name="degree_id" />
						</div>
						<div class="row-fluid">
							<div class="span4">School: </div>
							<input type="text"  name="school" />
							<input type="hidden"  name="school_id" />
						</div>
						<div class="row-fluid">
							<div class="span4">Field Of Study: </div>
							<input type="text" name="fieldofstudy" />
							<input type="hidden" name="fieldofstudy_id" />
						</div>
					</div>
				</div>
			</div>
			{% for education in user.educations %}
			<div class="profiles-tabs-item1 education-item" id="{{ education.id }}" 
				data-edit="{{ path('ProfileEditEducation', {education_id: education.id}) }}" data-started="{{ education.started }}" 
				data-ended="{{ education.ended }}" 
				data-degree="{{ education.degree }}" 
				data-degree-id="{{ education.degree_id }}" 
				data-school="{{ education.school }}" 
				data-school-id="{{ education.school_id }}" 
				data-fieldofstudy="{{ education.fieldofstudy }}" 
				data-fieldofstudy-id="{{ education.fieldofstudy_id }}" 
				data-remove="{{ path('ProfileRemoveEducation', {education_id: education.id}) }}">
				<div>
					<div class="profiles-tabs-item1-label">
						From <span class="profiles-tabs-value">{{ education.started }}</span> 
						to <span class="profiles-tabs-value">{{ education.ended }}</span>						
					</div>
				</div>
				<div class="profiles-tabs-item1-content">
					<a class="profiles-tabs-value btn profiles-btn pull-right btn-remove profiles-btn-remove"><i class="icon-trash"></i></a>
					<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
					<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
					<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
					<div class="profiles-tabs-value">
						<div class="profiles-tabs-value-item">{{ education.school }}</div>
						<div class="profiles-tabs-value-item">{{ education.degree }}</div>
						<div class="profiles-tabs-value-item viewers">{{ education.fieldofstudy }}</div>
					</div>
				</div>
			</div>
			{% endfor %}
		</div>
	</div>
</div>
{% raw %}
<script id="background-education-item" type="text/x-jquery-tmpl">
	<div class="profiles-tabs-item1 education-item" id="${ id }" data-edit="${ edit }" data-started="${ started }" data-ended="${ ended }" data-degree="${ degree }" data-degree-id="${ degree_id }" data-school="${ school }" data-school-id="${ school_id }" data-fieldofstudy="${ fieldofstudy }" data-fieldofstudy-id="${ fieldofstudy_id }" data-remove="${ remove }">
		<div>
			<div class="profiles-tabs-item1-label">
				From <span class="profiles-tabs-value">${ started }</span> 
				to <span class="profiles-tabs-value">${ ended }</span>
			</div>
		</div>
		<div class="profiles-tabs-item1-content">
			<a class="profiles-tabs-value btn profiles-btn pull-right btn-remove profiles-btn-remove"><i class="icon-trash"></i></a>
			<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
			<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
			<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
			<div class="profiles-tabs-value">
				<div class="profiles-tabs-value-item">${ school }</div>
				<div class="profiles-tabs-value-item">${ degree }</div>
				<div class="profiles-tabs-value-item viewers">${ fieldofstudy }</div>
			</div>
		</div>
	</div>
</script>
{% endraw %}
{% endblock %}

{% block profiles_tabs_education_javascript %}
{% endblock %}