<?php

/* default/template/account/login.tpl */
class __TwigTemplate_10606e20638f5b1ed0f9289b81ce2c752c3c69a415ca842ef243a349b4b030e5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@template/default/template/welcome/layout.tpl");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'body' => array($this, 'block_body'),
            'javascript' => array($this, 'block_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doGetParent(array $context)
    {
        return "@template/default/template/welcome/layout.tpl";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo gettext("Login");
    }

    // line 5
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 6
        echo "<link href=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("account.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "<div id=\"y-content\" class=\"no-header-fixed\">
    <div class=\"y-frm\" id=\"y-frm-login\">
        <div class=\"frm-title\">";
        // line 12
        echo gettext("Sign In");
        echo " <strong>YESOCL.com</strong>
        </div>
        <div class=\"alert alert-error ";
        // line 14
        if (((!array_key_exists("warning", $context)) || ((isset($context["warning"]) ? $context["warning"] : null) == null))) {
            echo "hidden";
        }
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : null), "html", null, true);
        echo "</div>
        <div class=\"frm-content\">
            <form class=\"login-form\">
                <div class=\"input-prepend\">
                    <span class=\"add-on\"><i class=\"icon-user\"></i></span>
                    <input class=\"span3\" id=\"username\" required=\"required\" name=\"email\" type=\"email\" placeholder=\"Email\">
                </div>
                <br />
                <div class=\"input-prepend\">
                    <span class=\"add-on\"><i class=\"icon-lock\"></i></span>
                    <input class=\"span3\" id=\"password\" required=\"required\" name=\"password\" type=\"password\" placeholder=\"Password\">
                    <div class=\"warning\"></div>
                </div>
                <div class=\"checkbox-container\">
                    <input id=\"remember\" name=\"remember\" type=\"checkbox\" value=\"true\" /> 
                    <label for=\"remember\">";
        // line 29
        echo gettext("Remember me");
        echo "</label>
                </div>                
                <div class=\"btns\">
                     <button class=\"btn btn-success btn-login\">";
        // line 32
        echo gettext("Sign In");
        echo "</button>   
                </div>
            </form>     
        </div>
        <div class=\"frm-footer\">
            <ul>
                <li>";
        // line 38
        echo gettext("Don't have an account");
        echo " ? <a href=\"#\">";
        echo gettext("Sign Up");
        echo "</a><br></li>
                <li>";
        // line 39
        echo gettext("Remind");
        echo " ! <a href=\"#\">";
        echo gettext("Password");
        echo "</a></li>
            </ul>
        </div>
    </div>
</div>
";
    }

    // line 46
    public function block_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "default/template/account/login.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 46,  105 => 39,  99 => 38,  90 => 32,  84 => 29,  62 => 14,  57 => 12,  53 => 10,  50 => 9,  43 => 6,  40 => 5,  34 => 3,);
    }
}
