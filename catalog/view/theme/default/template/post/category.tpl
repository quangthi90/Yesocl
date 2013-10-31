{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_block_list.tpl' %}
{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('home.css') }}" rel="stylesheet" media="screen" />
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
    <div id="y-main-content" class="has-horizontal post-category" >
        {% set block_info = category %}
        {% set block_href = path('CategoryPage', {category_slug: category.slug}) %}
        {% set is_back_btn = true %}
        {% for posts in all_posts %}
            {% set style = random([1, 2]) %}
            {% if posts|length > 0 %}
                {{ block('post_common_post_block_list') }}
            {% endif %}
        {% endfor %}
    </div>
</div>
{{ block('post_common_post_comment') }}
{% endblock %}

{% block javascript %}
{{ block('post_common_post_comment_javascript') }}
<script type="text/javascript" src="{{ asset_js('libs/modernizr.custom.js') }}"></script>
{% endblock %}