<?php

/* @template/default/template/common/layout.tpl */
class __TwigTemplate_2300cf221414ddf1c4498e613e05544c572f734eeccbbc4150fe89aa4474ff73 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'body' => array($this, 'block_body'),
            'template' => array($this, 'block_template'),
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
        echo " | Yesocl - ";
        echo gettext("Social Network");
        echo "</title>
\t\t<base href=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["base"]) ? $context["base"] : null), "html", null, true);
        echo "\" />\t\t
\t\t<!-- Icon -->
\t\t<link rel=\"shortcut icon\" href=\"image/template/favicon.png\">\t\t
\t\t<!-- Library css -->
\t\t<link href=\"";
        // line 9
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/bootstrap.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<link href=\"";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/bootstrap-responsive.min.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<link href=\"";
        // line 11
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/fortAwesome/css/font-awesome.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<link href=\"";
        // line 12
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/uniform.default.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<link href=\"";
        // line 13
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/magnific-popup.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<link href=\"";
        // line 14
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/mcustomscrollbar.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<link href=\"";
        // line 15
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/mention-input.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<link href=\"";
        // line 16
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/summernote.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<!-- Common css -->
\t\t<link href=\"";
        // line 18
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("common/yes.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
\t\t<!-- Custom css -->
\t\t";
        // line 20
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 22
        echo "\t</head>
\t<body>
\t\t";
        // line 24
        echo twig_include($this->env, $context, twig_template_from_string($this->env, (isset($context["header"]) ? $context["header"] : null)));
        echo "
\t\t";
        // line 25
        echo twig_include($this->env, $context, twig_template_from_string($this->env, (isset($context["sidebar_control"]) ? $context["sidebar_control"] : null)));
        echo "
\t\t<div id=\"y-container\">
\t\t\t";
        // line 27
        $this->displayBlock('body', $context, $blocks);
        // line 29
        echo "\t\t</div>
\t\t";
        // line 30
        echo twig_include($this->env, $context, twig_template_from_string($this->env, (isset($context["footer"]) ? $context["footer"] : null)));
        echo "
\t\t<div id=\"overlay\"></div>
\t\t
\t\t";
        // line 33
        echo twig_include($this->env, $context, "@template/default/template/post/common/liked_user.tpl");
        echo "
\t\t";
        // line 34
        echo twig_include($this->env, $context, "@template/default/template/common/quick_search.tpl");
        echo "\t

\t\t<div id=\"html-template\" class=\"hidden\">
\t\t\t";
        // line 37
        $this->displayBlock('template', $context, $blocks);
        // line 39
        echo "\t\t</div>

    \t<!-- Library Script -->
    \t<script type=\"text/javascript\" src=\"";
        // line 42
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("jquery/jquery-1.8.3.min.js")), "html", null, true);
        echo "\"></script>
    \t<script type=\"text/javascript\" src=\"";
        // line 43
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.easing.1.3.js")), "html", null, true);
        echo "\"></script>
    \t<script type=\"text/javascript\" src=\"";
        // line 44
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.nicescroll.js")), "html", null, true);
        echo "\"></script>
    \t<script type=\"text/javascript\" src=\"";
        // line 45
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.uniform.min.js")), "html", null, true);
        echo "\"></script>
    \t<script type=\"text/javascript\" src=\"";
        // line 46
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/bootstrap.min.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 47
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.tmpl.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 48
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.tmplPlus.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 49
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.timeago.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 50
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.magnific-popup.min.js")), "html", null, true);
        echo "\">
\t\t</script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 52
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.mcustomscrollbar.min.js")), "html", null, true);
        echo "\">
\t\t</script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 54
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.bootbox.js")), "html", null, true);
        echo "\">
\t\t</script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 56
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.typeahead.js")), "html", null, true);
        echo "\">
\t\t</script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 58
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/mention/jquery.elastic.js")), "html", null, true);
        echo "\">
\t\t</script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 60
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/mention/jquery.events.input.js")), "html", null, true);
        echo "\">
\t\t</script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 62
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/mention/underscore.min.js")), "html", null, true);
        echo "\">
\t\t</script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 64
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/mention/jquery.mentions.input.js")), "html", null, true);
        echo "\">
\t\t</script>\t\t
\t\t<script type=\"text/javascript\" src=\"";
        // line 66
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.hotkeys.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 67
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/summernote.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 68
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.hotkeys.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 69
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.cookie.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 70
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.truncate.min.js")), "html", null, true);
        echo "\"></script>
\t\t<!-- Common Script -->
\t\t<script type=\"text/javascript\" src=\"";
        // line 72
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("yes.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 73
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("common.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 74
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("routing.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 75
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("search.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 76
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("account.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 77
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("friend.js")), "html", null, true);
        echo "\"></script>
\t\t<script type=\"text/javascript\" src=\"";
        // line 78
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("notification.js")), "html", null, true);
        echo "\"></script>
\t\t<!-- Custom Script -->
    \t";
        // line 80
        $this->displayBlock('javascript', $context, $blocks);
        // line 82
        echo "\t</body>
</html>";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo gettext("Home Feed");
    }

    // line 20
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 21
        echo "\t\t";
    }

    // line 27
    public function block_body($context, array $blocks = array())
    {
        // line 28
        echo "\t\t\t";
    }

    // line 37
    public function block_template($context, array $blocks = array())
    {
        // line 38
        echo "\t\t\t";
    }

    // line 80
    public function block_javascript($context, array $blocks = array())
    {
        // line 81
        echo "\t\t";
    }

    public function getTemplateName()
    {
        return "@template/default/template/common/layout.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  285 => 81,  282 => 80,  278 => 38,  275 => 37,  271 => 28,  268 => 27,  264 => 21,  261 => 20,  255 => 4,  250 => 82,  248 => 80,  243 => 78,  239 => 77,  235 => 76,  231 => 75,  227 => 74,  223 => 73,  219 => 72,  214 => 70,  210 => 69,  202 => 67,  198 => 66,  193 => 64,  188 => 62,  183 => 60,  173 => 56,  168 => 54,  163 => 52,  150 => 48,  146 => 47,  142 => 46,  138 => 45,  134 => 44,  130 => 43,  126 => 42,  121 => 39,  119 => 37,  113 => 34,  109 => 33,  100 => 29,  93 => 25,  89 => 24,  85 => 22,  83 => 20,  78 => 18,  73 => 16,  69 => 15,  65 => 14,  61 => 13,  57 => 12,  53 => 11,  49 => 10,  45 => 9,  38 => 5,  32 => 4,  27 => 1,  206 => 68,  203 => 76,  195 => 70,  189 => 48,  178 => 58,  174 => 43,  167 => 41,  161 => 40,  158 => 50,  154 => 49,  148 => 35,  140 => 31,  123 => 29,  120 => 28,  103 => 30,  98 => 27,  92 => 23,  90 => 22,  79 => 13,  76 => 12,  71 => 9,  64 => 7,  28 => 5,  21 => 4,  14 => 3,);
    }
}
