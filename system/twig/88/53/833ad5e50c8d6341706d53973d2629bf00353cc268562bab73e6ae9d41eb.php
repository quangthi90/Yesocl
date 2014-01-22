<?php

/* @template/default/template/account/profiles/tabs/profile_overview.tpl */
class __TwigTemplate_8853833ad5e50c8d6341706d53973d2629bf00353cc268562bab73e6ae9d41eb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'profiles_tabs_profile_overview' => array($this, 'block_profiles_tabs_profile_overview'),
            'profiles_tabs_profile_overview_javascript' => array($this, 'block_profiles_tabs_profile_overview_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('profiles_tabs_profile_overview', $context, $blocks);
        // line 46
        echo "
";
        // line 47
        $this->displayBlock('profiles_tabs_profile_overview_javascript', $context, $blocks);
    }

    // line 1
    public function block_profiles_tabs_profile_overview($context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"fl profile-column profile-overview\">
\t<div class=\"profile-user\">
\t\t<a href=\"";
        // line 4
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
        echo "\" class=\"profile-img\">
\t\t\t<img src=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar"), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
        echo "\">
\t\t</a>
\t\t<a href=\"";
        // line 7
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
        echo "\" class=\"profile-name\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
        echo "</a>
\t\t<span class=\"profile-metainfo\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "current"), "html", null, true);
        echo "</span>
\t</div>
\t<div class=\"profile-categories\">
\t\t<ul>
\t\t\t<li class=\"profile-category-li\">
\t\t\t\t<a class=\"btn btn-yes profile-category-item\" href=\"#profile-column-information\">
\t\t\t\t\t<i class=\"icon-check\"></i>
\t\t\t\t\t<span>";
        // line 15
        echo gettext("Personal Information");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li class=\"profile-category-li\">
\t\t\t\t<a class=\"btn btn-yes profile-category-item\" href=\"#profile-column-summary\">
\t\t\t\t\t<i class=\"icon-check\"></i>
\t\t\t\t\t<span>";
        // line 21
        echo gettext("Summary");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li class=\"profile-category-li\">
\t\t\t\t<a class=\"btn btn-yes profile-category-item\" href=\"#profile-column-education\">
\t\t\t\t\t<i class=\"icon-check\"></i>
\t\t\t\t\t<span>";
        // line 27
        echo gettext("Education Background");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li class=\"profile-category-li\">
\t\t\t\t<a class=\"btn btn-yes profile-category-item\" href=\"#profile-column-experience\">
\t\t\t\t\t<i class=\"icon-check\"></i>
\t\t\t\t\t<span>";
        // line 33
        echo gettext("Work Experience");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li class=\"profile-category-li\">
\t\t\t\t<a class=\"btn btn-yes profile-category-item\" href=\"#profile-column-skill\">
\t\t\t\t\t<i class=\"icon-check\"></i>
\t\t\t\t\t<span>";
        // line 39
        echo gettext("Skill Sets");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>
\t</div>
</div>
";
    }

    // line 47
    public function block_profiles_tabs_profile_overview_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/profile_overview.tpl";
    }

    public function getDebugInfo()
    {
        return array (  114 => 47,  103 => 39,  94 => 33,  85 => 27,  76 => 21,  67 => 15,  57 => 8,  51 => 7,  44 => 5,  40 => 4,  36 => 2,  33 => 1,  29 => 47,  26 => 46,  24 => 1,);
    }
}
