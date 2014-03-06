{% set currUser = get_current_user() %}
{% if is_logged() and currUser != null %}
{# current user info -- deleted after read #}
<div id="current-user-info" class="hidden">
  <input type="hidden" id="current-user-slug" value="{{ currUser.slug }}" />
</div>
{# end user #}
<div id="y-header">
	<div class="header-wrapper">
		<div id="header-logo">
			<a href="{{ path('HomePage') }}">
				<img src="{{ asset_img('template/logo.png') }}" />
			</a>
		</div>
		<div id="header-user">
			<div id="user-info-wrapper" class="fr">	
				<div class="fr user-avatar dropdown">
					<a href="{{ path('WallPage', {user_slug: currUser.slug}) }}" class="avatar">
						<img src="{{ currUser.avatar }}" />
					</a>
          <a href="#" class="dropdown-toggle toggle-user-menu" data-toggle="dropdown">
            <i class="icon-arrow-down"></i>
          </a>
          <ul class="dropdown-menu">
              {#<li>
                <a href="#">
                  <i class="icon-cogs"></i> Privacy settings
                </a>
              </li>#}
              <li>
                <a href="{{ path('ProfileEdit') }}">
                  <i class="icon-user"></i> {% trans %}Edit profile{% endtrans %}
                </a>
              </li>
              <li>
                <a href="{{ path('ChangePassword') }}">
                  <i class="icon-unlock-alt"></i> {% trans %}Change password{% endtrans %}
                </a>
              </li>
              <li>
                <a href="{{ path('ChangeAvatar') }}">
                  <i class="icon-camera"></i> {% trans %}Change avatar{% endtrans %}
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="{{ path('Logout') }}">
                  <i class="icon-signout"></i> {% trans %}Log out{% endtrans %}
                </a>
              </li>
          </ul>
				</div>
				<div class="fr user-info">
					<a class="user-name" href="{{ path('WallPage', {user_slug: currUser.slug}) }}">{{ currUser.username }}</a>
			    <span class="user-more-info js-current-status" title="{{ currUser.current }}">
            {{ currUser.current }}
          </span>
				</div>
			</div>
			<div id="user-quick-menu" class="fr user-menu">
			    <a href="#" id="btn-search-invoke-on">
            <i class="icon-search"></i>
          </a>
			</div>
			<div id="user-notification" class="fr notification-group">
        <div class="notification-item common js-notification-common" data-notification-count="{{ notification_count }}">
          <a href="#" class="btn-notification btn-header-not-search js-btn-see-notify">
            <i class="icon-bell"></i>
            <span class="notification-item-count{% if notification_count == 0 %} hidden{% endif %}">{{ notification_count }}</span>
          </a>
          <div class="notification-content-list">
            <ul>
              {% for notification in notifications %}
                {% set user = users[notification['actor_id']] %}
              <li class="notification-content-item{% if notification.read == false %} unread{% else %} read{% endif %}" data-link="{{ path('PostPage', {post_slug: notification.slug, post_type: notification.type}) }}">
                  <div class="notification-content-item-img">
                    <a href="{{ path('WallPage', {user_slug: user.slug}) }}">
                      <img src="{{ user.avatar }}" alt="{{ user.username }}" />
                    </a>                    
                  </div>
                  <div class="notification-content-item-detail">
                    <div class="notification-text">
                      {{ user.username }} {{ notification.action }} "{{ notification.title|raw }}"
                    </div>
                    <div class="notification-time">
                      {{ notification.created|date(format_date) }}
                    </div>
                  </div>
              </li>
              {% endfor %}
              {% if notifications|length == 0 %}
                <li class="notification-content-item empty-ntf">
                  {% trans %}No notifications to show{% endtrans %}
                </li>                
              {% endif %}
              <li class="notification-content-item see-all-ntf">
                  <a href="{{ path('NotificationPage') }}">{% trans %}See all notifications{% endtrans %}</a>
                </li>
            </ul>
          </div>
        </div>
        <div class="notification-item message js-noti-mess">
          <a href="#" class="btn-notification js-btn-noti-mess btn-header-not-search">
            <i class="icon-envelope"></i>
            {% if mess_unread > 0 %}
            <span class="notification-item-count">{{ mess_unread }}</span>
            {% endif %}
          </a>
          <div class="notification-content-list">
            <ul class="messages-list js-noti-mess-list">              
              <li class="notification-content-item empty-ntf">
                {% trans %}No messages to show{% endtrans %}
              </li>
              <li class="notification-content-item see-all-ntf">
                <a href="{{ path('MessagePage') }}">{% trans %}See all messages{% endtrans %}</a>
              </li>
            </ul>
          </div>
        </div>
        {% set requests = get_request_friend() %}
        <div class="notification-item friend">
          <a href="#" class="btn-notification btn-header-not-search">
            <i class="icon-user"></i>
            {% if requests|length > 0 %}
            <span class="notification-item-count" data-count="{{ requests|length }}">{{ requests|length }}</span>
            {% endif %}
          </a>
          {% if requests|length > 0 %}
          <div class="notification-content-list">
            <ul>
              {% for user in requests %}
              <li class="notification-content-item notify-actions" data-slug="{{ user.slug }}">
                <a href="{{ path('WallPage', {user_slug: user.slug}) }}" class="notification-content-item-img">
                  <img src="{{ user.avatar }}" alt="{{ user.username }}">
                </a>
                <div class="notification-content-item-detail">
                  <div class="notification-text">
                    <a href="{{ path('WallPage', {user_slug: user.slug}) }}">{{ user.username }}</a> {% trans %}added you as friend{% endtrans %}
                  </div>
                  <div>
                    <a href="#" class="btn btn-yes btn-accept">{% trans %}Accept{% endtrans %}</a>
                    <a href="#" class="btn btn-yes btn-ignore">{% trans %}Ignore{% endtrans %}</a>
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
<div id="html-template-header" class="hidden">
  <div id="message-item-header">
    <li class="user-message-li ${_class}">
      <a href="{{ path('MessagePage') }}" class="user-message-link">
        <img src="${user.avatar}" alt="${user.username}">
        <span class="user-message-info">
          <strong class="user-name">${user.username}</strong>
          <span class="message-overview">
              <i class="icon-mail-reply"></i>
              <i class="icon-ok"></i>
              <span>${content}</span>
          </span>
          <span class="message-time timeago" title="${created}"></span>
        </span>
      </a>
    </li>
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
              <label for="remember">{% trans %}Remember me{% endtrans %}</label>
            </span>
            <a class="link-login" href="{{ path('LostPass') }}">{% trans %}Forgot password{% endtrans %}!</a>
          </div>
        </div>
        <div class="btn-container fl">
          <button type="submit" class="btn btn-yes btn-login" tabindex="3">{% trans %}Sign in{% endtrans %}
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