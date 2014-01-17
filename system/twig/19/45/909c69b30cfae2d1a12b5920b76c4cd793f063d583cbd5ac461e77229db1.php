<?php

/* @template/default/template/post/common/post_item_wall.tpl */
class __TwigTemplate_1945909c69b30cfae2d1a12b5920b76c4cd793f063d583cbd5ac461e77229db1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'post_common_post_item_wall' => array($this, 'block_post_common_post_item_wall'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('post_common_post_item_wall', $context, $blocks);
    }

    public function block_post_common_post_item_wall($context, array $blocks = array())
    {
        // line 2
        echo "\t";
        if ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "type", array(), "any", true, true)) {
            // line 3
            echo "\t\t";
            $context["post_type"] = $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "type");
            // line 4
            echo "\t";
        }
        // line 5
        echo "\t<div class=\"feed post post_status post-item js-post-item\" data-url=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostLike", array("post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug"), "post_type" => (isset($context["post_type"]) ? $context["post_type"] : null)))), "html", null, true);
        echo "\" data-is-liked=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "isUserLiked"), "html", null, true);
        echo "\" data-url-edit=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostEdit", array("post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug"), "post_type" => (isset($context["post_type"]) ? $context["post_type"] : null)))), "html", null, true);
        echo "\" data-url-delete=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostDelete", array("post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug"), "post_type" => (isset($context["post_type"]) ? $context["post_type"] : null)))), "html", null, true);
        echo "\">
\t\t<div class=\"yes-dropdown\">
            <div class=\"dropdown\">
               <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                    <i class=\"icon-caret-down\"></i>
               </a>
               <ul class=\"dropdown-menu\">
               \t\t<li class=\"unlike-post";
        // line 12
        if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "isUserLiked") == 0)) {
            echo " hidden";
        }
        echo "\">
                        <a href=\"#\"><i class=\"icon-thumbs-down medium-icon\"></i> ";
        // line 13
        echo gettext("Unlike");
        echo "</a>
                    </li>
                    ";
        // line 15
        if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "is_edit", array(), "any", true, true) && ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "is_edit") == true))) {
            // line 16
            echo "                    <li class=\"divider\"></li>
                    <li class=\"post-edit-btn\">
                        <a href=\"#\" class=\"link-popup\" data-mfp-src=\"#post-advance-edit-popup\"><i class=\"icon-edit\"></i>";
            // line 18
            echo gettext("Edit");
            echo "</a>
                    </li>
                    ";
        }
        // line 21
        echo "                    ";
        if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "is_del", array(), "any", true, true) && ($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "is_del") == true))) {
            // line 22
            echo "                    <li class=\"divider\"></li>
                    <li class=\"post-delete-btn\">
                        <a href=\"#\"><i class=\"icon-trash\"></i>";
            // line 24
            echo gettext("Delete");
            echo "</a>
                    </li>
                    ";
        }
        // line 27
        echo "                </ul>
            </div>
        </div>
\t\t<div class=\"post_header\">
\t\t\t<div class=\"avatar_thumb\">
\t\t\t\t<a href=\"";
        // line 32
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
        echo "\">
\t\t\t\t\t<img src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar"), "html", null, true);
        echo "\" alt=\"user\" />
\t\t\t\t</a>
\t\t\t</div>
\t\t\t<div class=\"post_meta_info\">
\t\t\t\t<div class=\"post_user\">
\t\t\t\t\t<a href=\"";
        // line 38
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
        echo "</a>
\t\t\t\t</div>
\t\t\t\t<div class=\"post_meta\">
\t\t\t\t\t<span class=\"post_time fl\">
\t\t\t\t\t\t<i class=\"icon-calendar\"></i>
\t\t\t\t\t\t<d class=\"timeago\" title=\"";
        // line 43
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('date_format')->getCallable(), array($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "created"))), "html", null, true);
        echo "\"></d>
\t\t\t\t\t</span>
\t\t\t\t\t<span class=\"post_like fr\">
\t\t\t\t\t\t<a class=\"like-post ";
        // line 46
        if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "isUserLiked") == 1)) {
            echo "hidden";
        }
        echo "\" href=\"#\">
\t\t\t\t\t\t\t<i class=\"icon-thumbs-up medium-icon\"></i>
                        </a>
                        <span class=\"liked-post ";
        // line 49
        if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "isUserLiked") == 0)) {
            echo "hidden";
        }
        echo "\">
                            Liked
\t\t\t\t\t\t</span>
\t\t\t\t\t\t<a class=\"post-liked-list\" href=\"#\" data-url=\"";
        // line 52
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostGetLiker", array("post_type" => (isset($context["post_type"]) ? $context["post_type"] : null), "post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug")))), "html", null, true);
        echo "\" data-like-count=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "like_count"), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t<d class=\"number-counter\">";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "like_count"), "html", null, true);
        echo "</d>
\t\t\t\t\t\t</a>
\t\t\t\t\t</span>
\t\t\t\t\t<span class=\"post_cm fr\">
\t\t\t\t\t\t<a href=\"#\" class=\"open-comment\"
\t\t\t\t\t\t\tdata-url=\"";
        // line 58
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("CommentList", array("post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug"), "post_type" => (isset($context["post_type"]) ? $context["post_type"] : null)))), "html", null, true);
        echo "\"
