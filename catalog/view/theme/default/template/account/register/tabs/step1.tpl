{% block register_tabs_step1 %}
<div class="row-fluid register-box register-step1">
	<div class="span1 offset1 register-box-left register-box-extend">
		<div class="register-box-background"></div>
	</div>
	<div class="span10 register-box-step">
		<h2 class="row-fluid">
			<span class="span11 offset1 register-box-title">Introduce your self</span>
		</h2>
		<div class="row-fluid">
    		<form class="form-horizontal span7">
			    <div class="control-group">
				    <label class="control-label" for="inputLocation">I live in</label>
				    <div class="controls">
				    	<input class="input-xlarge" type="text" id="inputLocation" placeholder="Input Text">
				    </div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputPostal">Postal code</label>
				    <div class="controls">
				    	<input class="input-xlarge" type="text" id="inputPostal" placeholder="Input Text">
				    </div>
			    </div>
			    <div class="control-group">
			    	<label class="control-label">I am current</label>
				    <div class="controls">
					    <label class="radio inline">
					    	<input type="radio" name="current"> Employed
					    </label>
					    <label class="radio inline">
					    	<input type="radio" name="current"> Job Seeker
					    </label>
					    <label class="radio inline">
					    	<input type="radio" name="current"> Student
					    </label>
				    </div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputJob">Job title</label>
				    <div class="controls">
				    	<input class="input-xlarge" type="text" id="inputJob" placeholder="Input Text">
				    </div>
			    </div>
			    <div class="control-group">
				    <div class="controls">
					    <label class="checkbox">
					    	<input type="checkbox"> I am a self-employed
					    </label>
				    </div>
			    </div>
			    <div class="control-group">
				    <label class="control-label" for="inputCompany">Company</label>
				    <div class="controls">
				    	<input class="input-xlarge" type="text" id="inputCompany" placeholder="Input Text">
				    </div>
			    </div>
			    <div class="control-group">
				    <div class="controls">
				    	<a href="#myCarousel" data-slide="next"><button class="btn btn-success">Create my profile</button></a>
				    </div>
			    </div>
		    </form>
		    <div class="span4">
		    	<div class="register-box-recommend">
		    		<div class="row-fluid register-recommend-heading">
				    	<i class="regisert-recommend-icon"></i>
				    	<h5>A Yesocl profile helps you...</h5>
				    </div>
			    	<div class="row-fluid register-recommend-content">
			    		<p>Showcase your skills and experience</p>
			    		<p>Be found for new opportunities</p>
			    		<p>Stay in touch with colleagues and friends</p>
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