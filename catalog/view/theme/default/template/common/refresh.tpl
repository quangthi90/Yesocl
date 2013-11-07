{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_block.tpl' %}
{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('home.css') }}" rel="stylesheet" media="screen" />
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
    <div id="y-main-content" class="has-horizontal post-category">
        <div class="column">
        {% for post in posts %}
            {% set user = users[post.user_id] %}
            {{ block('post_common_post_block') }}
            {% if loop.index % 2 == 1 and loop.index != posts|length %}
        </div>
        <div class="column">
            {% endif %}
        {% endfor %}
        </div>
    </div>
</div>
{{ block('post_common_post_comment') }}
{% endblock %}

{% block javascript %}
{{ block('post_common_post_comment_javascript') }}
<script type="text/javascript" src="{{ asset_js('libs/modernizr.custom.js') }}"></script>
{% endblock %}