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
							<div class="row-fluid input-group">
								<div class="span2 offset1">Fullname</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.fullname }}</span>
									<input class="profiles-tabs-input editors" type="text" placeholder="Input Text" name="fullname" value="{{ user.fullname }}" />
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Email</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.email }}</span>
									<input class="profiles-tabs-input editors" type="text" placeholder="Input Text" name="email" value="{{ user.email }}" />
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Phone</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">0123456789</span>
									<input class="profiles-tabs-input editors" type="text" placeholder="Input Text" name="phone" value="0123456789" />
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Sex</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.sex }}</span>
									<select class="profiles-tabs-input editors" name="gender">
										<option value="1" {% if user.sex_num == 1 %}selected="selected"{% endif %}>Male</option>
										<option value="2" {% if user.sex_num != 1 %}selected="selected"{% endif %}>Female</option>
									</select>
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Birthday</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.birthday|date('d/m/Y') }}</span>
									<input class="profiles-tabs-input editors" type="text" name="birthday" value="{{ user.birthday|date('d/m/Y') }}" />
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Address</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.address }}</span>
									<input class="profiles-tabs-input editors" type="text" placeholder="Input Text" name="address" value="{{ user.address }}" />
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Living</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.location }}</span>
									<input class="profiles-tabs-input editors" type="text" placeholder="Input Text" name="location" value="{{ user.location }}" />
								</div>
							</div>
							<div class="row-fluid input-group">
								<div class="span2 offset1">Industry</div>
								<div class="span9">
									<span class="profiles-tabs-value viewers">{{ user.industry }}</span>
									<input class="profiles-tabs-input editors" type="text" placeholder="Input Text" name="industry" value="{{ user.industry }}" />
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
			<div id="profiles-tabs-background-experience" class="profiles-tabs-main pull-left">
				<div class="profiles-tabs-main-header">
					<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Experience</a>
					<a class="profiles-btn-add btn profiles-btn pull-right"><i class="icon-plus"></i></a>
					<div class="clear"></div>
				</div>
				<div class="profiles-tabs-main-body">
					<div class="profiles-form-add editors" data-url="{{ link_add_experience }}">
						<div class="profiles-tabs-item1-label">From <input type="text" value="" /> to <input type="text" value="" /></div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-cancel btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="profiles-tabs-value">
								<div class="row-fluid"><div class="span4">Title: </div><input type="text" name="title" value="" /></div>
								<div class="row-fluid"><div class="span4">Company: </div><input type="text"  name="company" value="" /></div>
								<div class="row-fluid"><div class="span4">Location: </div><input type="text" name="location" value="" /></div>
							</div>
						</div>
					</div>

					{% for experience in user.experiences %}
					<div class="profiles-tabs-item1">
						<div>
							<div class="profiles-tabs-item1-label">From <span class="input-group"><span class="profiles-tabs-value viewers">{{ experience.started }}</span><input class="editors" type="text" value="{{ experience.started }}" /></span> to <span class="input-group"><span class="profiles-tabs-value viewers">{{ experience.ended }}</span><input class="editors" type="text" value="{{ experience.ended }}" /></span></div>
						</div>
						<div class="profiles-tabs-item1-content">
							<a class="profiles-btn-remove viewers profiles-tabs-value btn profiles-btn pull-right"><i class="icon-trash"></i></a>
							<a class="btn profiles-btn viewers profiles-btn-edit profiles-tabs-value pull-right"><i class="icon-pencil"></i></a>
							<a class="profiles-btn-cancel editors btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
							<a class="profiles-btn-save editors btn profiles-btn pull-right"><i class="icon-save"></i></a>
							<div class="profiles-tabs-value">
								<div class="input-group">
									<div class="profiles-tabs-value-item viewers">{{ experience.title }}</div>
									<span class="row-fluid editors"><span class="span4">Title: </span><input type="text" value="{{ experience.title }}" /></span>
								</div>
								<div class="input-group">
									<div class="profiles-tabs-value-item viewers">{{ experience.company }}</div>
									<span class="row-fluid editors"><span class="span4">Company: </span><input type="text" value="{{ experience.company }}" /></span>
								</div>
								<div class="input-group">
									<div class="profiles-tabs-value-item viewers">{{ experience.location }}</div>
									<span class="row-fluid editors"><span class="span4">Location: </span><input type="text" value="{{ experience.location }}" /></span>
								</div>
							</div>
						</div>
					</div>
					{% endfor %}
				</div>	
			</div>
			<div id="profiles-tabs-background-skill" class="profiles-tabs-main pull-left">
				<div class="profiles-tabs-main-header">
					<a href="#" class="btn sub-profile-header"><i class="icon-paper-clip"></i> Skill & Expertise</a>
					<a class="profiles-btn-edit profiles-tabs-value btn profiles-btn pull-right"><i class="icon-plus"></i></a>
					<a class="profiles-btn-cancel profiles-tabs-input btn profiles-btn pull-right"><i class="icon-mail-forward"></i></a>
					<a class="profiles-btn-save profiles-tabs-input btn profiles-btn pull-right"><i class="icon-save"></i></a>
					<div class="pull-right"><input class="profiles-tabs-input" type="text" placeholder="Text here..." /></div>
					<div class="clear"></div>
				</div>

				<div class="profiles-tabs-main-body">
					<div class="profiles-tabs-item2 btn">Problem Solving<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Development<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Teamwork<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Pressure<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Solving<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Development<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Teamwork<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Pressure<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Solving<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Development<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Teamwork<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Pressure<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Solving<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Development<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Teamwork<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Pressure<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Solving<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Development<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Teamwork<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Pressure<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Solving<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Problem Development<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Teamwork<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
					<div class="profiles-tabs-item2 btn">Pressure<a class="profiles-btn-remove" href="#"><i class="icon-remove"></i></a></div>
				</div>
			</div>
		</div>
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript" src="{{ asset_js('profiles.js') }}"></script>
<script id="background-sumary-form" type="text/x-jquery-tmpl">
    <textarea name="sumary">${ sumary }</textarea>
</script>
<script id="background-education-form" type="text/x-jquery-tmpl">
	<div class="background-education-form-add" data-url="${ url }" data-id="${ id }">
		<div class="profiles-tabs-item1-label">From <select name="started">{% for i in current_year..before_year %}<option value="{{ i }}">{{ i }}</option>{% endfor %}</select> to <select name="ended">{% for i in current_year..before_year %}<option value="{{ i }}"></option>{% endfor %}</select></div>
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