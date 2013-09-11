{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/form_status.tpl' %}
{% use '@template/default/template/post/common/post_block.tpl' %}
{% use '@template/default/template/post/common/post_comment.tpl' %}
{% use '@template/default/template/account/common/profile_column.tpl' %}

{% block title %}{{ user_info.username }}{% endblock %}

{% block stylesheet %}
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal account-mywall">
        {% if current_user_id != get_current_user().id %}
            {% set user = users[current_user_id] %}
            {{ block('common_profile_column') }}
        {% endif %}
        <div class="feed-block block-post-new">
            <div class="block-header">
                <a class="block-title fl" href="#">
                    Post                    
                </a>  
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>           
            </div>
            <div class="block-content">
                <div class="column">
                {% for post in posts %}
                    {% if loop.index == 1 %}
                    {% set user = users[current_user_id] %}
                    {{ block('post_common_form_status') }}
                    {% endif %}
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
    </div>
</div>
{% endblock %}

{% block javascript %}
{{ block('post_common_post_comment_javascript') }}
{{ block('post_common_form_status_javascript') }}
{% endblock %}