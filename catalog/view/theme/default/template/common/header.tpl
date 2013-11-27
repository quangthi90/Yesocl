{% if is_logged() %}
  {% set user_slug = get_current_user().slug %}
<div id="y-header">
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
			    <a href="#" id="btn-search-invoke-on">
            <i class="icon-search"></i>
          </a>
          <a href="#">
			    	<i class="icon-edit"></i>
			    </a>
			    <a class="dropdown-toggle toggle-user-menu" data-toggle="dropdown" href="#">
		    		<i class="icon-cog"></i>
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
        <div class="notification-item common">
          <a href="#" class="btn-notification">
            <i class="icon-bell"></i>
            <span class="notification-item-count">3</span>
          </a>
          <div class="notification-content-list">
            <ul>
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
        </div>
        <div class="notification-item message">
          <a href="#" class="btn-notification">
            <i class="icon-envelope"></i>
            <span class="notification-item-count">5</span>
          </a>
          <div class="notification-content-list">
            <ul>
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
        </div>
        {% set requests = get_request_friend() %}
        <div class="notification-item friend">
          <a href="#" class="btn-notification">
            <i class="icon-user"></i>
            {% if requests|length > 0 %}
            <span class="notification-item-count" data-count="{{ requests|length }}">{{ requests|length }}</span>
            {% endif %}
          </a>
          {% if requests|length > 0 %}
          <div class="notification-content-list">
            <ul>
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
          {% endif %}
        </div>
			</div>
		</div>
	</div>                               
</div>
{% else %}
<div id="y-header-no-login">
  <div id="y-logo-no-login">
    <a href="{{ path('WelcomePage') }}">
      <img src="{{ asset_img('template/logo.png') }}"/>
    </a>
  </div>
  <div class="login-container">    
    <div class="login-yesocl">
      <form action="{{ path('AjaxLogin') }}" method="post" class="row-fluid login-form" data-url="{{ path('Login') }}">        
        <div class="y-rows fl">
          <div class="y-row">
            <div class="y-td input-prepend">
              <span class="add-on"><i class="icon-user"></i></span>
              <input required="required" name="email" type="email" autocomplete="off"
                  placeholder="Email"  class="input-welcome" tabindex="1" />
            </div>
            <div class="y-td input-prepend">
              <span class="add-on"><i class="icon-lock"></i></span>
              <input required="required" name="password" type="password" autocomplete="off"
                  placeholder="Password" class="input-welcome" tabindex="2" />
            </div>
          </div>
          <div class="y-row">
            <span class="remember-login">
              <input type="checkbox" name="remember" value="true" id="remember"> 
              <label for="remember">Remember me</label>
            </span>
            <a class="link-login" href="{{ path('LostPass') }}">Forgot password!</a>
          </div>
        </div>
        <div class="btn-container fl">
          <button type="submit" class="btn btn-yes btn-login" tabindex="3">Sign in
          </button>     
        </div>                   
      </form>
    </div>
    <div class="login-social">
      <ul>
          <li>
              <a href="{{ action.connect_face }}"><i class="icon-facebook"></i></a>
          </li>
          <li>
              <a href="#"><i class="icon-twitter"></i></a>
          </li>
          <li>
              <a href="#"><i class="icon-linkedin"></i></a>
          </li>
          <li>
              <a href="#"><i class="icon-google-plus"></i></a>
          </li>
      </ul>
    </div>
  </div>
</div>
{% endif %}