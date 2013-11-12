{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}Change Password - Yesocl Network{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('account.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
  <div id="y-main-content">
    <div class="y-frm" id="y-frm-password">
        <div class="frm-title"> Change password</div>
        <div class="alert alert-success {% if success is not defined %}hidden{% endif %}">{{ success }}</div>
        <div class="alert alert-error {% if warning is not defined %}hidden{% endif %}">{{ warning }}</div>
        <div class="frm-content">            
            <form action="{{ path('ChangePassword') }}" method="post">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock icon-2x"></i> New</span>
                    <input name="password" class="span3" id="new-password" type="password" placeholder="New password">
                </div>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock icon-2x"></i>Re-New</span>
                    <input name="confirm" class="span3" id="re-new-password" type="password" placeholder="Re-type new password">
                </div>         
                <div class="btns">
                     <button type="submit" class="btn btn-success">Change</button>   
                     <a class="btn" href="{{ path('HomePage') }}">Cancel</a>   
                </div>
            </form>     
        </div>
        <div class="frm-footer">            
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