{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}Change Password - Yesocl Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/password.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
  <div id="y-main-content">
    <div class="y-frm" id="y-frm-password">
        <div class="frm-title"> Sign In <strong>YESOCL.com</strong>
        </div>
        <div class="frm-content">            
            <form action="#">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user icon-2x"></i></span>
                    <input class="span3" id="username" type="text" placeholder="Email">
                    <div class="yes-warning">Field is required</div>
                </div>
                <br />
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock icon-2x"></i></span>
                    <input class="span3" id="password" type="text" placeholder="Password">
                    <div class="yes-warning"></div>
                </div>
                <div class="checkbox-container">
                    <input id="remember" name="remember" type="checkbox" /> 
                    <label for="remember">Remember me</label>
                </div>                
                <div class="btns">
                     <button class="btn btn-yes">Sign In</button>   
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
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
jQuery(document).ready(function (){
  
});
</script>
{% endblock %}