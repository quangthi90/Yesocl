{% extends '@template/default/template/layout/basic/master.tpl' %}

{% block title %}{% trans %}Change Password{% endtrans %}{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css_old('common/yes.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset_css_old('account.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div class="y-frm" id="y-frm-password">
    <div class="frm-title">{% trans %}Change password{% endtrans %}</div>
    {% if has_flash('success') == true %}
    <div class="bg-success innerAll half">{{ get_flash('success') }}</div>
    {% elseif has_flash('warning') == true %}
    <div class="bg-danger innerAll half">{{ get_flash('warning') }}</div>
    {% endif %}
    <div class="frm-content">
        <form action="{{ path('ChangePassword') }}" method="post" role="form" class="form-horizontal">
            {% if show_old_pass == true %}
            <div class="form-group">
                <label class="col-sm-4 control-label" for="old-password">{% trans %}Old password{% endtrans %}</label>
                <div class="col-sm-8">
                    <input name="oldPass" class="form-control" id="old-password" type="password" placeholder="Old password">
                </div>
            </div>
            {% endif %}
            <div class="form-group">
                <label class="col-sm-4 control-label" for="new-password">{% trans %}New password{% endtrans %}</label>
                <div class="col-sm-8">
                    <input name="password" class="form-control" id="new-password" type="password" placeholder="New password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label" for="re-new-password">{% trans %}Re-type password{% endtrans %}</label>
                <div class="col-sm-8">
                    <input name="confirm" class="form-control" id="re-new-password" type="password" placeholder="Re-type new password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" class="btn btn-primary">{% trans %}Change{% endtrans %}</button>
                    <a class="btn btn-default" href="{{ path('HomePage') }}">{% trans %}Cancel{% endtrans %}</a> 
                </div>
            </div>
        </form>  
    </div>
</div>
{% endblock %}

{#% block javascript %}
<script type="text/javascript">
jQuery(document).ready(function (){
  
});
</script>
{% endblock %#}