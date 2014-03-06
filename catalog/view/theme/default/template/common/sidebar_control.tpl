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
			<ul class="yes-menu-list left-menu">
				{% block sidebar_control %}
					{% set menu = get_flash('menu') %}
				  	<li class="menu-item {% if menu == 'refresh' %}active{% endif %}">
				  		<a href="{{ path('RefreshPage') }}"> 
				  			<i class="icon-refresh"></i> <span>{% trans %}What's new{% endtrans %}</span>
				  		</a>
				  	</li>
				  	<li class="menu-item {% if menu == 'home' %}active{% endif %}">
				  		<a href="{{ path('HomePage') }}"> 
				  			<i class="icon-home"></i> <span>{% trans %}Home feed{% endtrans %}</span>
				  		</a>
				  	</li>
				  	{#<li class="menu-item">
				  		<a href="#">
				  			<i class="icon-umbrella"></i> <span>Follower's post </span>
			  			</a>
				  	</li>#}
				  	<li class="menu-item {% if menu == 'wall' %}active{% endif %}">
				  		<a href="{{ path('WallPage', {user_slug: user_slug}) }}">
				  			<i class="icon-bookmark"></i> <span>{% trans %}My Wall{% endtrans %}</span>
			  			</a>
				  	</li>	
				  	<li class="menu-item {% if menu == 'profile' %}active{% endif %}">
				  		<a href="{{ path('ProfilePage', {user_slug: user_slug}) }}">
				  			<i class="icon-user-md"></i> <span>{% trans %}My profile{% endtrans %}</span>
			  			</a>
				  	</li>
				  	<li class="menu-item {% if menu == 'friend' %}active{% endif %}">
				  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
				  			<i class="icon-fire"></i> <span>{% trans %}My friend{% endtrans %}</span>
			  			</a>
				  	</li>
				  	<li class="menu-item {% if menu == 'follow' %}active{% endif %}">
				  		<a href="{{ path('FollowPage') }}">
				  			<i class="icon-fire"></i> <span>{% trans %}My Following{% endtrans %}</span>
			  			</a>
				  	</li>
				  	{% if show_branch_menu == true %}
					  	<li class="menu-item {% if menu == 'branch' %}active{% endif %}">
					  		<a href="{{ path('BranchList') }}">
					  			<i class="icon-fire"></i> <span>{% trans %}My branch{% endtrans %}</span>
				  			</a>
					  	</li>
				  	{% endif %}
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