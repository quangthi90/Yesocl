{% block register_tabs_step1 %}
<div class="row-fluid register-box register-step1">
	<div class="span1 offset1 register-box-left register-box-extend">
		<div class="register-box-background"></div>
	</div>
	<div class="span10 register-box-step">
		<h2 class="row-fluid">
			<span class="span11 offset1 register-box-title">{{ text_introdure_your_self }}</span>
		</h2>
		<div class="row-fluid">
    		<form class="form-horizontal span7">
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputLocation">{{ text_live_in }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputLocation" placeholder="{{ text_location_placer }}">
				    	{% if not(error_location is empty) %}<span class="yes-warning">{{ error_location }}</span>{% endif %}
				    </div>
			    </div>
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputPostal">{{ text_postal_code }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputPostal" placeholder="{{ text_post_code_placer }}">
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
				{% if current == 0 %}
			    <!-- job seeker -->
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputIndustry">{{ text_industry }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputIndustry" placeholder="{{ text_industry_placer }}">
				    	{% if not(error_industry is empty) %}<span class="yes-warning">{{ error_industry }}</span>{% endif %}
				    </div>
			    </div>
			    <!-- end job seeker -->
				{% elseif current == 1 %}
			    <!-- student -->
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputSchool">{{ text_school }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputSchool" placeholder="{{ text_school_placer }}">
				    	{% if not(error_school is empty) %}<span class="yes-warning">{{ error_school }}</span>{% endif %}
				    </div>
			    </div>
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputFieldOfStudy">{{ text_fieldofstudy }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputFieldOfStudy" placeholder="{{ text_fieldofstudy_placer }}">
				    	{% if not(error_fieldofstudy is empty) %}<span class="yes-warning">{{ error_fieldofstudy }}</span>{% endif %}
				    </div>
			    </div>
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputFrom">{{ text_from }}</label>
				    <div class="controls span9">
						<select class="span2" name="school[start][year]">
							{% for i in current_year..before_year %}
							<option value="{{ i }}">{{ i }}</option>
							{% endfor %}
						</select> 
				    </div>
			    </div>
			    <!-- end student -->
				{% else %}
			    <!-- employed -->
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputCompany">{{ text_company }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputCompany" placeholder="{{ text_company_placer }}">
				    	{% if not(error_company is empty) %}<span class="yes-warning">{{ error_company }}</span>{% endif %}
				    </div>
			    </div>
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputJob">{{ text_job_title }}</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputJob" placeholder="{{ text_job_title_placer }}">
				    	{% if not(error_job_title is empty) %}<span class="yes-warning">{{ error_job_title }}</span>{% endif %}
				    </div>
			    </div>
			    <div class="control-group row-fluid">
				    <div class="controls span9 offset3">
					    <label>
					    	<input type="checkbox"> {{ text_self_employed }}
					    </label>
				    </div>
			    </div>
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputFrom">{{ text_from }}</label>
				    <select class="span2" name="company[start][month]" id="inputFrom">
						{% for i in 1..12 %}
						<option value="{{ i }}">{{ i }}</option>
						{% endfor %}
					</select> 
					<select class="span2" name="company[start][year]">
						{% for i in current_year..before_year %}
						<option value="{{ i }}">{{ i }}</option>
						{% endfor %}
					</select> 
			    </div>
			    <!-- end employed -->
            	{% endif %}
			    <div class="control-group row-fluid">
				    <div class="controls span9 offset3">
				    	<a href="#myCarousel" data-slide="next"><button class="btn btn-success">{{ text_create_profile }}</button></a>
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
	<div class="span1 register-box-right register-box-extend">
		<div class="register-box-background"></div>
	</div>
</div>
{% endblock %}

{% block register_tabs_step1_javascript %}
{% endblock %}