{% block friend_common_friend_list %}
    {% if friends is not defined %}
        {% set friends = [] %}
    {% endif %}
    {% for friend in friends %}
        <div class="block-content-item friend-item">
            <a href="{{ path('WallPage', {user_slug: friend.slug}) }}" class="fl friend-img">
                <img src="{{ friend.avatar }}">
            </a>
            <div class="fl friend-info">
                <a href="{{ path('WallPage', {user_slug: friend.slug}) }}" class="friend-name">{{ friend.username }}</a>
                <ul class="friend-infolist">
                    <li>{{ friend.meta.industry }}</li>
                    <li>100 friends</li>
                </ul>
            </div>
            <div class="friend-actions">
                {% if friend.fr_status == 0 %}
                <button data-url="{{ path('MakeFriend', {user_slug: friend.slug}) }}" class="btn btn-yes btn-friend friend-group" data-cancel="0"><i class="icon-plus-sign"></i> Make Friend</button>
                {% elseif friend.fr_status == 1 %}
                <div class="dropdown friend-group">
                    <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Friend</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="btn-unfriend" data-url="{{ path('UnFriend', {user_slug: friend.slug}) }}">Unfriend</a>
                        </li>
                    </ul>
                </div>
                {% else %}
                <div class="dropdown friend-group">
                    <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Sent Request</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="btn-friend" href="#" data-url="{{ path('MakeFriend', {user_slug: friend.slug}) }}" data-cancel="1">Cancel Request</a>
                        </li>
                    </ul>
                </div>
                {% endif %}
                <!--div class="dropdown">
                    <a href="#" class="btn btn-yes btn-friend dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Following</a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Unfollow</a></li>
                    </ul>
                </div-->
                <!--a href="#" class="btn btn-yes btn-follow"><i class="icon-rss"></i> Follow</a-->
            </div>
        </div>
    {% endfor %}
    {% raw %}
    <div class="hidden">
        <div id="send-request">
            <button data-cancel="0" data-url="${href}" class="btn btn-yes btn-friend friend-group"><i class="icon-plus-sign"></i> Make Friend</button>
        </div>
        <div id="cancel-request">
            <div class="dropdown friend-group">
                <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Sent Request</a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a data-cancel="1" class="btn-friend" href="#" data-url="${href}">Cancel Request</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {% endraw %}
{% endblock %}

{% block friend_common_friend_list_javascript %}
    <script type="text/javascript" src="{{ asset_js('friend.js') }}"></script>
{% endblock %}