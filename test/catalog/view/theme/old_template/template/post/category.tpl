{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/html_block.tpl' %}
{% use '@template/default/template/post/common/post_item_list.tpl' %}
{% use '@template/default/template/post/common/comment_post_list.tpl' %}

{% block title %}{% trans %}Category Detail Page{% endtrans %}{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('home.css') }}" rel="stylesheet" media="screen" />
    {{ block('post_common_comment_post_list_style') }}
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
    <div id="y-main-content" class="has-horizontal post-category" >
        {% set block_info = category %}
        {% set block_href = path('BranchCategory', {category_slug: category.slug}) %}
        {% set is_back_btn = true %}
        {% for posts in all_posts %}
            {% set style = random([1, 2]) %}
            {% if posts|length > 0 %}
                {{ block('post_common_post_item_list') }}
            {% endif %}
        {% endfor %}
    </div>
</div>
{{ block('post_common_comment_post_list') }}
{% endblock %}

{% block template %}
    {{ block('post_common_comment_post_list_template') }}
{% endblock %}

{% block javascript %}
{{ block('post_common_comment_post_list_javascript') }}
<script type="text/javascript" src="{{ asset_js('libs/modernizr.custom.js') }}"></script>
{% endblock %}