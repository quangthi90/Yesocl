<?php

/* @template/default/template/friend/common/friend_list.tpl */
class __TwigTemplate_8a3e6270375354b29fabe0c122647f7fbef40f45069d4f7fa485cec6b13fdcba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'friend_common_friend_list' => array($this, 'block_friend_common_friend_list'),
            'friend_common_friend_list_javascript' => array($this, 'block_friend_common_friend_list_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('friend_common_friend_list', $context, $blocks);
        // line 27
        echo "
";
        // line 28
        $this->displayBlock('friend_common_friend_list_javascript', $context, $blocks);
    }

    // line 1
    public function block_friend_common_friend_list($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        $context["class"] = "all";
        // line 3
        echo "    ";
        if (($this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "added", array(), "any", true, true) && (twig_date_format_filter($this->env, $this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "added"), "U") >= twig_date_format_filter($this->env, (isset($context["recent_time"]) ? $context["recent_time"] : null), "U")))) {
            // line 4
            echo "        ";
            $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " recent");
            // line 5
            echo "    ";
        }
        // line 6
        echo "    ";
        if (($this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "gender") == 1)) {
            // line 7
            echo "        ";
            $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " male");
            // line 8
            echo "    ";
        } else {
            // line 9
            echo "        ";
            $context["class"] = ((isset($context["class"]) ? $context["class"] : null) . " female");
            // line 10
            echo "    ";
        }
        // line 11
        echo "    <div class=\"block-content-item friend-item ";
        echo twig_escape_filter($this->env, (isset($context["class"]) ? $context["class"] : null), "html", null, true);
        echo "\" data-user-id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "slug"), "html", null, true);
        echo "\" data-user-name=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "username"), "html", null, true);
        echo "\" data-user-email=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "email"), "html", null, true);
        echo "\">
        <a href=\"";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "slug")))), "html", null, true);
        echo "\" class=\"fl friend-img\">
            <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "avatar"), "html", null, true);
        echo "\">
        </a>
        <div class=\"fl friend-info\">
            <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "slug")))), "html", null, true);
        echo "\" class=\"friend-name\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "username"), "html", null, true);
        echo "</a>
            <ul class=\"friend-infolist\">
                <li>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "industry"), "html", null, true);
        echo "</li>
                <li>";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "numFriend"), "html", null, true);
        echo "</li>
            </ul>
        </div>
        ";
        // line 22
        $context["fr_status"] = $this->getAttribute($this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "fr_status"), "status");
        // line 23
        echo "        ";
        $context["fr_slug"] = $this->getAttribute((isset($context["friend"]) ? $context["friend"] : null), "slug");
        // line 24
        echo "        ";
        $this->displayBlock("friend_common_friend_button", $context, $blocks);
        echo "
    </div>
";
    }

    // line 28
    public function block_friend_common_friend_list_javascript($context, array $blocks = array())
    {
        // line 29
        echo "    <script type=\"text/javascript\">
    \$(function(){
        \$(document).trigger('FRIEND_ACTION', [true]);
    });
    </script>
";
    }

    public function getTemplateName()
    {
        return "@template/default/template/friend/common/friend_list.tpl";
    }

    public function getDebugInfo()
    {
        return array (  117 => 29,  101 => 22,  95 => 19,  57 => 9,  54 => 8,  51 => 7,  48 => 6,  36 => 2,  33 => 1,  29 => 28,  26 => 27,  24 => 1,  130 => 54,  108 => 51,  105 => 34,  74 => 12,  64 => 10,  58 => 7,  55 => 6,  47 => 4,  45 => 5,  42 => 4,  39 => 3,  30 => 34,  27 => 33,  131 => 38,  125 => 35,  119 => 32,  111 => 29,  103 => 23,  94 => 20,  90 => 18,  88 => 17,  78 => 13,  75 => 13,  53 => 8,  49 => 7,  38 => 3,  185 => 49,  182 => 48,  173 => 43,  170 => 42,  168 => 41,  161 => 38,  155 => 34,  152 => 33,  135 => 31,  114 => 28,  112 => 28,  102 => 20,  96 => 21,  91 => 18,  87 => 14,  84 => 16,  79 => 10,  72 => 8,  35 => 54,  28 => 5,  21 => 4,  14 => 1,  142 => 45,  138 => 44,  132 => 30,  126 => 40,  122 => 39,  116 => 38,  110 => 35,  106 => 24,  99 => 33,  93 => 24,  89 => 24,  83 => 19,  77 => 16,  73 => 12,  66 => 18,  63 => 11,  60 => 10,  46 => 49,  44 => 4,  34 => 8,  32 => 53,  25 => 1,  23 => 1,);
    }
}
