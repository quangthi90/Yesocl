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
		<ul class="nav-list left-menu">
		  	<li class="menu-item" id="home-menu">
		  		<a href="{{ action.home }}"> 
		  			<i class="icon-home"></i> 
		  			<span>Home feed</span>
		  		</a>
		  	</li>
		  	<li class="menu-item" id="refresh-menu">
		  		<a href="{{ action.refresh }}"> 
		  			<i class="icon-refresh"></i> 
		  			<span>What's new</span>
		  		</a>
		  	</li>		  	
		  	<li class="menu-item" id="follower-menu">
		  		<a href="#">
		  			<i class="icon-umbrella"></i>
		  			<span>Follower</span>
		  		</a>
		  	</li>
		  	<li class="menu-item" id="account-menu">
		  		<a href="{{ action.account }}">
		  			<i class="icon-bookmark"></i>
		  			<span>My wall</span>
	  			</a>
		  	</li>	
		  	<li class="menu-item" id="edit-menu">
		  		<a href="{{ action.profile }}">
		  			<i class="icon-user-md"></i>
		  			<span>My Profile</span>
	  			</a>
		  	</li>
		  	<li class="menu-item" id="categories-menu">
		  		<a href="{{ action.categories }}">
		  			<i class="icon-bar-chart"></i>
		  			<span>Stock</span>
	  			</a>
		  	</li>
		</ul>		
	</div>
	<div class="btn-container">
		<a href="#" id="close-bottom-sidebar"><i class="icon-double-angle-up"></i></a>
		<a href="#" id="open-bottom-sidebar"><i class="icon-double-angle-down"></i></a>
	</div>
</div>
