<?php

/* @template/default/template/post/common/comment_post_detail.tpl */
class __TwigTemplate_9d91c613f723fe1b24055ae0c46b01ff42dc9335bb2a1c0c1d5252af0321f9fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'post_common_comment_post_detail_style' => array($this, 'block_post_common_comment_post_detail_style'),
            'post_common_comment_post_detail' => array($this, 'block_post_common_comment_post_detail'),
            'template' => array($this, 'block_template'),
            'post_common_comment_post_detail_javascript' => array($this, 'block_post_common_comment_post_detail_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('post_common_comment_post_detail_style', $context, $blocks);
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('post_common_comment_post_detail', $context, $blocks);
        // line 79
        echo "
";
        // line 80
        $this->displayBlock('template', $context, $blocks);
        // line 86
        echo "
";
        // line 87
        $this->displayBlock('post_common_comment_post_detail_javascript', $context, $blocks);
    }

    // line 1
    public function block_post_common_comment_post_detail_style($context, array $blocks = array())
    {
        // line 2
        echo "<link href=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("comment.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
";
    }

    // line 5
    public function block_post_common_comment_post_detail($context, array $blocks = array())
    {
        // line 6
        echo "\t<div id=\"comment-box\" class=\"y-box comment-wrapper\">
\t\t<div class=\"comment-container\"> 
\t\t\t<div class=\"y-box-header\">
\t\t\t\t";
        // line 9
        echo gettext("Comment box");
        echo " (<span class=\"counter\"><d>";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["comments"]) ? $context["comments"] : null)), "html", null, true);
        echo "<d></span>)
\t\t\t\t<div class=\"y-box-expand\">
\t\t\t\t\t<a href=\"#\" class=\"btn-expand\" title=\"Expand\">
\t\t\t\t\t\t<i class=\"icon-arrow-left\"></i>
\t\t\t\t\t</a>
\t\t\t\t\t<a href=\"#\" class=\"btn-restore\" title=\"Restore\" style=\"display: none;\">
\t\t\t\t\t\t<i class=\"icon-arrow-right\"></i>
\t\t\t\t\t</a>
\t\t\t\t\t<a href=\"#\" class=\"btn-close\" title=\"Hide\">
\t\t\t\t\t\t<i class=\"icon-remove\"></i>
\t\t\t\t\t</a>
\t\t\t\t</div>\t\t\t\t
\t\t\t</div>
\t\t\t<div class=\"y-box-content comment-body\">
\t\t\t\t";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["comments"]) ? $context["comments"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["comment"]) {
            // line 24
            echo "\t\t\t\t<div class=\"comment-item\">
\t\t\t        <div class=\"avatar_thumb\">
\t\t\t            <a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "href_user"), "html", null, true);
            echo "\">
\t\t\t                <img src=\"";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "avatar"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "author"), "html", null, true);
            echo "\">
\t\t\t            </a>
\t\t\t        </div>
\t\t\t        <div class=\"comment-meta\">
\t\t\t            <div class=\"comment-info\" data-url=\"";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "href_like"), "html", null, true);
            echo "\"
\t\t\t                data-comment-liked=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "is_liked"), "html", null, true);
            echo "\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "id"), "html", null, true);
            echo "\" data-like-count=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "like_count"), "html", null, true);
            echo "\" data-url-edit=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "href_edit"), "html", null, true);
            echo "\" data-url-delete=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "href_delete"), "html", null, true);
            echo "\">
\t\t\t                <a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "href_user"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "author"), "html", null, true);
            echo "</a> 
\t\t\t                <span class=\"comment-time\">
\t\t\t                    <d class=\"timeago\" title=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "created"), "html", null, true);
            echo "\"></d>
\t\t\t                </span>
\t\t\t                <span class=\"like-container\">
\t\t\t                \t<a href=\"#\" class=\"like-comment";
            // line 38
            if (($this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "is_liked") == 1)) {
                echo " hidden";
            }
            echo "\"><i class=\"icon-thumbs-up medium-icon\"></i> ";
            echo gettext("Like");
            echo " </a>
\t\t\t                \t<strong class=\"liked-label";
            // line 39
            if (($this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "is_liked") == 0)) {
                echo " hidden";
            }
            echo "\">";
            echo gettext("Liked");
            echo " </strong>
\t\t\t                \t&nbsp;(<a class=\"like-count\"
\t\t\t                    data-url=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "href_liked_user"), "html", null, true);
            echo "\"
\t\t\t                    href=\"#\">";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "like_count"), "html", null, true);
            echo "</a>) </span>
\t\t\t            </div>
\t\t\t            <div class=\"comment-content\">
\t\t\t                ";
            // line 45
            echo $this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "content");
            echo "
