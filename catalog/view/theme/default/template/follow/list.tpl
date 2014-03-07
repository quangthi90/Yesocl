{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/follow/common/follow_filter.tpl' %}
{% use '@template/default/template/follow/common/follow_button.tpl' %}
{% use '@template/default/template/follow/common/follow_item.tpl' %}

{% block title %} {% trans %}Folllow Page{% endtrans %} {% endblock %}

{% block stylesheet %}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" data-block-width="380" data-block-height="80" class="has-horizontal block-auto-floatleft">
        <div class="feed-block">
            <div class="block-header">
                <a class="block-title fl" href="#">{% trans %}Follow{% endtrans %}</a>  
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>
            </div>
            <div class="block-content user-container">
                {% for i in 0..10 %}
                    {{ block('follow_common_follow_item') }}
                {% endfor %} 
            </div>
        </div>
        {{ block('follow_common_follow_filter') }}
    </div>
</div>
{% endblock %}

{% block javascript %}
    {{ block('follow_common_follow_item_javascript') }}
{% endblock %}