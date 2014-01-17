<?php

/* @template/default/template/friend/common/friend_button.tpl */
class __TwigTemplate_484ffc762fd7c268a94198c69b05c63b42157fed2ab8e706abcea65bb075c5e2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'friend_common_friend_button' => array($this, 'block_friend_common_friend_button'),
            'friend_common_friend_button_template' => array($this, 'block_friend_common_friend_button_template'),
            'friend_common_friend_button_javascript' => array($this, 'block_friend_common_friend_button_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('friend_common_friend_button', $context, $blocks);
        // line 33
        echo "
";
        // line 34
        $this->displayBlock('friend_common_friend_button_template', $context, $blocks);
        // line 53
        echo "
";
        // line 54
        $this->displayBlock('friend_common_friend_button_javascript', $context, $blocks);
    }

    // line 1
    public function block_friend_common_friend_button($context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"friend-actions\">
    ";
        // line 3
        if (((isset($context["fr_status"]) ? $context["fr_status"] : null) == 4)) {
            // line 4
            echo "    <a data-url=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("MakeFriend", array("user_slug" => (isset($context["fr_slug"]) ? $context["fr_slug"] : null)))), "html", null, true);
            echo "\" class=\"btn btn-yes btn-friend friend-group\" data-cancel=\"0\"><i class=\"icon-plus-sign\"></i> ";
            echo gettext("Make Friend");
            echo "</a>
    ";
        } elseif (((isset($context["fr_status"]) ? $context["fr_status"] : null) == 2)) {
            // line 6
            echo "    <div class=\"dropdown friend-group\">
        <a href=\"#\" class=\"btn btn-yes dropdown-toggle\" role=\"button\" data-toggle=\"dropdown\"><i class=\"icon-ok\"></i> ";
            // line 7
            echo gettext("Friend");
            echo "</a>
        <ul class=\"dropdown-menu\" role=\"menu\">
            <li>
                <a class=\"btn-unfriend\" data-url=\"";
            // line 10
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("UnFriend", array("user_slug" => (isset($context["fr_slug"]) ? $context["fr_slug"] : null)))), "html", null, true);
            echo "\">";
            echo gettext("Unfriend");
            echo "</a>
            </li>
        </ul>
    </div>
    ";
        } elseif (((isset($context["fr_status"]) ? $context["fr_status"] : null) == 3)) {
            // line 15
            echo "    <div class=\"dropdown friend-group\">
        <a href=\"#\" class=\"btn btn-yes dropdown-toggle\" role=\"button\" data-toggle=\"dropdown\"><i class=\"icon-ok\"></i> ";
            // line 16
            echo gettext("Sent Request");
            echo "</a>
        <ul class=\"dropdown-menu\" role=\"menu\">
            <li>
                <a class=\"btn-friend\" href=\"#\" data-url=\"";
            // line 19
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("MakeFriend", array("user_slug" => (isset($context["fr_slug"]) ? $context["fr_slug"] : null)))), "html", null, true);
            echo "\" data-cancel=\"1\">";
            echo gettext("Cancel Request");
            echo "</a>
            </li>
        </ul>
    </div>
    ";
        }
        // line 24
        echo "    <!--div class=\"dropdown\">
        <a href=\"#\" class=\"btn btn-yes btn-friend dropdown-toggle\" role=\"button\" data-toggle=\"dropdown\"><i class=\"icon-ok\"></i> Following</a>
        <ul class=\"dropdown-menu\" role=\"menu\">
            <li><a href=\"#\">Unfollow</a></li>
        </ul>
    </div-->
    <!--a href=\"#\" class=\"btn btn-yes btn-follow\"><i class=\"icon-rss\"></i> Follow</a-->
</div>
";
    }

    // line 34
    public function block_friend_common_friend_button_template($context, array $blocks = array())
    {
        // line 51
        echo "
<div class=\"hidden\">
    <div id=\"send-request\">
        <a data-cancel=\"0\" data-url=\"\${href}\" class=\"btn btn-yes btn-friend friend-group\"><i class=\"icon-plus-sign\"></i> {% trans %}Make Friend{% endtrans %}</a>
    </div>
    <div id=\"cancel-request\">
        <div class=\"dropdown friend-group\">
            <a href=\"#\" class=\"btn btn-yes dropdown-toggle\" role=\"button\" data-toggle=\"dropdown\"><i class=\"icon-ok\"></i> {% trans %}Sent Request{% endtrans %}</a>
            <ul class=\"dropdown-menu\" role=\"menu\">
                <li>
                    <a data-cancel=\"1\" class=\"btn-friend\" href=\"#\" data-url=\"\${href}\">{% trans %}Cancel Request{% endtrans %}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
";
        echo "
";
    }

    // line 54
    public function block_friend_common_friend_button_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/friend/common/friend_button.tpl";
    }

    public function getDebugInfo()
    {
        return array (  130 => 54,  108 => 51,  105 => 34,  74 => 15,  64 => 10,  58 => 7,  55 => 6,  47 => 4,  45 => 3,  42 => 2,  39 => 1,  30 => 34,  27 => 33,  131 => 38,  125 => 35,  119 => 32,  111 => 29,  103 => 26,  94 => 20,  90 => 18,  88 => 17,  78 => 14,  75 => 13,  53 => 8,  49 => 7,  38 => 3,  185 => 49,  182 => 48,  173 => 43,  170 => 42,  168 => 41,  161 => 38,  155 => 34,  152 => 33,  135 => 31,  114 => 29,  112 => 28,  102 => 20,  96 => 21,  91 => 16,  87 => 14,  84 => 13,  79 => 10,  72 => 8,  35 => 54,  28 => 5,  21 => 4,  14 => 1,  142 => 45,  138 => 44,  132 => 30,  126 => 40,  122 => 39,  116 => 38,  110 => 35,  106 => 34,  99 => 33,  93 => 24,  89 => 24,  83 => 19,  77 => 16,  73 => 12,  66 => 18,  63 => 17,  60 => 10,  46 => 49,  44 => 4,  34 => 8,  32 => 53,  25 => 1,  23 => 1,);
    }
}