\t\t\t\t\t\t\tdata-comment-count=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "comment_count"), "html", null, true);
        echo "\"
\t\t\t\t\t\t\tdata-comment-url=\"";
        // line 60
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("CommentAdd", array("post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug"), "post_type" => (isset($context["post_type"]) ? $context["post_type"] : null)))), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t<i class=\"icon-comments-alt\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<d class=\"number-counter\">";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "comment_count"), "html", null, true);
        echo "</d>
\t\t\t\t\t</span>\t
\t\t\t\t\t";
        // line 65
        if (((isset($context["post_type"]) ? $context["post_type"] : null) != "user")) {
            // line 66
            echo "\t\t\t\t\t<span class=\"post_view fr\">
                        <i class=\"icon-eye-open\"></i>
                        <d class=\"number-counter\">";
            // line 68
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "count_viewer"), "html", null, true);
            echo "</d>
                    </span>
                    ";
        }
        // line 71
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"post_body\">
\t\t\t<h4 class=\"post_title\">
\t\t\t\t<a href=\"";
        // line 76
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostPage", array("post_type" => (isset($context["post_type"]) ? $context["post_type"] : null), "post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug")))), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title"), "html", null, true);
        echo "</a>
\t\t\t</h4>
\t\t\t";
        // line 78
        if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "image") != null)) {
            // line 79
            echo "\t\t\t\t<div class=\"post_image\">
\t\t\t\t\t<img src=\"";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "image"), "html", null, true);
            echo "\" />
\t\t\t\t</div>
\t\t\t";
        }
        // line 83
        echo "\t\t\t<div class=\"post_text_raw\">
\t\t\t\t";
        // line 84
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "content");
        echo "
\t\t\t</div>
\t\t</div>
\t\t";
        // line 87
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "content")) > 200)) {
            // line 88
            echo "\t\t\t<a class=\"yes-see-more\" href=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostPage", array("post_type" => (isset($context["post_type"]) ? $context["post_type"] : null), "post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug")))), "html", null, true);
            echo "\">See more <i class=\" icon-double-angle-right\"></i></a> 
\t\t";
        }
        // line 90
        echo "\t</div>
";
    }

    public function getTemplateName()
    {
        return "@template/default/template/post/common/post_item_wall.tpl";
    }

    public function getDebugInfo()
    {
        return array (  229 => 90,  223 => 88,  215 => 84,  212 => 83,  206 => 80,  203 => 79,  201 => 78,  194 => 76,  187 => 71,  181 => 68,  177 => 66,  175 => 65,  170 => 63,  160 => 59,  156 => 58,  148 => 53,  142 => 52,  134 => 49,  98 => 32,  91 => 27,  85 => 24,  72 => 18,  68 => 16,  61 => 13,  32 => 3,  29 => 2,  23 => 1,  155 => 53,  151 => 52,  147 => 51,  135 => 48,  127 => 46,  122 => 45,  119 => 44,  113 => 41,  109 => 40,  104 => 39,  102 => 33,  94 => 36,  77 => 22,  45 => 1,  41 => 44,  38 => 5,  36 => 36,  33 => 35,  26 => 1,  583 => 348,  581 => 331,  578 => 330,  565 => 327,  544 => 320,  542 => 302,  539 => 301,  529 => 293,  527 => 292,  522 => 290,  514 => 285,  510 => 284,  499 => 276,  494 => 273,  492 => 272,  486 => 268,  483 => 267,  470 => 262,  468 => 255,  465 => 254,  454 => 251,  431 => 246,  397 => 226,  390 => 191,  383 => 187,  376 => 183,  363 => 175,  361 => 173,  358 => 172,  347 => 164,  343 => 163,  333 => 156,  323 => 149,  318 => 147,  310 => 142,  306 => 141,  296 => 134,  290 => 131,  285 => 128,  282 => 127,  279 => 126,  276 => 125,  273 => 124,  271 => 123,  262 => 118,  259 => 117,  256 => 116,  253 => 115,  250 => 114,  235 => 109,  233 => 100,  220 => 96,  195 => 74,  169 => 72,  164 => 60,  153 => 40,  143 => 50,  138 => 31,  133 => 28,  131 => 47,  123 => 23,  120 => 43,  117 => 21,  114 => 20,  111 => 19,  101 => 12,  78 => 21,  74 => 330,  71 => 329,  69 => 301,  66 => 15,  63 => 267,  60 => 8,  58 => 254,  55 => 12,  53 => 5,  50 => 4,  47 => 114,  44 => 112,  39 => 47,  37 => 19,  34 => 18,  31 => 4,  221 => 87,  217 => 60,  210 => 55,  207 => 54,  200 => 91,  197 => 50,  189 => 45,  185 => 43,  167 => 49,  165 => 39,  162 => 38,  145 => 37,  139 => 49,  137 => 34,  126 => 46,  121 => 23,  115 => 21,  112 => 20,  110 => 38,  106 => 17,  103 => 16,  97 => 37,  92 => 12,  89 => 11,  81 => 22,  42 => 48,  35 => 4,  28 => 3,  21 => 4,  14 => 3,);
    }
}
