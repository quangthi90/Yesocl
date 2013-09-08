{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/form_status.tpl' %}
{% use '@template/default/template/post/common/post_block.tpl' %}
{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}{{ user_info.username }}{% endblock %}

{% block stylesheet %}
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal account-mywall">
        <div class="free-block fl" style="width: 180px;">
            <div class="free-block-content">
                <div class="user_info_overview">
                    <a href="#" class="user_info_avatar">
                        <img src="http://www.gravatar.com/avatar/cc00a8c917457e6e7259900fc25ac879?s=180" alt="Name" />
                    </a>
                    <a href="#" class="user_info_name"><i class="icon-male"></i> WMThiet</a>
                    <div class="user_relationship">
                        <a href="#" class="btn btn-yes">
                            <i class="icon-plus-sign"></i> Add friend
                        </a>
                        <a href="#" class="btn btn-yes">
                            <i class="icon-random"></i> Follow
                        </a>
                        <a href="#" class="btn btn-yes">
                            <i class="icon-share-alt"></i> Message
                        </a>
                    </div>                    
                </div>
                <ul class="user_actions">
                    <li>
                        <i class="icon-list-alt"></i><a href="#">Profile</a>
                    </li>
                    <li>
                        <i class="icon-fire"></i><a href="#">Friends</a>
                    </li>
                    <li>
                        <i class="icon-file-alt"></i><a href="#">Posts</a>
                    </li>
                    <li>
                        <i class="icon-group"></i><a href="#">Groups</a>
                    </li>
                    <li>
                        <i class="icon-tasks"></i><a href="#">Activities</a>
                    </li> 
                </ul>
            </div>
        </div>
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