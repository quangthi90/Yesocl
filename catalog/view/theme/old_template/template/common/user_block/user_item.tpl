{% block common_user_block_user_item %}
    {% if class is not defined %}
        {% set class = 'all' %}
    {% else %}
        {% set class = class ~ ' all' %}
    {% endif %}
    {% if friend.added is defined and friend.added|date('U') >= recent_time|date('U') %}
        {% set class = class ~ ' recent' %}
    {% endif %}
    {% if friend.gender == 1 %}
        {% set class = class ~ ' male' %}
    {% else %}
        {% set class = class ~ ' female' %}
    {% endif %}
    <div class="block-content-item user-item js-friend-info {{ class }}" data-user-id="{{friend.slug}}" data-user-name="{{friend.username}}" data-user-email="{{ friend.email }}" data-user-slug="{{ friend.slug }}">
        <a href="{{ path('WallPage', {user_slug: friend.slug}) }}" class="user-img">
            <img src="{{ friend.avatar }}">
        </a>
        <div class="user-info">
            <a href="{{ path('WallPage', {user_slug: friend.slug}) }}" class="user-name">{{ friend.username }}</a>
            <ul class="user-infolist">
                <li><span class="js-current-status" title="{{ friend.current }}">{{ friend.current }}</span></li>
                {#<li>{{ friend.numFriend }}</li>#}
            </ul>
        </div>
        {% set fr_status = friend.fr_status %}
        {% set fl_status = friend.fl_status %}
        {{ block('common_user_block_user_button') }}
    </div>
{% endblock %}

{% block common_user_block_user_item_javascript %}
    {% if isRemove is not defined %}
        {% set isRemove = 'true' %}
    {% endif %}
    <script type="text/javascript">
    $(function(){
        $(document).trigger('FRIEND_ACTION', [{{ isRemove }}]);
    });
    </script>
{% endblock %}