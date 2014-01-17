<?php

/* default/template/account/forgotten.tpl */
class __TwigTemplate_fe20940c3c6be4a276f1ef7ba6f0945fc1e6d00814d12ca69142e951bd1f375b extends Twig_Template
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
        echo gettext("Lost Password");
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
        echo gettext("Remind password");
        echo " - <strong>YESOCL.com</strong>
        </div>
        <div class=\"alert alert-success ";
        // line 14
        if ((!array_key_exists("success", $context))) {
            echo "hidden";
        }
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["success"]) ? $context["success"] : null), "html", null, true);
        echo "</div>
        <div class=\"alert alert-error ";
        // line 15
        if ((!array_key_exists("warning", $context))) {
            echo "hidden";
        }
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : null), "html", null, true);
        echo "</div>
        <div class=\"frm-content\">            
            <form action=\"";
        // line 17
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("LostPass")), "html", null, true);
        echo "\" method=\"post\">
                <div class=\"input-prepend\">
                    <span class=\"add-on\"><i class=\"icon-user\"></i></span>
                    <input class=\"span3\" id=\"username\" name=\"email\" type=\"text\" placeholder=\"Email\">
                </div>                
                <div class=\"btns\">
                     <button class=\"btn btn-success\" type=\"submit\">";
        // line 23
        echo gettext("Reset password");
        echo "</button>   
                     <a class=\"btn\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WelcomePage")), "html", null, true);
        echo "\">";
        echo gettext("Cancel");
        echo "</a>  
                </div>
            </form>     
        </div>
        <div class=\"frm-footer\">
            <ul>
                <li>";
        // line 30
        echo gettext("Try login again !");
        echo " <a href=\"#\">";
        echo gettext("Sign In");
        echo "</a></li>
                <li>";
        // line 31
        echo gettext("Create another account ?");
        echo " <a href=\"#\">";
        echo gettext("Sign Up");
        echo "</a></li>
                <li>";
        // line 32
        echo gettext("Not received remind email");
        echo ". <a href=\"#\">";
        echo gettext("Send again");
        echo " !</a></li>
            </ul>
        </div>
    </div>
</div>
";
    }

    // line 39
    public function block_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "default/template/account/forgotten.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 39,  115 => 32,  109 => 31,  103 => 30,  92 => 24,  88 => 23,  79 => 17,  70 => 15,  62 => 14,  57 => 12,  53 => 10,  50 => 9,  43 => 6,  40 => 5,  34 => 3,);
    }
}
