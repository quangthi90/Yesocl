<?php

/* default/template/post/detail.tpl */
class __TwigTemplate_379fc9e3bd4c4c92d82d8f53c7b24f1b7275c5d76d088a4ec7ada4ffecf4b658 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@template/default/template/common/layout.tpl");

        $_trait_0 = $this->env->loadTemplate("@template/default/template/common/html_block.tpl");
        // line 3
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/common/html_block.tpl".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->env->loadTemplate("@template/default/template/post/common/comment_post_detail.tpl");
        // line 4
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/post/common/comment_post_detail.tpl".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks
        );

        $this->blocks = array_merge(
            $this->traits,
            array(
                'title' => array($this, 'block_title'),
                'stylesheet' => array($this, 'block_stylesheet'),
                'body' => array($this, 'block_body'),
                'javascript' => array($this, 'block_javascript'),
            )
        );

        $this->macros = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "@template/default/template/common/layout.tpl";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title"), "html", null, true);
    }

    // line 8
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 9
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("post-detail.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
    ";
        // line 10
        $this->displayBlock("post_common_comment_post_detail_style", $context, $blocks);
        echo "
";
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "<div id=\"y-content\" class=\"no-scroll\">
\t<div id=\"post-detail\">
\t\t<div id=\"detail-header\">
\t\t\t<div class=\"goback-link fl\">
\t\t\t\t<a href=\"#\" class=\"tooltip-bottom btn-goback\" title=\"Go back\" > 
\t\t\t\t\t<i class=\"icon-arrow-left medium-icon\"></i>\t\t\t\t\t
\t\t\t\t</a>
\t\t\t</div>
\t\t\t<div class=\"post-title-container\">\t\t\t\t
\t\t\t\t<h2 class=\"post-title\" title=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title"), "html", null, true);
        echo "</h2>
\t\t\t\t<div class=\"post-detail-meta\">
\t\t\t\t\t<div class=\"post-user-time fl\">
\t\t\t\t\t\t<a href=\"";
        // line 26
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "user_slug")))), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t<img class=\"small-avatar\" src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "avatar"), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "author"), "html", null, true);
        echo "\">
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<a href=\"";
        // line 29
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "user_slug")))), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "author"), "html", null, true);
        echo "
\t\t\t\t\t\t</a> - 
\t\t\t\t\t\t<span class=\"post-time\">
\t\t\t\t\t\t\t<d class=\"timeago\" title=\"";
        // line 33
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "created"), (isset($context["date_format"]) ? $context["date_format"] : null)), "html", null, true);
        echo "\"></d>
\t\t\t\t\t\t</span>
\t\t\t\t\t</div>
\t\t\t\t\t<ul class=\"post-actions fr post-item\" data-url=\"";
        // line 36
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostLike", array("post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug"), "post_type" => (isset($context["post_type"]) ? $context["post_type"] : null)))), "html", null, true);
        echo "\" data-is-liked=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "isUserLiked"), "html", null, true);
        echo "\">
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a class=\"like-post";
        // line 38
        if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "isUserLiked") == 1)) {
            echo " hidden";
        }
        echo "\" href=\"#\" title=\"";
        echo gettext("Like");
        echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon-thumbs-up medium-icon\"></i>
\t\t                    </a>
\t\t                    <span class=\"unlike-post";
        // line 41
        if (($this->getAttribute((isset($context["post"]) ? $context["post"] : null), "isUserLiked") == 0)) {
            echo " hidden";
        }
        echo "\">
\t\t\t                    <a href=\"#\" title=\"";
        // line 42
        echo gettext("Unlike");
        echo "\">
\t\t\t                        <i class=\"icon-thumbs-down medium-icon\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t<span class=\"number\">
\t\t\t\t\t\t\t\t<a class=\"post-liked-list\" href=\"#\" 
\t\t\t\t\t\t\t\t\tdata-url=\"";
        // line 48
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostGetLiker", array("post_type" => (isset($context["post_type"]) ? $context["post_type"] : null), "post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug")))), "html", null, true);
        echo "\" 
\t\t\t\t\t\t\t\t\tdata-like-count=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "like_count"), "html", null, true);
        echo "\" 
\t\t\t\t\t\t\t\t\ttitle=\"View who liked\">
\t\t\t\t\t\t\t\t\t<d>";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "like_count"), "html", null, true);
        echo "</d>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li style=\"display: none;\" class=\"toggle-comment\">
\t\t\t\t\t\t\t<a class=\"open-comment disabled\" href=\"#\" title=\"";
        // line 56
        echo gettext("Open comment box");
        echo "\">
\t\t\t\t\t\t\t\t<i class=\"icon-comments-alt medium-icon\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<span class=\"number\" id=\"post-detail-comment-number\">";
        // line 59
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["comments"]) ? $context["comments"] : null)), "html", null, true);
        echo "</span>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t<a class=\"\">
\t\t\t\t\t\t\t\t<i class=\"icon-eye-open medium-icon\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<span class=\"number\">";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "count_viewer"), "html", null, true);
        echo "</span>
\t\t\t\t\t\t</li>\t\t\t
\t\t\t\t\t</ul>\t\t\t
\t\t\t\t\t<div class=\"clear\"></div>\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>\t\t
\t\t<div id=\"detail-content\">
\t\t\t<div id=\"post-content\">
\t\t\t\t";
        // line 74
        echo $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "content");
        echo "
\t\t\t</div>
\t\t\t<div id=\"detail-scroll\">
\t\t\t\t<a class=\"btn-link-round fl\" id=\"detail-first\" href=\"#\" style=\"display: none;\">
\t\t\t\t\t<i class=\"icon-arrow-left\"></i>
\t\t\t\t</a>
\t\t\t\t<a class=\"btn-link-round fr\" id=\"detail-last\" href=\"#\" style=\"display: none;\">
\t\t\t\t\t<i class=\"icon-arrow-right\"></i>
\t\t\t\t</a>
\t\t\t</div>
\t\t\t";
        // line 84
        $this->displayBlock("post_common_comment_post_detail", $context, $blocks);
        echo "
\t\t</div>
\t</div>
</div>
";
    }

    // line 90
    public function block_javascript($context, array $blocks = array())
    {
        // line 91
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("detail.js")), "html", null, true);
        echo "\"></script>
";
        // line 92
        $this->displayBlock("post_common_comment_post_detail_javascript", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/template/post/detail.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  231 => 92,  226 => 91,  223 => 90,  214 => 84,  201 => 74,  189 => 65,  180 => 59,  174 => 56,  166 => 51,  161 => 49,  157 => 48,  148 => 42,  142 => 41,  132 => 38,  125 => 36,  119 => 33,  113 => 30,  109 => 29,  102 => 27,  98 => 26,  90 => 23,  79 => 14,  76 => 13,  70 => 10,  65 => 9,  62 => 8,  56 => 6,  21 => 4,  14 => 3,);
    }
}
