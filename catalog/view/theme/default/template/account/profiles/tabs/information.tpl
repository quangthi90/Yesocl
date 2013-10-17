{% block profiles_tabs_information %}
<div id="profiles-tabs-information" class="profiles-tabs" data-url="{{ path('ProfileEditInfo') }}">
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
			<div class="row-fluid profile-label">
				<div class="profiles-tabs-main-header">
					<a class="profiles-btn-edit viewers btn profiles-btn pull-right"><i class="icon-pencil"></i></a>
					<div class="clear"></div>
				</div>
				<div class="profiles-tabs-main-body">
					<div class="basic-profiles-item">
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
									<div class="email-item {% if (email.primary) %}email-primary{% endif %}">
									<span class="label {% if (email.primary) %}label-success{% endif %}"><i class="icon-envelope"></i></span>
									<span class="profiles-tabs-value viewers">{{ email.email }}</span> 
									</div>
				        			{% endfor %}
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span2 offset1">Phone</div>
							<div class="span9">
								<div class="row-fluid">
									{% for phone in user.phones %}
									<div class="phones-item">
										<span><i class="icon-phone"></i></span>
										<span>{{ phone.phone }}</span>
									</div>
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
			<div class="row-fluid profile-form hidden" data-url="{{ path('ProfileEditInfo') }}">
				<div class="profiles-tabs-main-header">
					<a class="profiles-btn-cancel btn profiles-btn pull-right">
						<i class="icon-mail-forward"></i>
					</a>
					<a class="profiles-btn-save btn profiles-btn pull-right">
						<i class="icon-save"></i>
					</a>
					<div class="clear"></div>
				</div>
				<div class="profiles-tabs-main-body">
					<div class="basic-profiles-form" 
						data-url="{{ path('ProfileEditInfo') }}">
						<div class="row-fluid">
							<div class="span2 offset1">Username</div>
							<div class="span9 control-group" data-url="{{ link_validate_username }}">
								<input class="span5" type="text" placeholder="Username" name="username" value="{{ user.username }}" required="required" />
							</div>
						</div>
						<div class="row-fluid">
							<div class="span2 offset1">Fullname</div>
							<div class="span9">
								<span class="control-group" data-url="{{ link_validate_firstname }}">
									<input class="span3" type="text" placeholder="Firstname" name="firstname" value="{{ user.firstname }}" required="required" />
								</span> 
								<span class="control-group" data-url="{{ link_validate_lastname }}">
									<input class="span2" type="text" placeholder="Lastname" name="lastname" value="{{ user.lastname }}" required="required" />
								</span>
							</div>
						</div>
						<div class="row-fluid profile-content-set">
							<div class="span2 offset1">Email</div>
							<div class="span9">
								<div class="row-fluid">
									{% for email in user.emails %}
									<div class="emails-form control-group {% if email.primary == 1 %}email-primary{% endif %}" 
										data-primary="{{ email.primary }}">
										<input class="span5 email" type="text" placeholder="Email" name="emails[{{ loop.index0 }}][email]" value="{{ email.email }}" />
										<input type="hidden" name="emails[{{ loop.index0 }}][primary]" value="{{ email.primary }}" class="primary" /> 
										<span class="label primary-email-btn {% if email.primary == 1 %}label-success{% endif %}">primary</span> 
										<a class="btn btn-danger btn-remove emails-btn-remove" href="#"><i class="icon-trash"></i></a>
									</div>
									{% endfor %}
									<a class="btn btn-success btn-add emails-btn-add" href="#" data-index="{{ user.emails|length }}">
										<i class="icon-plus"></i> <i class="icon-envelope"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="row-fluid profile-content-set">
							<div class="span2 offset1">Phone</div>
							<div class="span9">
								<div class="row-fluid">
									{% for phone in user.phones %}
									<div class="phones-form control-group" 
										data-id="{{ phone.id }}" 
										data-type="{{ phone.type }}">
										<input class="span5 phone" type="text" placeholder="Input Text" name="phones[{{ loop.index0 }}][phone]" value="{{ phone.phone }}" required="required" data-format="+84 dddd ddd dddd" /> 
										<select class="span3 type" name="phones[{{ loop.index0 }}][type]">
										{% for phonetype in phone_types %}
											<option {% if phone.type == phonetype.code %}selected="selected"{% endif %} value="{{ phonetype.code }}">{{ phonetype.text }}</option>
										{% endfor %}
										</select> 
										<a class="btn btn-danger btn-remove phones-btn-remove" href="#"><i class="icon-trash"></i></a>
									</div>
									{% endfor %}
									<a class="btn btn-success btn-add phones-btn-add" href="#" data-index="{{ user.phones|length }}">
										<i class="icon-plus"></i> <i class="icon-phone"></i>
									</a>
								</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span2 offset1">Gender</div>
							<div class="span9 control-group">
								<select class="span5" name="gender">
									{% if user.sex == 1 %}
									<option value="1" selected="selected">Male</option>
									<option value="0">Female</option>
									{% else %}
									<option value="1">Male</option>
									<option value="0" selected="selected">Female</option>
									{% endif %}
								</select>
							</div>
						</div>
						<div class="row-fluid inputBirthday">
							<div class="span2 offset1">Birthday</div>
							<div class="span9 bfh-datepicker" data-format="d/m/y" data-date="{{ user.birthday }}">
							  	<div class="input-prepend bfh-datepicker-toggle control-group" data-toggle="bfh-datepicker">
							    	<span class="add-on btn"><i class="icon-calendar"></i></span>
							    	<input type="text" name="birthday" class="input-medium" value="{{ user.birthday }}" readonly />
							  	</div>
							  	<div class="bfh-datepicker-calendar">
							    	<table class="calendar table table-bordered">
							      		<thead>
									        <tr class="months-header">
									          	<th class="month" colspan="4">
									            	<a class="previous" href="#"><i class="icon-chevron-left"></i></a>
									            	<span></span>
									            	<a class="next" href="#"><i class="icon-chevron-right"></i></a>
									          	</th>
									          	<th class="year" colspan="3">
									            	<a class="previous" href="#"><i class="icon-chevron-left"></i></a>
									            	<span></span>
									            	<a class="next" href="#"><i class="icon-chevron-right"></i></a>
									          	</th>
									        </tr>
									        <tr class="days-header">
									        </tr>
							      		</thead>
							      		<tbody>
							      		</tbody>
							    	</table>
							  	</div>
							</div>
						</div>
						<div class="row-fluid">
							<div class="span2 offset1">Address</div>
							<div class="span9 control-group">
								<input class="span5" type="text" placeholder="Address" name="address" value="{{ user.address }}" required="required" />
							</div>
						</div>
						<div class="row-fluid">
							<div class="span2 offset1">Living</div>
							<div class="span9 control-group" data-autocomplete="{{ path('LocationAutoComplete') }}">
								<input class="span5" type="text" placeholder="Living" name="location" value="{{ user.location }}" />
								<input type="hidden" name="cityid" value="{{ user.cityid }}" />
							</div>
						</div>
						<div class="row-fluid">
							<div class="span2 offset1">Industry</div>
							<div class="span9 control-group" data-autocomplete="{{ path('IndustryAutoComplete') }}">
								<input class="span5" type="text" placeholder="Industry" name="industry" value="{{ user.industry }}" />
								<input type="hidden" name="industryid" value="{{ user.industryid }}" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
