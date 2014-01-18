<?php

/* @template/default/template/account/profiles/tabs/education.tpl */
class __TwigTemplate_6d45e1690824ae9daccd830dcfe9f32ee2ae7023da07c11f337b767bccd2945c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'profiles_tabs_education' => array($this, 'block_profiles_tabs_education'),
            'profiles_tabs_education_javascript' => array($this, 'block_profiles_tabs_education_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('profiles_tabs_education', $context, $blocks);
        // line 111
        echo "
";
        // line 112
        $this->displayBlock('profiles_tabs_education_javascript', $context, $blocks);
    }

    // line 1
    public function block_profiles_tabs_education($context, array $blocks = array())
    {
        // line 2
        echo "<div id=\"profiles-tabs-background-education\" class=\"profiles-tabs-main pull-left\" data-url=\"";
        echo twig_escape_filter($this->env, (isset($context["link_add_education"]) ? $context["link_add_education"] : null), "html", null, true);
        echo "\">
\t<div class=\"education-label\" data-degree=\"";
        // line 3
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("DegreeAutoComplete")), "html", null, true);
        echo "\" data-school=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("SchoolAutoComplete")), "html", null, true);
        echo "\" data-fieldofstudy=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("FieldOfStudyAutoComplete")), "html", null, true);
        echo "\">
\t\t<div class=\"profiles-tabs-main-header\">
\t\t\t<a href=\"#\" class=\"btn sub-profile-header\">
\t\t\t\t<i class=\"icon-paper-clip\"></i> ";
        // line 6
        echo gettext("Education");
        echo "</a>
\t\t\t<a class=\"btn profiles-btn pull-right btn-add profiles-btn-add\">
\t\t\t\t<i class=\"icon-plus\"></i></a>
\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t\t<div class=\"profiles-tabs-main-body\">
\t\t\t<div class=\"background-education-form-add hidden\" data-add=\"";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileAddEducation")), "html", null, true);
        echo "\">
\t\t\t\t<div class=\"profiles-tabs-item1-label\">
\t\t\t\t\tFrom 
\t\t\t\t\t<select name=\"started\">
\t\t\t\t\t\t";
        // line 16
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range((isset($context["current_year"]) ? $context["current_year"] : null), (isset($context["before_year"]) ? $context["before_year"] : null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 17
            echo "\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "\t\t\t\t\t</select> 
\t\t\t\t\tto 
\t\t\t\t\t<select name=\"ended\">
\t\t\t\t\t\t";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range((isset($context["current_year"]) ? $context["current_year"] : null), (isset($context["before_year"]) ? $context["before_year"] : null)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 23
            echo "\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t\t<div class=\"profiles-tabs-item1-content\">
\t\t\t\t\t<a class=\"profiles-btn-cancel btn profiles-btn pull-right\">
\t\t\t\t\t\t<i class=\"icon-mail-forward\"></i></a>
\t\t\t\t\t<a class=\"profiles-btn-save btn profiles-btn pull-right\">
\t\t\t\t\t\t<i class=\"icon-save\"></i></a>
\t\t\t\t\t<div class=\"profiles-tabs-value\">
\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t<div class=\"span4\">";
        // line 34
        echo gettext("Degree");
        echo ": </div>
\t\t\t\t\t\t\t<input type=\"text\" name=\"degree\" />
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"degree_id\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t<div class=\"span4\">";
        // line 39
        echo gettext("School");
        echo ": </div>
\t\t\t\t\t\t\t<input type=\"text\"  name=\"school\" />
\t\t\t\t\t\t\t<input type=\"hidden\"  name=\"school_id\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t<div class=\"span4\">";
        // line 44
        echo gettext("Field Of Study");
        echo ": </div>
\t\t\t\t\t\t\t<input type=\"text\" name=\"fieldofstudy\" />
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"fieldofstudy_id\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        // line 51
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "educations"));
        foreach ($context['_seq'] as $context["_key"] => $context["education"]) {
            // line 52
            echo "\t\t\t\t<div class=\"profiles-tabs-item1 education-item\" id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "id"), "html", null, true);
            echo "\" 
\t\t\t\t\tdata-edit=\"";
            // line 53
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileEditEducation", array("education_id" => $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "id")))), "html", null, true);
            echo "\" data-started=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "started"), "html", null, true);
            echo "\" 
\t\t\t\t\tdata-ended=\"";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "ended"), "html", null, true);
            echo "\" 
