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
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputLocation">I live in</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputLocation" placeholder="Input Text">
				    	<span class="yes-warning">Field is required</span>
				    </div>
			    </div>
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputPostal">Postal code</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputPostal" placeholder="Input Text">
				    	<span class="yes-warning">Field is required</span>
				    </div>
			    </div>
			    <div class="control-group row-fluid">
			    	<label class="control-label span2 offset1">I am current</label>
				    <div class="controls span9">
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
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputJob">Job title</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputJob" placeholder="Input Text">
				    	<span class="yes-warning">Field is required</span>
				    </div>
			    </div>
			    <div class="control-group row-fluid">
				    <div class="controls span9 offset3">
					    <label>
					    	<input type="checkbox"> I am a self-employed
					    </label>
				    </div>
			    </div>
			    <div class="control-group row-fluid">
				    <label class="control-label span2 offset1" for="inputCompany">Company</label>
				    <div class="controls span9">
				    	<input class="span11" type="text" id="inputCompany" placeholder="Input Text">
				    	<span class="yes-warning">Field is required</span>
				    </div>
			    </div>
			    <div class="control-group row-fluid">
				    <div class="controls span9 offset3">
				    	<a href="#myCarousel" data-slide="next"><button class="btn btn-success">Create my profile</button></a>
				    </div>
			    </div>
		    </form>
		    <div class="span4">
		    	<div class="register-box-recommend">
		    		<div class="row-fluid register-recommend-heading">
		    			<div class="span12">
					    	<i class="regisert-recommend-icon"></i>
					    	<h5>A Yesocl profile helps you...</h5>
					    </div>
				    </div>
			    	<div class="row-fluid register-recommend-content">
			    		<div class="span12">
				    		<p>Showcase your skills and experience</p>
				    		<p>Be found for new opportunities</p>
				    		<p>Stay in touch with colleagues and friends</p>
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