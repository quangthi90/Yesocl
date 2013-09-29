{% block friend_common_friend_filter %}
    <div id="friend-filter">
        <div class="friend-header">
            <strong>{{ friends|length }} </strong> friends
        </div>
        <div class="friend-search">
            <input type="text" placeholder="quick search ..." size="50" name="friend-key" id="search-input" />
            <a href="#" class="friend-search-btn"><i class="icon-search"></i></a>
        </div>
        <ul class="friend-conditions">
            <li>
                <i class="icon-list"></i><a href="#">All Friends</a>
            </li>                
            <li class="active">
                <i class="icon-star"></i><a href="#">Recently Added</a>
            </li>
            <li>
                <i class="icon-male"></i><a href="#">Male Friends</a>
            </li>
            <li>
                <i class="icon-female"></i><a href="#">Female Friends</a>
            </li>  
        </ul>
        <ul class="friend-conditions mutual-friend-block">
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
        </ul> 
    </div>
{% endblock %}

{% block friend_common_friend_filter_javascript %}
    
{% endblock %}