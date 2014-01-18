<?php

/* @template/default/template/account/profiles/tabs/experience.tpl */
class __TwigTemplate_37d9d193f85a23067d0a81db7847b73c9f69f6bdf2bcfcac6459affceb207e87 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'profiles_tabs_experience' => array($this, 'block_profiles_tabs_experience'),
            'profiles_tabs_experience_javascript' => array($this, 'block_profiles_tabs_experience_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('profiles_tabs_experience', $context, $blocks);
        // line 143
        $this->displayBlock('profiles_tabs_experience_javascript', $context, $blocks);
    }

    // line 1
    public function block_profiles_tabs_experience($context, array $blocks = array())
    {
        // line 2
        echo "<div id=\"profiles-tabs-background-experience\" class=\"profiles-tabs-main pull-left\" data-url=\"";
        echo twig_escape_filter($this->env, (isset($context["link_add_experience"]) ? $context["link_add_experience"] : null), "html", null, true);
        echo "\">
\t<div class=\"experience-label\">
\t\t<div class=\"profiles-tabs-main-header\">
\t\t\t<a href=\"#\" class=\"btn sub-profile-header\"><i class=\"icon-paper-clip\"></i> ";
        // line 5
        echo gettext("Experience");
        echo "</a>
\t\t\t<a class=\"btn profiles-btn pull-right btn-add profiles-btn-add\"><i class=\"icon-plus\"></i></a>
\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t\t<div class=\"profiles-tabs-main-body\">
\t\t\t<div class=\"background-experience-form-add hidden\" data-add=\"";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileAddExperience")), "html", null, true);
        echo "\">
\t\t\t\t<div class=\"profiles-tabs-item1-label\">
\t\t\t\t\t<span class=\"time-from\">
\t\t\t\t\t\tFrom 
\t\t\t\t\t\t<select class=\"span1\" name=\"started_month\">
\t\t\t\t\t\t\t";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 16
            echo "\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "\t\t\t\t\t\t</select> 
\t\t\t\t\t\t<select class=\"span1\" name=\"started_year\">
\t\t\t\t\t\t\t";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range((isset($context["current_year"]) ? $context["current_year"] : null), (isset($context["before_year"]) ? $context["before_year"] : null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 21
            echo "\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "\t\t\t\t\t\t</select> 
\t\t\t\t\t</span>
\t\t\t\t\tto
\t\t\t\t\t<span class=\"time-to\">
\t\t\t\t\t\t<span class=\"specified-time\">
\t\t\t\t\t\t\t<select class=\"span1\" name=\"ended_month\">
\t\t\t\t\t\t\t\t";
        // line 29
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 30
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "\t\t\t\t\t\t\t</select> 
\t\t\t\t\t\t\t<select class=\"span1\" name=\"ended_year\">
\t\t\t\t\t\t\t\t";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range((isset($context["current_year"]) ? $context["current_year"] : null), (isset($context["before_year"]) ? $context["before_year"] : null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 35
            echo "\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t<strong style=\"margin-left: 5px; margin-right: 10px;\">";
        // line 38
        echo gettext("or");
        echo "</strong>
\t\t\t\t\t\t</span>\t\t\t\t\t\t
\t\t\t\t\t\t<span class=\"present\">
\t\t\t\t\t\t\t<label for=\"time_present\">";
        // line 41
        echo gettext("present");
        echo "</label>
\t\t\t\t\t\t\t<input type=\"checkbox\" id=\"time_present\" name=\"time_present\">
\t\t\t\t\t\t</span>\t
\t\t\t\t\t</span>\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t</div>
\t\t\t\t<div class=\"profiles-tabs-item1-content\">
\t\t\t\t\t<a class=\"profiles-btn-cancel btn profiles-btn pull-right\"><i class=\"icon-mail-forward\"></i></a>
\t\t\t\t\t<a class=\"profiles-btn-save btn profiles-btn pull-right\"><i class=\"icon-save\"></i></a>
\t\t\t\t\t<div class=\"profiles-tabs-value\">
\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t<div class=\"span3\">";
        // line 51
        echo gettext("Title");
        echo ": </div>
\t\t\t\t\t\t\t<input type=\"text\" name=\"title\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t<div class=\"span3\">";
        // line 55
        echo gettext("Company");
        echo ": </div>
\t\t\t\t\t\t\t<input type=\"text\"  name=\"company\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"row-fluid\" data-autocomplete=\"";
        // line 58
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("LocationAutoComplete")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t<div class=\"span3\">";
        // line 59
        echo gettext("Location");
        echo ": </div>
\t\t\t\t\t\t\t<input type=\"text\" name=\"location\" />
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"city_id\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t<div class=\"span3\">";
        // line 64
        echo gettext("Self-Employed");
        echo ": </div>
\t\t\t\t\t\t\t<input type=\"checkbox\"  name=\"self_employed\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        // line 70
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "experiences"));
        foreach ($context['_seq'] as $context["_key"] => $context["experience"]) {
            // line 71
            echo "\t\t\t<!-- Check current -->
\t\t\t<div class=\"profiles-tabs-item1 experience-item\" id=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "id"), "html", null, true);
            echo "\" 
\t\t\t\tdata-edit=\"";
            // line 73
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileEditExperience", array("experience_id" => $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "id")))), "html", null, true);
            echo "\"
\t\t\t\tdata-startedy=\"";
            // line 74
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "started"), "Y"), "html", null, true);
            echo "\" 