\t\t\t\t\tdata-degree=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "degree"), "html", null, true);
            echo "\" 
\t\t\t\t\tdata-degree-id=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "degree_id"), "html", null, true);
            echo "\" 
\t\t\t\t\tdata-school=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "school"), "html", null, true);
            echo "\" 
\t\t\t\t\tdata-school-id=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "school_id"), "html", null, true);
            echo "\" 
\t\t\t\t\tdata-fieldofstudy=\"";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "fieldofstudy"), "html", null, true);
            echo "\" 
\t\t\t\t\tdata-fieldofstudy-id=\"";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "fieldofstudy_id"), "html", null, true);
            echo "\" 
\t\t\t\t\tdata-remove=\"";
            // line 61
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileRemoveEducation", array("education_id" => $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "id")))), "html", null, true);
            echo "\">
\t\t\t\t\t<div>
\t\t\t\t\t\t<div class=\"profiles-tabs-item1-label\">
\t\t\t\t\t\t\tFrom <span class=\"profiles-tabs-value\">";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "started"), "html", null, true);
            echo "</span> 
\t\t\t\t\t\t\tto <span class=\"profiles-tabs-value\">";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "ended"), "html", null, true);
            echo "</span>\t\t\t\t\t\t
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"profiles-tabs-item1-content\">
\t\t\t\t\t\t<a class=\"profiles-tabs-value btn profiles-btn pull-right btn-remove profiles-btn-remove\"><i class=\"icon-trash\"></i></a>
\t\t\t\t\t\t<a class=\"btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right\"><i class=\"icon-pencil\"></i></a>
\t\t\t\t\t\t<a class=\"profiles-btn-cancel editors btn profiles-btn pull-right\"><i class=\"icon-mail-forward\"></i></a>
\t\t\t\t\t\t<a class=\"profiles-btn-save editors btn profiles-btn pull-right\"><i class=\"icon-save\"></i></a>
\t\t\t\t\t\t<div class=\"profiles-tabs-value\">
\t\t\t\t\t\t\t<div class=\"profiles-tabs-value-item\">";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "school"), "html", null, true);
            echo "</div>
\t\t\t\t\t\t\t<div class=\"profiles-tabs-value-item\">";
            // line 75
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "degree"), "html", null, true);
            echo "</div>
\t\t\t\t\t\t\t<div class=\"profiles-tabs-value-item viewers\">";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["education"]) ? $context["education"] : null), "fieldofstudy"), "html", null, true);
            echo "</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['education'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "\t\t\t<div class=\"";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "educations")) > 0)) {
            echo "hidden";
        }
        echo " empty-data\">
\t\t\t\t";
        // line 82
        echo gettext("No information found");
        echo "\t\t\t
\t\t\t</div>
\t\t</div>
\t</div>
</div>
";
        // line 109
        echo "
<script id=\"background-education-item\" type=\"text/x-jquery-tmpl\">
\t<div class=\"profiles-tabs-item1 education-item\" id=\"\${ id }\" data-edit=\"\${ edit }\" data-started=\"\${ started }\" data-ended=\"\${ ended }\" data-degree=\"\${ degree }\" data-degree-id=\"\${ degree_id }\" data-school=\"\${ school }\" data-school-id=\"\${ school_id }\" data-fieldofstudy=\"\${ fieldofstudy }\" data-fieldofstudy-id=\"\${ fieldofstudy_id }\" data-remove=\"\${ remove }\">
\t\t<div>
\t\t\t<div class=\"profiles-tabs-item1-label\">
\t\t\t\tFrom <span class=\"profiles-tabs-value\">\${ started }</span> 
\t\t\t\tto <span class=\"profiles-tabs-value\">\${ ended }</span>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"profiles-tabs-item1-content\">
\t\t\t<a class=\"profiles-tabs-value btn profiles-btn pull-right btn-remove profiles-btn-remove\"><i class=\"icon-trash\"></i></a>
\t\t\t<a class=\"btn profiles-btn profiles-btn-edit profiles-tabs-value pull-right\"><i class=\"icon-pencil\"></i></a>
\t\t\t<a class=\"profiles-btn-cancel editors btn profiles-btn pull-right\"><i class=\"icon-mail-forward\"></i></a>
\t\t\t<a class=\"profiles-btn-save editors btn profiles-btn pull-right\"><i class=\"icon-save\"></i></a>
\t\t\t<div class=\"profiles-tabs-value\">
\t\t\t\t<div class=\"profiles-tabs-value-item\">\${ school }</div>
\t\t\t\t<div class=\"profiles-tabs-value-item\">\${ degree }</div>
\t\t\t\t<div class=\"profiles-tabs-value-item viewers\">\${ fieldofstudy }</div>
\t\t\t</div>
\t\t</div>
\t</div>
</script>
";
        echo "
