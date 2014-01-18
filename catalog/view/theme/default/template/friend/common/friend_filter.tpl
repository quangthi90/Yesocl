{% block friend_common_friend_filter %}
    <div id="friend-filter">
        <div class="friend-search">
            <input type="text" placeholder="quick filter ..." size="50" id="filter-input" />
            <span><i class="icon-search"></i></span>
        </div>
        <ul class="friend-conditions">
            <li class="friend-condition active" data-friend="all"{# data-url="{{ path('GetFriends', {user_slug: user.slug, filter_type: filter_type.recent, filter_value: 0}) }}"#}>
                <i class="icon-list"></i><a href="#">{% trans %}All Friends{% endtrans %} (<strong>{{ friend_count }}</strong>)</a>
            </li>          
            <li class="friend-condition" data-friend="recent" {# data-url="{{ path('GetFriends', {user_slug: user.slug, filter_type: filter_type.recent, filter_value: 1}) }}"#}>
                <i class="icon-star"></i><a href="#">{% trans %}Recently Added{% endtrans %}</a>
            </li>
            <li class="friend-condition" data-friend="male" {#} data-url="{{ path('GetFriends', {user_slug: user.slug, filter_type: filter_type.gender, filter_value: 1}) }}" data-filter="{{ data_filter_male }}"#}>
                <i class="icon-male"></i><a href="#">{% trans %}Male Friends{% endtrans %}</a>
            </li>
            <li class="friend-condition" data-friend="female" {# data-url="{{ path('GetFriends', {user_slug: user.slug, filter_type: filter_type.gender, filter_value: 0}) }}" data-filter="{{ data_filter_female }}"#}>
                <i class="icon-female"></i><a href="#">{% trans %}Female Friends{% endtrans %}</a>
            </li> 
        </ul>
        {#<ul class="friend-conditions mutual-friend-block">
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