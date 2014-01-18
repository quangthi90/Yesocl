<?php

/* default/template/common/notification.tpl */
class __TwigTemplate_c1a20dbbfed6aad4c3f5019d43cc9ecdd9948e4c547d0a5c43b6ce986fb0fa8d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@template/default/template/common/layout.tpl");

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
        return "@template/default/template/common/layout.tpl";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["users"]) ? $context["users"] : null), (isset($context["current_user_id"]) ? $context["current_user_id"] : null), array(), "array"), "username"), "html", null, true);
        echo " | ";
        echo gettext("Notification");
        echo " ";
    }

    // line 5
    public function block_stylesheet($context, array $blocks = array())
    {
    }

    // line 8
    public function block_body($context, array $blocks = array())
    {
        // line 9
        echo "<div id=\"y-content\">
    <div id=\"y-main-content\" class=\"has-horizontal notification-page\">
        <div class=\"feed-block\" style=\"width: 100%;\">
            <div class=\"block-header\">
                <a class=\"block-title fl\" href=\"#\">";
        // line 13
        echo gettext("All Notifications");
        echo "</a>  
                <a class=\"block-seemore fl\" href=\"#\"> 
                    <i class=\"icon-angle-right\"></i>
                </a>
            </div>
            <div class=\"block-content\">               
               <div class=\"ntf-container\">
                   <ul class=\"ntf-list\">
                        <li class=\"ntf-date\">";
        // line 21
        echo gettext("Sent Today");
        echo "</li>
                        ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 10));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 23
            echo "                       <li class=\"ntf-item\">
                           <i class=\"icon-thumbs-up-alt\"></i>
                           <span class=\"ntf-content\">Nguyen Van A likes your comment: \"^^\"</span>
                           <span class=\"ntf-time\">23:59</span>
                       </li>
                       <li class=\"ntf-item\">
                           <i class=\"icon-comments\"></i>
                           <span class=\"ntf-content\">Nguyen Van A commments on your status: \"^^\"</span>
                           <span class=\"ntf-time\">23:59</span>
                       </li>
                       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "                       <li class=\"ntf-date\">Sent Yesterday</li>
                        ";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 10));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 36
            echo "                       <li class=\"ntf-item\">
                           <i class=\"icon-thumbs-up-alt\"></i>
                           <span class=\"ntf-content\">Nguyen Van A likes your comment: \"^^\"</span>
                           <span class=\"ntf-time\">23:59</span>
                       </li>
                       <li class=\"ntf-item\">
                           <i class=\"icon-comments\"></i>
                           <span class=\"ntf-content\">Nguyen Van A commments on your status: \"^^\"</span>
                           <span class=\"ntf-time\">23:59</span>
                       </li>
                       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "                       <li class=\"ntf-date\">Sent December 09</li>
                        ";
        // line 48
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 10));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 49
            echo "                       <li class=\"ntf-item\">
                           <i class=\"icon-thumbs-up-alt\"></i>
                           <span class=\"ntf-content\">Nguyen Van A likes your comment: \"^^\"</span>
                           <span class=\"ntf-time\">23:59</span>
                       </li>
                       <li class=\"ntf-item\">
                           <i class=\"icon-comments\"></i>
                           <span class=\"ntf-content\">Nguyen Van A commments on your status: \"^^\"</span>
                           <span class=\"ntf-time\">23:59</span>
                       </li>
                       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "                       <li class=\"ntf-date\">Sent December 08</li>
                        ";
        // line 61
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 10));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 62
            echo "                       <li class=\"ntf-item\">
                           <i class=\"icon-thumbs-up-alt\"></i>
                           <span class=\"ntf-content\">Nguyen Van A likes your comment: \"^^\"</span>
                           <span class=\"ntf-time\">23:59</span>
                       </li>
                       <li class=\"ntf-item\">
                           <i class=\"icon-comments\"></i>
                           <span class=\"ntf-content\">Nguyen Van A commments on your status: \"^^\"</span>
                           <span class=\"ntf-time\">23:59</span>
                       </li>
                       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        echo "                       <li class=\"ntf-date\">Sent December 07</li>
                        ";
        // line 74
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, 10));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 75
            echo "                       <li class=\"ntf-item\">
                           <i class=\"icon-thumbs-up-alt\"></i>
                           <span class=\"ntf-content\">Nguyen Van A likes your comment: \"^^\"</span>
                           <span class=\"ntf-time\">23:59</span>
                       </li>
                       <li class=\"ntf-item\">
                           <i class=\"icon-comments\"></i>
                           <span class=\"ntf-content\">Nguyen Van A commments on your status: \"^^\"</span>
                           <span class=\"ntf-time\">23:59</span>
                       </li>
                       ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "                   </ul>
               </div>               
            </div>
        </div>
    </div>
</div>
";
    }

    // line 94
    public function block_javascript($context, array $blocks = array())
    {
        echo "    
";
    }

    public function getTemplateName()
    {
        return "default/template/common/notification.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 94,  184 => 86,  168 => 75,  164 => 74,  161 => 73,  145 => 62,  141 => 61,  138 => 60,  122 => 49,  118 => 48,  115 => 47,  99 => 36,  95 => 35,  92 => 34,  76 => 23,  72 => 22,  68 => 21,  57 => 13,  51 => 9,  48 => 8,  43 => 5,  34 => 3,);
    }
}
