<?php

/* @template/default/template/account/profiles/tabs/background.tpl */
class __TwigTemplate_ea1920f3c63b99fe8eb3b7d534b5395b81a1188ffa73fa2aea837a8ac6892b35 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/summary.tpl");
        // line 1
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/summary.tpl".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/education.tpl");
        // line 2
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/education.tpl".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $_trait_2 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/experience.tpl");
        // line 3
        if (!$_trait_2->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/experience.tpl".'" cannot be used as a trait.');
        }
        $_trait_2_blocks = $_trait_2->getBlocks();

        $_trait_3 = $this->env->loadTemplate("@template/default/template/account/profiles/tabs/skill.tpl");
        // line 4
        if (!$_trait_3->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/profiles/tabs/skill.tpl".'" cannot be used as a trait.');
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
                'profiles_tabs_background' => array($this, 'block_profiles_tabs_background'),
                'profiles_tabs_background_javascript' => array($this, 'block_profiles_tabs_background_javascript'),
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
        $this->displayBlock('profiles_tabs_background', $context, $blocks);
        // line 18
        echo "
";
        // line 19
        $this->displayBlock('profiles_tabs_background_javascript', $context, $blocks);
    }

    // line 6
    public function block_profiles_tabs_background($context, array $blocks = array())
    {
        // line 7
        echo "<div id=\"profiles-tabs-background\" class=\"profiles-tabs\" style=\"opacity: 0;\">
\t<div class=\"profiles-tabs-header\">
\t\t<div class=\"profiles-tabs-title\"><i class=\"icon-list\"></i> ";
        // line 9
        echo gettext("Background");
        echo "</div>
\t</div>
\t";
        // line 11
        $this->displayBlock("profiles_tabs_summary", $context, $blocks);
        echo "
\t";
        // line 12
        $this->displayBlock("profiles_tabs_education", $context, $blocks);
        echo "
\t";
        // line 13
        $this->displayBlock("profiles_tabs_experience", $context, $blocks);
        echo "
\t";
        // line 14
        $this->displayBlock("profiles_tabs_skill", $context, $blocks);
        echo "
\t
</div>
";
    }

    // line 19
    public function block_profiles_tabs_background_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/background.tpl";
    }

    public function getDebugInfo()
    {
        return array (  106 => 19,  98 => 14,  94 => 13,  90 => 12,  81 => 9,  77 => 7,  74 => 6,  67 => 18,  65 => 6,  62 => 5,  1008 => 467,  994 => 456,  985 => 450,  976 => 444,  967 => 438,  958 => 432,  950 => 427,  941 => 422,  938 => 421,  936 => 420,  930 => 417,  922 => 412,  912 => 407,  906 => 406,  901 => 405,  898 => 404,  895 => 403,  892 => 402,  890 => 401,  884 => 398,  875 => 392,  866 => 386,  850 => 373,  844 => 370,  837 => 365,  826 => 363,  822 => 362,  816 => 359,  803 => 349,  799 => 348,  790 => 342,  786 => 341,  778 => 336,  774 => 335,  742 => 306,  737 => 304,  726 => 296,  722 => 295,  711 => 287,  706 => 284,  689 => 282,  685 => 281,  679 => 278,  671 => 274,  668 => 273,  666 => 272,  660 => 269,  649 => 261,  641 => 258,  635 => 255,  628 => 253,  623 => 252,  620 => 251,  617 => 250,  614 => 249,  612 => 248,  606 => 245,  597 => 239,  591 => 236,  586 => 234,  578 => 229,  574 => 228,  558 => 215,  546 => 205,  541 => 203,  536 => 202,  531 => 200,  526 => 199,  524 => 198,  518 => 195,  486 => 168,  480 => 165,  476 => 164,  469 => 160,  465 => 159,  461 => 158,  457 => 157,  450 => 153,  446 => 152,  442 => 151,  438 => 150,  431 => 146,  426 => 144,  415 => 137,  398 => 133,  383 => 131,  379 => 130,  375 => 129,  369 => 128,  365 => 127,  361 => 126,  358 => 125,  341 => 124,  335 => 121,  324 => 114,  304 => 110,  298 => 109,  292 => 108,  288 => 107,  281 => 106,  264 => 105,  258 => 102,  250 => 97,  246 => 96,  241 => 94,  237 => 93,  232 => 91,  225 => 87,  221 => 86,  217 => 85,  212 => 83,  197 => 71,  189 => 66,  185 => 65,  179 => 62,  175 => 61,  169 => 58,  165 => 57,  157 => 54,  153 => 53,  147 => 50,  143 => 49,  137 => 45,  120 => 39,  114 => 36,  99 => 29,  86 => 11,  76 => 23,  70 => 19,  66 => 19,  60 => 16,  56 => 15,  42 => 4,  36 => 2,  33 => 1,  29 => 467,  26 => 466,  24 => 1,  136 => 30,  132 => 29,  128 => 42,  124 => 40,  119 => 26,  116 => 25,  108 => 32,  104 => 19,  100 => 18,  96 => 16,  93 => 28,  87 => 12,  82 => 26,  79 => 10,  72 => 8,  35 => 4,  28 => 3,  21 => 2,  14 => 1,);
    }
}
