{% block friend_common_friend_list %}
    {% set class = 'all' %}
    {% if friend.added is defined and friend.added|date('U') >= recent_time|date('U') %}
        {% set class = class ~ ' recent' %}
    {% endif %}
    {% if friend.gender == 1 %}
        {% set class = class ~ ' male' %}
    {% else %}
        {% set class = class ~ ' female' %}
    {% endif %}
    <div class="block-content-item friend-item {{ class }}" data-user-id="{{friend.slug}}" data-user-name="{{friend.username}}" data-user-email="{{ friend.email }}">
        <a href="{{ path('WallPage', {user_slug: friend.slug}) }}" class="fl friend-img">
            <img src="{{ friend.avatar }}">
        </a>
        <div class="fl friend-info">
            <a href="{{ path('WallPage', {user_slug: friend.slug}) }}" class="friend-name">{{ friend.username }}</a>
            <ul class="friend-infolist">
                <li><span class="js-current-status" title="{{ friend.current }}">{{ friend.current }}</span></li>
                {#<li>{{ friend.numFriend }}</li>#}
            </ul>
        </div>
        {% set fr_status = friend.fr_status.status %}
        {% set fr_slug = friend.slug %}
        {{ block('friend_common_friend_button') }}
    </div>
{% endblock %}

{% block friend_common_friend_list_javascript %}
    <script type="text/javascript">
    $(function(){
        $(document).trigger('FRIEND_ACTION', [true]);
    });
    </script>
{% endblock %}