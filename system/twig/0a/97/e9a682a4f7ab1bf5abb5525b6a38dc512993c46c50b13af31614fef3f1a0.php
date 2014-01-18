<?php

/* default/template/common/sidebar_control.tpl */
class __TwigTemplate_0a97e9a682a4f7ab1bf5abb5525b6a38dc512993c46c50b13af31614fef3f1a0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'sidebar_control' => array($this, 'block_sidebar_control'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $context["user_slug"] = $this->getAttribute(call_user_func_array($this->env->getFunction('get_current_user')->getCallable(), array()), "slug");
        // line 2
        echo "<div id=\"y-sidebar\">
\t<div class=\"sidebar-wrapper\">
\t\t<div class=\"sidebar-header\">
\t\t\t<h3>
\t\t\t\t<span id=\"sidebar-close\"><i class=\"icon-hand-left\"></i></span> 
\t\t\t\t";
        // line 7
        echo gettext("Main Menu");
        // line 8
        echo "\t\t\t</h3>
\t\t</div>
\t\t<div class=\"search-box\">
\t\t\t<input type=\"text\" name=\"ss-keyword\" id=\"ss-keyword\" placeholder=\"Search\" />
\t\t\t<a href=\"#\" class=\"btn-search\"><i class=\"icon-search\"></i></a>
\t\t</div>
\t\t<div class=\"sidebar-controls\">
\t\t\t<ul class=\"yes-menu-list left-menu\">
\t\t\t\t";
        // line 16
        $this->displayBlock('sidebar_control', $context, $blocks);
        // line 49
        echo "\t\t\t</ul>\t
\t\t</div>
\t</div>
\t<div id=\"sidebar-toggle\">
\t\t<span class=\"symbol\">
\t\t\t<i class=\"icon-circle\"></i><br/>
\t\t\t<i class=\"icon-circle\"></i><br/>
\t\t\t<i class=\"icon-circle\"></i>
\t\t</span>\t\t
\t</div>
</div>";
    }

    // line 16
    public function block_sidebar_control($context, array $blocks = array())
    {
        // line 17
        echo "\t\t\t\t";
        $context["menu"] = call_user_func_array($this->env->getFunction('get_flash')->getCallable(), array("menu"));
        // line 18
        echo "\t\t\t  \t<li class=\"menu-item ";
        if (((isset($context["menu"]) ? $context["menu"] : null) == "refresh")) {
            echo "active";
        }
        echo "\">
\t\t\t  \t\t<a href=\"";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("RefreshPage")), "html", null, true);
        echo "\"> 
\t\t\t  \t\t\t<i class=\"icon-refresh\"></i> <span>";
        // line 20
        echo gettext("What's new");
        echo "</span>
\t\t\t  \t\t</a>
\t\t\t  \t</li>
\t\t\t  \t<li class=\"menu-item ";
        // line 23
        if (((isset($context["menu"]) ? $context["menu"] : null) == "home")) {
            echo "active";
        }
        echo "\">
\t\t\t  \t\t<a href=\"";
        // line 24
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("HomePage")), "html", null, true);
        echo "\"> 
\t\t\t  \t\t\t<i class=\"icon-home\"></i> <span>";
        // line 25
        echo gettext("Home feed");
        echo "</span>
\t\t\t  \t\t</a>
\t\t\t  \t</li>
\t\t\t  \t";
        // line 33
        echo "\t\t\t  \t<li class=\"menu-item ";
        if (((isset($context["menu"]) ? $context["menu"] : null) == "wall")) {
            echo "active";
        }
        echo "\">
\t\t\t  \t\t<a href=\"";
        // line 34
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => (isset($context["user_slug"]) ? $context["user_slug"] : null)))), "html", null, true);
        echo "\">
\t\t\t  \t\t\t<i class=\"icon-bookmark\"></i> <span>";
        // line 35
        echo gettext("Wall Page");
        echo "</span>
\t\t  \t\t\t</a>
\t\t\t  \t</li>\t
\t\t\t  \t<li class=\"menu-item ";
        // line 38
        if (((isset($context["menu"]) ? $context["menu"] : null) == "profile")) {
            echo "active";
        }
        echo "\">
\t\t\t  \t\t<a href=\"";
        // line 39
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfilePage", array("user_slug" => (isset($context["user_slug"]) ? $context["user_slug"] : null)))), "html", null, true);
        echo "\">
\t\t\t  \t\t\t<i class=\"icon-user-md\"></i> <span>";
        // line 40
        echo gettext("My profile");
        echo "</span>
\t\t  \t\t\t</a>
\t\t\t  \t</li>
\t\t\t  \t<li class=\"menu-item ";
        // line 43
        if (((isset($context["menu"]) ? $context["menu"] : null) == "friend")) {
            echo "active";
        }
        echo "\">
\t\t\t  \t\t<a href=\"";
        // line 44
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("FriendPage", array("user_slug" => (isset($context["user_slug"]) ? $context["user_slug"] : null)))), "html", null, true);
        echo "\">
\t\t\t  \t\t\t<i class=\"icon-fire\"></i> <span>";
        // line 45
        echo gettext("My friend");
        echo "</span>
\t\t  \t\t\t</a>
\t\t\t  \t</li>
\t\t\t  \t";
    }

    public function getTemplateName()
    {
        return "default/template/common/sidebar_control.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 45,  138 => 44,  132 => 43,  126 => 40,  122 => 39,  116 => 38,  110 => 35,  106 => 34,  99 => 33,  93 => 25,  89 => 24,  83 => 23,  77 => 20,  73 => 19,  66 => 18,  63 => 17,  60 => 16,  46 => 49,  44 => 16,  34 => 8,  32 => 7,  25 => 2,  23 => 1,);
    }
}
