{% block register_tabs_step2 %}
<div class="row-fluid register-box register-step2">
	<div class="span12 register-box-step">
		<div class="row-fluid">
			<h2 class="span11 offset1 register-box-title">
				<i class="icon-envelope-alt"></i> Adding Email
			</h2>
		</div>
		<div class="row-fluid register-add-email">
			<div class="span12">
				<div class="row-fluid">
					<h5 class="span11 offset1 register-note">Get start adding your email address</h5>
				</div>
	    		<div class="row-fluid connect-email">
	    			<div class="span10 offset1">
	    				<ul class="nav nav-tabs">
						  <li class="active">
						  	<a href="#gmail-contact" data-toggle="tab">
						  		<i class="cicon-gmail"></i>Gmail
						  	</a>	
				  	      </li>
						  <li>
						  	<a href="#yahoo-contact" data-toggle="tab">
						  		<i class="cicon-yahoo"></i> Yahoo
					  		</a>
						  </li>
						  <li>
						  	<a href="#facebook-contact" data-toggle="tab">
						  		<i class="cicon-facebook"></i> Facebook
						  	</a>
						  </li>
						</ul>
						<div class="tab-content">
						  <div class="tab-pane fade in active email-filling" id="gmail-contact">						  	
						  	<input type="text" class="email-control" id="g-mail" placeholder="Type Gmail Id">
						  	<span class="tag-append">@gmail.com</span>
						  </div>
						  <div class="tab-pane fade email-filling" id="yahoo-contact">
						  	<input type="text" class="email-control" id="g-mail" placeholder="Type Yahoo Id">
						  	<select name="tag-append">
						  		<option>@yahoo.com</option>
						  		<option>@yahoo.com.vn</option>
						  	</select>
						  </div>
						  <div class="tab-pane fade email-filling" id="facebook-contact">
						  	<input type="text" class="email-control" id="g-mail" placeholder="Type Facebook Id">
						  	<span class="tag-append">@facebook.com</span>
						  </div>
						</div>
	    			</div>
	    		</div>
			    <div class="space-line-20"></div>
			    <div class="row-fluid">
			    	<div class="span11 offset1">
			    		<a href="#myCarousel" data-slide="next"><button class="btn btn-yes">Continue</button></a>
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
</div>
{% endblock %}

{% block register_tabs_step2_javascript %}
{% endblock %}