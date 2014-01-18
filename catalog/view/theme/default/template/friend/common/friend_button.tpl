{% block friend_common_friend_button %}
<div class="friend-actions">
    {% if fr_status == 4 %}
    <a data-url="{{ path('MakeFriend', {user_slug: fr_slug}) }}" class="btn btn-yes btn-friend friend-group" data-cancel="0"><i class="icon-plus-sign"></i> {% trans %}Make Friend{% endtrans %}</a>
    {% elseif fr_status == 2 %}
    <div class="dropdown friend-group">
        <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Friend{% endtrans %}</a>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a class="btn-unfriend" data-url="{{ path('UnFriend', {user_slug: fr_slug}) }}">{% trans %}Unfriend{% endtrans %}</a>
            </li>
        </ul>
    </div>
    {% elseif fr_status == 3 %}
    <div class="dropdown friend-group">
        <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Sent Request{% endtrans %}</a>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a class="btn-friend" href="#" data-url="{{ path('MakeFriend', {user_slug: fr_slug}) }}" data-cancel="1">{% trans %}Cancel Request{% endtrans %}</a>
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
{% endblock %}

{% block friend_common_friend_button_template %}
{% raw %}
<div class="hidden">
    <div id="send-request">
        <a data-cancel="0" data-url="${href}" class="btn btn-yes btn-friend friend-group"><i class="icon-plus-sign"></i> {% trans %}Make Friend{% endtrans %}</a>
    </div>
    <div id="cancel-request">
        <div class="dropdown friend-group">
            <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Sent Request{% endtrans %}</a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a data-cancel="1" class="btn-friend" href="#" data-url="${href}">{% trans %}Cancel Request{% endtrans %}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
{% endraw %}
{% endblock %}

{% block friend_common_friend_button_javascript %}
{% endblock %}