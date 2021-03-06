{% block profiles_tabs_experience %}
<div id="profiles-tabs-background-experience" class="profiles-tabs-main pull-left" data-url="{{ link_add_experience }}">
	<div class="experience-label">
		<div class="profiles-tabs-main-header">
			<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> {% trans %}Experience{% endtrans %}</a>
			<a class="btn profiles-btn pull-right btn-add profiles-btn-add"><i class="icon-plus"></i></a>
			<div class="clear"></div>
		</div>
		<div class="profiles-tabs-main-body">
			<div class="background-experience-form-add hidden" data-add="{{ path('ProfileAddExperience') }}">
				<div class="profiles-tabs-item1-label">
					<span class="time-from">
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
					</span>
					to
					<span class="time-to">
						<span class="specified-time">
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
							<strong style="margin-left: 5px; margin-right: 10px;">{% trans %}or{% endtrans %}</strong>
						</span>						
						<span class="present">
							<label for="time_present">{% trans %}present{% endtrans %}</label>
							<input type="checkbox" id="time_present" name="time_present">
						</span>	
					</span>											
				</div>
				<div class="profiles-tabs-item1-content">
					<a class="profiles-btn-cancel btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
					<a class="profiles-btn-save btn profiles-btn pull-right"><i class="icon-save"></i></a>
					<div class="profiles-tabs-value">
						<div class="row-fluid">
							<div class="span3">{% trans %}Title{% endtrans %}: </div>
							<input type="text" name="title" />
						</div>
						<div class="row-fluid">
							<div class="span3">{% trans %}Company{% endtrans %}: </div>
							<input type="text"  name="company" />
						</div>
						<div class="row-fluid" data-autocomplete="{{ path('LocationAutoComplete') }}">
							<div class="span3">{% trans %}Location{% endtrans %}: </div>
							<input type="text" name="location" />
							<input type="hidden" name="city_id" />
						</div>
						<div class="row-fluid">
							<div class="span3">{% trans %}Self-Employed{% endtrans %}: </div>
							<input type="checkbox"  name="self_employed" />
						</div>
					</div>
				</div>
			</div>
			{% for experience in user.experiences %}
			<!-- Check current -->
			<div class="profiles-tabs-item1 experience-item" id="{{ experience.id }}" 
				data-edit="{{ path('ProfileEditExperience', {experience_id: experience.id}) }}"
				data-startedy="{{ experience.started|date('Y') }}" 
				data-endedy="{% if experience.ended != null %}{{ experience.ended|date('Y') }}{% endif %}" 
				data-startedm="{{ experience.started|date('m') }}" 
				data-endedm="{% if experience.ended != null %}{{ experience.ended|date('m') }}{% endif %}" 
				data-title="{{ experience.title }}" 
				data-company="{{ experience.company }}" 
				data-location="{{ experience.location }}" 
				data-self-employed="{{ experience.self_employed }}"
				data-current="{% if experience.ended == null %}1{% else %}0{% endif %}"
				data-remove="{{ path('ProfileRemoveExperience', {experience_id: experience.id}) }}" 
				data-city-id="{{ experience.city_id }}">
				<div class="profiles-tabs-item1-label">
					From <span class="profiles-tabs-value">{{ experience.started|date('F Y') }}</span> 
					to <span class="profiles-tabs-value{% if experience.ended == null %} hidden{% endif %}">{{ experience.ended|date('F Y') }}</span>
					<span {% if experience.ended != null %}class="hidden"{% endif %}>present</span>
				</div>
				<div class="profiles-tabs-item1-content">
					<a class="profiles-tabs-value btn profiles-btn pull-right btn-remove  profiles-btn-remove"><i class="icon-trash"></i></a>
					<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
					<div class="profiles-tabs-value">
						<div class="profiles-tabs-value-item">{{ experience.title }}</div>
						<div class="profiles-tabs-value-item">{{ experience.company }}</div>
						<div class="profiles-tabs-value-item viewers">{{ experience.location }}</div>
						<div class="profiles-tabs-value-item check-self-employed">
							<i class="icon-check-sign"></i> {% if experience.self_employed %}{{ text_self_employed }}{% else %}{% trans %}Employed{% endtrans %}{% endif %}
						</div>
					</div>
				</div>
			</div>
			{% endfor %}
			<div class="{% if user.experiences|length > 0 %}hidden{% endif %} empty-data">
				{% trans %}No information found{% endtrans %}
			</div>
		</div>
	</div>
</div>
{% raw %}
<script id="background-experience-item" type="text/x-jquery-tmpl">
	<div class="profiles-tabs-item1 experience-item {{if ended_text == null }}current{{/if}}" id="${ id }" data-edit="${ edit }" data-startedy="${ started_year }" data-endedy="${ ended_year }" data-startedm="${ started_month }" data-endedm="${ ended_month }" data-title="${ title }" data-company="${ company }" data-location="${ location }" data-city-id="${ city_id }" data-self-employed="${ self_employed }" data-current="${ current }" data-remove="${ remove }">
		<div>
			<div class="profiles-tabs-item1-label">
				From <span class="profiles-tabs-value">${ started_text }</span>
				{{if ended_text != null && ended_text != '' }}
					to <span class="profiles-tabs-value">${ ended_text }</span>
				{{else}}
					to present
				{{/if}}
			</div>
		</div>
		<div class="profiles-tabs-item1-content">
			<a class="profiles-tabs-value btn profiles-btn pull-right btn-remove profiles-btn-remove"><i class="icon-trash"></i></a>
			<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
			<div class="profiles-tabs-value">
				<div class="profiles-tabs-value-item">${ title }</div>
				<div class="profiles-tabs-value-item">${ company }</div>
				<div class="profiles-tabs-value-item viewers">${ location }</div>
				<div class="profiles-tabs-value-item check-self-employed">
				{{if self_employed }}
					<i class="icon-check-sign"></i> Self-employed
				{{else}}
					<i class="icon-check-sign"></i> Employed
				{{/if}}
				</div>
			</div>
		</div>
	</div>
</script>
{% endraw %}
{% endblock %}
{% block profiles_tabs_experience_javascript %}
{% endblock %}