<script id="profiles-form" type="text/x-jquery-tmpl">
	<div class="row-fluid profile-form hidden" data-url="{{ path('ProfileEditInfo') }}">
		<div class="profiles-tabs-main-header">
			<a class="profiles-btn-cancel btn profiles-btn pull-right">
				<i class="icon-mail-forward"></i>
			</a>
			<a class="profiles-btn-save btn profiles-btn pull-right">
				<i class="icon-save"></i>
			</a>
			<div class="clear"></div>
		</div>
		<div class="profiles-tabs-main-body">
			<div class="basic-profiles-form">
				<div class="row-fluid">
					<div class="span2 offset1">Username</div>
					<div class="span9 control-group" data-url="{{ link_validate_username }}">
						<input class="span5" type="text" placeholder="Input Text" name="username" value="${ username }" required="required" />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span2 offset1">Fullname</div>
					<div class="span9">
						<span class="control-group" data-url="{{ link_validate_firstname }}">
							<input class="span3" type="text" placeholder="Input Text" name="firstname" value="${ firstname }" required="required" />
						</span> 
						<span class="control-group" data-url="{{ link_validate_lastname }}">
							<input class="span2" type="text" placeholder="Input Text" name="lastname" value="${ lastname }" required="required" />
						</span>
					</div>
				</div>
				<div class="row-fluid profile-content-set">
					<div class="span2 offset1">Email</div>
					<div class="span9">
						<div class="row-fluid">
							{% set email_loop = '{{each emails}}' %}
							{% set email_loop_end = '{{/each}}' %}
							{% set primary_if = '{{if $value.primary == 1}}' %}
							{% set primary_if_end = '{{/if}}' %}
							{{ email_loop }}
							<div class="emails-form control-group {{ primary_if }}email-primary{{ primary_if_end }}" 
								data-primary="${ $value.primary }" 
								data-url="{{ link_validate_email }}">
								<input class="span5 email" type="text" placeholder="Input Text" name="emails[${ $index }][email]" value="${ $value.email }" />
								<input class="primary" type="hidden" name="emails[${ $index }][primary]" value="${ $value.primary }" required="required" /> 
								<span class="label primary-email-btn {{ primary_if }}label-success{{ primary_if_end }}">primary</span> 
								<a class="btn btn-danger btn-remove emails-btn-remove" href="#"><i class="icon-trash"></i></a>
							</div>
							{{ email_loop_end }}
							<a class="btn btn-success btn-add emails-btn-add " href="#" data-index="${ Object.keys(emails).length }">
								<i class="icon-plus"></i> <i class="icon-envelope"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="row-fluid profile-content-set">
					<div class="span2 offset1">Phone</div>
					<div class="span9">
						<div class="row-fluid">
							{% set phone_loop = '{{each phones}}' %}
							{% set phone_loop_end = '{{/each}}' %}
							{{ phone_loop }}
							<div class="phones-form control-group" 
								data-id="${ $value.id }" 
								data-type="${ $value.type }" 
								data-url="{{ link_validate_phone }}">
								<input class="span5 phone" type="text" placeholder="Input Text" name="phones[${ $index }][phone]" value="${ $value.phone }" required="required" /> 
								<select class="span3 type" name="phones[${ $index }][type]">
								{% for phonetype in phone_types %}
									<option value="{{ phonetype.code }}" {% raw %}{{if $value.type == '{% endraw %}{{ phonetype.code }}{% raw %}'}}{% endraw %}selected="selected"{% raw %}{{/if}}{% endraw %}>{{ phonetype.text }}</option>
								{% endfor %}
								</select> 
								<a class="btn btn-danger btn-remove phones-btn-remove" href="#"><i class="icon-trash"></i></a>
							</div>
							{{ phone_loop_end }}
							<a class="btn btn-success btn-add phones-btn-add" href="#" data-index="${ Object.keys(phones).length }">
								<i class="icon-plus"></i> <i class="icon-phone"></i>
							</a>
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span2 offset1">Sex</div>
					<div class="span9 control-group" data-url="{{ link_validate_sex }}">
						<select class="span5" name="sex">
							<option value="1">Male</option>
							<option value="0">Female</option>
						</select>
					</div>
				</div>
				<div class="row-fluid inputBirthday">
					<div class="span2 offset1">Birthday</div>
					<div class="span9 bfh-datepicker" data-format="d/m/y" data-date="${ birthday }">
					  	<div class="input-prepend bfh-datepicker-toggle control-group" data-toggle="bfh-datepicker" data-url="{{ link_validate_birthday }}">
					    	<span class="add-on btn"><i class="icon-calendar"></i></span>
					    	<input type="text" name="birthday" class="input-medium" value="${ birthday }" readonly />
					  	</div>
					  	<div class="bfh-datepicker-calendar">
					    	<table class="calendar table table-bordered">
					      		<thead>
							        <tr class="months-header">
							          	<th class="month" colspan="4">
							            	<a class="previous" href="#"><i class="icon-chevron-left"></i></a>
							            	<span></span>
							            	<a class="next" href="#"><i class="icon-chevron-right"></i></a>
							          	</th>
							          	<th class="year" colspan="3">
							            	<a class="previous" href="#"><i class="icon-chevron-left"></i></a>
							            	<span></span>
							            	<a class="next" href="#"><i class="icon-chevron-right"></i></a>
							          	</th>
							        </tr>
							        <tr class="days-header">
							        </tr>
					      		</thead>
					      		<tbody>
					      		</tbody>
					    	</table>
					  	</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span2 offset1">Address</div>
					<div class="span9 control-group" data-url="{{ link_validate_address }}">
						<input class="span5" type="text" placeholder="Input Text" name="address" value="${ address }" required="required" />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span2 offset1">Living</div>
					<div class="span9 control-group" data-autocomplete="{{ path('LocationAutoComplete') }}">
						<input class="span5" type="text" placeholder="Input Text" name="location" value="${ location }" />
						<input type="hidden" name="cityid" value="${ cityid }" />
					</div>
				</div>
				<div class="row-fluid">
					<div class="span2 offset1">Industry</div>
					<div class="span9 control-group" data-autocomplete="{{ path('IndustryAutoComplete') }}">
						<input class="span5" type="text" placeholder="Input Text" name="industry" value="${ industry }" />
						<input type="hidden" name="industryid" value="${ industryid }" />
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
<script id="profiles-phone-form" type="text/x-jquery-tmpl">
    <div class="phones-form control-group" data-url="{{ link_validate_phone }}">
    	<input class="span5 phone" type="text" placeholder="Input Text" name="phones[${ index }][phone]"/> 
    	<select class="span3 type" name="phones[${ index }][type]">
    	{% for phonetype in phone_types %}
    		<option value="{{ phonetype.code }}">{{ phonetype.text }}</option>
    	{% endfor %}
    	</select> 
    	<a class="btn btn-danger btn-remove phones-btn-remove" href="#"><i class="icon-trash"></i></a>
    </div>
