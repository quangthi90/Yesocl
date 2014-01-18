<?php

/* default/template/account/profiles/profiles_view.tpl */
class __TwigTemplate_cd7eed8170408b8ff1ecae53a48970b58db78d947ea7824d2bd3ae646e97daed extends Twig_Template
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

        $_trait_1 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/information_view.tpl");
        // line 4
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/information_view.tpl".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $_trait_2 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/background_view.tpl");
        // line 5
        if (!$_trait_2->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/background_view.tpl".'" cannot be used as a trait.');
        }
        $_trait_2_blocks = $_trait_2->getBlocks();

        $_trait_3 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/profile_overview.tpl");
        // line 6
        if (!$_trait_3->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/profile_overview.tpl".'" cannot be used as a trait.');
        }
        $_trait_3_blocks = $_trait_3->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks,
            $_trait_2_blocks,
            $_trait_3_blocks
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

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo "Yesocl - ";
        echo gettext("View Profile");
    }

    // line 10
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 11
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/bootstrap-formhelpers.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
    <link href=\"";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("profiles.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
";
    }

    // line 15
    public function block_body($context, array $blocks = array())
    {
        // line 16
        echo "<div id=\"y-content\" class=\"no-scroll\">
\t<div id=\"y-main-content\" class=\"profile-view-page\" style=\"width:2900px;\">
\t\t";
        // line 18
        $this->displayBlock("profiles_tabs_profile_overview", $context, $blocks);
        echo "
\t\t";
        // line 19
        $this->displayBlock("profiles_tabs_information_view", $context, $blocks);
        echo "
\t\t";
        // line 20
        $this->displayBlock("profiles_tabs_background_view", $context, $blocks);
        echo "
\t</div>
</div>
";
    }

    // line 25
    public function block_javascript($context, array $blocks = array())
    {
        // line 26
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/bootstrap-formhelpers-datepicker.en_US.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 27
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/bootstrap-formhelpers-datepicker.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/bootstrap-formhelpers-phone.format.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/bootstrap-formhelpers-phone.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 30
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("profiles.js")), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "default/template/account/profiles/profiles_view.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 30,  132 => 29,  128 => 28,  124 => 27,  119 => 26,  116 => 25,  108 => 20,  104 => 19,  100 => 18,  96 => 16,  93 => 15,  87 => 12,  82 => 11,  79 => 10,  72 => 8,  35 => 6,  28 => 5,  21 => 4,  14 => 3,);
    }
}
