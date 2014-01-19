<?php

/* __string_template__87f6e410a69e59cc949f43c46a56f3a21c6653bfdc9f9b3cf7c167c43f758cca */
class __TwigTemplate_b44b041b0d9d8f2527dd885165dd601db127bf48befdca2654f49ef78258e5be extends Twig_Template
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
  <input type=\"hidden\" id=\"current-user-slug\" value=\"user2\" />
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
\t\t\t\t\t<a href=\"http://localhost/yesocl/wall-page/user2/\">
\t\t\t\t\t\t<img src=\"http://localhost/yesocl/image/cache/data/catalog/user/518f5f43471deeb40900001f/avatar-180x180.jpg\" />
\t\t\t\t\t</a>
          <a href=\"#\" class=\"dropdown-toggle toggle-user-menu\" data-toggle=\"dropdown\">
            <i class=\"icon-arrow-down\"></i>
          </a>
          <ul class=\"dropdown-menu\">
                            <li>
                <a href=\"http://localhost/yesocl/profile/edit/\">
                  <i class=\"icon-user\"></i> Edit profile                </a>
              </li>
              <li>
                <a href=\"http://localhost/yesocl/change-password/\">
                  <i class=\"icon-unlock-alt\"></i> Change password                </a>
              </li>
              <li>
                <a href=\"http://localhost/yesocl/avatar/change/\">
                  <i class=\"icon-camera\"></i> Change avatar                </a>
              </li>
              <li class=\"divider\"></li>
              <li>
                <a href=\"http://localhost/yesocl/logout/\">
                  <i class=\"icon-signout\"></i> Log out                </a>
              </li>
          </ul>
\t\t\t\t</div>
\t\t\t\t<div class=\"fr user-info\">
\t\t\t\t\t<a class=\"user-name\" href=\"http://localhost/yesocl/wall-page/user2/\">user2</a>
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
        return "__string_template__87f6e410a69e59cc949f43c46a56f3a21c6653bfdc9f9b3cf7c167c43f758cca";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
