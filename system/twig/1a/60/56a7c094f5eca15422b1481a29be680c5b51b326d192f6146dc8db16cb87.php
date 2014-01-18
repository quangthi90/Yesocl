<?php

/* @template/default/template/friend/common/friend_filter.tpl */
class __TwigTemplate_1a6056a7c094f5eca15422b1481a29be680c5b51b326d192f6146dc8db16cb87 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'friend_common_friend_filter' => array($this, 'block_friend_common_friend_filter'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('friend_common_friend_filter', $context, $blocks);
    }

    public function block_friend_common_friend_filter($context, array $blocks = array())
    {
        // line 2
        echo "    <div id=\"friend-filter\">
        <div class=\"friend-search\">
            <input type=\"text\" placeholder=\"quick filter ...\" size=\"50\" id=\"filter-input\" />
            <span><i class=\"icon-search\"></i></span>
        </div>
        <ul class=\"friend-conditions\">
            <li class=\"friend-condition active\" data-friend=\"all\"";
        // line 8
        echo ">
                <i class=\"icon-list\"></i><a href=\"#\">";
        // line 9
        echo gettext("All Friends");
        echo " (<strong>";
        echo twig_escape_filter($this->env, (isset($context["friend_count"]) ? $context["friend_count"] : null), "html", null, true);
        echo "</strong>)</a>
            </li>          
            <li class=\"friend-condition\" data-friend=\"recent\" ";
        // line 11
        echo ">
                <i class=\"icon-star\"></i><a href=\"#\">";
        // line 12
        echo gettext("Recently Added");
        echo "</a>
            </li>
            <li class=\"friend-condition\" data-friend=\"male\" ";
        // line 14
        echo ">
                <i class=\"icon-male\"></i><a href=\"#\">";
        // line 15
        echo gettext("Male Friends");
        echo "</a>
            </li>
            <li class=\"friend-condition\" data-friend=\"female\" ";
        // line 17
        echo ">
                <i class=\"icon-female\"></i><a href=\"#\">";
        // line 18
        echo gettext("Female Friends");
        echo "</a>
            </li> 
        </ul>
        ";
        // line 38
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "@template/default/template/friend/common/friend_filter.tpl";
    }

    public function getDebugInfo()
    {
        return array (  50 => 12,  40 => 9,  37 => 8,  117 => 29,  101 => 22,  95 => 19,  57 => 9,  54 => 8,  51 => 7,  48 => 6,  36 => 2,  33 => 1,  29 => 2,  26 => 27,  24 => 1,  130 => 54,  108 => 51,  105 => 34,  74 => 12,  64 => 10,  58 => 15,  55 => 14,  47 => 11,  45 => 5,  42 => 4,  39 => 3,  30 => 34,  27 => 33,  131 => 38,  125 => 35,  119 => 32,  111 => 29,  103 => 23,  94 => 20,  90 => 18,  88 => 17,  78 => 13,  75 => 13,  53 => 8,  49 => 7,  38 => 3,  185 => 49,  182 => 48,  173 => 43,  170 => 42,  168 => 41,  161 => 38,  155 => 34,  152 => 33,  135 => 31,  114 => 28,  112 => 28,  102 => 20,  96 => 21,  91 => 18,  87 => 14,  84 => 16,  79 => 10,  72 => 38,  35 => 54,  28 => 5,  21 => 4,  14 => 1,  142 => 45,  138 => 44,  132 => 30,  126 => 40,  122 => 39,  116 => 38,  110 => 35,  106 => 24,  99 => 33,  93 => 24,  89 => 24,  83 => 19,  77 => 16,  73 => 12,  66 => 18,  63 => 17,  60 => 10,  46 => 49,  44 => 4,  34 => 8,  32 => 53,  25 => 1,  23 => 1,);
    }
}
