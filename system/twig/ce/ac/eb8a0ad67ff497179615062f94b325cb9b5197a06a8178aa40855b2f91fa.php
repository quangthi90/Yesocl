<?php

/* default/template/account/profiles/profiles.tpl */
class __TwigTemplate_ceaceb8a0ad67ff497179615062f94b325cb9b5197a06a8178aa40855b2f91fa extends Twig_Template
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

        $_trait_1 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/information.tpl");
        // line 4
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/information.tpl".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $_trait_2 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/background.tpl");
        // line 5
        if (!$_trait_2->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/background.tpl".'" cannot be used as a trait.');
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
        echo "Yesocl - ";
        echo gettext("Edit Profile");
    }

    // line 9
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 10
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/bootstrap-formhelpers.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("profiles.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
";
    }

    // line 14
    public function block_body($context, array $blocks = array())
    {
        // line 15
        echo "<div id=\"y-content\" class=\"no-header-fixed\">
\t<div id=\"y-main-content\">
\t\t";
        // line 17
        $this->displayBlock("profiles_tabs_information", $context, $blocks);
        echo "
\t\t";
        // line 18
        $this->displayBlock("profiles_tabs_background", $context, $blocks);
        echo "
\t</div>
</div>
";
    }

    // line 23
    public function block_javascript($context, array $blocks = array())
    {
        // line 24
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/bootstrap-formhelpers-datepicker.en_US.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 25
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/bootstrap-formhelpers-datepicker.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 26
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/bootstrap-formhelpers-phone.format.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 27
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/bootstrap-formhelpers-phone.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("profiles.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
\t\$(document).ready( function () {
\t\t\$('#y-content').niceScroll();
\t});
</script>
";
    }

    public function getTemplateName()
    {
        return "default/template/account/profiles/profiles.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 28,  120 => 27,  116 => 26,  112 => 25,  107 => 24,  104 => 23,  96 => 18,  92 => 17,  88 => 15,  85 => 14,  79 => 11,  74 => 10,  71 => 9,  64 => 7,  28 => 5,  21 => 4,  14 => 3,);
    }
}
