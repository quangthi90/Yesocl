{% block friend_common_friend_button %}
<div class="friend-actions">
    {% if fr_status == 4 %}
    <a data-url="{{ fr_href }}" class="btn btn-yes btn-friend friend-group" data-cancel="0"><i class="icon-plus-sign"></i> {% trans %}Make Friend{% endtrans %}</a>
    {% elseif fr_status == 2 %}
    <div class="dropdown friend-group">
        <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Friend{% endtrans %}</a>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a class="btn-unfriend" data-url="{{ fr_href }}">{% trans %}Unfriend{% endtrans %}</a>
            </li>
        </ul>
    </div>
    {% elseif fr_status == 3 %}
    <div class="dropdown friend-group">
        <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Sent Request{% endtrans %}</a>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a class="btn-friend" href="#" data-url="{{ fr_href }}" data-cancel="1">{% trans %}Cancel Request{% endtrans %}</a>
            </li>
        </ul>
    </div>
    {% endif %}
    {% if fl_status == 2 %}
    <div class="dropdown">
        <a href="#" class="btn btn-yes btn-friend dropdown-toggle" role="button" data-toggle="dropdown" data-url="{{ fl_href }}"><i class="icon-ok"></i> {% trans %}Following{% endtrans %}</a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#">{% trans %}Unfollow{% endtrans %}</a></li>
        </ul>
    </div>
    {% elseif fl_status == 3 %}
    <a href="#" class="btn btn-yes btn-follow" data-url="{{ fl_href }}"><i class="icon-rss"></i> {% trans %}Follow{% endtrans %}</a>
    {% endif %}
</div>
{% endblock %}

{% block friend_common_friend_button_template %}
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
{% endblock %}

{% block friend_common_friend_button_javascript %}
{% endblock %}