\t\t\t            </div>
\t\t\t        </div>
\t\t\t        <div class=\"clear\">
\t\t\t        </div>
\t\t\t        <div class=\"yes-dropdown option-dropdown\">
\t\t\t            <div class=\"dropdown\">
\t\t\t                <a class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"icon-reorder\"></i></a>
\t\t\t                <ul class=\"dropdown-menu\">
\t\t\t                    <li class=\"un-like-btn";
            // line 54
            if (($this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "is_liked") == 0)) {
                echo " hidden";
            }
            echo "\"><a href=\"#\"><i class=\"icon-thumbs-down\"></i>";
            echo gettext("Unlike");
            echo "</a> </li>
\t\t\t                    ";
            // line 55
            if (($this->getAttribute((isset($context["comment"]) ? $context["comment"] : null), "is_owner") == true)) {
                // line 56
                echo "\t\t\t                    <li class=\"divider\"></li>
\t\t\t                    <li class=\"edit-comment-btn\">
\t\t\t\t\t\t\t     \t<a class=\"link-popup\" href=\"#\" data-mfp-src=\"#comment-advance-edit-popup\"><i class=\"icon-edit\"></i>";
                // line 58
                echo gettext("Edit");
                echo "</a>
\t\t\t\t\t\t     \t</li>
\t\t\t\t\t\t     \t<li class=\"divider\"></li>
\t\t\t\t\t\t\t    <li class=\"delete-comment-btn\">
\t\t\t\t\t\t\t    \t<a href=\"#\"><i class=\"icon-trash\"></i>";
                // line 62
                echo gettext("Delete");
                echo "</a>
\t\t\t\t\t\t\t    </li>
\t\t\t\t\t\t\t    ";
            }
            // line 65
            echo "\t\t\t                </ul>
\t\t\t            </div>
\t\t\t        </div>
\t\t\t    </div>
\t\t\t    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['comment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "\t\t\t\t<div id=\"add-more-item\"></div>
\t\t\t</div>
\t\t\t";
        // line 72
        if (array_key_exists("post", $context)) {
            // line 73
            echo "\t\t\t\t";
            $context["add_comment_url"] = call_user_func_array($this->env->getFunction('path')->getCallable(), array("CommentAdd", array("post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug"), "post_type" => (isset($context["post_type"]) ? $context["post_type"] : null))));
            // line 74
            echo "\t\t\t";
        }
        // line 75
        echo "\t\t\t";
        $this->displayBlock("common_html_block_comment_quick_form", $context, $blocks);
        echo "
\t\t</div>
\t</div>
";
    }

    // line 80
    public function block_template($context, array $blocks = array())
    {
        // line 81
        echo "\t";
        $this->displayBlock("common_html_block_comment_advance_form", $context, $blocks);
        echo "
\t";
        // line 82
        $context["advance_comment_id"] = "comment-advance-edit-popup";
        // line 83
        echo "\t";
        $this->displayBlock("common_html_block_comment_advance_form", $context, $blocks);
        echo "
    ";
        // line 84
        $this->displayBlock("common_html_block_comment_item_template", $context, $blocks);
        echo "
";
    }

    // line 87
    public function block_post_common_comment_post_detail_javascript($context, array $blocks = array())
    {
        // line 88
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("post.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 89
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("comment.js")), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@template/default/template/post/common/comment_post_detail.tpl";
    }

    public function getDebugInfo()
    {
        return array (  258 => 89,  253 => 88,  250 => 87,  244 => 84,  239 => 83,  237 => 82,  232 => 81,  229 => 80,  220 => 75,  217 => 74,  214 => 73,  212 => 72,  208 => 70,  198 => 65,  192 => 62,  185 => 58,  179 => 55,  171 => 54,  159 => 45,  153 => 42,  149 => 41,  126 => 35,  107 => 32,  103 => 31,  94 => 27,  86 => 24,  82 => 23,  63 => 9,  58 => 6,  55 => 5,  48 => 2,  45 => 1,  41 => 87,  38 => 86,  36 => 80,  33 => 79,  31 => 5,  28 => 4,  26 => 1,  223 => 92,  218 => 91,  215 => 90,  206 => 84,  193 => 74,  181 => 56,  172 => 59,  161 => 51,  156 => 49,  152 => 48,  140 => 39,  132 => 38,  125 => 36,  119 => 33,  113 => 30,  109 => 29,  102 => 27,  98 => 26,  90 => 26,  79 => 14,  76 => 13,  70 => 10,  65 => 9,  62 => 8,  56 => 6,  21 => 4,  14 => 3,);
    }
}