";
    }

    // line 112
    public function block_profiles_tabs_education_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/education.tpl";
    }

    public function getDebugInfo()
    {
        return array (  266 => 112,  238 => 109,  230 => 82,  223 => 81,  208 => 75,  204 => 74,  192 => 65,  188 => 64,  182 => 61,  178 => 60,  174 => 59,  170 => 58,  166 => 57,  162 => 56,  158 => 55,  154 => 54,  148 => 53,  139 => 51,  129 => 44,  121 => 39,  113 => 34,  102 => 25,  91 => 23,  87 => 22,  41 => 3,  68 => 21,  59 => 15,  51 => 6,  43 => 5,  106 => 19,  98 => 14,  94 => 13,  90 => 12,  81 => 9,  77 => 27,  67 => 16,  65 => 6,  62 => 5,  35 => 4,  1008 => 467,  994 => 456,  985 => 450,  976 => 444,  967 => 438,  958 => 432,  950 => 427,  941 => 422,  938 => 421,  936 => 420,  930 => 417,  922 => 412,  912 => 407,  906 => 406,  901 => 405,  898 => 404,  895 => 403,  892 => 402,  890 => 401,  884 => 398,  875 => 392,  866 => 386,  850 => 373,  844 => 370,  837 => 365,  826 => 363,  822 => 362,  816 => 359,  803 => 349,  799 => 348,  790 => 342,  786 => 341,  778 => 336,  774 => 335,  742 => 306,  737 => 304,  726 => 296,  722 => 295,  711 => 287,  706 => 284,  689 => 282,  685 => 281,  679 => 278,  671 => 274,  668 => 273,  666 => 272,  660 => 269,  649 => 261,  641 => 258,  635 => 255,  628 => 253,  623 => 252,  620 => 251,  617 => 250,  614 => 249,  612 => 248,  606 => 245,  597 => 239,  591 => 236,  586 => 234,  578 => 229,  574 => 228,  558 => 215,  546 => 205,  541 => 203,  536 => 202,  531 => 200,  526 => 199,  524 => 198,  518 => 195,  486 => 168,  480 => 165,  476 => 164,  469 => 160,  465 => 159,  461 => 158,  457 => 157,  450 => 153,  446 => 152,  442 => 151,  438 => 150,  431 => 146,  426 => 144,  415 => 137,  398 => 133,  383 => 131,  379 => 130,  375 => 129,  369 => 128,  365 => 127,  361 => 126,  358 => 125,  341 => 124,  335 => 121,  324 => 114,  304 => 110,  298 => 109,  292 => 108,  288 => 107,  281 => 106,  264 => 105,  258 => 102,  250 => 97,  246 => 96,  241 => 94,  237 => 93,  232 => 91,  225 => 87,  221 => 86,  217 => 85,  212 => 76,  197 => 71,  189 => 66,  185 => 65,  179 => 62,  175 => 61,  169 => 58,  165 => 57,  157 => 54,  153 => 53,  147 => 50,  143 => 52,  137 => 45,  128 => 42,  114 => 36,  108 => 32,  99 => 29,  93 => 28,  86 => 11,  82 => 19,  76 => 23,  70 => 19,  66 => 19,  60 => 12,  56 => 15,  42 => 4,  36 => 2,  33 => 1,  29 => 112,  26 => 111,  24 => 1,  124 => 40,  120 => 39,  116 => 26,  112 => 25,  107 => 24,  104 => 23,  96 => 18,  92 => 17,  88 => 15,  85 => 14,  79 => 11,  74 => 6,  71 => 17,  64 => 7,  28 => 3,  21 => 2,  14 => 1,);
    }
}
