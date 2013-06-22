<div class="sidebar-wrapper">
	<div class="sidebar-border-right">
		<div class="row-fluid logo sidebar-box" id="logo">
			<a href="{{ action.home }}" title="Yesocl">
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
				    	<a href="#"><i class="caret icon-2x"></i></a>
				    </div>
				    <ul class="dropdown-menu">
				      <li><a href="#">Privacy settings</a></li>
				      <li><a href="{{ action.password }}">Change password</a></li>
				      <li class="divider"></li>
				      <li><a href="{{ action.logout }}">Log out</a></li>				      
				    </ul>
				</div>
			</div>			
		</div>
	</div>
	<div class="sidebar-controls">
		<ul class="nav nav-list left-menu">
			{% block sidebar_control %}
		  	<li class="nav-header">Post</li>
		  	<li class="menu-item" id="home-menu">
		  		<a href="{{ action.home }}"> 
		  			<i class="icon-refresh"></i> <span>What's new</span>
		  		</a>
		  	</li>
		  	<li class="menu-item" id="follower-menu">
		  		<a href="#"><i class="icon-umbrella"></i> <span>Follower's post </span></a>
		  	</li>
		  	<li class="divider"></li>
		  	<li class="nav-header">Personal</li>
		  	<li class="menu-item" id="account-menu">
		  		<a href="{{ action.account }}"><i class="icon-bookmark"></i> <span> My wall </span></a>
		  	</li>	
		  	<li class="menu-item" id="edit-menu">
		  		<a href="{{ action.profile }}"><i class="icon-user-md"></i> <span>My Profile </span></a>
		  	</li>
		  	<li class="divider"></li>
		  	<li class="nav-header">Groups</li>
		  	<li class="menu-item" id="categories-menu">
		  		<a href="{{ action.categories }}"><i class="icon-bar-chart"></i> <span>Stock</span> </a>
		  	</li>
		  	<li class="menu-item" id="tech-menu">
		  		<a href="#"><i class="icon-certificate"></i> <span>Technology </span></a>
		  	</li>
		  	{% endblock %}
		</ul>		
	</div>
	<div class="btn-container" id="close-bottom-sidebar">
		<a href="#" class="btn-close"><i class="icon-indent-left"></i></a>
	</div>
	<div class="btn-container" id="open-bottom-sidebar">
		<a href="#" class="btn-close"><i class="icon-indent-right"></i></a>
	</div> 
</div>