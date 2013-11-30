{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/account/common/profile_column.tpl' %}
{% use '@template/default/template/friend/common/friend_list.tpl' %}
{% use '@template/default/template/friend/common/friend_filter.tpl' %}
{% use '@template/default/template/friend/common/friend_button.tpl' %}

{% block title %}{{ users[current_user_id].username }} | Friends {% endblock %}

{% block stylesheet %}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal account-friend">
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
            <div class="block-content user-container">
            {% for friend_id in friend_ids %}
                {% set friend = users[friend_id] %}
                {{ block('friend_common_friend_list') }}
            {% endfor %}
                {{ block('friend_common_friend_button_template') }}
            </div>
        </div>
        {% set friend_count = friend_ids|length %}
        {% set user = users[current_user_id] %}
        {{ block('friend_common_friend_filter') }}
    </div>
</div>
{% endblock %}

{% block javascript %}
    {{ block('friend_common_friend_list_javascript') }}
{% endblock %}