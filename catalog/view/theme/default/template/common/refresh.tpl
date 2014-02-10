{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/html_block.tpl' %}
{% use '@template/default/template/post/common/post_item_wall.tpl' %}
{% use '@template/default/template/post/common/comment_post_list.tpl' %}

{% block title %}{% trans %}What's new{% endtrans %}{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('home.css') }}" rel="stylesheet" media="screen" />
    {{ block('post_common_comment_post_list_style') }}
{% endblock %}

{% block body %}
<div id="y-content" class="no-header-fixed">
    <div id="y-main-content" class="has-horizontal post-per-column">
        <div class="feed-block block-what-new">
            <div class="block-header">
                <a class="block-title fl" href="#">
                    {% trans %}What's new{% endtrans %}
                </a>  
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>           
            </div>
            <div class="block-content">
                {% for post in posts %}
                    <div class="column">
                        {% set user = users[post.user_id] %}
                        {{ block('post_common_post_item_wall') }}
                    </div>
                {% endfor %}
            </div>
        </div>
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