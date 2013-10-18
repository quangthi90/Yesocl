{% use '@template/default/template/account/profiles/tabs/summary.tpl' %}
{% use '@template/default/template/account/profiles/tabs/education.tpl' %}
{% use '@template/default/template/account/profiles/tabs/experience.tpl' %}
{% use '@template/default/template/account/profiles/tabs/skill.tpl' %}

{% block profiles_tabs_background %}
<div id="profiles-tabs-background" class="profiles-tabs">
	<div class="profiles-tabs-header">
		<div class="span7">
			<div class="row-fluid">
				<div class="profiles-tabs-title span5"><i class="icon-list"></i> Background</div>
			</div>
		</div>
		<div class="pull-right profiles-btn-next"><a href="#"><i class="icon-chevron-right"></i></a></div>
		<div class="clear"></div>
	</div>
	{{ block('profiles_tabs_summary') }}
	<div id="profiles-tabs-background-education" class="profiles-tabs-main pull-left" data-url="{{ link_add_education }}">
		<div class="profiles-tabs-main-header">
			<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Education</a>
			<a class="btn profiles-btn pull-right btn-add profiles-btn-add"><i class="icon-plus"></i></a>
			<div class="clear"></div>
		</div>
		<div class="profiles-tabs-main-body">
			{% for education in user.educations %}
			<div class="profiles-tabs-item1" data-id="{{ education.id }}" data-url="{{ link_edit_education }}" data-started="{{ education.started }}" data-ended="{{ education.ended }}" data-degree="{{ education.degree }}" data-school="{{ education.school }}" data-fieldofstudy="{{ education.fieldofstudy }}" data-remove="{{ link_remove_education }}">
				<div>
					<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">{{ education.started }}</span> to <span class="profiles-tabs-value">{{ education.ended }}</span></div>
				</div>
				<div class="profiles-tabs-item1-content">
					<a class="profiles-tabs-value btn profiles-btn pull-right btn-remove profiles-btn-remove"><i class="icon-trash"></i></a>
					<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
					<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
					<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
					<div class="profiles-tabs-value">
						<div class="profiles-tabs-value-item">{{ education.degree }}</div>
						<div class="profiles-tabs-value-item">{{ education.school }}</div>
						<div class="profiles-tabs-value-item viewers">{{ education.fieldofstudy }}</div>
					</div>
				</div>
			</div>
			{% endfor %}
		</div>
	</div>
	<div id="profiles-tabs-background-experience" class="profiles-tabs-main pull-left" data-url="{{ link_add_experience }}">
		<div class="profiles-tabs-main-header">
			<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Experience</a>
			<a class="btn profiles-btn pull-right btn-add profiles-btn-add"><i class="icon-plus"></i></a>
			<div class="clear"></div>
		</div>
		<div class="profiles-tabs-main-body">
			{% for experience in user.experiences %}
			<div class="profiles-tabs-item1" data-id="{{ experience.id }}" data-url="{{ link_edit_experience }}" data-startedt="{{ experience.started_text }}" data-endedt="{{ experience.ended_text }}" data-startedy="{{ experience.started_year }}" data-endedy="{{ experience.ended_year }}" data-startedm="{{ experience.started_month }}" data-endedm="{{ experience.ended_month }}" data-title="{{ experience.title }}" data-company="{{ experience.company }}" data-location="{{ experience.location }}" data-remove="{{ link_remove_experience }}">
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
	<div id="profiles-tabs-background-skill" class="profiles-tabs-main pull-left" data-url="{{ link_add_skill }}">
		<div class="profiles-tabs-main-header">
			<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Skill & Expertise</a>
			<a class="btn profiles-btn pull-right btn-add profiles-btn-add"><i class="icon-plus"></i></a>
			<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
			<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
			<div class="pull-right"><input class="profiles-input editors" type="text" name="skill" placeholder="Text here..." /></div>
			<div class="clear"></div>
		</div>

		<div class="profiles-tabs-main-body">
			{% for skill in user.skills %}
			<div class="profiles-tabs-item2 btn" data-id="{{ skill.id }}" data-remove="{{ link_remove_skill }}">{{ skill.skill }}<a class="btn-remove profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
			{% endfor %}
		</div>
	</div>
</div>
{% endblock %}

{% block profiles_tabs_background_javascript %}
{% endblock %}