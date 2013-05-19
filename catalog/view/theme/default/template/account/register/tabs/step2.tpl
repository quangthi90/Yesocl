{% block register_tabs_step2 %}
<div class="row-fluid register-box register-step2">
	<div class="span1 offset1 register-box-left register-box-extend">
		<div class="register-box-background"></div>
	</div>
	<div class="span10 register-box-step">
		<h2 class="row-fluid">
			<span class="span11 offset1 register-box-title">Adding Email</span>
		</h2>
		<div class="row-fluid register-step2-content">
			<div class="span12">
				<div class="row-fluid">
					<h5 class="span11 offset1 register-note">Get start adding your email address</h5>
				</div>
	    		<form class="form-horizontal row-fluid">
	    			<div class="span10 offset1 register-add-email">
					    <div class="control-group">
						    <label class="control-label" for="inputLocation"><span>Your email</span></label>
						    <div class="controls">
						    	<input type="text" id="inputLocation" placeholder="Input Text">
						    	<button class="inline"><i class="icon-plus"></i></button>
						    </div>
					    </div>
					</div>
			    </form>
			    <div class="row-fluid">
			    	<div class="span11 offset1">
			    		<a href="#myCarousel" data-slide="next"><button class="btn btn-success">Continue</button></a>
			    	</div>
			    </div>
			    <div class="row-fluid space-top-20px">
			    	<div class="span11 offset1">
			    		<p>We will not store your password or email anyone without your permission</p>
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

{% block register_tabs_step2_javascript %}
{% endblock %}