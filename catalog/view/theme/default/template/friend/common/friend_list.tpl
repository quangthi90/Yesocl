{% block friend_common_friend_list %}
    {% set class = 'all' %}
    {% if friend.created <= recent_time %}
        {% set class = class ~ ' recent' %}
    {% endif %}
    {% if friend.gender == 1 %}
        {% set class = class ~ ' male' %}
    {% else %}
        {% set class = class ~ ' female' %}
    {% endif %}
    <div class="block-content-item friend-item {{ class }}">
        <a href="{{ path('WallPage', {user_slug: friend.slug}) }}" class="fl friend-img">
            <img src="{{ friend.avatar }}">
        </a>
        <div class="fl friend-info">
            <a href="{{ path('WallPage', {user_slug: friend.slug}) }}" class="friend-name">{{ friend.username }}</a>
            <ul class="friend-infolist">
                <li>{{ friend.industry }}</li>
                <li>{{ friend.numFriend }}</li>
            </ul>
        </div>
        {% set fr_status = friend.fr_status.status %}
        {% set fr_slug = friend.slug %}
        {{ block('friend_common_friend_button') }}
    </div>
{% endblock %}

{% block friend_common_friend_list_template %}
{% raw %}
<div class="hidden">
    <div id="friend-item">
        <div class="block-content-item friend-item">
            <a href="${ url }" class="fl friend-img">
                <img src="${ avatar }">
            </a>
            <div class="fl friend-info">
                <a href="${ url }" class="friend-name">${ username }</a>
                <ul class="friend-infolist">
                    <li>${ industry }</li>
                    <li>${ numFriend }</li>
                </ul>
            </div>
            <div class="friend-actions">
                {% set status_if_added = '{{if status == 1}}' %}
                {% set status_if_request = '{{if status == 2}}' %}
                {% set status_else = '{{if status == 0}}' %}
                {% set status_if_end = '{{/if}}' %}
                {{ status_if_added }}
                <div class="dropdown friend-group">
                    <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Friend</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="btn-unfriend" data-url="${ unFriend }">Unfriend</a>
                        </li>
                    </ul>
                </div>
                {{ status_if_end }}
                {{ status_else }}
                <button data-url="${ url }" class="btn btn-yes btn-friend friend-group" data-cancel="0"><i class="icon-plus-sign"></i> Make Friend</button>
                {{ status_if_end }}
                {{ status_if_request }}
                <div class="dropdown friend-group">
                    <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Sent Request</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="btn-friend" href="#" data-url="${ url }" data-cancel="1">Cancel Request</a>
                        </li>
                    </ul>
                </div>
                {{ status_if_end }}
            </div>
        </div>
    </div>
</div>
{% endraw %}
{% endblock %}

{% block friend_common_friend_list_javascript %}
    <script type="text/javascript">
    $(function(){
        $(document).trigger('FRIEND_ACTION', [true]);
    });
    </script>
{% endblock %}