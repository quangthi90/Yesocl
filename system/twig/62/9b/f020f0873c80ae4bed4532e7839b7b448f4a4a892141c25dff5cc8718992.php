<?php

/* @template/default/template/account/profiles/tabs/background_view.tpl */
class __TwigTemplate_629bf020f0873c80ae4bed4532e7839b7b448f4a4a892141c25dff5cc8718992 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/summary_view.tpl");
        // line 1
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/summary_view.tpl".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/education_view.tpl");
        // line 2
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/education_view.tpl".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $_trait_2 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/experience_view.tpl");
        // line 3
        if (!$_trait_2->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/experience_view.tpl".'" cannot be used as a trait.');
        }
        $_trait_2_blocks = $_trait_2->getBlocks();

        $_trait_3 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/skill_view.tpl");
        // line 4
        if (!$_trait_3->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/skill_view.tpl".'" cannot be used as a trait.');
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
                'profiles_tabs_background_view' => array($this, 'block_profiles_tabs_background_view'),
                'profiles_tabs_background_view_javascript' => array($this, 'block_profiles_tabs_background_view_javascript'),
            )
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 5
        echo "
";
        // line 6
        $this->displayBlock('profiles_tabs_background_view', $context, $blocks);
        // line 12
        echo "
";
        // line 13
        $this->displayBlock('profiles_tabs_background_view_javascript', $context, $blocks);
    }

    // line 6
    public function block_profiles_tabs_background_view($context, array $blocks = array())
    {
        // line 7
        echo "\t";
        $this->displayBlock("profiles_tabs_summary_view", $context, $blocks);
        echo "
\t";
        // line 8
        $this->displayBlock("profiles_tabs_education_view", $context, $blocks);
        echo "
\t";
        // line 9
        $this->displayBlock("profiles_tabs_experience_view", $context, $blocks);
        echo "
\t";
        // line 10
        $this->displayBlock("profiles_tabs_skill_view", $context, $blocks);
        echo "\t
";
    }

    // line 13
    public function block_profiles_tabs_background_view_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/background_view.tpl";
    }

    public function getDebugInfo()
    {
        return array (  90 => 10,  86 => 9,  77 => 7,  74 => 6,  70 => 13,  67 => 12,  65 => 6,  62 => 5,  180 => 62,  170 => 55,  166 => 54,  160 => 51,  156 => 50,  149 => 46,  145 => 45,  139 => 42,  135 => 41,  129 => 38,  125 => 37,  120 => 34,  111 => 31,  107 => 29,  103 => 28,  98 => 26,  84 => 20,  78 => 19,  75 => 18,  71 => 17,  66 => 15,  60 => 12,  56 => 11,  50 => 8,  46 => 7,  39 => 3,  36 => 2,  33 => 1,  29 => 62,  26 => 61,  24 => 1,  136 => 30,  132 => 29,  128 => 28,  124 => 27,  119 => 26,  116 => 25,  108 => 20,  104 => 19,  100 => 18,  96 => 13,  93 => 23,  87 => 12,  82 => 8,  79 => 10,  72 => 8,  35 => 4,  28 => 3,  21 => 2,  14 => 1,);
    }
}
