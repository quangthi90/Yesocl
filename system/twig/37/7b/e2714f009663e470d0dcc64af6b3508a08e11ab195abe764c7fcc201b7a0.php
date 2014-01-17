<?php

/* @template/default/template/account/profiles/tabs/education_view.tpl */
class __TwigTemplate_377be2714f009663e470d0dcc64af6b3508a08e11ab195abe764c7fcc201b7a0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'profiles_tabs_education_view' => array($this, 'block_profiles_tabs_education_view'),
            'profiles_tabs_education_view_javascript' => array($this, 'block_profiles_tabs_education_view_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('profiles_tabs_education_view', $context, $blocks);
        // line 33
        echo "
";
        // line 34
        $this->displayBlock('profiles_tabs_education_view_javascript', $context, $blocks);
    }

    // line 1
    public function block_profiles_tabs_education_view($context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"fl profile-column profile-column-education\" id=\"profile-column-education\">
\t<h3 class=\"profile-column-title\"><i class=\"icon-list\"></i> ";
        // line 3
        echo gettext("Education Background");
        echo "</h3>
\t<div class=\"profile-column-wrapper\">
\t\t<div class=\"profile-column-content\">
\t\t\t";
        // line 6
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "educations")) > 0)) {
            // line 7
            echo "\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "educations"));
            foreach ($context['_seq'] as $context["_key"] => $context["education"]) {
                // line 8
                echo "\t\t\t\t<div class=\"profile-info-item education-item\">
\t\t\t\t\t<div class=\"profile-info-basic\">
\t\t\t\t\t\t<div class=\"profile-info-title\">
\t\t\t\t\t\t\t<h4 class=\"school-name\">";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "school"), "html", null, true);
                echo "</h4>
\t\t\t\t\t\t\t<span class=\"degree-name\">";
                // line 12
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "degree"), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t<span class=\"major-name\">";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "field"), "html", null, true);
                echo "</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"profile-info-time\">
\t\t\t\t\t\t\t<span class=\"time-from\">";
                // line 16
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "started"), "html", null, true);
                echo "</span><span class=\"time-to\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "ended"), "html", null, true);
                echo "</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t";
                // line 22
                echo "\t\t\t\t</div>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['education'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 24
            echo "\t\t\t";
        } else {
            // line 25
            echo "\t\t\t\t<div class=\"profile-info-item empty-data\">
\t\t\t\t\t";
            // line 26
            echo gettext("No information found");
            // line 27
            echo "\t\t\t\t</div>
\t\t\t";
        }
        // line 29
        echo "\t\t</div>
\t</div>
</div>
";
    }

    // line 34
    public function block_profiles_tabs_education_view_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/education_view.tpl";
    }

    public function getDebugInfo()
    {
        return array (  105 => 34,  94 => 27,  92 => 26,  89 => 25,  61 => 12,  52 => 8,  45 => 6,  64 => 17,  57 => 11,  53 => 11,  49 => 9,  47 => 7,  44 => 7,  42 => 6,  30 => 1,  90 => 10,  86 => 24,  77 => 7,  74 => 6,  70 => 13,  67 => 12,  65 => 13,  62 => 5,  180 => 62,  170 => 55,  166 => 54,  160 => 51,  156 => 50,  149 => 46,  145 => 45,  139 => 42,  135 => 41,  129 => 38,  125 => 37,  120 => 34,  111 => 31,  107 => 29,  103 => 28,  98 => 29,  84 => 20,  78 => 19,  75 => 18,  71 => 16,  66 => 15,  60 => 12,  56 => 11,  50 => 8,  46 => 7,  39 => 3,  36 => 2,  33 => 1,  29 => 34,  26 => 33,  24 => 1,  136 => 30,  132 => 29,  128 => 28,  124 => 27,  119 => 26,  116 => 25,  108 => 20,  104 => 19,  100 => 18,  96 => 13,  93 => 23,  87 => 12,  82 => 8,  79 => 22,  72 => 8,  35 => 4,  28 => 3,  21 => 2,  14 => 1,);
    }
}
