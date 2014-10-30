{% extends '@template/default/template/layout/basic/master.tpl' %}

{% block title %}{% trans %}Change Password{% endtrans %}{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css_old('common/yes.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset_css_old('account.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
  <div id="y-main-content">
    <div class="y-frm" id="y-frm-password">
        <div class="frm-title">{% trans %}Change password{% endtrans %}</div>
        {% if has_flash('success') == true %}
        <div class="alert alert-success">{{ get_flash('success') }}</div>
        {% elseif has_flash('warning') == true %}
        <div class="alert alert-error">{{ get_flash('warning') }}</div>
        {% endif %}
        <div class="frm-content">            
            <form action="{{ path('ChangePassword') }}" method="post">
                {% if show_old_pass == true %}
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock icon-2x"></i> {% trans %}Old{% endtrans %}</span>
                    <input name="oldPass" class="span3" id="old-password" type="password" placeholder="Old password">
                </div>
                {% endif %}
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock icon-2x"></i> {% trans %}New{% endtrans %}</span>
                    <input name="password" class="span3" id="new-password" type="password" placeholder="New password">
                </div>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock icon-2x"></i>{% trans %}Re-New{% endtrans %}</span>
                    <input name="confirm" class="span3" id="re-new-password" type="password" placeholder="Re-type new password">
                </div>         
                <div class="btns">
                     <button type="submit" class="btn btn-success">{% trans %}Change{% endtrans %}</button>   
                     <a class="btn" href="{{ path('HomePage') }}">{% trans %}Cancel{% endtrans %}</a>   
                </div>
            </form>     
        </div>
        <div class="frm-footer">            
        </div>
    </div>
  </div>
</div>
{% endblock %}

{#% block javascript %}
<script type="text/javascript">
jQuery(document).ready(function (){
  
});
</script>
{% endblock %#}