<?php

/* default/template/common/header.tpl */
class __TwigTemplate_abce6f42d546f5b8adfc8452b44f76c6cff6f857d7c3eafcc3d23811c03249c0 extends Twig_Template
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
        $context["currUser"] = call_user_func_array($this->env->getFunction('get_current_user')->getCallable(), array());
        // line 2
        if ((call_user_func_array($this->env->getFunction('is_logged')->getCallable(), array()) && ((isset($context["currUser"]) ? $context["currUser"] : null) != null))) {
            // line 4
            echo "<div id=\"current-user-info\" class=\"hidden\">
  <input type=\"hidden\" id=\"current-user-slug\" value=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currUser"]) ? $context["currUser"] : null), "slug"), "html", null, true);
            echo "\" />
</div>
";
            // line 8
            echo "<div id=\"y-header\">
\t<div class=\"header-wrapper\">
\t\t<div id=\"header-logo\">
\t\t\t<a href=\"";
            // line 11
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("HomePage")), "html", null, true);
            echo "\">
\t\t\t\t<img src=\"";
            // line 12
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_img')->getCallable(), array("template/logo.png")), "html", null, true);
            echo "\" />
\t\t\t</a>
\t\t</div>
\t\t<div id=\"header-user\">
\t\t\t<div id=\"user-info-wrapper\" class=\"fr\">\t
\t\t\t\t<div class=\"fr user-avatar dropdown\">
\t\t\t\t\t<a href=\"";
            // line 18
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["currUser"]) ? $context["currUser"] : null), "slug")))), "html", null, true);
            echo "\">
\t\t\t\t\t\t<img src=\"";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currUser"]) ? $context["currUser"] : null), "avatar"), "html", null, true);
            echo "\" />
\t\t\t\t\t</a>
          <a href=\"#\" class=\"dropdown-toggle toggle-user-menu\" data-toggle=\"dropdown\">
            <i class=\"icon-arrow-down\"></i>
          </a>
          <ul class=\"dropdown-menu\">
              ";
            // line 30
            echo "              <li>
                <a href=\"";
            // line 31
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileEdit")), "html", null, true);
            echo "\">
                  <i class=\"icon-user\"></i> ";
            // line 32
            echo gettext("Edit profile");
            // line 33
            echo "                </a>
              </li>
              <li>
                <a href=\"";
            // line 36
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ChangePassword")), "html", null, true);
            echo "\">
                  <i class=\"icon-unlock-alt\"></i> ";
            // line 37
            echo gettext("Change password");
            // line 38
            echo "                </a>
              </li>
              <li>
                <a href=\"";
            // line 41
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ChangeAvatar")), "html", null, true);
            echo "\">
                  <i class=\"icon-camera\"></i> ";
            // line 42
            echo gettext("Change avatar");
            // line 43
            echo "                </a>
              </li>
              <li class=\"divider\"></li>
              <li>
                <a href=\"";
            // line 47
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("Logout")), "html", null, true);
            echo "\">
                  <i class=\"icon-signout\"></i> ";
            // line 48
            echo gettext("Log out");
            // line 49
            echo "                </a>
              </li>
          </ul>
\t\t\t\t</div>
\t\t\t\t<div class=\"fr user-info\">
\t\t\t\t\t<a class=\"user-name\" href=\"";
            // line 54
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["currUser"]) ? $context["currUser"] : null), "slug")))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currUser"]) ? $context["currUser"] : null), "username"), "html", null, true);
            echo "</a>
\t\t\t    <span class=\"user-more-info\">
            ";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currUser"]) ? $context["currUser"] : null), "current"), "html", null, true);
            echo "
          </span>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div id=\"user-quick-menu\" class=\"fr user-menu\">
\t\t\t    <a href=\"#\" id=\"btn-search-invoke-on\">
            <i class=\"icon-search\"></i>
          </a>
          <a href=\"";
            // line 64
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("MessagePage")), "html", null, true);
            echo "\">
