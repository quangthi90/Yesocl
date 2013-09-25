{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/account/common/profile_column.tpl' %}

{% block title %}{{ users[current_user_id].username }} | Friends {% endblock %}

{% block stylesheet %}
{% endblock %}

{% block body %}
<div id="y-content">
    <div id="y-main-content" class="has-horizontal account-friend" style="width: 9999px; padding-right: 250px;">
        {#% if current_user_id != get_current_user().id %}
            {% set user = users[current_user_id] %}
            {{ block('common_profile_column') }}
        {% endif %#}
        <div class="feed-block">
            <div class="block-header">
                <a class="block-title fl" href="#">Friend</a>  
                <a class="block-seemore fl" href="#"> 
                    <i class="icon-angle-right"></i>
                </a>
            </div>
            <div class="block-content">
            {% if current_user_id != get_current_user().id %}
                {% set current_friends = get_friend_list(true) %}
                {% for friend in friends %}
                    {% if in_array(friend.id, current_friends) %}
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <div class="dropdown">
                            <a href="#" class="btn btn-yes btn-friend dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Friend</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Unfriend</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="btn btn-yes btn-friend dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Following</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Unfollow</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                    {% else %}
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</a>
                        <a href="#" class="btn btn-yes btn-friend"><i class="icon-rss"></i> Follow</a>
                    </div>
                </div>
                    {% endif %}
                {% endfor %}
            {% else %}
                {% for friend in friends %}
                <div class="block-content-item friend-item">
                    <a href="#" class="fl friend-img">
                        <img src="http://scienceseeker.org/images/icons/default-avatar.jpg">
                    </a>
                    <div class="fl friend-info">
                        <a href="#" class="friend-name">WMThiet</a>
                        <ul class="friend-infolist">
                            <li>IT Engineer</li>
                            <li>100 friends</li>
                        </ul>
                    </div>
                    <div class="friend-actions">
                        <div class="dropdown">
                            <a href="#" class="btn btn-yes btn-friend dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Friend</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Unfriend</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <a href="#" class="btn btn-yes btn-friend dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Following</a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Unfollow</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                {% endfor %}
            {% endif %}                             
            </div>
        </div>  
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
    </div>
</div>
{% endblock %}

{% block javascript %}
    <script type="text/javascript">
        $('#search-input').typeahead({
            source: function (query, process) {

                //Lấy dữ liệu = ajax
                //..................

                friendList = [];
                map = {};    
                var tempImg = "http://scienceseeker.org/images/icons/default-avatar.jpg";         
                var data = [
                {"id":"1", "image": tempImg, "name": "Nguyễn Văn A", "url":"#", "numFriend":"10 friends"},
                {"id":"2", "image": tempImg, "name": "Trần Văn B", "url":"#", "numFriend":"10 friends"},
                {"id":"3", "image": tempImg, "name": "Nguyễn Thị C", "url":"#", "numFriend":"10 friends"},
                {"id":"4", "image": tempImg, "name": "Võ Văn D", "url":"#", "numFriend":"10 friends"},
                {"id":"5", "image": tempImg, "name": "Lê Thị E", "url":"#", "numFriend":"10 friends"}
                ];             
                $.each(data, function (i, item) {
                    friendList.push(item.id + '-' + item.name);
                    map[item.id + '-' + item.name] = item;
                });            
                process(friendList);
            },
            updater: function (item) {
                var selectedFriend = map[item];
                return selectedFriend.name;
            },
            matcher: function (item) {
                if (item.toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1) {
                    return true;
                }
            },
            sorter: function (items) {
                return items.sort();
            },
            highlighter: function (item) {
                var selectedFriend = map[item];
                var regex = new RegExp( '(' + this.query + ')', 'gi' );
                var boldItem = selectedFriend.name.replace( regex, "<strong>$1</strong>" );
                var htmlContent = '<div class="friend-dropdown-info">'
                                + '<img src="' + selectedFriend.image + '" alt="" />'
                                + '<div class="friend-meta-info">'
                                + '<span class="friend-name">' + boldItem + '</span>' 
                                + '<span class="num-friend">' + selectedFriend.numFriend + '</span>'   
                                + '</div>'
                                + '</div>';
                return htmlContent;
            }
        });
    </script>
{% endblock %}