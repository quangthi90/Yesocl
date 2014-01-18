<?php

/* @template/default/template/account/profiles/tabs/profile_overview_edit.tpl */
class __TwigTemplate_214d881f37ece0ca7392816ba3aa266fb00e12a961afda739f5b1268e2d14d8c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'profiles_tabs_profile_overview_edit' => array($this, 'block_profiles_tabs_profile_overview_edit'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('profiles_tabs_profile_overview_edit', $context, $blocks);
    }

    public function block_profiles_tabs_profile_overview_edit($context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"profile-overview\" id=\"profile-overview-tab\" style=\"opacity: 0;\">
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
\t\t\t\t<a class=\"btn btn-yes profile-category-item\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfilePage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
        echo "\">
\t\t\t\t\t<i class=\"icon-check\"></i>
\t\t\t\t\t<span";
        // line 15
        echo gettext(">View your profile");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li class=\"profile-category-li\">
\t\t\t\t<a class=\"btn btn-yes profile-category-item profile-navigation-item\" href=\"#1\">
\t\t\t\t\t<i class=\"icon-check\"></i>
\t\t\t\t\t<span";
        // line 21
        echo gettext(">Personal Information");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li class=\"profile-category-li\">
\t\t\t\t<a class=\"btn btn-yes profile-category-item profile-navigation-item\" href=\"#2\">
\t\t\t\t\t<i class=\"icon-check\"></i>
\t\t\t\t\t<span>";
        // line 27
        echo gettext("Summary");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li class=\"profile-category-li\">
\t\t\t\t<a class=\"btn btn-yes profile-category-item profile-navigation-item\" href=\"#3\">
\t\t\t\t\t<i class=\"icon-check\"></i>
\t\t\t\t\t<span>";
        // line 33
        echo gettext("Education Background");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li class=\"profile-category-li\">
\t\t\t\t<a class=\"btn btn-yes profile-category-item profile-navigation-item\" href=\"#4\">
\t\t\t\t\t<i class=\"icon-check\"></i>
\t\t\t\t\t<span>";
        // line 39
        echo gettext("Work Experience");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t\t<li class=\"profile-category-li\">
\t\t\t\t<a class=\"btn btn-yes profile-category-item profile-navigation-item\" href=\"#5\">
\t\t\t\t\t<i class=\"icon-check\"></i>
\t\t\t\t\t<span>";
        // line 45
        echo gettext("Skill Sets");
        echo "</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t</ul>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/profile_overview_edit.tpl";
    }

    public function getDebugInfo()
    {
        return array (  63 => 15,  58 => 13,  50 => 8,  44 => 7,  37 => 5,  23 => 1,  106 => 19,  98 => 14,  94 => 13,  90 => 33,  81 => 27,  77 => 7,  74 => 6,  67 => 18,  65 => 6,  62 => 5,  1008 => 467,  994 => 456,  985 => 450,  976 => 444,  967 => 438,  958 => 432,  950 => 427,  941 => 422,  938 => 421,  936 => 420,  930 => 417,  922 => 412,  912 => 407,  906 => 406,  901 => 405,  898 => 404,  895 => 403,  892 => 402,  890 => 401,  884 => 398,  875 => 392,  866 => 386,  850 => 373,  844 => 370,  837 => 365,  826 => 363,  822 => 362,  816 => 359,  803 => 349,  799 => 348,  790 => 342,  786 => 341,  778 => 336,  774 => 335,  742 => 306,  737 => 304,  726 => 296,  722 => 295,  711 => 287,  706 => 284,  689 => 282,  685 => 281,  679 => 278,  671 => 274,  668 => 273,  666 => 272,  660 => 269,  649 => 261,  641 => 258,  635 => 255,  628 => 253,  623 => 252,  620 => 251,  617 => 250,  614 => 249,  612 => 248,  606 => 245,  597 => 239,  591 => 236,  586 => 234,  578 => 229,  574 => 228,  558 => 215,  546 => 205,  541 => 203,  536 => 202,  531 => 200,  526 => 199,  524 => 198,  518 => 195,  486 => 168,  480 => 165,  476 => 164,  469 => 160,  465 => 159,  461 => 158,  457 => 157,  450 => 153,  446 => 152,  442 => 151,  438 => 150,  431 => 146,  426 => 144,  415 => 137,  398 => 133,  383 => 131,  379 => 130,  375 => 129,  369 => 128,  365 => 127,  361 => 126,  358 => 125,  341 => 124,  335 => 121,  324 => 114,  304 => 110,  298 => 109,  292 => 108,  288 => 107,  281 => 106,  264 => 105,  258 => 102,  250 => 97,  246 => 96,  241 => 94,  237 => 93,  232 => 91,  225 => 87,  221 => 86,  217 => 85,  212 => 83,  197 => 71,  189 => 66,  185 => 65,  179 => 62,  175 => 61,  169 => 58,  165 => 57,  157 => 54,  153 => 53,  147 => 50,  143 => 49,  137 => 45,  120 => 39,  114 => 36,  99 => 39,  86 => 11,  76 => 23,  70 => 19,  66 => 19,  60 => 16,  56 => 15,  42 => 4,  36 => 2,  33 => 4,  29 => 2,  26 => 466,  24 => 1,  136 => 30,  132 => 29,  128 => 42,  124 => 40,  119 => 26,  116 => 25,  108 => 45,  104 => 19,  100 => 18,  96 => 16,  93 => 28,  87 => 12,  82 => 26,  79 => 10,  72 => 21,  35 => 4,  28 => 3,  21 => 2,  14 => 1,);
    }
}
