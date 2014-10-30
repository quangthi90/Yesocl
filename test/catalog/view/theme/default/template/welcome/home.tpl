{% extends '@template/default/template/welcome/layout.tpl' %}

{% block stylesheet %}
       
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
    <div id="intro-bg">    	
		<img src="{{ asset_img('template/intro-2-bg.png') }}" />  
    </div>    
</div>
<div id="y-frm-register" class="y-frm">
    <a href="#" class="close">X</a>
    <div class="frm-title">
        {% trans %}Join{% endtrans %} <strong>YESOCL.com</strong>         
    </div>
    <div class="frm-content">
    	<form class="reg-form" action="{{ path('AjaxRegister') }}" method="post">
    		<div class="alert alert-error top-warning hidden">{% trans %}Warning{% endtrans %}!!</div>
    		<div class="controls controls-row">
    			<input required="required" pattern=".{2,10}" title="2 to 10 characters" name="firstname" type="text" class="span2" id="reg-first-name" placeholder="{% trans %}First Name{% endtrans %}" autocomplete="off" />
    			<input required="required" pattern=".{2,10}" title="2 to 10 characters" name="lastname" type="text" class="span2"  id="reg-last-name" placeholder="{% trans %}Last Name{% endtrans %}" autocomplete="off" />
    			<div class="warning hidden">{% trans %}warning{% endtrans %}</div>
    		</div>
    		<div class="controls controls-row ">
    			<input required="required" name="email" type="email" class="input-block-level" id="reg-email" value="" placeholder="{% trans %}E-mail{% endtrans %}" autocomplete="off" />
    			<div class="warning hidden">{% trans %}warning{% endtrans %}</div>
    		</div>
    		<div class="controls controls-row">
    			<input required="required" pattern=".{6,20}" title="6 to 20 characters" name="password" type="password" class="span2"  id="password" placeholder="{% trans %}Password{% endtrans %}" autocomplete="off" />
    			<input required="required" name="confirm" type="password" class="span2"  id="reg-password" placeholder="{% trans %}Re-type Password{% endtrans %}" autocomplete="off" />
    			<div class="warning hidden">{% trans %}Confirm not match{% endtrans %}!</div>
    		</div>
    		<div class="controls controls-row ">
                <div class="input-prepend">
                	<span class="add-on" style= "height: 18px;">{% trans %}Birthday{% endtrans %}</span>
                	<select required="required" name="day" class="birthday" id="reg-birthay-day" style="width:100px;">
	                    <option value="">-- {% trans %}Day{% endtrans %} --</option>
	                    {% for i in 1..31 %}
	                    <option>{{ i }}</option>
	                    {% endfor %}
	                </select>
	                <select required="required" name="month" class="birthday" id="reg-birthay-month"  style="width:100px;">
	                    <option value="">-- {% trans %}Month{% endtrans %} --</option>
	                    {% for i in 1..12 %}
	                    <option>{{ i }}</option>
	                    {% endfor %}
	                </select>
	                <select required="required" name="year" class="birthday" id="reg-birthay-year"
	                 style="width:111px;">
	                	{% set now = "now"|date("Y") %}
	                    <option value="">-- {% trans %}Year{% endtrans %} --</option>
	                    {% for i in now..(now - 100) %}
	                    <option>{{ i }}</option>
	                    {% endfor %}
	                </select>
	                <div class="warning hidden">{% trans %}warning{% endtrans %}</div>
                </div>                
            </div>
            <div class="controls controls-row ">
            	<div class="input-prepend">
                	<span class="add-on" style= "height: 18px;width: 48px;">{% trans %}Gender{% endtrans %}</span>
	                <select required="required" name="sex" id="reg-sex" style="width: 312px;">
	                    <option value="">-- {% trans %}Select gender{% endtrans %} --</option>
	                    <option value="1">{% trans %}Male{% endtrans %}</option>
	                    <option value="2">{% trans %}Female{% endtrans %}</option>
	                </select>
	                <div class="warning hidden">{% trans %}warning{% endtrans %}</div>
            	</div>
            </div>
            {#<div class="controls controls-row captcha-row">
            	<label style="font-weight: bold;font-size: 14px;">{% trans %}Security Check{% endtrans %}</label>
            	<div class="captcha-container">
            		{{ recaptcha_html | raw }}	
            	</div>    			
    			<div class="warning hidden">{% trans %}Captcha not match{% endtrans %}!</div>
    		</div>#}
            <div class="controls controls-row ">
                <label class="checkbox" style="margin-bottom:10px;"><input type="checkbox" name="agree" required="required" />{% trans %}I agree Yesocl's policy{% endtrans %}</label>
                <button type="submit" class="btn btn-success btn-reg">{% trans %}Sign up{% endtrans %}</button>
            </div>
    	</form>
    </div>
</div>
{% endblock %}

{% block javascript %}
	<script type="text/javascript" src="{{ asset_js_old('register.js') }}"></script>
{% endblock %}