\t\t\t\tdata-endedy=\"";
            // line 75
            if (($this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "ended") != null)) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "ended"), "Y"), "html", null, true);
            }
            echo "\" 
\t\t\t\tdata-startedm=\"";
            // line 76
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "started"), "m"), "html", null, true);
            echo "\" 
\t\t\t\tdata-endedm=\"";
            // line 77
            if (($this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "ended") != null)) {
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "ended"), "m"), "html", null, true);
            }
            echo "\" 
\t\t\t\tdata-title=\"";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "title"), "html", null, true);
            echo "\" 
\t\t\t\tdata-company=\"";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "company"), "html", null, true);
            echo "\" 
\t\t\t\tdata-location=\"";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "location"), "html", null, true);
            echo "\" 
\t\t\t\tdata-self-employed=\"";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "self_employed"), "html", null, true);
            echo "\"
\t\t\t\tdata-current=\"";
            // line 82
            if (($this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "ended") == null)) {
                echo "1";
            } else {
                echo "0";
            }
            echo "\"
\t\t\t\tdata-remove=\"";
            // line 83
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileRemoveExperience", array("experience_id" => $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "id")))), "html", null, true);
            echo "\" 
\t\t\t\tdata-city-id=\"";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "city_id"), "html", null, true);
            echo "\">
\t\t\t\t<div class=\"profiles-tabs-item1-label\">
\t\t\t\t\tFrom <span class=\"profiles-tabs-value\">";
            // line 86
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "started"), "F Y"), "html", null, true);
            echo "</span> 
\t\t\t\t\tto <span class=\"profiles-tabs-value";
            // line 87
            if (($this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "ended") == null)) {
                echo " hidden";
            }
            echo "\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "ended"), "F Y"), "html", null, true);
            echo "</span>
\t\t\t\t\t<span ";
            // line 88
            if (($this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "ended") != null)) {
                echo "class=\"hidden\"";
            }
            echo ">present</span>
\t\t\t\t</div>
\t\t\t\t<div class=\"profiles-tabs-item1-content\">
\t\t\t\t\t<a class=\"profiles-tabs-value btn profiles-btn pull-right btn-remove  profiles-btn-remove\"><i class=\"icon-trash\"></i></a>
\t\t\t\t\t<a class=\"btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right\"><i class=\"icon-pencil\"></i></a>
\t\t\t\t\t<div class=\"profiles-tabs-value\">
\t\t\t\t\t\t<div class=\"profiles-tabs-value-item\">";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "title"), "html", null, true);
            echo "</div>
