<?php

/* @template/default/template/account/profiles/tabs/summary.tpl */
class __TwigTemplate_4f34908d8aab07987aa0c5b60270658cfda95d10d376c83ff2b0cc6df78cb820 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'profiles_tabs_summary' => array($this, 'block_profiles_tabs_summary'),
            'profiles_tabs_summary_javascript' => array($this, 'block_profiles_tabs_summary_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('profiles_tabs_summary', $context, $blocks);
        // line 26
        echo "
";
        // line 27
        $this->displayBlock('profiles_tabs_summary_javascript', $context, $blocks);
    }

    // line 1
    public function block_profiles_tabs_summary($context, array $blocks = array())
    {
        // line 2
        echo "<div id=\"profiles-tabs-background-summary\" class=\"profiles-tabs-main pull-left\" data-url=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileEditSummary")), "html", null, true);
        echo "\">
\t<div class=\"summary-label\">
\t\t<div class=\"profiles-tabs-main-header\">
\t\t\t<a href=\"#\" class=\"btn sub-profile-header\"><i class=\"icon-paper-clip\"></i>  ";
        // line 5
        echo gettext("Summary");
        echo "</a>
\t\t\t<a class=\"profiles-btn-edit btn profiles-btn pull-right\"><i class=\"icon-pencil\"></i></a>
\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t\t<div class=\"profiles-tabs-main-body\">
\t\t\t<div class=\"background-input-summary\">";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "summary"), "html", null, true);
        echo "</div>
\t\t</div>
\t</div>
\t<div class=\"summary-form hidden\">
\t\t<div class=\"profiles-tabs-main-header\">
\t\t\t<a href=\"#\" class=\"btn sub-profile-header\"><i class=\"icon-paper-clip\"></i>  ";
        // line 15
        echo gettext("Summary");
        echo "</a>
\t\t\t<a class=\"profiles-btn-cancel btn profiles-btn pull-right\"><i class=\"icon-mail-forward\"></i></a>
\t\t\t<a class=\"profiles-btn-save btn profiles-btn pull-right\"><i class=\"icon-save\"></i></a>
\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t\t<div class=\"profiles-tabs-main-body\">
\t\t\t<textarea name=\"summary\">";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "summary"), "html", null, true);
        echo "</textarea>
\t\t</div>
\t</div>
</div>
";
    }

    // line 27
    public function block_profiles_tabs_summary_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/summary.tpl";
    }

    public function getDebugInfo()
    {
        return array (  68 => 21,  59 => 15,  51 => 10,  43 => 5,  106 => 19,  98 => 14,  94 => 13,  90 => 12,  81 => 9,  77 => 27,  67 => 18,  65 => 6,  62 => 5,  35 => 4,  1008 => 467,  994 => 456,  985 => 450,  976 => 444,  967 => 438,  958 => 432,  950 => 427,  941 => 422,  938 => 421,  936 => 420,  930 => 417,  922 => 412,  912 => 407,  906 => 406,  901 => 405,  898 => 404,  895 => 403,  892 => 402,  890 => 401,  884 => 398,  875 => 392,  866 => 386,  850 => 373,  844 => 370,  837 => 365,  826 => 363,  822 => 362,  816 => 359,  803 => 349,  799 => 348,  790 => 342,  786 => 341,  778 => 336,  774 => 335,  742 => 306,  737 => 304,  726 => 296,  722 => 295,  711 => 287,  706 => 284,  689 => 282,  685 => 281,  679 => 278,  671 => 274,  668 => 273,  666 => 272,  660 => 269,  649 => 261,  641 => 258,  635 => 255,  628 => 253,  623 => 252,  620 => 251,  617 => 250,  614 => 249,  612 => 248,  606 => 245,  597 => 239,  591 => 236,  586 => 234,  578 => 229,  574 => 228,  558 => 215,  546 => 205,  541 => 203,  536 => 202,  531 => 200,  526 => 199,  524 => 198,  518 => 195,  486 => 168,  480 => 165,  476 => 164,  469 => 160,  465 => 159,  461 => 158,  457 => 157,  450 => 153,  446 => 152,  442 => 151,  438 => 150,  431 => 146,  426 => 144,  415 => 137,  398 => 133,  383 => 131,  379 => 130,  375 => 129,  369 => 128,  365 => 127,  361 => 126,  358 => 125,  341 => 124,  335 => 121,  324 => 114,  304 => 110,  298 => 109,  292 => 108,  288 => 107,  281 => 106,  264 => 105,  258 => 102,  250 => 97,  246 => 96,  241 => 94,  237 => 93,  232 => 91,  225 => 87,  221 => 86,  217 => 85,  212 => 83,  197 => 71,  189 => 66,  185 => 65,  179 => 62,  175 => 61,  169 => 58,  165 => 57,  157 => 54,  153 => 53,  147 => 50,  143 => 49,  137 => 45,  128 => 42,  114 => 36,  108 => 32,  99 => 29,  93 => 28,  86 => 11,  82 => 26,  76 => 23,  70 => 19,  66 => 19,  60 => 16,  56 => 15,  42 => 4,  36 => 2,  33 => 1,  29 => 27,  26 => 26,  24 => 1,  124 => 40,  120 => 39,  116 => 26,  112 => 25,  107 => 24,  104 => 23,  96 => 18,  92 => 17,  88 => 15,  85 => 14,  79 => 11,  74 => 6,  71 => 9,  64 => 7,  28 => 3,  21 => 2,  14 => 1,);
    }
}
