{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/account/common/profile_column.tpl' %}
{% use '@template/default/template/friend/common/friend_list.tpl' %}
{% use '@template/default/template/friend/common/friend_filter.tpl' %}

{% block title %}{{ users[current_user_id].username }} | Friends {% endblock %}

{% block stylesheet %}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal account-friend" style="padding-right: 250px;">
        {% if current_user_id != get_current_user().id %}
            {% set user = users[current_user_id] %}
            {{ block('common_profile_column') }}
        {% endif %}
        <div class="feed-block">
            <div class="block-header">
                <a class="block-title fl" href="#">Friend</a>  
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>
            </div>
            <div class="block-content">
                {{ block('friend_common_friend_list') }}
            </div>
        </div>  
        {{ block('friend_common_friend_filter') }}
    </div>
</div>
{% endblock %}

{% block javascript %}
    {{ block('friend_common_friend_list_javascript') }}
{% endblock %}