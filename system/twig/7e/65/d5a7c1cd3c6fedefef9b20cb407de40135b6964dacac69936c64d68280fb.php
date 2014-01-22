<?php

/* __string_template__70de09dbfbd4ba4d28df7cf29d097e00ea4a91dd604f6594db30b4a79f0b783d */
class __TwigTemplate_7e65d5a7c1cd3c6fedefef9b20cb407de40135b6964dacac69936c64d68280fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"current-user-info\" class=\"hidden\">
  <input type=\"hidden\" id=\"current-user-slug\" value=\"user1\" />
</div>
<div id=\"y-header\">
\t<div class=\"header-wrapper\">
\t\t<div id=\"header-logo\">
\t\t\t<a href=\"http://localhost/yesocl/home/\">
\t\t\t\t<img src=\"http://localhost/yesocl/image/template/logo.png\" />
\t\t\t</a>
\t\t</div>
\t\t<div id=\"header-user\">
\t\t\t<div id=\"user-info-wrapper\" class=\"fr\">\t
\t\t\t\t<div class=\"fr user-avatar dropdown\">
\t\t\t\t\t<a href=\"http://localhost/yesocl/wall-page/user1/\">
\t\t\t\t\t\t<img src=\"http://localhost/yesocl/image/cache/data/catalog/user/518f5555471deea409000000/avatar-180x180.jpg\" />
\t\t\t\t\t</a>
          <a href=\"#\" class=\"dropdown-toggle toggle-user-menu\" data-toggle=\"dropdown\">
            <i class=\"icon-arrow-down\"></i>
          </a>
          <ul class=\"dropdown-menu\">
                            <li>
                <a href=\"http://localhost/yesocl/profile/edit/\">
                  <i class=\"icon-user\"></i> Thay đổi hồ sơ                </a>
              </li>
              <li>
                <a href=\"http://localhost/yesocl/change-password/\">
                  <i class=\"icon-unlock-alt\"></i> Thay đổi mật khẩu                </a>
              </li>
              <li>
                <a href=\"http://localhost/yesocl/avatar/change/\">
                  <i class=\"icon-camera\"></i> Thay đổi hình đại diện                </a>
              </li>
              <li class=\"divider\"></li>
              <li>
                <a href=\"http://localhost/yesocl/logout/\">
                  <i class=\"icon-signout\"></i> Đăng xuất                </a>
              </li>
          </ul>
\t\t\t\t</div>
\t\t\t\t<div class=\"fr user-info\">
\t\t\t\t\t<a class=\"user-name\" href=\"http://localhost/yesocl/wall-page/user1/\">Quang Thi</a>
\t\t\t    <span class=\"user-more-info\">
            working at YesGroup
          </span>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div id=\"user-quick-menu\" class=\"fr user-menu\">
\t\t\t    <a href=\"#\" id=\"btn-search-invoke-on\">
            <i class=\"icon-search\"></i>
          </a>
          <a href=\"http://localhost/yesocl/message/page/\">
\t\t\t    \t<i class=\"icon-edit\"></i>
\t\t\t    </a>
\t\t\t</div>
\t\t\t<div id=\"user-notification\" class=\"fr notification-group\">
        <div class=\"notification-item common js-notification-common\" data-notification-count=\"0\">
          <a href=\"#\" class=\"btn-notification btn-header-not-search js-btn-see-notify\">
            <i class=\"icon-bell\"></i>
            <span class=\"notification-item-count hidden\">0</span>
          </a>
          <div class=\"notification-content-list\">
            <ul>
                                            <li class=\"notification-content-item read\" data-link=\"http://localhost/yesocl/branch/post/lang-kinh-yestoc-phien-1608-can-trong-vung-khang-cu-manh-5217929f471dee3c08000000/\">
                  <div class=\"notification-content-item-img\">
                    <a href=\"http://localhost/yesocl/wall-page/user2/\">
                      <img src=\"http://localhost/yesocl/image/cache/data/catalog/user/518f5f43471deeb40900001f/avatar-100x100.jpg\" alt=\"user2\" />
                    </a>                    
                  </div>
                  <div class=\"notification-content-item-detail\">
                    <div class=\"notification-text\">
                      user2 likes your comment: 
                      \"6666666\"
                    </div>
                    <div class=\"notification-time\">
                      January 15, 2014 14:13
                    </div>
                  </div>
              </li>
                          </ul>
          </div>
        </div>
        <div class=\"notification-item message js-noti-mess\">
          <a href=\"#\" class=\"btn-notification js-btn-noti-mess btn-header-not-search\">
            <i class=\"icon-envelope\"></i>
                      </a>
          <div class=\"notification-content-list\">
            <ul class=\"js-noti-mess-list\"></ul>
          </div>
        </div>
                <div class=\"notification-item friend\">
          <a href=\"#\" class=\"btn-notification btn-header-not-search\">
            <i class=\"icon-user\"></i>
                      </a>
                  </div>
\t\t\t</div>
\t\t</div>
\t</div>                               
</div>
<div id=\"html-template-header\" class=\"hidden\">
  <div id=\"message-item-header\">
    <li class=\"user-message-li \${_class}\">
      <a href=\"http://localhost/yesocl/message/page/\" class=\"user-message-link\">
        <img src=\"\${user.avatar}\" alt=\"\${user.username}\">
        <span class=\"user-message-info\">
          <strong class=\"user-name\">\${user.username}</strong>
          <span class=\"message-overview\">
              <i class=\"icon-mail-reply\"></i>
              <i class=\"icon-ok\"></i>
              <span>\${content}</span>
          </span>
          <span class=\"message-time timeago\" title=\"\${created}\"></span>
        </span>
      </a>
    </li>
</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "__string_template__70de09dbfbd4ba4d28df7cf29d097e00ea4a91dd604f6594db30b4a79f0b783d";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
