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
\t\t\t\t\t<span";
        // line 15
        echo gettext(">Personal Information");
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
        return array (  114 => 47,  51 => 7,  40 => 4,  85 => 27,  76 => 21,  73 => 24,  91 => 28,  88 => 27,  81 => 27,  69 => 17,  63 => 14,  58 => 12,  54 => 11,  105 => 34,  94 => 33,  92 => 34,  89 => 25,  61 => 12,  52 => 8,  45 => 6,  64 => 17,  57 => 8,  53 => 11,  49 => 8,  47 => 7,  44 => 5,  42 => 6,  30 => 1,  90 => 10,  86 => 24,  77 => 7,  74 => 6,  70 => 13,  67 => 15,  65 => 13,  62 => 16,  180 => 62,  170 => 55,  166 => 54,  160 => 51,  156 => 50,  149 => 46,  145 => 45,  139 => 42,  135 => 41,  129 => 38,  125 => 37,  120 => 34,  111 => 31,  107 => 36,  103 => 39,  98 => 29,  84 => 20,  78 => 19,  75 => 18,  71 => 16,  66 => 22,  60 => 12,  56 => 11,  50 => 8,  46 => 7,  39 => 3,  36 => 2,  33 => 1,  29 => 47,  26 => 46,  24 => 1,  136 => 30,  132 => 29,  128 => 28,  124 => 27,  119 => 26,  116 => 25,  108 => 20,  104 => 19,  100 => 32,  96 => 30,  93 => 23,  87 => 12,  82 => 8,  79 => 26,  72 => 8,  35 => 4,  28 => 3,  21 => 2,  14 => 1,);
    }
}
