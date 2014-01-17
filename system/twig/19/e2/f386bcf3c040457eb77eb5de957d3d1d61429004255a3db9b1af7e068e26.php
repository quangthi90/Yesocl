<?php

/* @template/default/template/account/profiles/tabs/summary_view.tpl */
class __TwigTemplate_19e2f386bcf3c040457eb77eb5de957d3d1d61429004255a3db9b1af7e068e26 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'profiles_tabs_summary_view' => array($this, 'block_profiles_tabs_summary_view'),
            'profiles_tabs_summary_view_javascript' => array($this, 'block_profiles_tabs_summary_view_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('profiles_tabs_summary_view', $context, $blocks);
        // line 17
        $this->displayBlock('profiles_tabs_summary_view_javascript', $context, $blocks);
    }

    // line 1
    public function block_profiles_tabs_summary_view($context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"fl profile-column profile-column-summary\" id=\"profile-column-summary\">
\t<h3 class=\"profile-column-title\"><i class=\"icon-list\"></i> ";
        // line 3
        echo gettext("Summary");
        echo "</h3>
\t<div class=\"profile-column-wrapper\">
\t\t<div class=\"profile-column-content\">
\t\t\t";
        // line 6
        if (twig_test_empty($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "summary"))) {
            // line 7
            echo "\t\t\t\t<div class=\"profile-info-item empty-data\">
\t\t\t\t\t";
            // line 8
            echo gettext("No information found");
            // line 9
            echo "\t\t\t\t</div>
\t\t\t";
        } else {
            // line 11
            echo "\t\t\t\tuser.summary
\t\t\t";
        }
        // line 13
        echo "\t\t</div>
\t</div>
</div>
";
    }

    // line 17
    public function block_profiles_tabs_summary_view_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/summary_view.tpl";
    }

    public function getDebugInfo()
    {
        return array (  64 => 17,  57 => 13,  53 => 11,  49 => 9,  47 => 8,  44 => 7,  42 => 6,  30 => 1,  90 => 10,  86 => 9,  77 => 7,  74 => 6,  70 => 13,  67 => 12,  65 => 6,  62 => 5,  180 => 62,  170 => 55,  166 => 54,  160 => 51,  156 => 50,  149 => 46,  145 => 45,  139 => 42,  135 => 41,  129 => 38,  125 => 37,  120 => 34,  111 => 31,  107 => 29,  103 => 28,  98 => 26,  84 => 20,  78 => 19,  75 => 18,  71 => 17,  66 => 15,  60 => 12,  56 => 11,  50 => 8,  46 => 7,  39 => 3,  36 => 3,  33 => 2,  29 => 62,  26 => 17,  24 => 1,  136 => 30,  132 => 29,  128 => 28,  124 => 27,  119 => 26,  116 => 25,  108 => 20,  104 => 19,  100 => 18,  96 => 13,  93 => 23,  87 => 12,  82 => 8,  79 => 10,  72 => 8,  35 => 4,  28 => 3,  21 => 2,  14 => 1,);
    }
}
