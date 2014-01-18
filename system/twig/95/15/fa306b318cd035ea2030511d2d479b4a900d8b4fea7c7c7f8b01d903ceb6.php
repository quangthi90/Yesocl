<?php

/* @template/default/template/post/common/comment_post_list.tpl */
class __TwigTemplate_9515fa306b318cd035ea2030511d2d479b4a900d8b4fea7c7c7f8b01d903ceb6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'post_common_comment_post_list_style' => array($this, 'block_post_common_comment_post_list_style'),
            'post_common_comment_post_list' => array($this, 'block_post_common_comment_post_list'),
            'template' => array($this, 'block_template'),
            'post_common_comment_post_list_javascript' => array($this, 'block_post_common_comment_post_list_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('post_common_comment_post_list_style', $context, $blocks);
        // line 4
        echo "
";
        // line 5
        $this->displayBlock('post_common_comment_post_list', $context, $blocks);
        // line 29
        echo "
";
        // line 30
        $this->displayBlock('template', $context, $blocks);
        // line 36
        echo "
";
        // line 37
        $this->displayBlock('post_common_comment_post_list_javascript', $context, $blocks);
    }

    // line 1
    public function block_post_common_comment_post_list_style($context, array $blocks = array())
    {
        // line 2
        echo "<link href=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("comment.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
";
    }

    // line 5
    public function block_post_common_comment_post_list($context, array $blocks = array())
    {
        // line 6
        echo "\t<div id=\"comment-box\" class=\"y-box comment-box\">
\t\t<div class=\"comment-container\"> 
\t\t\t<div class=\"y-box-header\">\t\t\t\t
\t\t\t\t";
        // line 9
        echo gettext("Comment box");
        echo " (<span class=\"counter\"></span>)
\t\t\t\t<div class=\"y-box-expand\">
\t\t\t\t\t<a href=\"#\" id=\"btn-expand\" class=\"btn-expand\" title=\"Expand\">
\t\t\t\t\t\t<i class=\"icon-indent-left\"></i>
\t\t\t\t\t</a>
\t\t\t\t\t<a href=\"#\" id=\"btn-restore\" class=\"btn-restore\" title=\"Restore\" style=\"display: none;\">
\t\t\t\t\t\t<i class=\"icon-indent-right\"></i>
\t\t\t\t\t</a>
\t\t\t\t\t<a href=\"#\" id=\"btn-close\" class=\"btn-close\" title=\"Close\">
\t\t\t\t\t\t<i class=\"icon-remove\"></i>
\t\t\t\t\t</a>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"y-box-content comment-body\">
\t\t\t\t<div id=\"add-more-item\"></div>
\t\t\t</div>
\t\t</div>
\t\t";
        // line 26
        $this->displayBlock("common_html_block_comment_quick_form", $context, $blocks);
        echo "
\t</div>
";
    }

    // line 30
    public function block_template($context, array $blocks = array())
    {
        // line 31
        echo "\t";
        $this->displayBlock("common_html_block_comment_advance_form", $context, $blocks);
        echo "
\t";
        // line 32
        $context["advance_comment_id"] = "comment-advance-edit-popup";
        // line 33
        echo "\t";
        $this->displayBlock("common_html_block_comment_advance_form", $context, $blocks);
        echo "
    ";
        // line 34
        $this->displayBlock("common_html_block_comment_item_template", $context, $blocks);
        echo "
";
    }

    // line 37
    public function block_post_common_comment_post_list_javascript($context, array $blocks = array())
    {
        // line 38
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("post.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 39
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("comment.js")), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@template/default/template/post/common/comment_post_list.tpl";
    }

    public function getDebugInfo()
    {
        return array (  119 => 39,  114 => 38,  111 => 37,  105 => 34,  100 => 33,  98 => 32,  93 => 31,  90 => 30,  83 => 26,  63 => 9,  58 => 6,  55 => 5,  48 => 2,  45 => 1,  41 => 37,  38 => 36,  36 => 30,  33 => 29,  31 => 5,  28 => 4,  26 => 1,);
    }
}
