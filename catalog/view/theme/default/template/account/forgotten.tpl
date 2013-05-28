{% extends '@template/default/template/welcome/layout.tpl' %}

{% block title %}Login for Yesocl{% endblock %}

{% block stylesheet %}
<link href="catalog/view/theme/default/stylesheet/account.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
    <div class="y-frm" id="y-frm-login">
        <div class="frm-title">Remind password - <strong>YESOCL.com</strong>
        </div>
        <div class="frm-content">            
            <form action="#">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input class="span3" id="username" type="text" placeholder="Email">
                    <div class="warning">Field is required</div>
                </div>                
                <div class="btns">
                     <button class="btn btn-success">Reset password</button>   
                     <button class="btn">Cancel</button>  
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
