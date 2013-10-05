{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('profiles.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
	<div id="y-main-content">
		<div id="profiles-tabs-information" class="profiles-tabs" data-url="{{ link_update_profiles }}">
			<div class="profiles-tabs-header">
				<div class="span7">
					<div class="row-fluid">
						<div class="span5 profiles-tabs-title"><i class="icon-list"></i> Basic Information</div>
						<div class="pull-right profiles-btn-next"><a href="#"><i class="icon-chevron-right"></i></a></div>
					</div>
				</div>
				<div class="clear"></div>
			</div>

			<div class="profiles-tabs-main">
				<div class="span7">
					<div class="row-fluid">
						<div class="profiles-tabs-main-header">
							<a class="profiles-btn-edit viewers btn profiles-btn pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="clear"></div>
						</div>
						<div class="profiles-tabs-main-body">
							<div class="basic-profiles-item" data-url="{{ link_update_profiles }}" data-username="{{ user.username }}" data-firstname="{{ user.firstname }}" data-lastname="{{ user.lastname }}" data-fullname="{{ user.fullname }}" data-emails="{{ user.emails_js }}" data-phones="{{ user.phones_js }}" data-sex="{{ user.sex }}" data-sext="{{ user.sext }}" data-birthday="{{ user.birthday }}" data-birthdayt="{{ user.birthdayt }}" data-address="{{ user.address }}" data-location="{{ user.location }}" data-industry="{{ user.industry }}">
								<div class="row-fluid">
									<div class="span2 offset1">Username</div>
									<div class="span9"><span class="profiles-tabs-value viewers">{{ user.username }}</span></div>
								</div>
								<div class="row-fluid">
									<div class="span2 offset1">Fullname</div>
									<div class="span9"><span class="profiles-tabs-value viewers">{{ user.fullname }}</span></div>
								</div>
								<div class="row-fluid">
									<div class="span2 offset1">Email</div>
									<div class="span9">
										<div class="row-fluid">
											{% for email in user.emails %}
											<div class="email-item"><span class="profiles-tabs-value viewers">{{ email.email }}</span>  <span class="label {% if (email.primary) %}label-success{% endif %}">primary</span></div>
						        			{% endfor %}
										</div>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span2 offset1">Phone</div>
									<div class="span9">
										<div class="row-fluid">
											{% for phone in user.phones %}
											<div class="phones-item">{{ phone.phone }}</div>
						        			{% endfor %}
										</div>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span2 offset1">Sex</div>
									<div class="span9"><span class="profiles-tabs-value viewers">{{ user.sext }}</span></div>
								</div>
								<div class="row-fluid">
									<div class="span2 offset1">Birthday</div>
									<div class="span9"><span class="profiles-tabs-value viewers">{{ user.birthdayt }}</span></div>
								</div>
								<div class="row-fluid">
									<div class="span2 offset1">Address</div>
									<div class="span9"><span class="profiles-tabs-value viewers">{{ user.address }}</span></div>
								</div>
								<div class="row-fluid">
									<div class="span2 offset1">Living</div>
									<div class="span9"><span class="profiles-tabs-value viewers">{{ user.location }}</span></div>
								</div>
								<div class="row-fluid">
									<div class="span2 offset1">Industry</div>
									<div class="span9"><span class="profiles-tabs-value viewers">{{ user.industry }}</span></div>
								</div>
							</div>
						</div>
					</div>		
				</div>
				<div class="clear"></div>
			</div>
		</div>
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

			<div id="profiles-tabs-background-sumary" class="profiles-tabs-main pull-left" data-url="{{ link_update_background_sumary }}">
				<div class="profiles-tabs-main-header">
					<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i>  Sumary</a>
					<a class="profiles-btn-edit btn profiles-btn pull-right"><i class="icon-pencil"></i></a>
					<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
					<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
					<div class="clear"></div>
				</div>
				<div class="profiles-tabs-main-body">
					<div class="background-input-sumary"  data-sumary="{{ user.sumary }}">{{ user.sumary}}</div>
				</div>
			</div>
			<div id="profiles-tabs-background-education" class="profiles-tabs-main pull-left" data-url="{{ link_add_education }}">
				<div class="profiles-tabs-main-header">
					<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Education</a>
					<a class="profiles-btn-add btn profiles-btn pull-right"><i class="icon-plus"></i></a>
					<div class="clear"></div>
				</div>
				<div class="profiles-tabs-main-body">
					{% for education in user.educations %}
					<div class="profiles-tabs-item1" data-id="{{ education.id }}" data-url="{{ link_edit_education }}" data-started="{{ education.started }}" data-ended="{{ education.ended }}" data-degree="{{ education.degree }}" data-school="{{ education.school }}" data-fieldofstudy="{{ education.fieldofstudy }}" data-remove="{{ link_remove_education }}">
						<div>
							<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">{{ education.started }}</span> to <span class="profiles-tabs-value">{{ education.ended }}</span></div>
						</div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
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
					<a class="profiles-btn-add btn profiles-btn pull-right"><i class="icon-plus"></i></a>
					<div class="clear"></div>
				</div>
				<div class="profiles-tabs-main-body">
					{% for experience in user.experiences %}
					<div class="profiles-tabs-item1" data-id="{{ experience.id }}" data-url="{{ link_edit_experience }}" data-startedt="{{ experience.started_text }}" data-endedt="{{ experience.ended_text }}" data-startedy="{{ experience.started_year }}" data-endedy="{{ experience.ended_year }}" data-startedm="{{ experience.started_month }}" data-endedm="{{ experience.ended_month }}" data-title="{{ experience.title }}" data-company="{{ experience.company }}" data-location="{{ experience.location }}" data-remove="{{ link_remove_experience }}">
						<div>
							<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">{{ experience.started_text }}</span> to <span class="profiles-tabs-value">{{ experience.ended_text }}</span></div>
						</div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
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
					<a class="profiles-btn-add btn profiles-btn pull-right"><i class="icon-plus"></i></a>
					<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
					<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
					<div class="pull-right"><input class="profiles-input editors" type="text" name="skill" placeholder="Text here..." /></div>
					<div class="clear"></div>
				</div>

				<div class="profiles-tabs-main-body">
					{% for skill in user.skills %}
					<div class="profiles-tabs-item2 btn" data-id="{{ skill.id }}" data-remove="{{ link_remove_skill }}">{{ skill.skill }}<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					{% endfor %}
				</div>
			</div>
		</div>
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript" src="{{ asset_js('profiles.js') }}"></script>
<script id="profiles-form" type="text/x-jquery-tmpl">
	<div class="basic-profiles-form" data-url="${ url }" data-username="${ username }" data-firstname="${ firstname }" data-lastname="${ lastname }" data-fullname="${ fullname }" data-emails="${ emails_js }" data-phones="${ phones_js }" data-sex="${ sex }" data-sext="${ sext }" data-birthday="${ birthday }" data-birthdayt="${ birthdayt }" data-address="${ address }" data-location="${ location }" data-industry="${ industry }">
		<div class="row-fluid">
			<div class="span2 offset1">Username</div>
			<div class="span9"><input class="span5" type="text" placeholder="Input Text" name="username" value="${ username }" /></div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Fullname</div>
			<div class="span9"><input class="span3" type="text" placeholder="Input Text" name="firstname" value="${ firstname }" /> <input class="span2" type="text" placeholder="Input Text" name="lastname" value="${ lastname }" /></div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Email</div>
			<div class="span9">
				<div class="row-fluid">
					{% set email_loop = '{{each emails}}' %}
					{% set email_loop_end = '{{/each}}' %}
					{% set primary_if = '{{if $value.primary == 1}}' %}
					{% set primary_if_end = '{{/if}}' %}
					{{ email_loop }}
					<div class="emails-form" data-primary="${ $value.primary }"><input class="span5" type="text" placeholder="Input Text" name="emails[${ $index }][email]" value="${ $value.email }" /><input type="hidden" name="emails[${ $index }][primary]" value="${ $value.primary }" /> <span class="label {{ primary_if }}label-success{{ primary_if_end }}">primary</span> <a class="emails-btn-remove btn btn-danger" href="#"><i class="icon-trash"></i></a></div>
					{{ email_loop_end }}

					<div class="row-fluid"><a class="emails-btn-add btn btn-success offset5" href="#" data-index="${ Object.keys(emails).length }">Add email</a></div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Phone</div>
			<div class="span9">
				<div class="row-fluid">
					{% set phone_loop = '{{each phones}}' %}
					{% set phone_loop_end = '{{/each}}' %}
					{{ phone_loop }}
					<div class="phones-form" data-id="${ $value.id }" data-type="${ $value.type }"><input class="span5" type="text" placeholder="Input Text" name="phones[${ $index }][phone]" value="${ $value.phone }" /> <select class="span3" name="phones[${ $index }][type]">{% for phonetype in phone_types %}<option value="{{ phonetype.code }}">{{ phonetype.text }}</option>{% endfor %}</select> <a class="phones-btn-remove btn btn-danger" href="#"><i class="icon-trash"></i></a></div>
					{{ phone_loop_end }}

					<div class="row-fluid"><a class="phones-btn-add btn btn-success offset5" href="#" data-index="${ Object.keys(phones).length }">Add phone</a></div>
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Sex</div>
			<div class="span9"><select class="span5" name="sex"><option value="1">Male</option><option value="0">Female</option></select></div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Birthday</div>
			<div class="span9"><input class="span5" type="text" placeholder="Input Text" name="birthday" value="${ birthday }" /></div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Address</div>
			<div class="span9"><input class="span5" type="text" placeholder="Input Text" name="address" value="${ address }" /></div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Living</div>
			<div class="span9"><input class="span5" type="text" placeholder="Input Text" name="location" value="${ location }" /></div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Industry</div>
			<div class="span9"><input class="span5" type="text" placeholder="Input Text" name="industry" value="${ industry }" /></div>
		</div>
		<div class="row-fluid">
			<div class="span9 offset3"><a href="#" class="btn btn-success profiles-btn-save">Save</a>   <a href="#" class="btn profiles-btn-cancel">Cancel</a></div>
		</div>
	</div>
</script>
<script id="profiles-phone-form" type="text/x-jquery-tmpl">
    <div class="phones-form"><input class="span5" type="text" placeholder="Input Text" name="phones[${ index }][phone]"/> <select class="span3" name="phones[${ index }][type]">{% for phonetype in phone_types %}<option value="{{ phonetype.code }}">{{ phonetype.text }}</option>{% endfor %}</select> <a class="phones-btn-remove btn btn-danger" href="#"><i class="icon-trash"></i></a></div>
</script>
<script id="profiles-email-form" type="text/x-jquery-tmpl">
    <div class="emails-form"><input class="span5" type="text" placeholder="Input Text" name="emails[${ index }][email]" value="" /><input type="hidden" name="emails[${ index }][primary]" value="0" /> <span class="label">primary</span> <a class="emails-btn-remove btn btn-danger" href="#"><i class="icon-trash"></i></a></div>
</script>
<script id="profiles-item" type="text/x-jquery-tmpl">
	<div class="basic-profiles-item" data-url="${ url }" data-username="${ username }" data-firstname="${ firstname }" data-lastname="${ lastname }" data-fullname="${ fullname }" data-emails="${ emails_js }" data-phones="${ phones_js }" data-sex="${ sex }" data-sext="${ sext }" data-birthday="${ birthday }" data-birthdayt="${ birthdayt }" data-address="${ address }" data-location="${ location }" data-industry="${ industry }">
		<div class="row-fluid">
			<div class="span2 offset1">Username</div>
			<div class="span9"><span class="profiles-tabs-value viewers">${ username }</span></div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Fullname</div>
			<div class="span9"><span class="profiles-tabs-value viewers">${ fullname }</span></div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Email</div>
			<div class="span9">
				<div class="row-fluid">
					{% set email_loop = '{{each emails}}' %}
					{% set email_loop_end = '{{/each}}' %}
					{% set primary_if = '{{if $value.primary == 1}}' %}
					{% set primary_if_end = '{{/if}}' %}
					{{ email_loop }}
					<div class="email-item"><span class="profiles-tabs-value viewers">${ $value.email }</span>  <span class="label {{primary_if}}label-success{{primary_if_end}}">primary</span></div>
					{{ email_loop_end }}
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Phone</div>
			<div class="span9">
				<div class="row-fluid">
					{% set phone_loop = '{{each phones}}' %}
					{% set phone_loop_end = '{{/each}}' %}
					{{ phone_loop }}
					<div class="phones-item">${ $value.phone }</div>
					{{ phone_loop_end }}
				</div>
			</div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Sex</div>
			<div class="span9"><span class="profiles-tabs-value viewers">${ sext }</span></div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Birthday</div>
			<div class="span9"><span class="profiles-tabs-value viewers">${ birthdayt }</span></div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Address</div>
			<div class="span9"><span class="profiles-tabs-value viewers">${ address }</span></div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Living</div>
			<div class="span9"><span class="profiles-tabs-value viewers">${ location }</span></div>
		</div>
		<div class="row-fluid">
			<div class="span2 offset1">Industry</div>
			<div class="span9"><span class="profiles-tabs-value viewers">${ industry }</span></div>
		</div>
	</div>
</script>
<script id="background-sumary-form" type="text/x-jquery-tmpl">
    <textarea name="sumary">${ sumary }</textarea>
</script>
<script id="background-education-form" type="text/x-jquery-tmpl">
	<div class="background-education-form-add" data-url="${ url }" data-id="${ id }" data-started="${ started }" data-ended="${ ended }" data-degree="${ degree }" data-school="${ school }" data-fieldofstudy="${ fieldofstudy }">
		<div class="profiles-tabs-item1-label">From <select name="started">{% for i in current_year..before_year %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select> to <select name="ended">{% for i in current_year..before_year %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select></div>
		<div class="profiles-tabs-item1-content">
			<a class="profiles-btn-cancel btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
			<a class="profiles-btn-save btn profiles-btn pull-right"><i class="icon-save"></i></a>
			<div class="profiles-tabs-value">
				<div class="row-fluid"><div class="span4">Degree: </div><input type="text" name="degree" value="${ degree }" /></div>
				<div class="row-fluid"><div class="span4">Shool: </div><input type="text"  name="school" value="${ school }" /></div>
				<div class="row-fluid"><div class="span4">Field Of Study: </div><input type="text" name="fieldofstudy" value="${ fieldofstudy }" /></div>
			</div>
		</div>
	</div>
</script>
<script id="background-education-item" type="text/x-jquery-tmpl">
	<div class="profiles-tabs-item1" data-id="${ id }" data-url="${ url }" data-started="${ started }" data-ended="${ ended }" data-degree="${ degree }" data-school="${ school }" data-fieldofstudy="${ fieldofstudy }" data-remove="${ remove }">
		<div>
			<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">${ started }</span> to <span class="profiles-tabs-value">${ ended }</span></div>
		</div>
		<div class="profiles-tabs-item1-content">
			<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
			<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
			<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
			<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
			<div class="profiles-tabs-value">
				<div class="profiles-tabs-value-item">${ degree }</div>
				<div class="profiles-tabs-value-item">${ school }</div>
				<div class="profiles-tabs-value-item viewers">${ fieldofstudy }</div>
			</div>
		</div>
	</div>
</script>
<script id="background-experience-form" type="text/x-jquery-tmpl">
	<div class="background-education-form-add" data-url="${ url }" data-id="${ id }" data-startedt="${ started_text }" data-endedt="${ ended_text }" data-startedy="${ started_year }" data-endedy="${ ended_year }" data-startedm="${ started_month }" data-endedm="${ ended_month }" data-title="${ title }" data-company="${ company }" data-location="${ location }">
		<div class="profiles-tabs-item1-label">From <select class="span1" name="started_month">{% for i in 1..12 %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select> <select class="span1" name="started_year">{% for i in current_year..before_year %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select> to <select class="span1" name="ended_month">{% for i in 1..12 %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select> <select class="span1" name="ended_year">{% for i in current_year..before_year %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select></div>
		<div class="profiles-tabs-item1-content">
			<a class="profiles-btn-cancel btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
			<a class="profiles-btn-save btn profiles-btn pull-right"><i class="icon-save"></i></a>
			<div class="profiles-tabs-value">
				<div class="row-fluid"><div class="span4">Title: </div><input type="text" name="title" value="${ title }" /></div>
				<div class="row-fluid"><div class="span4">Company: </div><input type="text"  name="company" value="${ company }" /></div>
				<div class="row-fluid"><div class="span4">Location: </div><input type="text" name="location" value="${ location }" /></div>
			</div>
		</div>
	</div>
</script>
<script id="background-experience-item" type="text/x-jquery-tmpl">
	<div class="profiles-tabs-item1" data-id="${ id }" data-url="${ url }" data-startedt="${ started_text }" data-endedt="${ ended_text }" data-startedy="${ started_year }" data-endedy="${ ended_year }" data-startedm="${ started_month }" data-endedm="${ ended_month }" data-title="${ title }" data-company="${ company }" data-location="${ location }" data-remove="${ remove }">
		<div>
			<div class="profiles-tabs-item1-label">From <span class="profiles-tabs-value">${ started_text }</span> to <span class="profiles-tabs-value">${ ended_text }</span></div>
		</div>
		<div class="profiles-tabs-item1-content">
			<a class="profiles-btn-remove profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
			<a class="btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
			<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
			<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
			<div class="profiles-tabs-value">
				<div class="profiles-tabs-value-item">${ title }</div>
				<div class="profiles-tabs-value-item">${ company }</div>
				<div class="profiles-tabs-value-item viewers">${ location }</div>
			</div>
		</div>
	</div>
</script>
<script id="background-skill-item" type="text/x-jquery-tmpl">
    <div class="profiles-tabs-item2 btn" data-id="${ id }" data-remove="${ remove }">${ skill }<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
</script>
<script type="text/javascript">
	function addScroll(warper, column, width, height) {
		$(warper).outerWidth(width);
		$(warper + ' ' + column).outerHeight(height);
		$(warper + ' ' + column).niceScroll();
	}

	$(document).ready( function () {
		$('#y-content').niceScroll();
		var profiles = new Profiles($('#y-main-content'));
	} );

	window.onresize=function() {
		window.setTimeout('location.reload()', 1);
	};
</script>
{% endblock %}