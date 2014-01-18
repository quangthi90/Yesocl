<?php

/* @template/default/template/account/profiles/tabs/information_view.tpl */
class __TwigTemplate_ef65e344a0cf649fe8ffe0b0d02ae40ee7b709fb09c42eeea9c87f6031f0811e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'profiles_tabs_information_view' => array($this, 'block_profiles_tabs_information_view'),
            'profiles_tabs_information_view_javascript' => array($this, 'block_profiles_tabs_information_view_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('profiles_tabs_information_view', $context, $blocks);
        // line 61
        echo "
";
        // line 62
        $this->displayBlock('profiles_tabs_information_view_javascript', $context, $blocks);
    }

    // line 1
    public function block_profiles_tabs_information_view($context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"fl profile-column profile-column-information\" id=\"profile-column-information\">
\t<h3 class=\"profile-column-title\"><i class=\"icon-list\"></i> ";
        // line 3
        echo gettext("Personal Information");
        echo "</h3>
\t<div class=\"profile-column-wrapper\">
\t\t<div class=\"profile-column-content\">
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span3 profile-label\">";
        // line 7
        echo gettext("Username");
        echo "</div>
\t\t\t\t<div class=\"span9 profile-value\">";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
        echo "</div>
\t\t\t</div>
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span3 profile-label\">";
        // line 11
        echo gettext("Fullname");
        echo "</div>
\t\t\t\t<div class=\"span9 profile-value\">";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "fullname"), "html", null, true);
        echo "</div>
\t\t\t</div>
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span3 profile-label\">";
        // line 15
        echo gettext("Email");
        echo "</div>
\t\t\t\t<div class=\"span9 profile-value profile-emails\">
\t\t\t\t\t";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "emails"));
        foreach ($context['_seq'] as $context["id"] => $context["email"]) {
            // line 18
            echo "\t\t\t\t\t<div class=\"email-item\">
\t\t\t\t\t\t<span class=\"label";
            // line 19
            if (((isset($context["primary_email"]) ? $context["primary_email"] : null) == (isset($context["id"]) ? $context["id"] : null))) {
                echo " label-success";
            }
            echo "\"><i class=\"icon-envelope\"></i></span>
\t\t\t\t\t\t<span class=\"\">";
            // line 20
            echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : null), "html", null, true);
            echo "</span> 
\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['id'], $context['email'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span3 profile-label\">";
        // line 26
        echo gettext("Phone");
        echo "</div>
\t\t\t\t<div class=\"span9 profile-value profile-phones\">
\t\t\t\t\t";
        // line 28
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "phones"));
        foreach ($context['_seq'] as $context["_key"] => $context["phone"]) {
            // line 29
            echo "\t\t\t\t\t<div class=\"phones-item\">
\t\t\t\t\t\t<span><i class=\"icon-phone\"></i></span>
\t\t\t\t\t\t<span>";
            // line 31
            echo twig_escape_filter($this->env, (isset($context["phone"]) ? $context["phone"] : null), "html", null, true);
            echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['phone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span3 profile-label\">";
        // line 37
        echo gettext("Gender");
        echo "</div>
\t\t\t\t<div class=\"span9 profile-value\">";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "gender"), "html", null, true);
        echo "</div>
\t\t\t</div>
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span3 profile-label\">";
        // line 41
        echo gettext("Birthday");
        echo "</div>
\t\t\t\t<div class=\"span9 profile-value\">";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "birthday"), "html", null, true);
        echo "</div>
\t\t\t</div>
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span3 profile-label\">";
        // line 45
        echo gettext("Address");
        echo "</div>
\t\t\t\t<div class=\"span9 profile-value\">";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "address"), "html", null, true);
        echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span3 profile-label\">";
        // line 50
        echo gettext("Living");
        echo "</div>
\t\t\t\t<div class=\"span9 profile-value\">";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "location"), "html", null, true);
        echo "</div>
\t\t\t</div>
\t\t\t<div class=\"row-fluid\">
\t\t\t\t<div class=\"span3 profile-label\">";
        // line 54
        echo gettext("Industry");
        echo "</div>
\t\t\t\t<div class=\"span9 profile-value\">";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "industry"), "html", null, true);
        echo "</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
    }

    // line 62
    public function block_profiles_tabs_information_view_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/information_view.tpl";
    }

    public function getDebugInfo()
    {
        return array (  180 => 62,  170 => 55,  166 => 54,  160 => 51,  156 => 50,  149 => 46,  145 => 45,  139 => 42,  135 => 41,  129 => 38,  125 => 37,  120 => 34,  111 => 31,  107 => 29,  103 => 28,  98 => 26,  84 => 20,  78 => 19,  75 => 18,  71 => 17,  66 => 15,  60 => 12,  56 => 11,  50 => 8,  46 => 7,  39 => 3,  36 => 2,  33 => 1,  29 => 62,  26 => 61,  24 => 1,  136 => 30,  132 => 29,  128 => 28,  124 => 27,  119 => 26,  116 => 25,  108 => 20,  104 => 19,  100 => 18,  96 => 16,  93 => 23,  87 => 12,  82 => 11,  79 => 10,  72 => 8,  35 => 6,  28 => 5,  21 => 4,  14 => 3,);
    }
}
