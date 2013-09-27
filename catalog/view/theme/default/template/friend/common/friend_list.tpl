{% block friend_common_friend_list %}
    {% if users is not defined %}
        {% set users = [] %}
    {% endif %}
    {% if friends is defined %}
        {% for user in users %}
            {% if friends[user.id] is defined %}
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
        {% for user in users %}
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
{% endblock %}

{% block friend_common_friend_list_javascript %}
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