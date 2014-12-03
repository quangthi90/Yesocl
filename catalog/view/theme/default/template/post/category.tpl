{% extends '@template/default/template/layout/basic/master.tpl' %}

{% use '@template/default/template/widget/post/recent_news.tpl' %}
{% use '@template/default/template/widget/post/post_item_base.tpl' %}

{% block title %}{{ heading_title }}{% endblock %}

{% block body %}
    <div class="innerAll inner-2x">
        {% for post in all_posts %}
            {{ block('post_item_base_block')}}
        {% endfor %}
    </div>
{% endblock %}
{% block library_javascript %}
{% endblock %}
{% block common_javascript %}
{% endblock %}
{% block javascript %}
{% endblock %}
