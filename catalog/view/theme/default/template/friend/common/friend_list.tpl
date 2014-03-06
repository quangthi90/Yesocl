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
    <div class="block-content-item friend-item js-friend-info {{ class }}" data-user-id="{{friend.slug}}" data-user-name="{{friend.username}}" data-user-email="{{ friend.email }}" data-user-slug="{{ friend.slug }}">
        <a href="{{ path('WallPage', {user_slug: friend.slug}) }}" class="fl friend-img">
            <img src="{{ friend.avatar }}">
        </a>
        <div class="fl friend-info">
            <a href="{{ path('WallPage', {user_slug: friend.slug}) }}" class="friend-name">{{ friend.username }}</a>
            <ul class="friend-infolist">
                <li>{{ friend.current }}</li>
                {#<li>{{ friend.numFriend }}</li>#}
            </ul>
        </div>
        {% set fr_status = friend.fr_status %}
        {% set fl_status = friend.fl_status %}
        {{ block('friend_common_friend_button') }}
    </div>
{% endblock %}

{% block friend_common_friend_list_javascript %}
    {% if isRemove is not defined %}
        {% set isRemove = true %}
    {% endif %}
    <script type="text/javascript">
    $(function(){
        $(document).trigger('FRIEND_ACTION', [{{ isRemove }}]);
    });
    </script>
{% endblock %}