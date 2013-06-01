{% extends '@template/default/template/welcome/layout.tpl' %}

{% block title %}Login for Yesocl{% endblock %}

{% block stylesheet %}
<link href="catalog/view/theme/default/stylesheet/account.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
    <div class="y-frm" id="y-frm-login">
        <div class="frm-title"> Sign In <strong>YESOCL.com</strong>
        </div>
        <div class="alert alert-error {% if warning is not defined %}hidden{% endif %}">{{ warning }}</div>
        <div class="frm-content">
            <form action="{{ action.login }}" class="login-form" data-url="{{ action.login_page }}">
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
                    <input id="remember" name="remember" type="checkbox" /> 
                    <label for="remember">Remember me</label>
                </div>                
                <div class="btns">
                     <button class="btn btn-success btn-login">Sign In</button>   
                </div>
            </form>     
        </div>
        <div class="frm-footer">
            <ul>
                <li>Don't have an account ? <a href="#">Sign Up</a><br></li>
                <li>Remind ! <a href="#">Password</a></li>
            </ul>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}
{% endblock %}   
    