\t\t\t    \t<i class=\"icon-edit\"></i>
\t\t\t    </a>
\t\t\t</div>
\t\t\t<div id=\"user-notification\" class=\"fr notification-group\">
        <div class=\"notification-item common js-notification-common\" data-notification-count=\"";
            // line 69
            echo twig_escape_filter($this->env, (isset($context["notification_count"]) ? $context["notification_count"] : null), "html", null, true);
            echo "\">
          <a href=\"#\" class=\"btn-notification btn-header-not-search js-btn-see-notify\">
            <i class=\"icon-bell\"></i>
            <span class=\"notification-item-count";
            // line 72
            if (((isset($context["notification_count"]) ? $context["notification_count"] : null) == 0)) {
                echo " hidden";
            }
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["notification_count"]) ? $context["notification_count"] : null), "html", null, true);
            echo "</span>
          </a>
          <div class=\"notification-content-list\">
            <ul>
              ";
            // line 76
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["notifications"]) ? $context["notifications"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["notification"]) {
                // line 77
                echo "                ";
                $context["user"] = $this->getAttribute((isset($context["users"]) ? $context["users"] : null), $this->getAttribute((isset($context["notification"]) ? $context["notification"] : null), "actor_id", array(), "array"), array(), "array");
                // line 78
                echo "              <li class=\"notification-content-item";
                if (($this->getAttribute((isset($context["notification"]) ? $context["notification"] : null), "read") == false)) {
                    echo " unread";
                } else {
                    echo " read";
                }
                echo "\" data-link=\"";
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostPage", array("post_slug" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : null), "slug"), "post_type" => $this->getAttribute((isset($context["notification"]) ? $context["notification"] : null), "type")))), "html", null, true);
                echo "\">
                  <div class=\"notification-content-item-img\">
                    <a href=\"";
                // line 80
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
                echo "\">
                      <img src=\"";
                // line 81
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar"), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
                echo "\" />
                    </a>                    
                  </div>
                  <div class=\"notification-content-item-detail\">
                    <div class=\"notification-text\">
                      ";
                // line 86
                echo twig_escape_filter($this->env, ((($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username") . " ") . $this->getAttribute((isset($context["notification"]) ? $context["notification"] : null), "action")) . ": "), "html", null, true);
                echo "
                      \"";
                // line 87
                echo $this->getAttribute((isset($context["notification"]) ? $context["notification"] : null), "title");
                echo "\"
                    </div>
                    <div class=\"notification-time\">
                      ";
                // line 90
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["notification"]) ? $context["notification"] : null), "created"), (isset($context["format_date"]) ? $context["format_date"] : null)), "html", null, true);
                echo "
                    </div>
                  </div>
              </li>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notification'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "            </ul>
          </div>
        </div>
        <div class=\"notification-item message js-noti-mess\">
          <a href=\"#\" class=\"btn-notification js-btn-noti-mess btn-header-not-search\">
            <i class=\"icon-envelope\"></i>
            ";
            // line 101
            if (((isset($context["mess_unread"]) ? $context["mess_unread"] : null) > 0)) {
                // line 102
                echo "            <span class=\"notification-item-count\">";
                echo twig_escape_filter($this->env, (isset($context["mess_unread"]) ? $context["mess_unread"] : null), "html", null, true);
                echo "</span>
            ";
            }
            // line 104
            echo "          </a>
          <div class=\"notification-content-list\">
            <ul class=\"js-noti-mess-list\"></ul>
          </div>
        </div>
        ";
            // line 109
            $context["requests"] = call_user_func_array($this->env->getFunction('get_request_friend')->getCallable(), array());
            // line 110
            echo "        <div class=\"notification-item friend\">
          <a href=\"#\" class=\"btn-notification btn-header-not-search\">
            <i class=\"icon-user\"></i>
            ";
            // line 113
            if ((twig_length_filter($this->env, (isset($context["requests"]) ? $context["requests"] : null)) > 0)) {
                // line 114
                echo "            <span class=\"notification-item-count\" data-count=\"";
                echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["requests"]) ? $context["requests"] : null)), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["requests"]) ? $context["requests"] : null)), "html", null, true);
                echo "</span>
            ";
            }
            // line 116
            echo "          </a>
          ";
            // line 117
            if ((twig_length_filter($this->env, (isset($context["requests"]) ? $context["requests"] : null)) > 0)) {
                // line 118
                echo "          <div class=\"notification-content-list\">
            <ul>
              ";
                // line 120
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["requests"]) ? $context["requests"] : null));
                foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                    // line 121
                    echo "              <li class=\"notification-content-item notify-actions\" data-slug=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug"), "html", null, true);
                    echo "\">
                <a href=\"";
                    // line 122
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
                    echo "\" class=\"notification-content-item-img\">
                  <img src=\"";
                    // line 123
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar"), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
                    echo "\">
                </a>
                <div class=\"notification-content-item-detail\">
                  <div class=\"notification-text\">
                    <a href=\"";
                    // line 127
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
                    echo "</a> ";
                    echo gettext("added you as friend");
                    // line 128
                    echo "                  </div>
                  <div>
                    <a href=\"#\" class=\"btn btn-yes btn-accept\">";
                    // line 130
                    echo gettext("Accept");
                    echo "</a>
                    <a href=\"#\" class=\"btn btn-yes btn-ignore\">";
                    // line 131
                    echo gettext("Ignore");
                    echo "</a>
                  </div>
                </div>
              </li>
              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 136
                echo "            </ul>
          </div>
          ";
            }
            // line 139
            echo "        </div>