\t\t\t\t\t\t<div class=\"profiles-tabs-value-item\">";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "company"), "html", null, true);
            echo "</div>
\t\t\t\t\t\t<div class=\"profiles-tabs-value-item viewers\">";
            // line 96
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "location"), "html", null, true);
            echo "</div>
\t\t\t\t\t\t<div class=\"profiles-tabs-value-item check-self-employed\">
\t\t\t\t\t\t\t<i class=\"icon-check-sign\"></i> ";
            // line 98
            if ($this->getAttribute((isset($context["experience"]) ? $context["experience"] : null), "self_employed")) {
                echo twig_escape_filter($this->env, (isset($context["text_self_employed"]) ? $context["text_self_employed"] : null), "html", null, true);
            } else {
                echo gettext("Employed");
            }
            // line 99
            echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['experience'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        echo "\t\t\t<div class=\"";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "experiences")) > 0)) {
            echo "hidden";
        }
        echo " empty-data\">
\t\t\t\t";
        // line 105
        echo gettext("No information found");
        // line 106
        echo "\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
        // line 141
        echo "
<script id=\"background-experience-item\" type=\"text/x-jquery-tmpl\">
\t<div class=\"profiles-tabs-item1 experience-item {{if ended_text == null }}current{{/if}}\" id=\"\${ id }\" data-edit=\"\${ edit }\" data-startedy=\"\${ started_year }\" data-endedy=\"\${ ended_year }\" data-startedm=\"\${ started_month }\" data-endedm=\"\${ ended_month }\" data-title=\"\${ title }\" data-company=\"\${ company }\" data-location=\"\${ location }\" data-city-id=\"\${ city_id }\" data-self-employed=\"\${ self_employed }\" data-current=\"\${ current }\" data-remove=\"\${ remove }\">
\t\t<div>
\t\t\t<div class=\"profiles-tabs-item1-label\">
\t\t\t\tFrom <span class=\"profiles-tabs-value\">\${ started_text }</span>
\t\t\t\t{{if ended_text != null && ended_text != '' }}
\t\t\t\t\tto <span class=\"profiles-tabs-value\">\${ ended_text }</span>
\t\t\t\t{{else}}
\t\t\t\t\tto present
\t\t\t\t{{/if}}
\t\t\t</div>
\t\t</div>
\t\t<div class=\"profiles-tabs-item1-content\">
\t\t\t<a class=\"profiles-tabs-value btn profiles-btn pull-right btn-remove profiles-btn-remove\"><i class=\"icon-trash\"></i></a>
\t\t\t<a class=\"btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right\"><i class=\"icon-pencil\"></i></a>
\t\t\t<div class=\"profiles-tabs-value\">
\t\t\t\t<div class=\"profiles-tabs-value-item\">\${ title }</div>
\t\t\t\t<div class=\"profiles-tabs-value-item\">\${ company }</div>
\t\t\t\t<div class=\"profiles-tabs-value-item viewers\">\${ location }</div>
\t\t\t\t<div class=\"profiles-tabs-value-item check-self-employed\">
\t\t\t\t{{if self_employed }}
\t\t\t\t\t<i class=\"icon-check-sign\"></i> Self-employed
\t\t\t\t{{else}}
\t\t\t\t\t<i class=\"icon-check-sign\"></i> Employed
\t\t\t\t{{/if}}
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</script>
";
        echo "
