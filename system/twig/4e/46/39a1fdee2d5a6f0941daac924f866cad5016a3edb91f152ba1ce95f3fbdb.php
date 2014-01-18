<?php

/* @template/default/template/welcome/layout.tpl */
class __TwigTemplate_4e4639a1fdee2d5a6f0941daac924f866cad5016a3edb91f152ba1ce95f3fbdb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'body' => array($this, 'block_body'),
            'javascript' => array($this, 'block_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
\t<head>\t\t
\t\t<title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo " | Yesocl - Social Network</title>
\t\t<base href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["base"]) ? $context["base"] : null), "html", null, true);
        echo "\" />
\t\t<link rel=\"shortcut icon\" href=\"image/template/favicon.png\">
\t\t<link href=\"";
        // line 7
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/bootstrap.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<link href=\"";
        // line 8
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/bootstrap-responsive.min.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<link href=\"";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/uniform.default.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<link href=\"";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/fortAwesome/css/font-awesome.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<link href=\"";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/messi.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<link href=\"";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("welcome.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" /> 
\t\t";
        // line 13
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 15
        echo "\t</head>
\t<body>\t
\t\t<div id=\"y-container\">
\t\t\t";
        // line 18
        echo twig_include($this->env, $context, twig_template_from_string($this->env, (isset($context["header"]) ? $context["header"] : null)));
        echo "

\t\t\t";
        // line 20
        $this->displayBlock('body', $context, $blocks);
        // line 22
        echo "
\t\t\t";
        // line 23
        echo twig_include($this->env, $context, twig_template_from_string($this->env, (isset($context["footer"]) ? $context["footer"] : null)));
        echo "
\t\t</div>
    \t<div id=\"overlay\"></div>
    \t<script type=\"text/javascript\" src=\"";
        // line 26
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("jquery/jquery-1.8.3.min.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 27
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/bootstrap.min.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 28
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.uniform.min.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/messi.min.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 30
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("yes.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 31
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("account.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 32
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("routing.js")), "html", null, true);
        echo "\"></script>
    \t";
        // line 33
        $this->displayBlock('javascript', $context, $blocks);
        // line 35
        echo "\t</body>
</html>";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo gettext("Welcome Page");
    }

    // line 13
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 14
        echo "\t\t";
    }

    // line 20
    public function block_body($context, array $blocks = array())
    {
        // line 21
        echo "\t\t\t";
    }

    // line 33
    public function block_javascript($context, array $blocks = array())
    {
        // line 34
        echo "\t\t";
    }

    public function getTemplateName()
    {
        return "@template/default/template/welcome/layout.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 33,  138 => 21,  135 => 20,  131 => 14,  128 => 13,  122 => 4,  117 => 35,  115 => 33,  107 => 31,  103 => 30,  99 => 29,  95 => 28,  91 => 27,  87 => 26,  81 => 23,  78 => 22,  71 => 18,  66 => 15,  64 => 13,  60 => 12,  56 => 11,  52 => 10,  40 => 7,  35 => 5,  31 => 4,  26 => 1,  263 => 97,  256 => 93,  248 => 89,  245 => 88,  235 => 81,  231 => 80,  225 => 77,  220 => 75,  215 => 73,  208 => 69,  203 => 67,  199 => 66,  195 => 65,  190 => 63,  182 => 58,  179 => 57,  170 => 55,  166 => 54,  161 => 53,  159 => 52,  154 => 49,  145 => 34,  141 => 46,  137 => 45,  133 => 43,  124 => 41,  120 => 40,  116 => 39,  111 => 32,  104 => 33,  100 => 32,  96 => 31,  90 => 28,  86 => 27,  80 => 24,  76 => 20,  72 => 22,  67 => 20,  63 => 19,  57 => 16,  48 => 9,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
