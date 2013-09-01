{% extends '@template/default/template/welcome/layout.tpl' %}

{% block title %}Login for Yesocl{% endblock %}

{% block stylesheet %}
<link href="{{ asset_css('account.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
    <div class="y-frm" id="y-frm-login">
        <div class="frm-title">Remind password - <strong>YESOCL.com</strong>
        </div>
        <div class="alert alert-success {% if success is not defined %}hidden{% endif %}">{{ success }}</div>
        <div class="alert alert-error {% if warning is not defined %}hidden{% endif %}">{{ warning }}</div>
        <div class="frm-content">            
            <form action="{{ action.forgotten }}" method="post">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input class="span3" id="username" name="email" type="text" placeholder="Email">
                </div>                
                <div class="btns">
                     <button class="btn btn-success" type="submit">Reset password</button>   
                     <a class="btn" href="{{ action.home }}">Cancel</a>  
                </div>
            </form>     
        </div>
        <div class="frm-footer">
            <ul>
                <li>Try login again ! <a href="#">Sign In</a></li>
                <li>Create another account ? <a href="#">Sign Up</a></li>
                <li>Not received remind email. <a href="#">Send again !</a></li>
            </ul>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}
{% endblock %}   
