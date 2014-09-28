{% set user_slug = get_current_user().slug %}
{% set menu = get_flash('menu') %}
{# Main Sidebar Menu #}
<div id="menu" class="hidden-print hidden-xs sidebar-default sidebar-brand-primary">
    <div id="sidebar-social-wrapper">
        <div id="brandWrapper" style="text-align: center;">
            <a href="{{ path('HomePage') }}"><span class="text" style="font-size: 25px;">YESOCL</span></a>
        </div>
        <ul class="menu list-unstyled">
            <li class="hasSubmenu {% if menu == 'refresh' %}active{% endif %}">
                <a href="#menu-bf3509948e337ef2a1e23f03f7e2aa66" data-toggle="collapse"><i class="icon-refresh-1"></i><span>{% trans %}What's new{% endtrans %}</span></a>
                <ul class="collapse" id="menu-bf3509948e337ef2a1e23f03f7e2aa66">
                    <li class=""><a href="#"><i class="icon-thumbs-up"></i><span>All posts</span></a></li>
                    <li class=""><a href="#"><i class="icon-thumbs-up"></i><span>Branch posts</span></a></li>
                    <li class=""><a href="#"><i class="icon-thumbs-up"></i><span>Stock posts</span></a></li>
                    <li class="active"><a href="#"><i class="icon-checkmark-thick"></i><span>Friend, Friend's friend posts</span></a></li>
                </ul>
            </li>
            <li class="{% if menu == 'home' %}active{% endif %}">
                <a href="{{ path('HomePage') }}"><i class="icon-home-1"></i><span>{% trans %}Home feed{% endtrans %}</span></a>
            </li>
            <li class="{% if menu == 'wall' %}active{% endif %}">
                <a href="{{ path('WallPage', {user_slug: user_slug}) }}"><i class="icon-gate"></i><span>{% trans %}Wall Page{% endtrans %}</span></a>
            </li>
            <li class="{% if menu == 'profile' %}active{% endif %}">
                <a href="{{ path('ProfilePage', {user_slug: user_slug}) }}"><i class="icon-user-1"></i><span>{% trans %}Profile{% endtrans %}</span></a>
            </li>
            <li class="{% if menu == 'friend' %}active{% endif %}">
                <a href="{{ path('FriendPage', {user_slug: user_slug}) }}"><i class="icon-group"></i><span>{% trans %}Friend{% endtrans %}</span></a>
            </li>
            <li class="{% if menu == 'follow' %}active{% endif %}">
                <a href="{{ path('FollowPage', {user_slug: user_slug}) }}"><i class="icon-identification"></i><span>{% trans %}Follower{% endtrans %}</span></a>
            </li>
	  	{% if show_branch_menu == true %}
            <li class="{% if menu == 'branch' %}active{% endif %}">
                <a href="{{ path('BranchList') }}"><i class="icon-molecule-2"></i><span>{% trans %}Branch{% endtrans %}</span></a>
            </li>
	  	{% endif %}
            <li class="{% if menu == 'stock' %}active{% endif %}">
                <a href="{{ path('StockMarket') }}"><i class="icon-stocks-up"></i><span>{% trans %}Stock{% endtrans %}</span></a>
            </li>
        </ul>
    </div>
</div>
{# // Main Sidebar Menu END #}