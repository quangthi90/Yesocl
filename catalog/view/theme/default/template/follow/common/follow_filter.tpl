{% block follow_common_follow_filter %}
    <div class="user-box-filter" id="follow-filter">
        <div class="user-search">
            <input type="text" placeholder="quick filter ..." size="50" id="filter-input" />
            <span><i class="icon-search"></i></span>
        </div>
        <ul class="user-conditions">
            <li class="filter-condition follow-condition active" data-follow="following">
                <i class="icon-list"></i><a href="#">{% trans %}Follow each other{% endtrans %} (<strong>5</strong>)</a>
            </li>          
            <li class="filter-condition follow-condition" data-follow="following">
                <i class="icon-rss-sign"></i><a href="#">{% trans %}Following (<strong>5</strong>){% endtrans %}</a>
            </li>
            <li class="filter-condition follow-condition" data-follow="follower">
                <i class="icon-rss"></i><a href="#">{% trans %}Follower (<strong>5</strong>){% endtrans %}</a>
            </li>
        </ul>
    </div>
{% endblock %}