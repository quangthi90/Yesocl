<div id="y-header">  
	{% set user_slug = get_current_user().slug %}
	<div class="header-wrapper">
		<div id="header-logo">
			<a href="{{ path('HomePage') }}">
				<img src="{{ asset_img('template/logo.png') }}" />
			</a>
		</div>
		<div id="header-user">
			<div id="user-info-wrapper" class="fr">	
				<div class="fr user-avatar">					
					<a href="{{ path('WallPage', {user_slug: user_slug}) }}">
						<img src="{{ user_info.avatar }}" />
					</a>
				</div>				
				<div class="fr user-info">
					<a class="user-name" href="{{ path('WallPage', {user_slug: user_slug}) }}">
				      	{{ user_info.username }}
				    </a>
				    <span class="user-more-info">Developer</span>
				</div>						
			</div>
			<div id="user-quick-menu" class="fr dropdown user-menu">							
			    <a href="#">
			    	<i class="icon-edit"></i>
		    		<span>New post</span>
			    </a>
			    <a class="dropdown-toggle toggle-user-menu" data-toggle="dropdown" href="#">
		    		<i class="icon-cog"></i>
		    		<span>Quick menu</span>
	    		</a>
			    <ul class="dropdown-menu">
			      	<li>
			      		<a href="#">
			      			<i class="icon-cogs"></i> Privacy settings
		      			</a>
		      		</li>
			      	<li>
			      		<a href="{{ path('ChangePassword') }}">
			      			<i class="icon-unlock-alt"></i> Change password
		      			</a>
		      		</li>
			      	<li>
			      		<a href="{{ path('ChangeAvatar') }}">
			      			<i class="icon-user"></i> Change avatar
		      			</a>
		      		</li>
			      	<li class="divider"></li>
			      	<li>
			      		<a href="{{ path('Logout') }}">
			      			<i class="icon-signout"></i> Log out
		      			</a>
		      		</li>				      
			    </ul>				
			</div>
			<div id="user-notification" class="fr notification-group">				
              <div class="dropdown notification-item common">
                <a href="#" class="btn-notification" data-toggle="dropdown">
                  <i class="icon-bell"></i>
                  <span class="notification-item-name">Notification</span>
                  <span class="notification-item-count">3</span>
                </a>
                <ul class="dropdown-menu notification-content-list">
                  <li class="notification-content-item">
                    <a href="#" class="notification-content-item-img">
                      <img src="http://community.nasdaq.com/common/images/defaultUserAvatar.jpg" alt="">
                    </a>
                    <div class="notification-content-item-detail">
                      <div class="notification-text">
                        <a href="#">WMThiet</a> commented on your post
                      </div>
                      <div class="notification-time">
                      	1 hour ago
                      </div>
                    </div>
                  </li>
                  <li class="notification-content-item">
                    <a href="#" class="notification-content-item-img">
                      <img src="http://community.nasdaq.com/common/images/defaultUserAvatar.jpg" alt="">
                    </a>
                    <div class="notification-content-item-detail">
                      <div class="notification-text">
                        <a href="#">WMThiet</a> commented on your post
                      </div>
                      <div class="notification-time">
                      	1 hour ago
                      </div>
                    </div>
                  </li>
                  <li class="notification-content-item">
                    <a href="#" class="notification-content-item-img">
                      <img src="http://community.nasdaq.com/common/images/defaultUserAvatar.jpg" alt="">
                    </a>
                    <div class="notification-content-item-detail">
                      <div class="notification-text">
                        <a href="#">WMThiet</a> commented on your post
                      </div>
                      <div class="notification-time">
                      	1 hour ago
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="dropdown notification-item message">
                <a href="#" class="btn-notification" data-toggle="dropdown">
                  <i class="icon-envelope"></i>
                  <span class="notification-item-name">Message</span>
                  <span class="notification-item-count">5</span>
                </a>
                <ul class="dropdown-menu notification-content-list">
                  <li class="notification-content-item">
                    <a href="#" class="notification-content-item-img">
                      <img src="http://community.nasdaq.com/common/images/defaultUserAvatar.jpg" alt="">
                    </a>
                    <div class="notification-content-item-detail">
                      <div class="notification-text">
                        <a href="#">WMThiet</a> sent a message to you
                      </div>
                      <div class="message-content">
                        hello everyone
                      </div>
                      <div class="notification-time">
                      	1 hour ago
                      </div>
                    </div>
                  </li>
                  <li class="notification-content-item">
                    <a href="#" class="notification-content-item-img">
                      <img src="http://community.nasdaq.com/common/images/defaultUserAvatar.jpg" alt="">
                    </a>
                    <div class="notification-content-item-detail">
                      <div class="notification-text">
                        <a href="#">WMThiet</a> sent a message to you
                      </div>
                      <div class="message-content">
                        hello everyone
                      </div>
                    </div>
                  </li>	                  
                </ul>
              </div>
              {% set requests = get_request_friend() %}
              <div class="dropdown notification-item friend">
                <a href="#" class="btn-notification" data-toggle="dropdown">
                  <i class="icon-user"></i>
                  <span class="notification-item-name">Friend</span>
                  {% if requests|length > 0 %}
                  <span class="notification-item-count" data-count="{{ requests|length }}">{{ requests|length }}</span>
                  {% endif %}
                </a>
                <ul class="dropdown-menu notification-content-list">
                  {% for user in requests %}
                  <li class="notification-content-item notify-actions">
                    <a href="{{ path('WallPage', {user_slug: user.slug}) }}" class="notification-content-item-img">
                      <img src="{{ user.avatar }}" alt="{{ user.username }}">
                    </a>
                    <div class="notification-content-item-detail">
                      <div class="notification-text">
                        <a href="{{ path('WallPage', {user_slug: user.slug}) }}">{{ user.username }}</a> added you as friend
                      </div>
                      <div>
                        <a href="#" data-url="{{ path('ConfirmFriend', {user_slug: user.slug}) }}" class="btn btn-yes btn-accept">Accept</a>
                        <a href="#" data-url="{{ path('IgnoreFriend', {user_slug: user.slug}) }}" class="btn btn-yes btn-ignore">Ignore </a>
                      </div>
                    </div>
                  </li>
                  {% endfor %}
                </ul>
              </div>
			</div>
		</div>
	</div>                               
</div>