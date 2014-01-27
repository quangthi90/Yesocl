<?php

/* default/template/post/category.tpl */
class __TwigTemplate_feb6ed4f4375ae989b30c249a4c2423661209a07befec7b98dc5783a92b01384 extends Twig_Template
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

        $_trait_1 = $this->env->loadTemplate("@template/default/template/post/common/post_item_list.tpl");
        // line 4
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/post/common/post_item_list.tpl".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $_trait_2 = $this->env->loadTemplate("@template/default/template/post/common/comment_post_list.tpl");
        // line 5
        if (!$_trait_2->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/post/common/comment_post_list.tpl".'" cannot be used as a trait.');
        }
        $_trait_2_blocks = $_trait_2->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks,
            $_trait_2_blocks
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

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo gettext("Category Detail Page");
    }

    // line 9
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 10
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("home.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
    ";
        // line 11
        $this->displayBlock("post_common_comment_post_list_style", $context, $blocks);
        echo "
";
    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
        // line 15
        echo "<div id=\"y-content\" class=\"no-header-fixed\">
    <div id=\"y-main-content\" class=\"has-horizontal post-category\" >
        ";
        // line 17
        $context["block_info"] = (isset($context["category"]) ? $context["category"] : null);
        // line 18
        echo "        ";
        $context["block_href"] = call_user_func_array($this->env->getFunction('path')->getCallable(), array("CategoryPage", array("category_slug" => $this->getAttribute((isset($context["category"]) ? $context["category"] : null), "slug"))));
        // line 19
        echo "        ";
        $context["is_back_btn"] = true;
        // line 20
        echo "        ";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["all_posts"]) ? $context["all_posts"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["posts"]) {
            // line 21
            echo "            ";
            $context["style"] = twig_random($this->env, array(0 => 1, 1 => 2));
            // line 22
            echo "            ";
            if ((twig_length_filter($this->env, (isset($context["posts"]) ? $context["posts"] : null)) > 0)) {
                // line 23
                echo "                ";
                $this->displayBlock("post_common_post_item_list", $context, $blocks);
                echo "
            ";
            }
            // line 25
            echo "        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['posts'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "    </div>
</div>
";
        // line 28
        $this->displayBlock("post_common_comment_post_list", $context, $blocks);
        echo "
";
    }

    // line 31
    public function block_javascript($context, array $blocks = array())
    {
        // line 32
        $this->displayBlock("post_common_comment_post_list_javascript", $context, $blocks);
        echo "
<script type=\"text/javascript\" src=\"";
        // line 33
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/modernizr.custom.js")), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "default/template/post/category.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 33,  156 => 32,  153 => 31,  147 => 28,  143 => 26,  129 => 25,  123 => 23,  120 => 22,  117 => 21,  99 => 20,  96 => 19,  93 => 18,  91 => 17,  87 => 15,  84 => 14,  78 => 11,  73 => 10,  70 => 9,  64 => 7,  28 => 5,  21 => 4,  14 => 3,);
    }
}
