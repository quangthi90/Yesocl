<?php

/* default/template/welcome/header.tpl */
class __TwigTemplate_efc7f6a5f02353c3eb25da753cc306212ff4834910d611e833a0f757983fac65 extends Twig_Template
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
        echo "<div id=\"y-header\" class=\"outer-30\">
    <div class=\"row-fluid\">
        <div id=\"y-logo\" class=\"span3\">
            <a href=\"";
        // line 4
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WelcomePage")), "html", null, true);
        echo "\"><img src=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_img')->getCallable(), array("template/logo2.png")), "html", null, true);
        echo "\" style=\"width:160px;\" /></a>
        </div>
        <div class=\"span4\">
            <div class=\"row-fluid\" id=\"y-welcome-menu\">
                <div class=\"span4\">
                    <a href=\"#\">Yestock</a>
                </div>
                <div class=\"span4\">
                    <a href=\"#\">Why Yesocl ?</a>
                </div>
                <div class=\"span4\">
                    <a href=\"#\">About Us</a>
                </div>
            </div>
        </div>
        <div class=\"span5 y-welcome-login\">
            <div class=\"row-fluid\">
                <div class=\"span8\">
                    <div class=\"login-social\">
                        <ul>
                            <li class=\"btn-fb-login\">
                                <a href=\"#\">
                                    <i class=\"icon-facebook\"></i>
                                </a>
                            </li>
                            ";
        // line 44
        echo "                        </ul>
                    </div>
                </div>
                <div class=\"span4\">
                    <a href=\"#\" class=\"btn btn-success\" id=\"login-invoke\"><i class=\"icon-unlock-alt\"></i> ";
        // line 48
        echo gettext("Login");
        echo "</a>  
                </div>
            </div>
        </div> 
    </div>             
</div>
<div class=\"line-shadow\"></div>
<div id=\"login-form-container\" style=\"display: none;\">
    <form class=\"row-fluid login-form\">
        <div class=\"row-fluid\">
            <div class=\"span12 input-prepend\">
                <span class=\"add-on\"><i class=\"icon-user\"></i></span>
                <input required=\"required\" name=\"email\" type=\"email\" autocomplete=\"off\"
                    placeholder=\"";
        // line 61
        echo gettext("Email");
        echo "\"  class=\"input-welcome\" tabindex=\"1\" />
            </div>
        </div>
        <div class=\"row-fluid\">
            <div class=\"span12 input-prepend\">
                <span class=\"add-on\"><i class=\"icon-lock\"></i></span>
                <input required=\"required\" name=\"password\" type=\"password\" autocomplete=\"off\"
                    placeholder=\"";
        // line 68
        echo gettext("Password");
        echo "\" class=\"input-welcome\" tabindex=\"2\" />
            </div>
        </div>
        <div class=\"row-fluid\" style=\"border-bottom: 1px solid #f0f0f0;\">
            <label>
                <input type=\"checkbox\" name=\"remember\" value=\"true\"> ";
        // line 73
        echo gettext("Remember me");
        // line 74
        echo "            </label>
            <a class=\"link-login\" href=\"";
        // line 75
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("LostPass")), "html", null, true);
        echo "\">";
        echo gettext("Forgot password");
        echo "!</a>
        </div>
        <div class=\"row-fluid btn-container\">
            <button type=\"submit\" class=\"btn btn-success btn-login\" tabindex=\"3\">";
        // line 78
        echo gettext("Sign in");
        // line 79
        echo "            </button>   
        </div>                         
    </form>
</div>";
    }

    public function getTemplateName()
    {
        return "default/template/welcome/header.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 79,  110 => 78,  102 => 75,  99 => 74,  97 => 73,  89 => 68,  79 => 61,  63 => 48,  57 => 44,  27 => 4,  22 => 1,);
    }
}
