{% block profiles_tabs_experience %}
<div id="profiles-tabs-background-experience" class="profiles-tabs-main pull-left" data-url="{{ link_add_experience }}">
	<div class="experience-label">
		<div class="profiles-tabs-main-header">
			<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Experience</a>
			<a class="btn profiles-btn pull-right btn-add profiles-btn-add"><i class="icon-plus"></i></a>
			<div class="clear"></div>
		</div>
		<div class="profiles-tabs-main-body">
			<div class="background-education-form-add hidden">
				<div class="profiles-tabs-item1-label">
					From 
					<select class="span1" name="started_month">
						{% for i in 1..12 %}
						<option value="{{ i }}">{{ i }}</option>
						{% endfor %}
					</select> 
					<select class="span1" name="started_year">
						{% for i in current_year..before_year %}
						<option value="{{ i }}">{{ i }}</option>
						{% endfor %}
					</select> 
					to 
					<select class="span1" name="ended_month">
						{% for i in 1..12 %}
						<option value="{{ i }}">{{ i }}</option>
						{% endfor %}
					</select> 
					<select class="span1" name="ended_year">
						{% for i in current_year..before_year %}
						<option value="{{ i }}">{{ i }}</option>
						{% endfor %}
					</select>
				</div>
				<div class="profiles-tabs-item1-content">
					<a class="profiles-btn-cancel btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
					<a class="profiles-btn-save btn profiles-btn pull-right"><i class="icon-save"></i></a>
					<div class="profiles-tabs-value">
						<div class="row-fluid">
							<div class="span4">Title: </div>
							<input type="text" name="title" />
						</div>
						<div class="row-fluid">
							<div class="span4">Company: </div>
							<input type="text"  name="company" />
						</div>
						<div class="row-fluid">
							<div class="span4">Location: </div>
							<input type="text" name="location" />
						</div>
					</div>
				</div>
			</div>
			{% for experience in user.experiences %}
			<div class="profiles-tabs-item1 experience-item" data-id="{{ experience.id }}" data-edit="{{ link_edit_experience }}" data-startedm="{{ experience.started_text }}" data-endedm="{{ experience.ended_text }}" data-startedy="{{ experience.started_year }}" data-endedy="{{ experience.ended_year }}" data-startedm="{{ experience.started_month }}" data-endedm="{{ experience.ended_month }}" data-title="{{ experience.title }}" data-company="{{ experience.company }}" data-location="{{ experience.location }}" data-remove="{{ link_remove_experience }}">
				<div>
					<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">{{ experience.started_text }}</span> to <span class="profiles-tabs-value">{{ experience.ended_text }}</span></div>
				</div>
				<div class="profiles-tabs-item1-content">
					<a class="profiles-tabs-value btn profiles-btn pull-right btn-remove  profiles-btn-remove"><i class="icon-trash"></i></a>
					<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
					<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
					<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
					<div class="profiles-tabs-value">
						<div class="profiles-tabs-value-item">{{ experience.title }}</div>
						<div class="profiles-tabs-value-item">{{ experience.company }}</div>
						<div class="profiles-tabs-value-item viewers">{{ experience.location }}</div>
					</div>
				</div>
			</div>
			{% endfor %}
		</div>
	</div>
</div>
{% endblock %}

{% block profiles_tabs_experience_javascript %}
{% endblock %}