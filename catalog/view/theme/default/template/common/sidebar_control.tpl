{% set user_slug = get_current_user().slug %}
<div id="y-sidebar">
	<div class="sidebar-wrapper">
		<div class="sidebar-header">
			<h3>
				<span id="sidebar-close"><i class="icon-hand-left"></i></span> 
				Main Menu
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
			  			<i class="icon-refresh"></i> <span>What's new</span>
			  		</a>
			  	</li>
			  	<li class="menu-item {% if menu == 'home' %}active{% endif %}">
			  		<a href="{{ path('HomePage') }}"> 
			  			<i class="icon-home"></i> <span>Home feed</span>
			  		</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="#">
			  			<i class="icon-umbrella"></i> <span>Follower's post </span>
		  			</a>
			  	</li>
			  	<li class="menu-item {% if menu == 'wall' %}active{% endif %}">
			  		<a href="{{ path('WallPage', {user_slug: user_slug}) }}">
			  			<i class="icon-bookmark"></i> <span> Wall Page </span>
		  			</a>
			  	</li>	
			  	<li class="menu-item">
			  		<a href="{{ path('ProfilePage') }}">
			  			<i class="icon-user-md"></i> <span>My profile </span>
		  			</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
			  			<i class="icon-fire"></i> <span>My friend</span>
		  			</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
			  			<i class="icon-fire"></i> <span>My friend</span>
		  			</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
			  			<i class="icon-fire"></i> <span>My friend</span>
		  			</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
			  			<i class="icon-fire"></i> <span>My friend</span>
		  			</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
			  			<i class="icon-fire"></i> <span>My friend</span>
		  			</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
			  			<i class="icon-fire"></i> <span>My friend</span>
		  			</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
			  			<i class="icon-fire"></i> <span>My friend</span>
		  			</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
			  			<i class="icon-fire"></i> <span>My friend</span>
		  			</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
			  			<i class="icon-fire"></i> <span>My friend</span>
		  			</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
			  			<i class="icon-fire"></i> <span>My friend</span>
		  			</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
			  			<i class="icon-fire"></i> <span>My friend</span>
		  			</a>
			  	</li>
			  	<li class="menu-item">
			  		<a href="{{ path('FriendPage', {user_slug: user_slug}) }}">
			  			<i class="icon-fire"></i> <span>My friend</span>
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