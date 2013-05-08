{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}Sign up for Yesocl{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/register.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1 row-fluid">
	<div id="y-main-content">
		<div id="myCarousel" class="carousel slide">
		  	<!-- Carousel items -->
		  	<div class="carousel-inner">
		  		<div class="active item">
				    <div class="row-fluid register-box">
				    	<div class="span1 offset2 register-box-left register-box-extend">
				    		<div class="register-box-background"></div>
				    	</div>
				    	<div class="span8 register-box-step">
				    		<h2 class="row-fluid">
				    			<span class="span11 offset1 register-box-title">Introduce your self</span>
				    		</h2>
				    		<div class="row-fluid">
					    		<form class="form-horizontal span7">
								    <div class="control-group">
									    <label class="control-label" for="inputLocation">I live in</label>
									    <div class="controls">
									    	<input type="text" id="inputLocation" placeholder="Input Text">
									    </div>
								    </div>
								    <div class="control-group">
									    <label class="control-label" for="inputPostal">Postal code</label>
									    <div class="controls">
									    	<input type="text" id="inputPostal" placeholder="Input Text">
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
									    	<input type="text" id="inputJob" placeholder="Input Text">
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
									    	<input type="text" id="inputCompany" placeholder="Input Text">
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
				</div>
				<div class="item">
				    <div class="row-fluid register-box">
				    	<div class="span1 offset2 register-box-left register-box-extend">
				    		<div class="register-box-background"></div>
				    	</div>
				    	<div class="span8 register-box-step">
				    		<h2 class="row-fluid">
				    			<span class="span11 offset1 register-box-title">Introduce your self</span>
				    		</h2>
				    		<div class="row-fluid">
					    		<form class="form-horizontal span7">
								    <div class="control-group">
									    <label class="control-label" for="inputLocation">I live in</label>
									    <div class="controls">
									    	<input type="text" id="inputLocation" placeholder="Input Text">
									    </div>
								    </div>
								    <div class="control-group">
									    <label class="control-label" for="inputPostal">Postal code</label>
									    <div class="controls">
									    	<input type="text" id="inputPostal" placeholder="Input Text">
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
									    	<input type="text" id="inputJob" placeholder="Input Text">
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
									    	<input type="text" id="inputCompany" placeholder="Input Text">
									    </div>
								    </div>
								    <div class="control-group">
									    <div class="controls">
									    	<a href="#myCarousel" data-slide="next"><button class="btn btn-success">Create my profile</button></a>
									    </div>
								    </div>
							    </form>
							    <div class="span5">
							    	<div class="register-box-recommend">
								    	<h5 class="row-fluid register-recommend-heading">A Yesocl profile helps you...</h5>
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
				</div>
		  	</div>
		  	<!-- Carousel nav -->
		  	<!--a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		  	<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a-->
		</div>
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
jQuery(document).ready(function (){
	updateContentSize();

	function updateContentSize(){
		var wid = $(window).height();
		var hwid = $('#y-header').innerHeight();
		var fwid = $('#y-footer').innerHeight();

		// Main content height
		var mwid = wid - hwid - fwid - 10;
		$('#y-main-content').height( mwid );

		// Register box auto margin-top
		var rwid = $('.register-box').innerHeight();
		$('.register-box').attr('style', 'margin-top:' + (mwid / 2 - rwid / 2) + 'px;');

		// Register box extend
		var stwid = $('.register-box-step').innerHeight();
		$('.register-box-extend').height( stwid - 60 );
	} 
	
	$(window).resize(function() {
		updateContentSize();
	}); 
});

</script>
{% endblock %}