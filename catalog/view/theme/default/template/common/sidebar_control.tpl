{% set user_slug = get_current_user().slug %}
<div id="y-sidebar">
	<div class="sidebar-wrapper">		
		<div class="sidebar-controls">
			<ul class="nav nav-list left-menu">
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
			  	{% endblock %}
			</ul>	
		</div>
		<div style="width: 500px; height: 500px; top: 40px; left: 100px; display: none;" 
			id="user-viewer-container">		
		</div>
		<div style="display: none;" id="user-info-template">
			<div class="user-item fl">
				<div class="user-item-info fl">
					<a href="USER_URL" class="user-item-avatar fl">
						<img src="USER_IMG" alt="USER_NAME" />
					</a>
					<div class="user-item-overview fl">
						<a href="USER_URL" class="user-item-name">USER_NAME</a>
						<span><strong>NUMBER_OF_FRIEND</strong> friend(s)</span>
					</div>
				</div>
				<div class="user-actions fr">
					<a href="#" class="btn-user-actions">
						USER_ACTIONS
					</a>
				</div>
			</div>
		</div>
	</div>
</div>