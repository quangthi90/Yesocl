{% block register_tabs_step1 %}
<div class="row-fluid register-box register-step1">
	<div class="span12 register-box-step">
		<div class="row-fluid">
			<h2 class="span11 offset1 register-box-title">
				<i class="icon-suitcase"></i> {{ text_introdure_your_self }}
			</h2>
		</div>
		<div class="row-fluid">
    		<form class="form-horizontal span7">
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputLocation">{{ text_live_in }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputLocation" name="location" placeholder="{{ text_location_placer }}" value="{{ location }}" data-url="{{ link_autocomplete_location }}">
				    	<input type="hidden" name="city_id" value="{{ city_id }}">
				    	{% if not(error_location is empty) %}<span class="yes-warning">{{ error_location }}</span>{% endif %}
				    </div>
			    </div>
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputPostal">{{ text_postal_code }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputPostal" name="postal_code" placeholder="{{ text_post_code_placer }}" value="{{ postal_code }}">
				    	{% if not(error_postal_code is empty) %}<span class="yes-warning">{{ error_postal_code }}</span>{% endif %}
				    </div>
			    </div>
			    <div class="control-group row-fluid">
			    	<label class="control-label span2 offset1">{{ text_i_current }}</label>
				    <div class="controls span9">
				    	{% if current == 0 %}
					    <label class="radio inline">
					    	<input type="radio" name="current" value="2"> {{ text_employed }}
					    </label>
					    <label class="radio inline">
					    	<input type="radio" name="current" value="0" checked="checked"> {{ text_job_seeker }}
					    </label>
					    <label class="radio inline">
					    	<input type="radio" name="current" value="1"> {{ text_student }}
					    </label>
				    	{% elseif current == 1 %}
					    <label class="radio inline">
					    	<input type="radio" name="current" value="2"> {{ text_employed }}
					    </label>
					    <label class="radio inline">
					    	<input type="radio" name="current" value="0"> {{ text_job_seeker }}
					    </label>
					    <label class="radio inline">
					    	<input type="radio" name="current" value="1" checked="checked"> {{ text_student }}
					    </label>
				    	{% else %}
					    <label class="radio inline">
					    	<input type="radio" name="current" value="2" checked="checked"> {{ text_employed }}
					    </label>
					    <label class="radio inline">
					    	<input type="radio" name="current" value="0"> {{ text_job_seeker }}
					    </label>
					    <label class="radio inline">
					    	<input type="radio" name="current" value="1"> {{ text_student }}
					    </label>
            			{% endif %}
				    </div>
			    </div>
			    <div id="current-input-step1"></div>
				{% if current == 0 %}
			    <div class="control-group row-fluid job-seeker-input">
				    <label class="control-label span2 offset1" for="inputIndustry">{{ text_industry }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputIndustry" name="industry" placeholder="{{ text_industry_placer }}" value="{{ industry }}" data-url="{{ link_autocomplete_title }}">
				    	<input type="hidden" name="industry_id" value="{{ industry_id }}">
				    	{% if not(error_industry is empty) %}<span class="yes-warning">{{ error_industry }}</span>{% endif %}
				    </div>
			    </div>
				{% elseif current == 1 %}
			    <div class="control-group row-fluid student-input">
				    <label class="control-label span2 offset1" for="inputSchool">{{ text_school }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputSchool" name="school[name]" placeholder="{{ text_school_placer }}" value="{{ school.name }}" data-url="{{ link_autocomplete_school }}">
				    	<input type="hidden" name="school[id]" value="{{ school.id }}">
				    	{% if not(error_school is empty) %}<span class="yes-warning">{{ error_school }}</span>{% endif %}
				    </div>
			    </div>
			    <div class="control-group row-fluid student-input">
				    <label class="control-label span2 offset1" for="inputFieldOfStudy">{{ text_fieldofstudy }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputFieldOfStudy" name="school[fieldofstudy]" placeholder="{{ text_fieldofstudy_placer }}" value="{{ school.fieldofstudy }}" data-url="{{ link_autocomplete_fieldofstudy }}">
				    	{% if not(error_fieldofstudy is empty) %}<span class="yes-warning">{{ error_fieldofstudy }}</span>{% endif %}
				    </div>
			    </div>
			    <div class="control-group row-fluid student-input">
				    <label class="control-label span2 offset1" for="inputFrom">{{ text_from }}</label>
				    <div class="controls span9">
						<select class="span2" name="school[start]">
							{% for i in current_year..before_year %}
							<option value="{{ i }}" {% if school.start == i %}checked="checked"{% endif %}>{{ i }}</option>
							{% endfor %}
						</select> 
				    </div>
			    </div>
				{% else %}
			    <div class="control-group row-fluid employed-input">
				    <label class="control-label span2 offset1" for="inputCompany">{{ text_company }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputCompany" name="company[name]" placeholder="{{ text_company_placer }}" value="{{ company.name }}" data-url="{{ link_autocomplete_company }}">
				    	{% if not(error_company is empty) %}<span class="yes-warning">{{ error_company }}</span>{% endif %}
				    	<input type="hidden" name="company[id]" value="{{ company.id }}" />
				    </div>
			    </div>
			    <div class="control-group row-fluid employed-input">
				    <label class="control-label span2 offset1" for="inputJob">{{ text_job_title }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputJob" name="company[title]" placeholder="{{ text_job_title_placer }}" value="{{ company.title }}" data-url="{{ link_autocomplete_title }}">
				    	{% if not(error_job_title is empty) %}<span class="yes-warning">{{ error_job_title }}</span>{% endif %}
				    </div>
			    </div>
			    <div class="control-group row-fluid employed-input">
				    <div class="controls span9 offset3">
					    <label>
					    	<input type="checkbox" value="1" name="company[self_employed]" {% if company.self_employed %}checked="checked"{% endif %}> {{ text_self_employed }}
					    </label>
				    </div>
			    </div>
			    <div class="control-group row-fluid employed-input">
				    <label class="control-label span2 offset1" for="inputFrom">{{ text_from }}</label>
				    <div class="controls span9">
				    	<select class="span2" name="company[start][month]" id="inputFrom">
							{% for i in 1..12 %}
							<option value="{{ i }}" {%if company.start.month == i %}checked="checked"{% endif %}>{{ i }}</option>
							{% endfor %}
						</select> 
						<select class="span2" name="company[start][year]">
							{% for i in current_year..before_year %}
							<option value="{{ i }}" {%if company.start.year == i %}checked="checked"{% endif %}>{{ i }}</option>
							{% endfor %}
						</select> 
				    </div>
			    </div>
            	{% endif %}
			    <div class="control-group row-fluid">
				    <div class="controls span9 offset3">
				    	<a href="#myCarousel" data-slide="next"><button class="btn btn-yes" id="btn-finished-step1">{{ text_create_profile }}</button></a>
				    </div>
			    </div>
		    </form>
		    <div class="span4">
		    	<div class="register-box-recommend">
		    		<div class="row-fluid register-recommend-heading">
		    			<div class="span12">
					    	<i class="regisert-recommend-icon"></i>
					    	<h5>{{ text_profile_recommend }}</h5>
					    </div>
				    </div>
			    	<div class="row-fluid register-recommend-content">
			    		<div class="span12">
				    		<p>{{ text_recommend_1 }}</p>
				    		<p>{{ text_recommend_2 }}</p>
				    		<p>{{ text_recommend_3 }}</p>
				    	</div>
			    	</div>
			    </div>
		    </div>
		</div>
	</div>
</div>
{% endblock %}

{% block register_tabs_step1_javascript %}
<script id="employed-inputs" type="text/x-jquery-tmpl">
	<div class="control-group row-fluid employed-input">
	    <label class="control-label span2 offset1" for="inputCompany">{{ text_company }}</label>
	    <div class="controls span9">
	    	<input class="span11" type="text" id="inputCompany" name="company[name]" placeholder="{{ text_company_placer }}" value="{{ company.name }}" data-url="{{ link_autocomplete_company }}">
	    	<input type="hidden" name="company[id]" value="{{ company.id }}" />
	    </div>
    </div>
    <div class="control-group row-fluid employed-input">
	    <label class="control-label span2 offset1" for="inputJob">{{ text_job_title }}</label>
	    <div class="controls span9">
	    	<input class="span11" type="text" id="inputJob" name="company[title]" placeholder="{{ text_job_title_placer }}" value="{{ company.title }}" data-url="{{ link_autocomplete_title }}">
	    </div>
    </div>
    <div class="control-group row-fluid employed-input">
	    <div class="controls span9 offset3">
		    <label>
		    	<input type="checkbox" value="1" name="company[self_employed]" {% if company.self_employed %}checked="checked"{% endif %}> {{ text_self_employed }}
		    </label>
	    </div>
    </div>
    <div class="control-group row-fluid employed-input">
	    <label class="control-label span2 offset1" for="inputFrom">{{ text_from }}</label>
	    <div class="controls span9">
	    	<select class="span2" name="company[start][month]" id="inputFrom">
				{% for i in 1..12 %}
				<option value="{{ i }}" {%if company.start.month == i %}checked="checked"{% endif %}>{{ i }}</option>
				{% endfor %}
			</select> 
			<select class="span2" name="company[start][year]">
				{% for i in current_year..before_year %}
				<option value="{{ i }}" {%if company.start.year == i %}checked="checked"{% endif %}>{{ i }}</option>
				{% endfor %}
			</select> 
	    </div>	    
    </div>
</script>
<script id="student-inputs" type="text/x-jquery-tmpl">
	<div class="control-group row-fluid student-input">
	    <label class="control-label span2 offset1" for="inputSchool">{{ text_school }}</label>
	    <div class="controls span9">
	    	<input class="span11" type="text" id="inputSchool" name="school[name]" placeholder="{{ text_school_placer }}" value="{{ school.name }}"  data-url="{{ link_autocomplete_school }}">
	    	<input type="hidden" name="school[id]" value="{{ school.id }}">
	    </div>
    </div>
    <div class="control-group row-fluid student-input">
	    <label class="control-label span2 offset1" for="inputFieldOfStudy">{{ text_fieldofstudy }}</label>
	    <div class="controls span9">
	    	<input class="span11" type="text" id="inputFieldOfStudy" name="school[fieldofstudy]" placeholder="{{ text_fieldofstudy_placer }}" value="{{ school.fieldofstudy }}" data-url="{{ link_autocomplete_fieldofstudy }}">
	    </div>
    </div>
    <div class="control-group row-fluid student-input">
	    <label class="control-label span2 offset1" for="inputFrom">{{ text_from }}</label>
	    <div class="controls span9">
			<select class="span2" name="school[start]">
				{% for i in current_year..before_year %}
				<option value="{{ i }}" {% if school.start == i %}checked="checked"{% endif %}>{{ i }}</option>
				{% endfor %}
			</select> 
	    </div>
    </div>
</script>
<script id="job-seeker-inputs" type="text/x-jquery-tmpl">
	<div class="control-group row-fluid job-seeker-input">
	    <label class="control-label span2 offset1" for="inputIndustry">{{ text_industry }}</label>
	    <div class="controls span9">
	    	<input class="span11" type="text" id="inputIndustry" name="industry" placeholder="{{ text_industry_placer }}" value="{{ industry }}" data-url="{{ link_autocomplete_title }}">
	    	<input type="hidden" name="industry_id" value="{{ industry_id }}">
	    </div>
    </div>
</script>
<script id="yes-warning-tpl" type="text/x-jquery-tmpl">
	<span class="yes-warning">${error}</span>
</script>
{% endblock %}