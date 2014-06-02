{% use '@template/default/template/common/user_block/user_button.tpl' %}

{% block account_common_profile_column %}
    <div class="free-block fl" style="width: 180px;" data-bind="with: userInfoColumnModel">
        <div class="free-block-content">
            <div class="user_info_overview">
                <a class="user_info_avatar" data-bind="link: { title: wallUser.username, route: 'WallPage', params: { user_slug: wallUser.slug } }">
                    <img data-bind="attr : { 'src' : wallUser.avatar, alt : wallUser.username, title : wallUser.username }">
                </a>
                <a data-bind="link: { title: wallUser.username, route: 'WallPage', params: { user_slug: wallUser.slug } }" class="user_info_name">
                    <span data-bind="text: wallUser.username"></span>
                </a>
                <div class="user_relationship">
                    <!-- ko if: wallUser.friendStatus() == 2 -->
                    <div class="dropdown friend-group">
                        <a class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Friend{% endtrans %}</a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a data-bind="click: wallUser.unFriend">{% trans %}Unfriend{% endtrans %}</a></li>
                        </ul>
                    </div>
                    <!-- /ko -->
                    <!-- ko if: wallUser.friendStatus() == 3 -->
                    <div class="dropdown friend-group">
                        <a class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Sent Request{% endtrans %}</a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a data-bind="click: wallUser.cancelRequest">{% trans %}Cancel Request{% endtrans %}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /ko -->
                    <!-- ko if: wallUser.friendStatus() == 4 -->
                    <a class="btn btn-yes friend-group" data-bind="click: wallUser.makeFriend">
                        <i class="icon-plus-sign"></i> {% trans %}Make Friend{% endtrans %}
                    </a>
                    <!-- /ko -->
                    <!-- ko if: wallUser.followStatus() == 2 -->
                    <div class="dropdown follow-group">
                        <a class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Following{% endtrans %}</a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a class="btn-unfollow" data-bind="click: wallUser.unFollow">{% trans %}Unfollow{% endtrans %}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /ko -->
                    <!-- ko if: wallUser.followStatus() == 3 -->
                    <a class="btn btn-yes follow-group" data-bind="click: wallUser.follow">
                        <i class="icon-rss"></i> {% trans %}Follow{% endtrans %}
                    </a>
                    <!-- /ko -->
                </div>                    
            </div>
            <ul class="user_actions">
                <li>
                    <i class="icon-list-alt"></i>
                    <a  data-bind="link: { text: 'Profile', title: wallUser.username, route: 'ProfilePage', params: { user_slug: wallUser.slug } }">
                    </a>
                </li>
                <li>
                    <i class="icon-fire"></i>
                    <a  data-bind="link: { text: 'Friend', title: wallUser.username, route: 'FriendPage', params: { user_slug: wallUser.slug } }">
                    </a>
                </li>
                {#<li>
                    <i class="icon-file-alt"></i><a href="#">{% trans %}Posts{% endtrans %}</a>
                </li>
                <li>
                    <i class="icon-group"></i><a href="#">{% trans %}Groups{% endtrans %}</a>
                </li>
                <li>
                    <i class="icon-tasks"></i><a href="#">{% trans %}Activities{% endtrans %}</a>
                </li>#}
            </ul>
        </div>
    </div>
{% endblock %}