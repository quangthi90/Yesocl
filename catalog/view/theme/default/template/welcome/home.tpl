{% extends '@template/default/template/welcome/layout.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
       
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
    <div id="intro-bg">    	
		<img src="{{ asset_img('template/intro-2-bg.png') }}" />  
    </div>    
</div>
{% if error != null %}
<div id="y-message-info" data-title="Login failed" 
                        data-message="{{ error }}" 
                        data-class="anim error"
                        style="display: none;">      
</div>
{% endif %}
<div id="y-frm-register" class="y-frm">
    <a href="#" class="close">X</a>
    <div class="frm-title">
        Join <strong>YESOCL.com</strong>         
    </div>
    <div class="frm-content">
    	<form class="reg-form" action="{{ path('AjaxRegister') }}" method="post">
    		<div class="alert alert-error top-warning hidden">Warning!!</div>
    		<div class="controls controls-row">
    			<input required="required" pattern=".{2,10}" title="2 to 10 characters" name="firstname" type="text" class="span2" id="reg-first-name" placeholder="First Name" autocomplete="off" />
    			<input required="required" pattern=".{2,10}" title="2 to 10 characters" name="lastname" type="text" class="span2"  id="reg-last-name" placeholder="Last Name" autocomplete="off" />
    			<div class="warning hidden">warning</div>
    		</div>
    		<div class="controls controls-row ">
    			<input required="required" name="email" type="email" class="input-block-level" id="reg-email" value="" placeholder="E-mail" autocomplete="off" />
    			<div class="warning hidden">warning</div>
    		</div>
    		<div class="controls controls-row">
    			<input required="required" pattern=".{6,20}" title="6 to 20 characters" name="password" type="password" class="span2"  id="password" placeholder="Password" autocomplete="off" />
    			<input required="required" name="confirm" type="password" class="span2"  id="reg-password" placeholder="Re-type Password" autocomplete="off" />
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
        $('#y-message-info').showMessageDialog();
    </script>
    <script src="http://connect.facebook.net/en_US/all.js#appId={{ fb_app_id }}&xfbml=1"></script>
    <script type="text/javascript">

    FB.init({
        appId   : '{{ fb_app_id }}',
        status  : true,
        cookie  : true, 
        xfbml   : true 
    });
    function callFBLogin(){
        FB.login(function(response) {
            if (response.authResponse) {
                FB.api('/me', function(response) {
                    var promise = $.ajax({
                        type: 'POST',
                        url:  yRouting.generate('FaceBookConnect'),
                        dataType: 'json',
                        data: {data: response}
                    });

                    var $spinner = $('<i class="icon-spinner icon-spin"></i>');
                    var $old_icon = $('.btn-fb-login').find('i');
                    var f        = function() {
                        $spinner.remove();
                        $('.btn-fb-login').removeClass('disabled').find('a').prepend($old_icon);
                    };

                    $old_icon.remove();
                    $('.btn-fb-login').addClass('disabled').find('a').prepend($spinner);

                    promise.then(f, f);

                    promise.then(function(data){
                        if ( data.success == 'ok' ){
                            window.location.reload();
                        }else{
                            /*Todo: add message error here...*/
                        }
                    });
                });
            }else{
                /*Todo: add message login facebook fail here...*/
                alert("Access not authorized.");
            }
        },{scope: 'email'});
    }
    $('.btn-fb-login').click(function(){
        if ( $(this).hasClass('disabled') ){
            return false;
        }
        $(this).addClass('disabled');
        callFBLogin();
    });
    </script>
{% endblock %}