</script>
<script id="profiles-email-form" type="text/x-jquery-tmpl">
    <div class="emails-form control-group" data-url="{{ link_validate_email }}">
    	<input class="span5 email" type="text" placeholder="Input Text" name="emails[${ index }][email]" value="" />
    	<input class="primary" type="hidden" name="emails[${ index }][primary]" value="0" /> 
    	<span class="label primary-email-btn">primary</span> 
    	<a class="btn btn-danger btn-remove emails-btn-remove" href="#"><i class="icon-trash"></i></a>
    </div>
</script>
<script id="profiles-label" type="text/x-jquery-tmpl">
	<div class="row-fluid profile-label">
		<div class="profiles-tabs-main-header">
			<a class="profiles-btn-edit viewers btn profiles-btn pull-right"><i class="icon-pencil"></i></a>
			<div class="clear"></div>
		</div>
		<div class="profiles-tabs-main-body">
			<div class="basic-profiles-item">
				<div class="row-fluid">
					<div class="span2 offset1">Username</div>
					<div class="span9">
						<span class="profiles-tabs-value viewers">${ username }</span>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span2 offset1">Fullname</div>
					<div class="span9">
						<span class="profiles-tabs-value viewers">${ fullname }</span>
					</div>
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
							<div class="email-item {{primary_if}}email-primary{{primary_if_end}}">
								<span class="label {{primary_if}}label-success{{primary_if_end}}">
									<i class="icon-envelope"></i>
								</span>
								<span class="profiles-tabs-value viewers">${ $value.email }</span>
							</div>
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
							<div class="phones-item">
								<span><i class="icon-phone"></i></span>
								<span>${ $value.phone }</span>
							</div>
							{{ phone_loop_end }}
						</div>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span2 offset1">Gender</div>
					<div class="span9">
						<span class="profiles-tabs-value viewers">${ sext }</span>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span2 offset1">Birthday</div>
					<div class="span9">
						<span class="profiles-tabs-value viewers">${ birthdayt }</span>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span2 offset1">Address</div>
					<div class="span9">
						<span class="profiles-tabs-value viewers">${ address }</span>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span2 offset1">Living</div>
					<div class="span9">
						<span class="profiles-tabs-value viewers">${ location }</span>
					</div>
				</div>
				<div class="row-fluid">
					<div class="span2 offset1">Industry</div>
					<div class="span9">
						<span class="profiles-tabs-value viewers">${ industry }</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</script>
{% endblock %}

{% block profiles_tabs_information_javascript %}
{% endblock %}