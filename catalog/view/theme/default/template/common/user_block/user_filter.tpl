{% block common_user_block_user_filter %}
    <div class="user-box-filter">
        <div class="user-search">
            <input type="text" placeholder="quick filter ..." size="50" id="filter-input" />
            <span><i class="icon-search"></i></span>
        </div>
        <ul class="user-conditions">
            <li class="filter-condition active" data-filter="all">
                <i class="icon-list"></i><a href="#">{% trans %}All Friends{% endtrans %} (<strong>{{ friend_count }}</strong>)</a>
            </li>          
            <li class="filter-condition" data-filter="recent">
                <i class="icon-star"></i><a href="#">{% trans %}Recently Added{% endtrans %}</a>
            </li>
            <li class="filter-condition" data-filter="male">
                <i class="icon-male"></i><a href="#">{% trans %}Male Friends{% endtrans %}</a>
            </li>
            <li class="filter-condition" data-filter="female">
                <i class="icon-female"></i><a href="#">{% trans %}Female Friends{% endtrans %}</a>
            </li>
            <li class="filter-condition" data-filter="following">
                <i class="icon-rss-sign"></i><a href="#">{% trans %}Following{% endtrans %}</a>
            </li>
            <li class="filter-condition" data-filter="follower">
                <i class="icon-rss"></i><a href="#">{% trans %}Follower{% endtrans %}</a>
            </li>
        </ul>
        {#<ul class="user-conditions mutual-friend-block">
            <li>
                <i class="icon-ok"></i><a href="#">Mutual Friends</a>
            </li>
            <li>
                <i class="icon-ok"></i><a href="#">Same College</a>
            </li>
            <li>
                <i class="icon-ok"></i><a href="#">Same Company</a>
            </li>
            <li>
                <i class="icon-ok"></i><a href="#">Same Country</a>
            </li>
            <li>
                <i class="icon-ok"></i><a href="#">Same City</a>
            </li> 
        </ul>#}
    </div>
{% endblock %}