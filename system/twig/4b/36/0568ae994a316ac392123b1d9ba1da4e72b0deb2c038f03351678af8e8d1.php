<?php

/* default/template/welcome/home.tpl */
class __TwigTemplate_4b360568ae994a316ac392123b1d9ba1da4e72b0deb2c038f03351678af8e8d1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@template/default/template/welcome/layout.tpl");

        $this->blocks = array(
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
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 4
        echo "       
";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "<div id=\"y-content\" class=\"y-sub-container-1\">
    <div id=\"intro-bg\">    \t
\t\t<img src=\"";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_img')->getCallable(), array("template/intro-2-bg.png")), "html", null, true);
        echo "\" />  
    </div>    
</div>
<div id=\"y-frm-register\" class=\"y-frm\">
    <a href=\"#\" class=\"close\">X</a>
    <div class=\"frm-title\">
        ";
        // line 16
        echo gettext("Join");
        echo " <strong>YESOCL.com</strong>         
    </div>
    <div class=\"frm-content\">
    \t<form class=\"reg-form\" action=\"";
        // line 19
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("AjaxRegister")), "html", null, true);
        echo "\" method=\"post\">
    \t\t<div class=\"alert alert-error top-warning hidden\">";
        // line 20
        echo gettext("Warning");
        echo "!!</div>
    \t\t<div class=\"controls controls-row\">
    \t\t\t<input required=\"required\" pattern=\".{2,10}\" title=\"2 to 10 characters\" name=\"firstname\" type=\"text\" class=\"span2\" id=\"reg-first-name\" placeholder=\"";
        // line 22
        echo gettext("First Name");
        echo "\" autocomplete=\"off\" />
    \t\t\t<input required=\"required\" pattern=\".{2,10}\" title=\"2 to 10 characters\" name=\"lastname\" type=\"text\" class=\"span2\"  id=\"reg-last-name\" placeholder=\"";
        // line 23
        echo gettext("Last Name");
        echo "\" autocomplete=\"off\" />
    \t\t\t<div class=\"warning hidden\">";
        // line 24
        echo gettext("warning");
        echo "</div>
    \t\t</div>
    \t\t<div class=\"controls controls-row \">
    \t\t\t<input required=\"required\" name=\"email\" type=\"email\" class=\"input-block-level\" id=\"reg-email\" value=\"\" placeholder=\"";
        // line 27
        echo gettext("E-mail");
        echo "\" autocomplete=\"off\" />
    \t\t\t<div class=\"warning hidden\">";
        // line 28
        echo gettext("warning");
        echo "</div>
    \t\t</div>
    \t\t<div class=\"controls controls-row\">
    \t\t\t<input required=\"required\" pattern=\".{6,20}\" title=\"6 to 20 characters\" name=\"password\" type=\"password\" class=\"span2\"  id=\"password\" placeholder=\"";
        // line 31
        echo gettext("Password");
        echo "\" autocomplete=\"off\" />
    \t\t\t<input required=\"required\" name=\"confirm\" type=\"password\" class=\"span2\"  id=\"reg-password\" placeholder=\"";
        // line 32
        echo gettext("Re-type Password");
        echo "\" autocomplete=\"off\" />
    \t\t\t<div class=\"warning hidden\">";
        // line 33
        echo gettext("Confirm not match");
        echo "!</div>
    \t\t</div>
    \t\t<div class=\"controls controls-row \">
                <div class=\"input-prepend\">
                \t<span class=\"add-on\" style= \"height: 18px;\">";
        // line 37
        echo gettext("Birthday");
        echo "</span>
                \t<select required=\"required\" name=\"day\" class=\"birthday\" id=\"reg-birthay-day\" style=\"width:100px;\">
\t                    <option value=\"\">-- ";
        // line 39
        echo gettext("Day");
        echo " --</option>
\t                    ";
        // line 40
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 31));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 41
            echo "\t                    <option>";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "</option>
\t                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "\t                </select>
\t                <select required=\"required\" name=\"month\" class=\"birthday\" id=\"reg-birthay-month\"  style=\"width:100px;\">
\t                    <option value=\"\">-- ";
        // line 45
        echo gettext("Month");
        echo " --</option>
\t                    ";
        // line 46
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 47
            echo "\t                    <option>";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "</option>
\t                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "\t                </select>
\t                <select required=\"required\" name=\"year\" class=\"birthday\" id=\"reg-birthay-year\"
\t                 style=\"width:111px;\">
\t                \t";
        // line 52
        $context["now"] = twig_date_format_filter($this->env, "now", "Y");
        // line 53
        echo "\t                    <option value=\"\">-- ";
        echo gettext("Year");
        echo " --</option>
\t                    ";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range((isset($context["now"]) ? $context["now"] : null), ((isset($context["now"]) ? $context["now"] : null) - 100)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 55
            echo "\t                    <option>";
            echo twig_escape_filter($this->env, (isset($context["i"]) ? $context["i"] : null), "html", null, true);
            echo "</option>
