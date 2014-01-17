<?php

/* default/template/account/wall.tpl */
class __TwigTemplate_a199e6343eda755828d5fa06eb51706e9d8ca000b542842b7f880fd5775f1fa6 extends Twig_Template
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

        $_trait_1 = $this->env->loadTemplate("@template/default/template/post/common/post_status_wall.tpl");
        // line 4
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/post/common/post_status_wall.tpl".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $_trait_2 = $this->env->loadTemplate("@template/default/template/post/common/post_item_wall.tpl");
        // line 5
        if (!$_trait_2->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/post/common/post_item_wall.tpl".'" cannot be used as a trait.');
        }
        $_trait_2_blocks = $_trait_2->getBlocks();

        $_trait_3 = $this->env->loadTemplate("@template/default/template/post/common/comment_post_list.tpl");
        // line 6
        if (!$_trait_3->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/post/common/comment_post_list.tpl".'" cannot be used as a trait.');
        }
        $_trait_3_blocks = $_trait_3->getBlocks();

        $_trait_4 = $this->env->loadTemplate("@template/default/template/account/common/profile_column.tpl");
        // line 7
        if (!$_trait_4->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/common/profile_column.tpl".'" cannot be used as a trait.');
        }
        $_trait_4_blocks = $_trait_4->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks,
            $_trait_2_blocks,
            $_trait_3_blocks,
            $_trait_4_blocks
        );

        $this->blocks = array_merge(
            $this->traits,
            array(
                'title' => array($this, 'block_title'),
                'stylesheet' => array($this, 'block_stylesheet'),
                'body' => array($this, 'block_body'),
                'template' => array($this, 'block_template'),
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

    // line 9
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user_info"]) ? $context["user_info"] : null), "username"), "html", null, true);
        echo " | ";
        echo gettext("Wall Page");
    }

    // line 11
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 12
        echo "    ";
        $this->displayBlock("post_common_comment_post_list_style", $context, $blocks);
        echo "
    ";
        // line 13
        $this->displayBlock("post_common_post_status_wall_style", $context, $blocks);
        echo "
";
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        // line 17
        echo "    <div id=\"y-content\">
        <div id=\"y-main-content\" class=\"has-horizontal post-per-column\" style=\"width: 9999px;\">
            ";
        // line 19
        if (((isset($context["current_user_id"]) ? $context["current_user_id"] : null) != $this->getAttribute(call_user_func_array($this->env->getFunction('get_current_user')->getCallable(), array()), "id"))) {
            // line 20
            echo "                ";
            $context["user"] = $this->getAttribute((isset($context["users"]) ? $context["users"] : null), (isset($context["current_user_id"]) ? $context["current_user_id"] : null), array(), "array");
            // line 21
            echo "                ";
            $this->displayBlock("common_profile_column", $context, $blocks);
            echo "
            ";
        }
        // line 23
        echo "            <div class=\"feed-block block-post-new\">
                <div class=\"block-header\">
                    <a class=\"block-title fl\" href=\"#\">
                        ";
        // line 26
        echo gettext("Post");
        echo "                   
                    </a>  
                    <a class=\"block-seemore fl\" href=\"#\"> 
                        <i class=\"icon-angle-right\"></i>
                    </a>           
                </div>
                <div class=\"block-content\">
                    <div class=\"column has-new-post\">
                        ";
        // line 34
        $context["user"] = $this->getAttribute((isset($context["users"]) ? $context["users"] : null), (isset($context["current_user_id"]) ? $context["current_user_id"] : null), array(), "array");
        // line 35
        echo "                        ";
        $this->displayBlock("post_common_post_status_wall", $context, $blocks);
        echo "
                    </div>
                    ";
        // line 37
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : null));
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
            // line 38
            echo "                        <div class=\"column\">
                            ";
            // line 39
            $context["user"] = $this->getAttribute((isset($context["users"]) ? $context["users"] : null), $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "user_id"), array(), "array");
            // line 40
            echo "                            ";
            $this->displayBlock("post_common_post_item_wall", $context, $blocks);
            echo "
                        </div>
                    ";
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
        // line 43
        echo "                </div>
            </div>
            ";
        // line 45
        $this->displayBlock("post_common_comment_post_list", $context, $blocks);
        echo "
        </div>
    </div>
";
    }

    // line 50
    public function block_template($context, array $blocks = array())
    {
        // line 51
        echo "    ";
        $this->displayBlock("post_common_post_status_wall_html_template", $context, $blocks);
        echo "
";
    }

    // line 54
    public function block_javascript($context, array $blocks = array())
    {
        // line 55
        echo "<script type=\"text/javascript\">
\$(function(){
    \$(document).trigger('FRIEND_ACTION', [false]);    
});
</script>
";
        // line 60
        $this->displayBlock("post_common_comment_post_list_javascript", $context, $blocks);
        echo "
";
        // line 61
        $this->displayBlock("post_common_post_status_wall_javascript", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/template/account/wall.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  221 => 61,  217 => 60,  210 => 55,  207 => 54,  200 => 51,  197 => 50,  189 => 45,  185 => 43,  167 => 40,  165 => 39,  162 => 38,  145 => 37,  139 => 35,  137 => 34,  126 => 26,  121 => 23,  115 => 21,  112 => 20,  110 => 19,  106 => 17,  103 => 16,  97 => 13,  92 => 12,  89 => 11,  81 => 9,  42 => 7,  35 => 6,  28 => 5,  21 => 4,  14 => 3,);
    }
}
