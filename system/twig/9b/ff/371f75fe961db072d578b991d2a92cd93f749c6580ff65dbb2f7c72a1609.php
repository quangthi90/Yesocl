<?php

/* @template/default/template/account/profiles/tabs/skill.tpl */
class __TwigTemplate_9bff371f75fe961db072d578b991d2a92cd93f749c6580ff65dbb2f7c72a1609 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'profiles_tabs_skill' => array($this, 'block_profiles_tabs_skill'),
            'profiles_tabs_skill_javascript' => array($this, 'block_profiles_tabs_skill_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('profiles_tabs_skill', $context, $blocks);
        // line 28
        echo "
";
        // line 29
        $this->displayBlock('profiles_tabs_skill_javascript', $context, $blocks);
    }

    // line 1
    public function block_profiles_tabs_skill($context, array $blocks = array())
    {
        // line 2
        echo "<div id=\"profiles-tabs-background-skill\" class=\"profiles-tabs-main pull-left\">
\t<div class=\"skill-label\">
\t\t<div class=\"profiles-tabs-main-header\">
\t\t\t<a href=\"#\" class=\"btn sub-profile-header\"><i class=\"icon-paper-clip\"></i> ";
        // line 5
        echo gettext("Skill & Expertise");
        echo "</a>
\t\t\t<a class=\"btn profiles-btn pull-right btn-add profiles-btn-add\"><i class=\"icon-plus\"></i></a>
\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t\t<div class=\"profiles-tabs-main-body\">
\t\t\t<div class=\"background-skill-form-add hidden\" data-add=\"";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileAddSkill")), "html", null, true);
        echo "\">
\t\t\t\t<input class=\"profiles-input\" type=\"text\" name=\"skill\" placeholder=\"Text here...\" />
\t\t\t\t<a class=\"btn profiles-btn-save\"><i class=\"icon-save\"></i></a>
\t\t\t\t<a class=\"btn profiles-btn-cancel\"><i class=\"icon-mail-forward\"></i></a>
\t\t\t</div>
\t\t\t";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "skills"));
        foreach ($context['_seq'] as $context["_key"] => $context["skill"]) {
            // line 16
            echo "\t\t\t<div class=\"profiles-tabs-item2 btn skill-item\" data-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["skill"]) ? $context["skill"] : null), "id"), "html", null, true);
            echo "\" data-remove=\"";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileRemoveSkill", array("skill_id" => $this->getAttribute((isset($context["skill"]) ? $context["skill"] : null), "id")))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["skill"]) ? $context["skill"] : null), "skill"), "html", null, true);
            echo "<a class=\"btn-remove profiles-btn-remove\" href=\"#\"><i class=\"icon-remove\"></i></a></div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['skill'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "\t\t\t<div class=\"";
        if ((twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "skills")) > 0)) {
            echo "hidden";
        }
        echo " empty-data\">
\t\t\t\t";
        // line 19
        echo gettext("No information found");
        // line 20
        echo "\t\t\t</div>
\t\t</div>
\t</div>
</div>
<script id=\"background-skill-item\" type=\"text/x-jquery-tmpl\">
    <div class=\"profiles-tabs-item2 btn skill-item\" data-id=\"\${ id }\" data-remove=\"\${ remove }\">\${ skill }<a class=\"btn-remove profiles-btn-remove\" href=\"#\"><i class=\"icon-remove\"></i></a></div>
</script>
";
    }

    // line 29
    public function block_profiles_tabs_skill_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/skill.tpl";
    }

    public function getDebugInfo()
    {
        return array (  83 => 20,  61 => 16,  57 => 15,  49 => 10,  360 => 143,  323 => 141,  317 => 106,  315 => 105,  308 => 104,  287 => 96,  283 => 95,  279 => 94,  268 => 88,  260 => 87,  256 => 86,  251 => 84,  247 => 83,  239 => 82,  235 => 81,  231 => 80,  227 => 79,  213 => 76,  207 => 75,  203 => 74,  199 => 73,  195 => 72,  171 => 59,  167 => 58,  161 => 55,  141 => 41,  135 => 38,  132 => 37,  117 => 34,  75 => 20,  48 => 10,  40 => 5,  30 => 1,  266 => 112,  238 => 109,  230 => 82,  223 => 78,  208 => 75,  204 => 74,  192 => 71,  188 => 70,  182 => 61,  178 => 60,  174 => 59,  170 => 58,  166 => 57,  162 => 56,  158 => 55,  154 => 51,  148 => 53,  139 => 51,  129 => 44,  121 => 35,  113 => 32,  102 => 30,  91 => 23,  87 => 22,  41 => 5,  68 => 21,  59 => 15,  51 => 6,  43 => 5,  106 => 19,  98 => 29,  94 => 29,  90 => 23,  81 => 19,  77 => 27,  67 => 16,  65 => 6,  62 => 5,  35 => 4,  1008 => 467,  994 => 456,  985 => 450,  976 => 444,  967 => 438,  958 => 432,  950 => 427,  941 => 422,  938 => 421,  936 => 420,  930 => 417,  922 => 412,  912 => 407,  906 => 406,  901 => 405,  898 => 404,  895 => 403,  892 => 402,  890 => 401,  884 => 398,  875 => 392,  866 => 386,  850 => 373,  844 => 370,  837 => 365,  826 => 363,  822 => 362,  816 => 359,  803 => 349,  799 => 348,  790 => 342,  786 => 341,  778 => 336,  774 => 335,  742 => 306,  737 => 304,  726 => 296,  722 => 295,  711 => 287,  706 => 284,  689 => 282,  685 => 281,  679 => 278,  671 => 274,  668 => 273,  666 => 272,  660 => 269,  649 => 261,  641 => 258,  635 => 255,  628 => 253,  623 => 252,  620 => 251,  617 => 250,  614 => 249,  612 => 248,  606 => 245,  597 => 239,  591 => 236,  586 => 234,  578 => 229,  574 => 228,  558 => 215,  546 => 205,  541 => 203,  536 => 202,  531 => 200,  526 => 199,  524 => 198,  518 => 195,  486 => 168,  480 => 165,  476 => 164,  469 => 160,  465 => 159,  461 => 158,  457 => 157,  450 => 153,  446 => 152,  442 => 151,  438 => 150,  431 => 146,  426 => 144,  415 => 137,  398 => 133,  383 => 131,  379 => 130,  375 => 129,  369 => 128,  365 => 127,  361 => 126,  358 => 125,  341 => 124,  335 => 121,  324 => 114,  304 => 110,  298 => 99,  292 => 98,  288 => 107,  281 => 106,  264 => 105,  258 => 102,  250 => 97,  246 => 96,  241 => 94,  237 => 93,  232 => 91,  225 => 87,  221 => 86,  217 => 77,  212 => 76,  197 => 71,  189 => 66,  185 => 65,  179 => 64,  175 => 61,  169 => 58,  165 => 57,  157 => 54,  153 => 53,  147 => 50,  143 => 52,  137 => 45,  128 => 42,  114 => 36,  108 => 32,  99 => 29,  93 => 28,  86 => 11,  82 => 19,  76 => 23,  70 => 19,  66 => 19,  60 => 16,  56 => 15,  42 => 4,  36 => 2,  33 => 1,  29 => 29,  26 => 28,  24 => 1,  124 => 40,  120 => 39,  116 => 26,  112 => 25,  107 => 24,  104 => 23,  96 => 18,  92 => 17,  88 => 15,  85 => 14,  79 => 21,  74 => 18,  71 => 18,  64 => 7,  28 => 3,  21 => 2,  14 => 1,);
    }
}
