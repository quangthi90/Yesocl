<?php

/* @template/default/template/account/profiles/tabs/experience_view.tpl */
class __TwigTemplate_591fa934a439b5d1b727dccb7ade2e23eb3142e0102abfbb4c230c8fc547b238 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'profiles_tabs_experience_view' => array($this, 'block_profiles_tabs_experience_view'),
            'profiles_tabs_experience_view_javascript' => array($this, 'block_profiles_tabs_experience_view_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('profiles_tabs_experience_view', $context, $blocks);
        // line 36
        $this->displayBlock('profiles_tabs_experience_view_javascript', $context, $blocks);
    }

    // line 1
    public function block_profiles_tabs_experience_view($context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"fl profile-column profile-column-experience\" id=\"profile-column-experience\">
\t<h3 class=\"profile-column-title\"><i class=\"icon-list\"></i> ";
        // line 3
        echo gettext("Work Experience");
        echo "</h3>
\t<div class=\"profile-column-wrapper\">
\t\t<div class=\"profile-column-content\">
\t\t\t";
        // line 6
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "experiences")) > 0)) {
            // line 7
            echo "\t\t\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "experiences"));
            foreach ($context['_seq'] as $context["_key"] => $context["experience"]) {
                // line 8
                echo "\t\t\t\t<div class=\"profile-info-item work-item\">
\t\t\t\t\t<div class=\"profile-info-basic\">
\t\t\t\t\t\t<div class=\"profile-info-title\">
\t\t\t\t\t\t\t<h4 class=\"work-title\">";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "title"), "html", null, true);
                echo "</h4>
\t\t\t\t\t\t\t<span class=\"company-name\">";
                // line 12
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "company"), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t at 
\t\t\t\t\t\t\t<span class=\"company-address\">";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "location"), "html", null, true);
                echo "</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"profile-info-time\">
\t\t\t\t\t\t\t<span class=\"time-from\">";
                // line 17
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "started"), "d/m/Y"), "html", null, true);
                echo "</span><span class=\"time-to\">";
                if (($this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "ended") != null)) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "ended"), "d/m/Y"), "html", null, true);
                } else {
                    echo gettext("Present");
                }
                echo "</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t";
                // line 25
                echo "\t\t\t\t</div>
\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['experience'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            echo "\t\t\t";
        } else {
            // line 28
            echo "\t\t\t\t<div class=\"profile-info-item empty-data\">
\t\t\t\t\t";
            // line 29
            echo gettext("No information found");
            // line 30
            echo "\t\t\t\t</div>
\t\t\t";
        }
        // line 32
        echo "\t\t</div>
\t</div>
</div>
";
    }

    // line 36
    public function block_profiles_tabs_experience_view_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/experience_view.tpl";
    }

    public function getDebugInfo()
    {
        return array (  91 => 28,  88 => 27,  81 => 25,  69 => 17,  63 => 14,  58 => 12,  54 => 11,  105 => 34,  94 => 29,  92 => 26,  89 => 25,  61 => 12,  52 => 8,  45 => 6,  64 => 17,  57 => 11,  53 => 11,  49 => 8,  47 => 7,  44 => 7,  42 => 6,  30 => 1,  90 => 10,  86 => 24,  77 => 7,  74 => 6,  70 => 13,  67 => 12,  65 => 13,  62 => 5,  180 => 62,  170 => 55,  166 => 54,  160 => 51,  156 => 50,  149 => 46,  145 => 45,  139 => 42,  135 => 41,  129 => 38,  125 => 37,  120 => 34,  111 => 31,  107 => 36,  103 => 28,  98 => 29,  84 => 20,  78 => 19,  75 => 18,  71 => 16,  66 => 15,  60 => 12,  56 => 11,  50 => 8,  46 => 7,  39 => 3,  36 => 3,  33 => 2,  29 => 34,  26 => 36,  24 => 1,  136 => 30,  132 => 29,  128 => 28,  124 => 27,  119 => 26,  116 => 25,  108 => 20,  104 => 19,  100 => 32,  96 => 30,  93 => 23,  87 => 12,  82 => 8,  79 => 22,  72 => 8,  35 => 4,  28 => 3,  21 => 2,  14 => 1,);
    }
}
