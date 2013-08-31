<div class="sidebar-wrapper">
	<div class="sidebar-border-right">
		<div class="row-fluid logo sidebar-box" id="logo">
			<a href="{{ action.home }}">
				<img src="image/template/logo.png" />
			</a>
		</div>
		<div class="row-fluid sidebar-user sidebar-box">
			<div class="sidebar-user-info">
				<div class="sidebar-user-avatar">
					<a href="{{ user_info.href }}"><img src="{{ user_info.avatar }}" /></a>
				</div>
			<div class="sidebar-user-name dropdown">
				<a href="#">
			      {{ user_info.username }}
			    </a>
			    <div class="user-can-do dropdown-toggle" data-toggle="dropdown">
			    	<a href="#"><i class="icon-caret-down icon-2x"></i></a>
			    </div>
			    <ul class="dropdown-menu">
			      <li><a href="#"><i class="icon-cogs"></i> Privacy settings</a></li>
			      <li><a href="{{ action.password }}"><i class="icon-unlock-alt"></i> Change password</a></li>
			      <li class="divider"></li>
			      <li><a href="{{ action.logout }}"><i class="icon-signout"></i> Log out</a></li>				      
			    </ul>
			</div>
		</div>				
		</div>
	</div>
	<div class="sidebar-controls">
		<ul class="nav nav-list left-menu">
			{% block sidebar_control %}
		  	<li class="menu-item" id="refresh-menu">
		  		<a href="{{ action.refresh|raw }}"> 
		  			<i class="icon-refresh"></i> <span>What's new</span>
		  		</a>
		  	</li>
		  	<li class="menu-item" id="home-menu">
		  		<a href="{{ action.home|raw }}"> 
		  			<i class="icon-home"></i> <span>Home feed</span>
		  		</a>
		  	</li>
		  	<li class="menu-item" id="follower-menu">
		  		<a href="#"><i class="icon-umbrella"></i> <span>Follower's post </span></a>
		  	</li>
		  	<li class="menu-item" id="account-menu">
		  		<a href="{{ action.account|raw }}"><i class="icon-bookmark"></i> <span> My wall </span></a>
		  	</li>	
		  	<li class="menu-item" id="edit-menu">
		  		<a href="{{ action.profile|raw }}"><i class="icon-user-md"></i> <span>My Profile </span></a>
		  	</li>
		  	<li class="menu-item" id="categories-menu">
		  		<a href="{{ action.categories|raw }}"><i class="icon-bar-chart"></i> <span>Stock</span> </a>
		  	</li>
		  	{% endblock %}
		</ul>	
	</div>
	<div class="btn-container">
		<a href="#" id="close-bottom-sidebar"><i class="icon-double-angle-up"></i></a>
		<a href="#" id="open-bottom-sidebar"><i class="icon-double-angle-down"></i></a>
	</div>
	<div class="hidden common-link">
		<input class="like-post" value="{{ action.like_post|raw }}" />
		<input class="like-comment" value="{{ action.like_comment|raw }}" />
	</div>
	<div style="width: 500px; height: 500px; top: 40px; left: 100px; display: none;" id="user-viewer-container">		
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
