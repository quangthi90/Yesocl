{% extends '@template/default/template/welcome/layout.tpl' %}

{% block title %}{% trans %}Lost Password{% endtrans %}{% endblock %}

{% block stylesheet %}
<link href="{{ asset_css_old('account.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
    <div class="y-frm" id="y-frm-login">
        <div class="frm-title">{% trans %}Remind password{% endtrans %} - <strong>YESOCL.com</strong>
        </div>
        <div class="alert alert-success {% if success is not defined %}hidden{% endif %}">{{ success }}</div>
        <div class="alert alert-error {% if warning is not defined %}hidden{% endif %}">{{ warning }}</div>
        <div class="frm-content">            
            <form action="{{ path('LostPass') }}" method="post">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input class="span3" id="username" name="email" type="text" placeholder="Email">
                </div>                
                <div class="btns">
                     <button class="btn btn-success" type="submit">{% trans %}Reset password{% endtrans %}</button>   
                     <a class="btn" href="{{ path('WelcomePage') }}">{% trans %}Cancel{% endtrans %}</a>  
                </div>
            </form>     
        </div>
        <div class="frm-footer">
            <ul>
                <li>{% trans %}Try login again !{% endtrans %} <a href="#">{% trans %}Sign In{% endtrans %}</a></li>
                <li>{% trans %}Create another account ?{% endtrans %} <a href="#">{% trans %}Sign Up{% endtrans %}</a></li>
                <li>{% trans %}Not received remind email{% endtrans %}. <a href="#">{% trans %}Send again{% endtrans %} !</a></li>
            </ul>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}
{% endblock %}   
