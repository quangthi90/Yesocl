<?php

/* default/template/common/home.tpl */
class __TwigTemplate_d1ce438c05e36c7613ba80bdb3dfa31eac818d2ee2a8e3cdc6a5343d234cd94d extends Twig_Template
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
        echo gettext("Home Feed");
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
        echo "\t<div id=\"y-content\" class=\"no-header-fixed\">
\t\t<div id=\"y-main-content\" class=\"has-horizontal post-has-block\">
\t\t";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["branchs"]) ? $context["branchs"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["branch"]) {
            // line 18
            echo "\t        ";
            $context["style"] = twig_random($this->env, array(0 => 1, 1 => 2));
            // line 19
            echo "\t\t\t";
            $context["posts"] = $this->getAttribute((isset($context["all_posts"]) ? $context["all_posts"] : null), $this->getAttribute((isset($context["branch"]) ? $context["branch"] : null), "slug"), array(), "array");
            // line 20
            echo "\t\t\t";
            if ((twig_length_filter($this->env, (isset($context["posts"]) ? $context["posts"] : null)) > 0)) {
                // line 21
                echo "\t            ";
                $context["block_info"] = (isset($context["branch"]) ? $context["branch"] : null);
                // line 22
                echo "\t            ";
                $context["block_href"] = call_user_func_array($this->env->getFunction('path')->getCallable(), array("BranchPage", array("branch_slug" => $this->getAttribute((isset($context["branch"]) ? $context["branch"] : null), "slug"))));
                // line 23
                echo "\t            ";
                $this->displayBlock("post_common_post_item_list", $context, $blocks);
                echo "
\t\t\t";
            }
            // line 25
            echo "\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['branch'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "\t\t</div>
\t</div>
\t";
        // line 28
        $this->displayBlock("post_common_comment_post_list", $context, $blocks);
        echo "
";
    }

    // line 31
    public function block_javascript($context, array $blocks = array())
    {
        // line 32
        echo "\t";
        $this->displayBlock("post_common_comment_post_list_javascript", $context, $blocks);
        echo "
\t<script type=\"text/javascript\" src=\"";
        // line 33
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/modernizr.custom.js")), "html", null, true);
        echo "\"></script>
\t";
        // line 34
        if (array_key_exists("warning_active", $context)) {
            // line 35
            echo "\t<script type=\"text/javascript\">
\tvar msgCallback = \$(\"<div></div>\").css(
\t{
\t\t'position': 'absolute',
\t\t'right': '15px',
\t\t'top': '60px',
\t\t'background-color' : '#ddd',
\t\t'color' : '#009B77',
\t\t'padding' : '15px',
\t\t'font-weight' : 'bold'
\t}).hide().appendTo('body');
\tbootbox.alert(\"";
            // line 46
            echo twig_escape_filter($this->env, (isset($context["warning_active"]) ? $context["warning_active"] : null), "html", null, true);
            echo "\", function() {
\t\tmsgCallback.html('Alert: ' + 'Alert callback').fadeIn(1000).delay(2000).fadeOut(300);
\t});
\t</script>
\t";
        }
    }

    public function getTemplateName()
    {
        return "default/template/common/home.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 46,  167 => 35,  165 => 34,  156 => 32,  153 => 31,  147 => 28,  143 => 26,  129 => 25,  120 => 22,  114 => 20,  108 => 18,  87 => 15,  84 => 14,  78 => 11,  73 => 10,  64 => 7,  28 => 5,  21 => 4,  14 => 3,  369 => 197,  354 => 185,  330 => 166,  322 => 161,  318 => 160,  314 => 158,  295 => 142,  285 => 134,  280 => 131,  263 => 122,  254 => 118,  250 => 117,  245 => 116,  241 => 115,  237 => 113,  235 => 112,  232 => 111,  224 => 109,  222 => 108,  217 => 105,  215 => 104,  208 => 99,  202 => 97,  200 => 96,  192 => 90,  181 => 85,  175 => 82,  171 => 81,  161 => 33,  157 => 75,  145 => 73,  142 => 72,  138 => 71,  127 => 67,  121 => 64,  111 => 19,  102 => 51,  94 => 46,  91 => 17,  81 => 33,  56 => 19,  52 => 18,  39 => 11,  34 => 8,  29 => 5,  26 => 4,  24 => 2,  22 => 1,  123 => 23,  117 => 21,  110 => 39,  104 => 38,  97 => 34,  90 => 33,  83 => 24,  77 => 23,  70 => 9,  63 => 23,  60 => 17,  57 => 16,  43 => 12,  41 => 16,  25 => 2,  23 => 1,);
    }
}
