{% use '@template/default/template/friend/common/friend_button.tpl' %}

{% block common_profile_column %}
    <div class="free-block fl" style="width: 180px;">
        <div class="free-block-content">
            <div class="user_info_overview">
                <a href="{{ path('WallPage', {user_slug: user.slug}) }}" class="user_info_avatar">
                    <img src="{{ user.avatar }}" alt="{{ user.username }}" />
                </a>
                <a href="{{ path('WallPage', {user_slug: user.slug}) }}" class="user_info_name"><i class="icon-{% if user.gender == 1 %}male{% else %}female{% endif %}"></i> {{ user.username }}</a>
                <div class="user_relationship">
                    {% set fr_status = user.fr_status.status %}
                    {% set fr_slug = user.slug %}
                    {{ block('friend_common_friend_button') }}
                    {{ block('friend_common_friend_button_template') }}
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
                    <i class="icon-list-alt"></i><a href="{{ path('ProfilePage', {user_slug: user.slug}) }}">Profile</a>
                </li>
                <li>
                    <i class="icon-fire"></i><a href="{{ path('FriendPage', {user_slug: user.slug}) }}">Friends</a>
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
{% endblock %}