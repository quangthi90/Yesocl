{% set user_slug = get_current_user().slug %}
<div id="y-sidebar">
	<div class="sidebar-wrapper">
		<div class="sidebar-header">
			<h3>
				<span id="sidebar-close"><i class="icon-hand-left"></i></span>
				{% trans %}Main Menu{% endtrans %}
			</h3>
		</div>
		<div class="search-box">
			<input type="text" name="ss-keyword" id="ss-keyword" placeholder="Search" />
			<a href="#" class="btn-search"><i class="icon-search"></i></a>
		</div>
		<div class="sidebar-controls">
			<ul class="yes-menu-list left-menu disable-select">
				{% block sidebar_control %}
					{% set menu = get_flash('menu') %}
				  	<li id="refresh-page-item" class="menu-item {% if menu == 'refresh' %}active{% endif %}" data-bind="with: $root.refreshOptionConfigModel">
				  		<a href="{{ path('RefreshPage') }}">
				  			<i class="icon-refresh"></i> <span>{% trans %}What's new{% endtrans %}</span>
				  		</a>
				  		<a class="toogle-submenu down">
				  			<i class="icon-chevron-up"></i>
				  			<i class="icon-chevron-down"></i>
			  			</a>
					    <!-- ko if: items().length > 0 -->
				  		<ul class="sub-menu hidden" data-bind="foreach: items()">
    						<li class="menu-item sub-menu-item">
				  			<!-- ko if: $data.isEnabled() -->
						  		<a href="javascript:void(0);"><i class="icon-ok"></i><span data-bind="text: $('<textarea />').html($data.title()).text()"></span></a>
					  		<!-- /ko -->
					  		<!-- ko ifnot: $data.isEnabled() -->
						  		<a href="javascript:void(0);" data-bind="click: $parent.enable"><i class="icon-hand-right"></i><span data-bind="text: $('<textarea />').html($data.title()).text()"></span></a>
					  		<!-- /ko -->
					  		</li>
						</ul>
					    <!-- /ko -->
				  	</li>
				  	<li class="menu-item {% if menu == 'home' %}active{% endif %}">
				  		<a href="{{ path('HomePage') }}">
				  			<i class="icon-home"></i> <span>{% trans %}Home feed{% endtrans %}</span>
				  		</a>
				  	</li>
				  	<li class="menu-item {% if menu == 'wall' %}active{% endif %}">
				  		<a href="{{ path('WallPage', {user_slug: user_slug}) }}">
				  			<i class="icon-bookmark"></i> <span>{% trans %}Wall Page{% endtrans %}</span>
			  			</a>
				  	</li>
				  	<li class="menu-item {% if menu == 'profile' %}active{% endif %}">
				  		<a href="{{ path('ProfilePage', {user_slug: user_slug}) }}">
				  			<i class="icon-user-md"></i> <span>{% trans %}Profile{% endtrans %}</span>
			  			</a>
				  	</li>
				  	<li class="menu-item {% if menu == 'friend' %}active{% endif %}">
				  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
				  			<i class="icon-fire"></i> <span>{% trans %}Friend{% endtrans %}</span>
			  			</a>
				  	</li>
				  	<li class="menu-item {% if menu == 'follow' %}active{% endif %}">
				  		<a href="{{ path('FollowPage', {user_slug: user_slug}) }}">
				  			<i class="icon-fire"></i> <span>{% trans %}Follower{% endtrans %}</span>
			  			</a>
				  	</li>
				  	{% if show_branch_menu == true %}
				  	<li class="menu-item {% if menu == 'branch' %}active{% endif %}">
				  		<a href="{{ path('BranchList') }}">
				  			<i class="icon-fire"></i> <span>{% trans %}Branch{% endtrans %}</span>
			  			</a>
				  	</li>
				  	{% endif %}
				  	<li class="menu-item {% if menu == 'stock' %}active{% endif %}">
				  		<a href="{{ path('StockMarket') }}">
				  			<i class="icon-fire"></i> <span>{% trans %}Stock{% endtrans %}</span>
			  			</a>
				  	</li>
			  	{% endblock %}
			</ul>
		</div>
	</div>
	<div id="sidebar-toggle">
		<span class="symbol">
			<i class="icon-circle"></i><br/>
			<i class="icon-circle"></i><br/>
			<i class="icon-circle"></i>
		</span>
	</div>
</div>