<div id="y-footer">
    <div id="yes-footer-bar">
      <div class="bar-wrapper">
        <div class="footer-toolbar fl">
            <div class="footer-toolbar-item search">
              <div class="search-form" data-url="{{ path('SearchPage') }}">
                <div class="input-prepend">
                    <button class="btn btn-yes btn-search" type="button" style="width: 120px;">
                      <i class="icon-search"></i>Search
                    </button>
                    <input class="auto-hide" name="keyword" id="searchText" placeholder="Enter your key ..." type="text">
                </div> 
              </div> 
            </div>
            <div class="footer-toolbar-item notification-group">
              <div class="dropup notification-item common">
                <a href="#" class="btn-notification" data-toggle="dropdown">
                  <i class="icon-bell"></i>
                  <span class="notification-item-name">Notification</span>
                  <!--span class="notification-item-count">3</span-->
                </a>
                <!--ul class="dropdown-menu notification-content-list">
                  <li class="notification-content-item">
                    <a href="#" class="notification-content-item-img">
                      <img src="http://community.nasdaq.com/common/images/defaultUserAvatar.jpg" alt="">
                    </a>
                    <div class="notification-content-item-detail">
                      <div class="notification-text">
                        <a href="#">WMThiet</a> commented on your post
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
                    </div>
                  </li>
                </ul-->
              </div>
              <div class="dropup notification-item message">
                <a href="#" class="btn-notification" data-toggle="dropdown">
                  <i class="icon-envelope"></i>
                  <span class="notification-item-name">Message</span>
                  <!--span class="notification-item-count">5</span-->
                </a>
                <!--ul class="dropdown-menu notification-content-list">
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
                </ul-->
              </div>
              {% set requests = get_request_friend() %}
              <div class="dropup notification-item friend">
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
        <div class="footer-toolbar fr">
          <div class="footer-toolbar-item language-box">                    
            <form action="#">
                <div class="btn-group dropup">
                  <button class="btn btn-yes">Language</button>
                  <button class="btn btn-yes dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#"> <i class="icon-yes-flag icon-lang-eng"></i> English</a></li>
                    <li><a href="#"> <i class="icon-yes-flag icon-lang-vn"></i> Việt Nam</a></li>
                  </ul>
                </div>
            </form>
          </div>
          <div id="auto-scroll-left" class="fr" style="margin-right: 1px;">
            <a class="btn btn-yes"><i class="icon-fast-backward" style="margin-right: 10px; color: #fff;"></i> Go Left</a>
          </div>
        </div>        
      </div>
    </div>
    <div id="yes-info">
        <span class="links-footer">
            <a href="#">Create Group</a> - <a href="#">User privacy</a> - <a href="#">Term</a> - <a href="#">Help</a>
        </span>  
        <span class="copyright">
            Copyright &copy; 2012 - <strong>YESOCL.com</strong>
        </span>  
    </div>    
</div>
