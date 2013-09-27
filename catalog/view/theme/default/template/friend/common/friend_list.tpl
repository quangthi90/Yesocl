{% block friend_common_friend_list %}
    {% if users is not defined %}
        {% set users = [] %}
    {% endif %}
    {% for user in users %}
        <div class="block-content-item friend-item">
            <a href="#" class="fl friend-img">
                <img src="{{ user.avatar }}">
            </a>
            <div class="fl friend-info">
                <a href="#" class="friend-name">{{ user.username }}</a>
                <ul class="friend-infolist">
                    <li>{{ user.meta.industry }}</li>
                    <li>100 friends</li>
                </ul>
            </div>
            <div class="friend-actions">
                {% if user.fr_status == 0 %}
                <button data-url="{{ path('MakeFriend', {user_slug: user.slug}) }}" class="btn btn-yes btn-friend"><i class="icon-plus-sign"></i> Make Friend</button>
                {% elseif user.fr_status == 1 %}
                <div class="dropdown">
                    <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Friend</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a >Unfriend</a>
                        </li>
                    </ul>
                </div>
                {% else %}
                <div class="dropdown">
                    <a href="#" class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> Sent Request</a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="btn-friend" href="#" data-url="{{ path('MakeFriend', {user_slug: user.slug}) }}">Cancel Request</a>
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
{% endblock %}

{% block friend_common_friend_list_javascript %}
    <script type="text/javascript" src="{{ asset_js('friend.js') }}"></script>
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