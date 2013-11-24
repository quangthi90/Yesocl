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
    <div id="y-main-content" class="has-horizontal post-per-column">
        <div class="feed-block block-what-new">
            <div class="block-header">
                <a class="block-title fl" href="#">
                    What's new                    
                </a>  
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>           
            </div>
            <div class="block-content">
                {% for post in posts %}
                    <div class="column">
                        {% set user = users[post.user_id] %}
                        {{ block('post_common_post_block') }}
                    </div>
                {% endfor %}
            </div>
        </div>
    </div>
</div>
{{ block('post_common_post_comment') }}
{% endblock %}

{% block javascript %}
{{ block('post_common_post_comment_javascript') }}
<script type="text/javascript" src="{{ asset_js('libs/modernizr.custom.js') }}"></script>
{% endblock %}