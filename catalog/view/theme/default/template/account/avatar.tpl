{% extends '@template/default/template/common/layout.tpl' %}

{% block title %}{% trans %}Change Avatar{% endtrans %}{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('account.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
  <div id="y-main-content">
    <div class="y-frm" id="y-frm-password">
        <div class="frm-title">{% trans %}Change avatar{% endtrans %}</div>
        <div class="alert alert-success {% if success is not defined %}hidden{% endif %}">{{ success }}</div>
        <div class="alert alert-error {% if warning is not defined %}hidden{% endif %}">{{ warning }}</div>
        <div class="frm-content">            
            <form action="{{ path('ChangeAvatar') }}" method="post" enctype="multipart/form-data">
                <div class="thumb fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 150px; height: 150px;"><img src="{{ img_avatar }}" style="width: 150px; height: 150px;" /></div>
                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 150px; max-height: 150px; line-height: 20px;"></div>
                    <div>
                        <span class="btn btn-file" onclick="$('this').find('input').click();">
                            <span class="fileupload-new">{% trans %}Select image{% endtrans %}</span>
                            <span class="fileupload-exists">{% trans %}Change{% endtrans %}</span>
                            <input name="avatar" type="file" />
                        </span>
                        <a href="#" class="btn fileupload-exists" data-dismiss="fileupload" onclick="$('.thumb img').attr('src', '{{ img_default }}');">{% trans %}Remove{% endtrans %}</a>
                    </div>
                </div>
                <div class="btns">
                     <button type="submit" class="btn btn-success">{% trans %}Save{% endtrans %}</button>   
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

{% block javascript %}
<script type="text/javascript" src="{{ asset_js('libs/bootstrap-fileupload.js') }}"></script>
<script type="text/javascript">
/*
Changing the image at runtime by using JavaScript.
@imgId   : ID of Image HTML Control
@strPath : The path of the image that you just browse.
*/

jQuery(document).ready(function (){
  
});
</script>
{% endblock %}