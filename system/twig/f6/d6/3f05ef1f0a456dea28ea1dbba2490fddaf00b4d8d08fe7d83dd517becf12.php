<?php

/* default/template/welcome/footer.tpl */
class __TwigTemplate_f6d63f05ef1f0a456dea28ea1dbba2490fddaf00b4d8d08fe7d83dd517becf12 extends Twig_Template
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
        echo "        <div id=\"y-footer\" class=\"y-sub-container-1 row-fluid\">
            <div class=\"y-footer-container span3 offset1\">
                <div class=\"language-selection row-fluid\">                    
                    <form action=\"#\" class=\"form-inline\">
                        <div class=\"input-prepend\">
                            <span class=\"add-on\">Language </span>
                            <select name=\"lang-code\" id=\"select1\">
                                <option>English</option>
                                <option>Viet Nam</option>
                                <option>Japanese</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class=\"copyright row-fluid\">
                    Copyright &copy; 2012 - <strong>YESOCL.com</strong>
                </div>
            </div>
            <div class=\"y-footer-container span5 offset2\">
                <div class=\"links-footer row-fluid\">
                    <a href=\"#\">Mobile Version</a> - <a href=\"#\">Create Group</a> - <a href=\"#\">Create Profiles</a>
                    - <a href=\"#\">Careers</a> - <a href=\"#\">User privacy</a> - <a href=\"#\">Term</a>
                    - <a href=\"#\">Help</a>
                </div>
                <div class=\"footer-help row-fluid\">
                    <div class=\"span12\">
                        <i class=\"icon-phone\"></i> 083.888.888 - 083.999.999
                        <i class=\"icon-envelope-alt\"></i> <a href=\"mailto:support@yesocl.com\">support@yesocl.com</a>
                    </div>
                </div>
            </div>
        </div>";
    }

    public function getTemplateName()
    {
        return "default/template/welcome/footer.tpl";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
