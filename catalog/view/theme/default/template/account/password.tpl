{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}Change Password - Yesocl Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/account.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
  <div id="y-main-content">
    <div class="y-frm" id="y-frm-password">
        <div class="frm-title"> Change password</div>
        <div class="frm-content">            
            <form action="#">
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock icon-2x"></i> Old</span>
                    <input class="span3" id="current-password" type="text" placeholder="Old password">
                    <div class="yes-warning">Required</div>
                </div>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock icon-2x"></i> New</span>
                    <input class="span3" id="new-password" type="text" placeholder="New password">
                    <div class="yes-warning"></div>
                </div>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock icon-2x"></i>Re-New</span>
                    <input class="span3" id="re-new-password" type="text" placeholder="Re-type new password">
                    <div class="yes-warning"></div>
                </div>         
                <div class="btns">
                     <button class="btn btn-success">Change</button>   
                     <button class="btn">Cancel</button>   
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