";
    }

    // line 143
    public function block_profiles_tabs_experience_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/experience.tpl";
    }

    public function getDebugInfo()
    {
        return array (  360 => 143,  323 => 141,  317 => 106,  315 => 105,  308 => 104,  287 => 96,  283 => 95,  279 => 94,  268 => 88,  260 => 87,  256 => 86,  251 => 84,  247 => 83,  239 => 82,  235 => 81,  231 => 80,  227 => 79,  213 => 76,  207 => 75,  203 => 74,  199 => 73,  195 => 72,  171 => 59,  167 => 58,  161 => 55,  141 => 41,  135 => 38,  132 => 37,  117 => 34,  75 => 20,  48 => 10,  40 => 5,  30 => 1,  266 => 112,  238 => 109,  230 => 82,  223 => 78,  208 => 75,  204 => 74,  192 => 71,  188 => 70,  182 => 61,  178 => 60,  174 => 59,  170 => 58,  166 => 57,  162 => 56,  158 => 55,  154 => 51,  148 => 53,  139 => 51,  129 => 44,  121 => 35,  113 => 32,  102 => 30,  91 => 23,  87 => 22,  41 => 3,  68 => 21,  59 => 15,  51 => 6,  43 => 5,  106 => 19,  98 => 29,  94 => 13,  90 => 23,  81 => 9,  77 => 27,  67 => 16,  65 => 6,  62 => 5,  35 => 4,  1008 => 467,  994 => 456,  985 => 450,  976 => 444,  967 => 438,  958 => 432,  950 => 427,  941 => 422,  938 => 421,  936 => 420,  930 => 417,  922 => 412,  912 => 407,  906 => 406,  901 => 405,  898 => 404,  895 => 403,  892 => 402,  890 => 401,  884 => 398,  875 => 392,  866 => 386,  850 => 373,  844 => 370,  837 => 365,  826 => 363,  822 => 362,  816 => 359,  803 => 349,  799 => 348,  790 => 342,  786 => 341,  778 => 336,  774 => 335,  742 => 306,  737 => 304,  726 => 296,  722 => 295,  711 => 287,  706 => 284,  689 => 282,  685 => 281,  679 => 278,  671 => 274,  668 => 273,  666 => 272,  660 => 269,  649 => 261,  641 => 258,  635 => 255,  628 => 253,  623 => 252,  620 => 251,  617 => 250,  614 => 249,  612 => 248,  606 => 245,  597 => 239,  591 => 236,  586 => 234,  578 => 229,  574 => 228,  558 => 215,  546 => 205,  541 => 203,  536 => 202,  531 => 200,  526 => 199,  524 => 198,  518 => 195,  486 => 168,  480 => 165,  476 => 164,  469 => 160,  465 => 159,  461 => 158,  457 => 157,  450 => 153,  446 => 152,  442 => 151,  438 => 150,  431 => 146,  426 => 144,  415 => 137,  398 => 133,  383 => 131,  379 => 130,  375 => 129,  369 => 128,  365 => 127,  361 => 126,  358 => 125,  341 => 124,  335 => 121,  324 => 114,  304 => 110,  298 => 99,  292 => 98,  288 => 107,  281 => 106,  264 => 105,  258 => 102,  250 => 97,  246 => 96,  241 => 94,  237 => 93,  232 => 91,  225 => 87,  221 => 86,  217 => 77,  212 => 76,  197 => 71,  189 => 66,  185 => 65,  179 => 64,  175 => 61,  169 => 58,  165 => 57,  157 => 54,  153 => 53,  147 => 50,  143 => 52,  137 => 45,  128 => 42,  114 => 36,  108 => 32,  99 => 29,  93 => 28,  86 => 11,  82 => 19,  76 => 23,  70 => 19,  66 => 19,  60 => 16,  56 => 15,  42 => 4,  36 => 2,  33 => 2,  29 => 112,  26 => 143,  24 => 1,  124 => 40,  120 => 39,  116 => 26,  112 => 25,  107 => 24,  104 => 23,  96 => 18,  92 => 17,  88 => 15,  85 => 14,  79 => 21,  74 => 6,  71 => 18,  64 => 7,  28 => 3,  21 => 2,  14 => 1,);
    }
}
