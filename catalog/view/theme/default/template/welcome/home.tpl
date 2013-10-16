{% extends '@template/default/template/welcome/layout.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
       
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
    <div id="intro-bg">    	
		<img src="image/template/intro-2-bg.png" />  
    </div>    
</div>
<div id="y-frm-register" class="y-frm">
    <a href="#" class="close">X</a>
    <div class="frm-title">
        Join <strong>YESOCL.com</strong>         
    </div>
    <div class="frm-content">
    	<form class="reg-form" action="{{ path('AjaxRegister') }}" method="post">
    		<div class="alert alert-error top-warning hidden">Warning!!</div>
    		<div class="controls controls-row">
    			<input required="required" pattern=".{3,10}" title="3 to 10 characters" name="firstname" type="text" class="span2" id="reg-first-name" placeholder="First Name" value="" />
    			<input required="required" pattern=".{3,10}" title="3 to 10 characters" name="lastname" type="text" class="span2"  id="reg-last-name" placeholder="Last Name" value="" />
    			<div class="warning hidden">warning</div>
    		</div>
    		<div class="controls controls-row ">
    			<input required="required" name="email" type="email" class="input-block-level" id="reg-email" value="" placeholder="E-mail" />
    			<div class="warning hidden">warning</div>
    		</div>
    		<div class="controls controls-row">
    			<input required="required" pattern=".{6,20}" title="6 to 20 characters" name="password" type="password" class="span2"  id="password" placeholder="Password" />
    			<input required="required" name="confirm" type="password" class="span2"  id="reg-password" placeholder="Re-type Password" value="" />
    			<div class="warning hidden">Confirm not match!</div>
    		</div>
    		<div class="controls controls-row ">
                <div class="input-prepend">
                	<span class="add-on" style= "height: 18px;">Birthday</span>
                	<select required="required" name="day" class="birthday" id="reg-birthay-day" style="width:100px;">
	                    <option value="">-- Day --</option>
	                    {% for i in 1..31 %}
	                    <option>{{ i }}</option>
	                    {% endfor %}
	                </select>
	                <select required="required" name="month" class="birthday" id="reg-birthay-month"  style="width:100px;">
	                    <option value="">-- Month --</option>
	                    {% for i in 1..12 %}
	                    <option>{{ i }}</option>
	                    {% endfor %}
	                </select>
	                <select required="required" name="year" class="birthday" id="reg-birthay-year"
	                 style="width:111px;">
	                	{% set now = "now"|date("Y") %}
	                    <option value="">-- Year --</option>
	                    {% for i in now..(now - 100) %}
	                    <option>{{ i }}</option>
	                    {% endfor %}
	                </select>
	                <div class="warning hidden">warning</div>
                </div>                
            </div>
            <div class="controls controls-row ">
            	<div class="input-prepend">
                	<span class="add-on" style= "height: 18px;width: 48px;">Sex</span>
	                <select required="required" name="sex" id="reg-sex" style="width: 312px;">
	                    <option value="">-- Select sex --</option>
	                    <option value="1">Male</option>
	                    <option value="2">Female</option>
	                    <option value="3">Unknow</option>
	                </select>
	                <div class="warning hidden">warning</div>
            	</div>
            </div>
            <div class="controls controls-row captcha-row">
            	<label style="font-weight: bold;font-size: 14px;">Security Check</label>
            	<div class="captcha-container">
            		{{ recaptcha_html | raw }}	
            	</div>    			
    			<div class="warning hidden">Captcha not match!</div>
    		</div>
            <div class="controls controls-row ">
                <label class="checkbox" style="margin-bottom:10px;"><input type="checkbox" name="agree" required="required" />I agree Yesocl's policy</label>
                <button type="submit" class="btn btn-success btn-reg">Sign up</button>
            </div>
    	</form>
    </div>
</div>
{% endblock %}

{% block javascript %}
	<script type="text/javascript" src="{{ asset_js('register.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
        	//Join clicked:
			$('#intro-bg img').click(function(e){
				$('#overlay').fadeIn(function(){					
					$('#intro-bg').css('text-align','left');					
					$('#y-frm-register').animate(
						{
							right : '50px'
						},600
					);					
				});
			});			
			//if close button is clicked
			$('.y-frm .close').click(function (e) {
				closeLoginForm();
			});					
			//if overlay is clicked
			$('#overlay').click(function () {
				closeLoginForm();
			});		
        });		
		//Close Form:
		function closeLoginForm(){				
			$('#y-frm-register').animate(
				{
					right : '-9990px'
				},500,	
				function(){
					$('#overlay').fadeOut(300, function(){
						$('#intro-bg').css('text-align','center');	
					});												
				}					
			);
		}		
    </script>
{% endblock %}