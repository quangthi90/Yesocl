<?php

/* @template/default/template/post/common/liked_user.tpl */
class __TwigTemplate_9a1911dbd48bf5ac1915e7a65291ade953e47d306a8f3da42b1475fb0d8d76a3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'post_common_post_liked_user_style' => array($this, 'block_post_common_post_liked_user_style'),
            'post_common_liked_user' => array($this, 'block_post_common_liked_user'),
            'post_common_liked_user_javascript' => array($this, 'block_post_common_liked_user_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('post_common_post_liked_user_style', $context, $blocks);
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('post_common_liked_user', $context, $blocks);
        // line 66
        echo "
";
        // line 67
        $this->displayBlock('post_common_liked_user_javascript', $context, $blocks);
    }

    // line 1
    public function block_post_common_post_liked_user_style($context, array $blocks = array())
    {
    }

    // line 4
    public function block_post_common_liked_user($context, array $blocks = array())
    {
        // line 5
        echo "\t<div style=\"display: none;\" id=\"user-info-template\"></div>
\t";
        // line 16
        echo "
    <div class=\"hidden\">
    \t<div id=\"list-user-liked-template\">
\t\t\t<div class=\"user-item add-friend\">
\t\t\t\t<div class=\"user-item-info fl\">
\t\t\t\t\t<a href=\"\${href_user}\" class=\"user-item-avatar fl\">
\t\t\t\t\t\t<img src=\"\${avatar}\" alt=\"\${username}\" />
\t\t\t\t\t</a>
\t\t\t\t\t<div class=\"user-item-overview fl\">
\t\t\t\t\t\t<a href=\"\${href_user}\" class=\"user-item-name\">\${username}</a>
\t\t\t\t\t\t<span><strong>\${multi_number}</strong> ";
        echo gettext("friend");
        // line 22
        echo "(s)</span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"user-actions fr friend-actions\">
\t\t\t\t\t{{if fr_status == 2}}
\t\t\t\t\t<div class=\"dropdown friend-group\">
\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-yes dropdown-toggle\" role=\"button\" data-toggle=\"dropdown\"><i class=\"icon-ok\"></i> ";
        echo gettext("Friend");
        // line 25
        echo "</a>
\t                    <ul class=\"dropdown-menu\" role=\"menu\">
\t                        <li>
\t                            <a class=\"btn-unfriend\" data-id=\"\${id}\" data-url=\"\${fr_href}\">";
        echo gettext("Unfriend");
        // line 33
        echo "</a>
\t                        </li>
\t                    </ul>
\t                </div>
\t\t\t\t\t{{/if}}

\t\t\t\t\t{{if fr_status == 3}}
\t\t\t\t\t<div class=\"dropdown friend-group\">
\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-yes dropdown-toggle\" role=\"button\" data-toggle=\"dropdown\"><i class=\"icon-ok\"></i> ";
        echo gettext("Sent Request");
        // line 36
        echo "</a>
\t                    <ul class=\"dropdown-menu\" role=\"menu\">
\t                        <li>
\t                            <a class=\"btn-friend\" href=\"#\" data-id=\"\${id}\" data-url=\"\${fr_href}\" data-cancel=\"1\">";
        echo gettext("Cancel Request");
        // line 44
        echo "</a>
\t                        </li>
\t                    </ul>
\t                </div>
\t\t\t\t\t{{/if}}

\t\t\t\t\t{{if fr_status == 4}}
\t\t\t\t\t<button data-url=\"\${fr_href}\" data-id=\"\${id}\" class=\"btn btn-yes btn-friend friend-group\" data-cancel=\"0\">
\t\t\t\t\t\t<i class=\"icon-plus-sign\"></i> ";
        echo gettext("Make Friend");
        // line 51
        echo "
\t\t\t\t\t</button>
\t\t\t\t\t{{/if}}
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
        <div id=\"send-request\">
            <button data-cancel=\"0\" data-id=\"\${id}\" data-url=\"\${href}\" class=\"btn btn-yes btn-friend friend-group\"><i class=\"icon-plus-sign\"></i> ";
        echo gettext("Make Friend");
        // line 55
        echo "</button>
        </div>
        <div id=\"cancel-request\">
            <div class=\"dropdown friend-group\">
                <a href=\"#\" class=\"btn btn-yes dropdown-toggle\" role=\"button\" data-toggle=\"dropdown\"><i class=\"icon-ok\"></i> ";
        echo gettext("Sent Request");
        // line 58
        echo "</a>
                <ul class=\"dropdown-menu\" role=\"menu\">
                    <li>
                        <a data-cancel=\"1\" class=\"btn-friend\" data-id=\"\${id}\" href=\"#\" data-url=\"\${href}\">";
        echo gettext("Cancel Request");
        // line 64
        echo "</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
\t";
        echo "
";
    }

    // line 67
    public function block_post_common_liked_user_javascript($context, array $blocks = array())
    {
        // line 68
        echo "
";
    }

    public function getTemplateName()
    {
        return "@template/default/template/post/common/liked_user.tpl";
    }

    public function getDebugInfo()
    {
        return array (  144 => 68,  141 => 67,  129 => 64,  116 => 55,  95 => 44,  30 => 4,  27 => 3,  25 => 1,  22 => 1,  229 => 90,  223 => 88,  215 => 84,  212 => 83,  206 => 80,  203 => 79,  201 => 78,  194 => 76,  187 => 71,  181 => 68,  177 => 66,  175 => 65,  170 => 63,  160 => 59,  156 => 58,  148 => 53,  142 => 52,  134 => 49,  98 => 32,  91 => 27,  85 => 24,  72 => 25,  68 => 16,  61 => 13,  32 => 66,  29 => 2,  23 => 1,  155 => 53,  151 => 52,  147 => 51,  135 => 48,  127 => 46,  122 => 45,  119 => 44,  113 => 41,  109 => 40,  104 => 39,  102 => 33,  94 => 36,  77 => 22,  45 => 1,  41 => 44,  38 => 5,  36 => 36,  33 => 35,  26 => 1,  583 => 348,  581 => 331,  578 => 330,  565 => 327,  544 => 320,  542 => 302,  539 => 301,  529 => 293,  527 => 292,  522 => 290,  514 => 285,  510 => 284,  499 => 276,  494 => 273,  492 => 272,  486 => 268,  483 => 267,  470 => 262,  468 => 255,  465 => 254,  454 => 251,  431 => 246,  397 => 226,  390 => 191,  383 => 187,  376 => 183,  363 => 175,  361 => 173,  358 => 172,  347 => 164,  343 => 163,  333 => 156,  323 => 149,  318 => 147,  310 => 142,  306 => 141,  296 => 134,  290 => 131,  285 => 128,  282 => 127,  279 => 126,  276 => 125,  273 => 124,  271 => 123,  262 => 118,  259 => 117,  256 => 116,  253 => 115,  250 => 114,  235 => 109,  233 => 100,  220 => 96,  195 => 74,  169 => 72,  164 => 60,  153 => 40,  143 => 50,  138 => 31,  133 => 28,  131 => 47,  123 => 58,  120 => 43,  117 => 21,  114 => 20,  111 => 19,  101 => 12,  78 => 33,  74 => 330,  71 => 329,  69 => 301,  66 => 15,  63 => 22,  60 => 8,  58 => 254,  55 => 12,  53 => 5,  50 => 16,  47 => 5,  44 => 4,  39 => 1,  37 => 19,  34 => 18,  31 => 4,  221 => 87,  217 => 60,  210 => 55,  207 => 54,  200 => 91,  197 => 50,  189 => 45,  185 => 43,  167 => 49,  165 => 39,  162 => 38,  145 => 37,  139 => 49,  137 => 34,  126 => 46,  121 => 23,  115 => 21,  112 => 20,  110 => 38,  106 => 51,  103 => 16,  97 => 37,  92 => 12,  89 => 36,  81 => 22,  42 => 48,  35 => 67,  28 => 3,  21 => 4,  14 => 3,);
    }
}
