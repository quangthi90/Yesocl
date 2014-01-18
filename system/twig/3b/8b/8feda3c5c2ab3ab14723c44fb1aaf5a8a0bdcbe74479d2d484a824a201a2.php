<?php

/* @template/default/template/post/common/post_item_list.tpl */
class __TwigTemplate_3b8b8feda3c5c2ab3ab14723c44fb1aaf5a8a0bdcbe74479d2d484a824a201a2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'post_common_post_item_list' => array($this, 'block_post_common_post_item_list'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('post_common_post_item_list', $context, $blocks);
    }

    public function block_post_common_post_item_list($context, array $blocks = array())
    {
        // line 2
        echo "\t<div class=\"feed-block\">
        <div class=\"block-header\">
        ";
        // line 4
        if (array_key_exists("block_info", $context)) {
            // line 5
            echo "        ";
            if ((array_key_exists("is_back_btn", $context) && ((isset($context["is_back_btn"]) ? $context["is_back_btn"] : null) == true))) {
                // line 6
                echo "            <a class=\"block-back fl\" href=\"#\" onclick=\"history.go(-1); return false;\"> 
                <i class=\"icon-arrow-left\"></i>
            </a>
            <a class=\"block-title fl\" href=\"";
                // line 9
                echo twig_escape_filter($this->env, (isset($context["block_href"]) ? $context["block_href"] : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block_info"]) ? $context["block_info"] : null), "name"), "html", null, true);
                echo "</a>
        ";
            } else {
                // line 11
                echo "            <a class=\"block-title fl\" href=\"";
                echo twig_escape_filter($this->env, (isset($context["block_href"]) ? $context["block_href"] : null), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["block_info"]) ? $context["block_info"] : null), "name"), "html", null, true);
                echo "</a>
            <a class=\"block-seemore fl\" href=\"";
                // line 12
                echo twig_escape_filter($this->env, (isset($context["block_href"]) ? $context["block_href"] : null), "html", null, true);
                echo "\"> 
                <i class=\"icon-arrow-right\"></i>
            </a>
        ";
            }
            // line 16
            echo "        ";
        }
        // line 17
        echo "        </div>
        <div class=\"block-content\">
            ";
        // line 19
        if (((isset($context["style"]) ? $context["style"] : null) == 1)) {
            // line 20
            echo "                ";
            $context["special"] = twig_random($this->env, array(0 => 2, 1 => 3));
            // line 21
            echo "                ";
            $context["limit"] = 5;
            // line 22
            echo "            <div class=\"column ";
            if (((isset($context["special"]) ? $context["special"] : null) == 3)) {
                echo "column-special";
            }
            echo "\">
            ";
        } else {
            // line 24
            echo "                ";
            $context["special"] = twig_random($this->env, array(0 => "column-special", 1 => ""));
            // line 25
            echo "                ";
            $context["limit"] = 6;
            // line 26
            echo "            <div class=\"column ";
            echo twig_escape_filter($this->env, (isset($context["special"]) ? $context["special"] : null), "html", null, true);
            echo "\">
            ";
        }
        // line 28
        echo "
            ";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, (isset($context["posts"]) ? $context["posts"] : null), 0, (isset($context["limit"]) ? $context["limit"] : null)));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 30
            echo "                ";
            $context["user"] = $this->getAttribute((isset($context["users"]) ? $context["users"] : null), $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "user_id"), array(), "array");
            // line 31
            echo "                <div class=\"feed-container feed";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index"), "html", null, true);
            echo "\">
                    <div class=\"feed post post_in_block post-item\" data-url=\"";
            // line 32
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostLike", array("post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug"), "post_type" => (isset($context["post_type"]) ? $context["post_type"] : null)))), "html", null, true);
            echo "\" data-is-liked=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "isUserLiked"), "html", null, true);
            echo "\">
                        <div class=\"yes-dropdown\">
                            <div class=\"dropdown\">
                               <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                    <i class=\"icon-caret-down\"></i>
                               </a>
                               <ul class=\"dropdown-menu\">
                                    <li class=\"unlike-post ";
            // line 39
            if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "isUserLiked") == 0)) {
                echo "hidden";
            }
            echo "\">
                                        <a href=\"#\"><i class=\"icon-thumbs-down\"></i> ";
            // line 40
            echo gettext("Unlike");
            echo "</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class=\"post_header\">
                            <h4 class=\"post_title\" title=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title"), "html", null, true);
            echo "\">
                                <a href=\"";
            // line 47
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostPage", array("post_type" => (isset($context["post_type"]) ? $context["post_type"] : null), "post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug")))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title"), "html", null, true);
            echo "</a>
                            </h4>
                            <div class=\"post_meta\">
                                <span class=\"user_info fl\">
                                    <a class=\"image\" href=\"";
            // line 51
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
            echo "\">
                                        <img class=\"small-avatar\" src=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
            echo "\" />
                                    </a>
                                    <a class=\"name\" href=\"";
            // line 54
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
            echo "\">
                                        ";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
            echo "
                                    </a>
                                </span>
                                <span class=\"post_time fl\">
                                    <i class=\"icon-calendar\"></i>
                                    <d class=\"timeago\" title=\"";
            // line 60
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('date_format')->getCallable(), array($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "created"))), "html", null, true);
            echo "\"></d>
                                </span>
                                <span class=\"post_like fr\">
                                    <a class=\"like-post ";
            // line 63
            if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "isUserLiked") == 1)) {
                echo "hidden";
            }
            echo "\" href=\"#\">
                                        <i class=\"icon-thumbs-up medium-icon\"></i>
                                    </a>
                                    <span class=\"liked-post ";
            // line 66
            if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "isUserLiked") == 0)) {
                echo "hidden";
            }
            echo "\">
                                        ";
            // line 67
            echo gettext("Liked");
            // line 68
            echo "                                    </span>
                                    <a class=\"post-liked-list\" href=\"#\" data-url=\"";
            // line 69
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostGetLiker", array("post_type" => (isset($context["post_type"]) ? $context["post_type"] : null), "post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug")))), "html", null, true);
            echo "\" data-like-count=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "like_count"), "html", null, true);
            echo "\">
                                        <d class=\"number-counter\">";
            // line 70
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "like_count"), "html", null, true);
            echo "</d>
                                    </a>
                                </span>
                                <span class=\"post_cm fr\">
                                    <a href=\"#\" title=\"Comment (";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "comment_count"), "html", null, true);
            echo ")\" class=\"open-comment\" 
                                        data-url=\"";
            // line 75
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("CommentList", array("post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug"), "post_type" => (isset($context["post_type"]) ? $context["post_type"] : null)))), "html", null, true);
            echo "\"
                                        data-comment-count=\"";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "comment_count"), "html", null, true);
            echo "\"
                                        data-comment-url=\"";
            // line 77
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("CommentAdd", array("post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug"), "post_type" => (isset($context["post_type"]) ? $context["post_type"] : null)))), "html", null, true);
            echo "\">
                                        <i class=\"icon-comments medium-icon\"></i>
                                    </a>
                                    <a href=\"#\" class=\"view-list-user\" 
                                        data-view-title=\"People comment on this post\"  
                                        data-view-type=\"comment\" 
                                        data-post-slug=\"";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug"), "html", null, true);
            echo "\" 
                                        data-post-type=\"";
            // line 84
            echo twig_escape_filter($this->env, (isset($context["post_type"]) ? $context["post_type"] : null), "html", null, true);
            echo "\"
                                        data-type-slug=\"";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["branch"]) ? $context["branch"] : null), "slug"), "html", null, true);
            echo "\">
                                        <d class=\"number-counter\">";
            // line 86
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "comment_count"), "html", null, true);
            echo "</d>
                                    </a>
                                </span>
                                <span class=\"post_view fr\">
                                    <i class=\"icon-eye-open\"></i>
                                    <d class=\"number-counter\">";
            // line 91
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "count_viewer"), "html", null, true);
            echo "</d>
                                </span>
                            </div>
                        </div>
                        <div class=\"post_body\">
                            <div class=\"post_image\">
                                <a href=\"";
            // line 97
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostPage", array("post_type" => (isset($context["post_type"]) ? $context["post_type"] : null), "post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug")))), "html", null, true);
            echo "\">
                                    <img src=\"";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "image"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title"), "html", null, true);
            echo "\">
                                </a>                                
                            </div>
                            <div class=\"post_text_raw\">
                                <a href=\"";
            // line 102
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostPage", array("post_type" => (isset($context["post_type"]) ? $context["post_type"] : null), "post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug")))), "html", null, true);
            echo "\">
                                    ";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "description"), "html", null, true);
            echo "
                                </a>
                            </div> 
                        </div>
                    </div>
                </div>
                ";
            // line 109
            if (((((isset($context["style"]) ? $context["style"] : null) == 1) && (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % (isset($context["special"]) ? $context["special"] : null)) == 0)) && ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") != 5))) {
                // line 110
                echo "                    ";
                if (((isset($context["special"]) ? $context["special"] : null) == 2)) {
                    // line 111
                    echo "                        ";
                    $context["special"] = 3;
                    // line 112
                    echo "                    ";
                } else {
                    // line 113
                    echo "                        ";
                    $context["special"] = 6;
                    // line 114
                    echo "                    ";
                }
                // line 115
                echo "            </div>
            <div class=\"column ";
                // line 116
                if (((isset($context["special"]) ? $context["special"] : null) == 3)) {
                    echo "column-special";
                }
                echo "\">
                    ";
                // line 117
                $context["special"] = 6;
                // line 118
                echo "                ";
            } elseif (((((isset($context["style"]) ? $context["style"] : null) == 2) && (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") % 2) == 0)) && ($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") != 6))) {
                // line 119
                echo "                    ";
                $context["special"] = twig_random($this->env, array(0 => "column-special", 1 => ""));
                // line 120
                echo "            </div>
            <div class=\"column ";
                // line 121
                echo twig_escape_filter($this->env, (isset($context["special"]) ? $context["special"] : null), "html", null, true);
                echo "\">
                ";
            }
            // line 123
            echo "            ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 124
        echo "            </div>
        </div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "@template/default/template/post/common/post_item_list.tpl";
    }

    public function getDebugInfo()
    {
        return array (  360 => 124,  346 => 123,  341 => 121,  338 => 120,  335 => 119,  332 => 118,  330 => 117,  324 => 116,  321 => 115,  318 => 114,  315 => 113,  312 => 112,  309 => 111,  306 => 110,  304 => 109,  295 => 103,  291 => 102,  282 => 98,  278 => 97,  269 => 91,  261 => 86,  257 => 85,  253 => 84,  249 => 83,  240 => 77,  236 => 76,  232 => 75,  228 => 74,  221 => 70,  215 => 69,  212 => 68,  210 => 67,  204 => 66,  196 => 63,  190 => 60,  182 => 55,  178 => 54,  171 => 52,  167 => 51,  158 => 47,  154 => 46,  145 => 40,  139 => 39,  127 => 32,  122 => 31,  119 => 30,  102 => 29,  99 => 28,  93 => 26,  90 => 25,  87 => 24,  79 => 22,  76 => 21,  73 => 20,  71 => 19,  67 => 17,  64 => 16,  57 => 12,  50 => 11,  43 => 9,  38 => 6,  35 => 5,  33 => 4,  29 => 2,  23 => 1,);
    }
}
