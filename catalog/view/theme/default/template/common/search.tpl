{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/friend/common/friend_list.tpl' %}

{% block title %}{{ users[current_user_id].username }} | Friends {% endblock %}

{% block stylesheet %}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal account-friend" style="width: 9999px; padding-right: 250px;">
        <div class="feed-block">
            <div class="block-header">
                <a class="block-title fl" href="#">Search</a>  
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>
            </div>
            <div class="block-content">
            {% for friend_id in search_user_ids %}
                {% set friend = users[friend_id] %}
                {{ block('friend_common_friend_list') }}
            {% endfor %}
                {{ block('friend_common_friend_button_template') }}
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascript %}
    {{ block('friend_common_friend_list_javascript') }}
{% endblock %}