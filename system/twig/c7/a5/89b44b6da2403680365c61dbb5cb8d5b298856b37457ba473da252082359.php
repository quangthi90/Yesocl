<?php

/* default/template/common/footer.tpl */
class __TwigTemplate_c7a589b44b6da2403680365c61dbb5cb8d5b298856b37457ba473da252082359 extends Twig_Template
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
        echo "<div id=\"y-footer\">
    <div id=\"scroll-footer\">
        <a href=\"#\" class=\"btn-link-circle medium\" id=\"auto-scroll-left\" title=\"Scroll Left\" style=\"display: none;\">
          <i class=\"icon-arrow-left\"></i>
        </a>
    </div>
    <div id=\"yes-info\">
        <div class=\"copyright\">
            Copyright &copy; 2013 - <strong>YESOCL.com</strong>
        </div> 
        <div class=\"language-wrapper dropup js-language\">
          <a href=\"#\" class=\"language-item selected dropdown-toggle js-language-label\" data-toggle=\"dropdown\">
            <img src=\"\">
            <span> </span>
            <i class=\"icon-caret-up\"></i>
          </a>
          ";
        // line 17
        $context["language_code"] = call_user_func_array($this->env->getFunction('get_cookie')->getCallable(), array("language"));
        // line 18
        echo "          <ul class=\"dropdown-menu js-language-btn\">
            <li>
              <a href=\"#\" data-selected=\"";
        // line 20
        if (((isset($context["language_code"]) ? $context["language_code"] : null) == "en_EN")) {
            echo "true";
        } else {
            echo "false";
        }
        echo "\" data-code=\"en_EN\" class=\"language-item\"><img src=\"image/flags/england.png\"> <span>English</span></a>
            </li>
            <li>
              <a href=\"#\" data-selected=\"";
        // line 23
        if ((((isset($context["language_code"]) ? $context["language_code"] : null) == "vi_VN") || (call_user_func_array($this->env->getFunction('get_cookie')->getCallable(), array("language")) == ""))) {
            echo "true";
        } else {
            echo "false";
        }
        echo "\" data-code=\"vi_VN\" class=\"language-item\"><img src=\"image/flags/vn.png\"> <span>Vietnamese</span></a>
            </li>
            <li>
              <a href=\"#\" data-selected=\"";
        // line 26
        if (((isset($context["language_code"]) ? $context["language_code"] : null) == "zh")) {
            echo "true";
        } else {
            echo "false";
        }
        echo "\" data-code=\"zh\" class=\"language-item\"><img src=\"image/flags/cn.png\"> <span>Chinese</span></a>
            </li>
          </ul>
        </div> 
        <div class=\"links-footer\">
          <ul>
            <li><a href=\"#\">Create Group</a></li>
            <li><a href=\"#\">User privacy</a></li>
            <li><a href=\"#\">Term</a></li>
            <li><a href=\"#\">Contact</a></li>
            <li><a href=\"#\">About us</a></li>
          </ul>            
        </div>              
    </div>    
</div>";
    }

    public function getTemplateName()
    {
        return "default/template/common/footer.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 26,  56 => 23,  46 => 20,  42 => 18,  40 => 17,  22 => 1,);
    }
}
