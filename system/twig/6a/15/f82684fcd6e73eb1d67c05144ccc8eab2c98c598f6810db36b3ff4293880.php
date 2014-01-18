<?php

/* @template/default/template/common/quick_search.tpl */
class __TwigTemplate_6a15f82684fcd6e73eb1d67c05144ccc8eab2c98c598f6810db36b3ff4293880 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div id=\"search-panel\" class=\"search-form\" data-invoke-search=\"#btn-search-invoke-on\" data-url=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("SearchPage")), "html", null, true);
        echo "\" data-url-friend-typeahead=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("FriendTypeahead")), "html", null, true);
        echo "\" data-url-post-typeahead=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostTypeahead")), "html", null, true);
        echo "\">
  <input class=\"search-ctrl\" name=\"keyword\" id=\"searchText\" placeholder=\"";
        // line 2
        echo gettext("Enter your key");
        echo " ...\" type=\"text\" autocomplete=\"off\" spellcheck=\"false\">
  <a href=\"#\" class=\"btn btn-search\"><i class=\"icon-search\"></i></a>
</div>";
    }

    public function getTemplateName()
    {
        return "@template/default/template/common/quick_search.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,  118 => 54,  96 => 51,  67 => 15,  59 => 10,  175 => 78,  112 => 24,  107 => 22,  84 => 13,  80 => 12,  54 => 6,  51 => 5,  48 => 4,  35 => 54,  30 => 34,  25 => 1,  547 => 348,  545 => 331,  542 => 330,  511 => 327,  509 => 302,  506 => 301,  496 => 293,  494 => 292,  489 => 290,  481 => 285,  477 => 284,  466 => 276,  461 => 273,  459 => 272,  453 => 268,  450 => 267,  437 => 262,  435 => 255,  432 => 254,  348 => 251,  346 => 173,  343 => 172,  332 => 164,  328 => 163,  318 => 156,  308 => 149,  303 => 147,  295 => 142,  291 => 141,  281 => 134,  270 => 128,  267 => 127,  258 => 124,  256 => 123,  247 => 118,  244 => 117,  241 => 116,  238 => 115,  169 => 109,  164 => 48,  153 => 40,  143 => 33,  133 => 28,  131 => 27,  117 => 21,  114 => 20,  111 => 19,  101 => 19,  97 => 18,  81 => 24,  74 => 330,  66 => 10,  63 => 9,  60 => 8,  58 => 254,  55 => 253,  50 => 171,  47 => 4,  44 => 112,  42 => 2,  39 => 1,  37 => 19,  34 => 18,  31 => 2,  285 => 81,  282 => 80,  278 => 38,  275 => 131,  271 => 28,  268 => 27,  264 => 126,  261 => 125,  255 => 4,  250 => 82,  248 => 80,  243 => 78,  239 => 77,  235 => 114,  231 => 75,  227 => 74,  223 => 73,  219 => 72,  214 => 70,  210 => 69,  202 => 67,  198 => 66,  193 => 64,  188 => 62,  183 => 60,  173 => 56,  168 => 54,  163 => 52,  150 => 48,  146 => 47,  142 => 46,  138 => 31,  134 => 44,  130 => 43,  126 => 42,  121 => 39,  119 => 37,  113 => 34,  109 => 23,  100 => 29,  93 => 34,  89 => 24,  85 => 22,  83 => 20,  78 => 2,  73 => 19,  69 => 11,  65 => 14,  61 => 13,  57 => 7,  53 => 6,  49 => 10,  45 => 3,  38 => 5,  32 => 53,  27 => 33,  206 => 68,  203 => 76,  195 => 70,  189 => 48,  178 => 79,  174 => 43,  167 => 49,  161 => 40,  158 => 50,  154 => 49,  148 => 35,  140 => 31,  123 => 75,  120 => 28,  103 => 30,  98 => 27,  92 => 23,  90 => 16,  79 => 13,  76 => 12,  71 => 329,  64 => 7,  28 => 5,  21 => 4,  14 => 3,);
    }
}