\t\t\t</div>
\t\t</div>
\t</div>                               
</div>
<div id=\"html-template-header\" class=\"hidden\">
  <div id=\"message-item-header\">
    <li class=\"user-message-li \${_class}\">
      <a href=\"";
            // line 147
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("MessagePage")), "html", null, true);
            echo "\" class=\"user-message-link\">
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
        } else {
            // line 163
            echo "<div id=\"y-header-no-login\">
  <div id=\"y-logo-no-login\">
    <a href=\"";
            // line 165
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WelcomePage")), "html", null, true);
            echo "\">
      <img src=\"";
            // line 166
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_img')->getCallable(), array("template/logo.png")), "html", null, true);
            echo "\"/>
    </a>
  </div>
  <div class=\"login-container\">    
    <div class=\"login-yesocl\">
      <form action=\"";
            // line 171
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("AjaxLogin")), "html", null, true);
            echo "\" method=\"post\" class=\"row-fluid login-form\" data-url=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("Login")), "html", null, true);
            echo "\">        
        <div class=\"y-rows fl\">
          <div class=\"y-row\">
            <div class=\"y-td input-prepend\">
              <span class=\"add-on\"><i class=\"icon-user\"></i></span>
              <input required=\"required\" name=\"email\" type=\"email\" autocomplete=\"off\"
                  placeholder=\"Email\"  class=\"input-welcome\" tabindex=\"1\" />
            </div>
            <div class=\"y-td input-prepend\">
              <span class=\"add-on\"><i class=\"icon-lock\"></i></span>
              <input required=\"required\" name=\"password\" type=\"password\" autocomplete=\"off\"
                  placeholder=\"Password\" class=\"input-welcome\" tabindex=\"2\" />
            </div>
          </div>
          <div class=\"y-row\">
            <span class=\"remember-login\">
              <input type=\"checkbox\" name=\"remember\" value=\"true\" id=\"remember\"> 
              <label for=\"remember\">";
            // line 188
            echo gettext("Remember me");
            echo "</label>
            </span>
            <a class=\"link-login\" href=\"";
            // line 190
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("LostPass")), "html", null, true);
            echo "\">";
            echo gettext("Forgot password");
            echo "!</a>
          </div>
        </div>
        <div class=\"btn-container fl\">
          <button type=\"submit\" class=\"btn btn-yes btn-login\" tabindex=\"3\">";
            // line 194
            echo gettext("Sign in");
            // line 195
            echo "          </button>     
        </div>                   
      </form>
    </div>
    <div class=\"login-social\">
      <ul>
          <li>
              <a href=\"";
            // line 202
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["action"]) ? $context["action"] : null), "connect_face"), "html", null, true);
            echo "\"><i class=\"icon-facebook\"></i></a>
          </li>
          <li>
              <a href=\"#\"><i class=\"icon-twitter\"></i></a>
          </li>
          <li>
              <a href=\"#\"><i class=\"icon-linkedin\"></i></a>
          </li>
          <li>
              <a href=\"#\"><i class=\"icon-google-plus\"></i></a>
          </li>
      </ul>
    </div>
  </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "default/template/common/header.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  405 => 202,  396 => 195,  394 => 194,  385 => 190,  380 => 188,  358 => 171,  350 => 166,  346 => 165,  342 => 163,  323 => 147,  313 => 139,  308 => 136,  297 => 131,  293 => 130,  289 => 128,  283 => 127,  274 => 123,  270 => 122,  265 => 121,  261 => 120,  257 => 118,  255 => 117,  252 => 116,  244 => 114,  242 => 113,  237 => 110,  235 => 109,  228 => 104,  222 => 102,  220 => 101,  212 => 95,  201 => 90,  195 => 87,  191 => 86,  181 => 81,  177 => 80,  165 => 78,  162 => 77,  158 => 76,  147 => 72,  141 => 69,  133 => 64,  122 => 56,  115 => 54,  108 => 49,  106 => 48,  102 => 47,  96 => 43,  94 => 42,  90 => 41,  85 => 38,  83 => 37,  79 => 36,  74 => 33,  72 => 32,  68 => 31,  65 => 30,  56 => 19,  52 => 18,  43 => 12,  39 => 11,  34 => 8,  29 => 5,  26 => 4,  24 => 2,  22 => 1,);
    }
}