\t                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "\t                </select>
\t                <div class=\"warning hidden\">";
        // line 58
        echo gettext("warning");
        echo "</div>
                </div>                
            </div>
            <div class=\"controls controls-row \">
            \t<div class=\"input-prepend\">
                \t<span class=\"add-on\" style= \"height: 18px;width: 48px;\">";
        // line 63
        echo gettext("Gender");
        echo "</span>
\t                <select required=\"required\" name=\"sex\" id=\"reg-sex\" style=\"width: 312px;\">
\t                    <option value=\"\">-- ";
        // line 65
        echo gettext("Select gender");
        echo " --</option>
\t                    <option value=\"1\">";
        // line 66
        echo gettext("Male");
        echo "</option>
\t                    <option value=\"2\">";
        // line 67
        echo gettext("Female");
        echo "</option>
\t                </select>
\t                <div class=\"warning hidden\">";
        // line 69
        echo gettext("warning");
        echo "</div>
            \t</div>
            </div>
            <div class=\"controls controls-row captcha-row\">
            \t<label style=\"font-weight: bold;font-size: 14px;\">";
        // line 73
        echo gettext("Security Check");
        echo "</label>
            \t<div class=\"captcha-container\">
            \t\t";
        // line 75
        echo (isset($context["recaptcha_html"]) ? $context["recaptcha_html"] : null);
        echo "\t
            \t</div>    \t\t\t
    \t\t\t<div class=\"warning hidden\">";
        // line 77
        echo gettext("Captcha not match");
        echo "!</div>
    \t\t</div>
            <div class=\"controls controls-row \">
                <label class=\"checkbox\" style=\"margin-bottom:10px;\"><input type=\"checkbox\" name=\"agree\" required=\"required\" />";
        // line 80
        echo gettext("I agree Yesocl's policy");
        echo "</label>
                <button type=\"submit\" class=\"btn btn-success btn-reg\">";
        // line 81
        echo gettext("Sign up");
        echo "</button>
            </div>
    \t</form>
    </div>
</div>
";
    }

    // line 88
    public function block_javascript($context, array $blocks = array())
    {
        // line 89
        echo "\t<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("register.js")), "html", null, true);
        echo "\"></script>  
    <script type=\"text/javascript\">
        \$('#y-message-info').showMessageDialog();
    </script>
    <script src=\"http://connect.facebook.net/en_US/all.js#appId=";
        // line 93
        echo twig_escape_filter($this->env, (isset($context["fb_app_id"]) ? $context["fb_app_id"] : null), "html", null, true);
        echo "&xfbml=1\"></script>
    <script type=\"text/javascript\">

    FB.init({
        appId   : '";
        // line 97
        echo twig_escape_filter($this->env, (isset($context["fb_app_id"]) ? $context["fb_app_id"] : null), "html", null, true);
        echo "',
        status  : true,
        cookie  : true, 
        xfbml   : true 
    });
    function callFBLogin(){
        FB.login(function(response) {
            if (response.authResponse) {
                FB.api('/me', function(response) {
                    var promise = \$.ajax({
                        type: 'POST',
                        url:  yRouting.generate('FaceBookConnect'),
                        dataType: 'json',
                        data: {data: response}
                    });

                    var \$spinner = \$('<i class=\"icon-spinner icon-spin\"></i>');
                    var \$old_icon = \$('.btn-fb-login').find('i');
                    var f        = function() {
                        \$spinner.remove();
                        \$('.btn-fb-login').removeClass('disabled').find('a').prepend(\$old_icon);
                    };

                    \$old_icon.remove();
                    \$('.btn-fb-login').addClass('disabled').find('a').prepend(\$spinner);

                    promise.then(f, f);

                    promise.then(function(data){
                        if ( data.success == 'ok' ){
                            window.location.reload();
                        }else{
                            /*Todo: add message error here...*/
                        }
                    });
                });
            }else{
                /*Todo: add message login facebook fail here...*/
                alert(\"Access not authorized.\");
            }
        },{scope: 'email,user_birthday'});
    }
    \$('.btn-fb-login').click(function(){
        if ( \$(this).hasClass('disabled') ){
            return false;
        }
        \$(this).addClass('disabled');
        callFBLogin();
    });
    </script>
";
    }

    public function getTemplateName()
    {
        return "default/template/welcome/home.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  263 => 97,  256 => 93,  248 => 89,  245 => 88,  235 => 81,  231 => 80,  225 => 77,  220 => 75,  215 => 73,  208 => 69,  203 => 67,  199 => 66,  195 => 65,  190 => 63,  182 => 58,  179 => 57,  170 => 55,  166 => 54,  161 => 53,  159 => 52,  154 => 49,  145 => 47,  141 => 46,  137 => 45,  133 => 43,  124 => 41,  120 => 40,  116 => 39,  111 => 37,  104 => 33,  100 => 32,  96 => 31,  90 => 28,  86 => 27,  80 => 24,  76 => 23,  72 => 22,  67 => 20,  63 => 19,  57 => 16,  48 => 10,  44 => 8,  41 => 7,  36 => 4,  33 => 3,);
    }
}
