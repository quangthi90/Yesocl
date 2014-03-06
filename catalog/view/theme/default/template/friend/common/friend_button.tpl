{% block friend_common_friend_button %}
<div class="friend-actions">
    <!-- friend button -->
    {% if fr_status == 4 %}
    <a class="btn btn-yes btn-friend js-makefriend-btn friend-group"><i class="icon-plus-sign"></i> {% trans %}Make Friend{% endtrans %}</a>
    {% elseif fr_status == 2 %}
    <div class="dropdown friend-group">
        <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Friend{% endtrans %}</a>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a class="js-unfriend-btn">{% trans %}Unfriend{% endtrans %}</a>
            </li>
        </ul>
    </div>
    {% elseif fr_status == 3 %}
    <div class="dropdown friend-group">
        <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Sent Request{% endtrans %}</a>
        <ul class="dropdown-menu" role="menu">
            <li>
                <a class="js-cancel-request-friend-btn" href="#">{% trans %}Cancel Request{% endtrans %}</a>
            </li>
        </ul>
    </div>
    {% endif %}
    <!-- follow button -->
    {% if fl_status == 2 %}
    <div class="dropdown">
        <a href="#" class="btn btn-yes btn-friend dropdown-toggle" role="button" data-toggle="dropdown" data-url="{{ fl_href }}"><i class="icon-ok"></i> {% trans %}Following{% endtrans %}</a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="#" class="js-unfollow-btn">{% trans %}Unfollow{% endtrans %}</a></li>
        </ul>
    </div>
    {% elseif fl_status == 3 %}
    <a href="#" class="btn btn-yes btn-follow js-makefollow-btn" data-url="{{ fl_href }}"><i class="icon-rss"></i> {% trans %}Follow{% endtrans %}</a>
    {% endif %}
</div>
{% endblock %}

{% block friend_common_friend_button_template %}
<div class="hidden">
    <div id="send-request">
        <a class="btn btn-yes btn-friend friend-group js-makefriend-btn"><i class="icon-plus-sign"></i> {% trans %}Make Friend{% endtrans %}</a>
    </div>
    <div id="cancel-request">
        <div class="dropdown friend-group">
            <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Sent Request{% endtrans %}</a>
            <ul class="dropdown-menu" role="menu">
                <li>
                    <a class="btn-friend js-cancel-request-friend-btn" href="#">{% trans %}Cancel Request{% endtrans %}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
{% endblock %}

{% block friend_common_friend_button_javascript %}
{% endblock %}