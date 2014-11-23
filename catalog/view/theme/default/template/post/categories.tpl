{% extends '@template/default/template/layout/basic/master.tpl' %}

{% use '@template/default/template/widget/post/recent_news.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block body %}
    <div class="innerAll">
        <div class="row">
            <div class="col-lg-9 col-md-8">            
            </div>
            <!-- WIDGET -->
            <div class="col-md-4 col-lg-3">            
            </div>
            <!-- END WIDGET -->
        </div>
    </div>
{% endblock %}
{% block library_javascript %}
{% endblock %}
{% block common_javascript %}
{% endblock %}
{% block javascript %}
{% endblock %}