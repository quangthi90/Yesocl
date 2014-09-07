{% extends '@template/default/template/welcome/layout.tpl' %}

{% block title %}{% trans %}Login{% endtrans %}{% endblock %}

{% block stylesheet %}
<link href="{{ asset_css('account.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
    <div class="y-frm" id="y-frm-login">
        <div class="frm-title">{% trans %}Sign In{% endtrans %} <strong>YESOCL.com</strong>
        </div>
        <div class="alert alert-error {% if warning is not defined or warning == null %}hidden{% endif %}">{{ warning }}</div>
        <div class="frm-content">
            <form class="login-form">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input class="span3" id="username" required="required" name="email" type="email" placeholder="Email">
                </div>
                <br />
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock"></i></span>
                    <input class="span3" id="password" required="required" name="password" type="password" placeholder="Password">
                    <div class="warning"></div>
                </div>
                <div class="checkbox-container">
                    <input id="remember" name="remember" type="checkbox" value="true" /> 
                    <label for="remember">{% trans %}Remember me{% endtrans %}</label>
                </div>                
                <div class="btns">
                     <button class="btn btn-success btn-login">{% trans %}Sign In{% endtrans %}</button>   
                </div>
            </form>     
        </div>
        <div class="frm-footer">
            <ul>
                <li>{% trans %}Don't have an account{% endtrans %} ? <a href="#">{% trans %}Sign Up{% endtrans %}</a><br></li>
                <li>{% trans %}Remind{% endtrans %} ! <a href="#">{% trans %}Password{% endtrans %}</a></li>
            </ul>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}
{% endblock %}   
    