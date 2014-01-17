<?php

/* default/template/account/message.tpl */
class __TwigTemplate_b418a2eea86e9d742a5cd5fed1648a63485f8c183be871e62c84bfbaffa048cd extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@template/default/template/common/layout.tpl");

        $_trait_0 = $this->env->loadTemplate("@template/default/template/common/html_block.tpl");
        // line 5
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/common/html_block.tpl".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'title' => array($this, 'block_title'),
                'stylesheet' => array($this, 'block_stylesheet'),
                'body' => array($this, 'block_body'),
                'template' => array($this, 'block_template'),
                'javascript' => array($this, 'block_javascript'),
            )
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
        echo gettext("Messages");
    }

    // line 7
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 8
        echo "<link href=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("message.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
";
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        // line 12
        $context["current_user"] = call_user_func_array($this->env->getFunction('get_current_user')->getCallable(), array());
        // line 13
        echo "<div id=\"y-content\" class=\"message-page\">
\t<div id=\"y-main-content\">
\t\t<div class=\"feed-block\">
            <div class=\"block-header\">
                <a class=\"block-title fl\" href=\"#\">";
        // line 17
        echo gettext("Messages");
        echo "</a>
                <a class=\"block-seemore fl\" href=\"#\"> 
                    <i class=\"icon-angle-right\"></i>
                </a>
            </div>
            <div class=\"block-content message-box\">
            \t<div class=\"user-box\" id=\"user-box\">
            \t\t<div class=\"user-box-menu\" id=\"user-box-menu\">
            \t\t\t<a href=\"#\">";
        // line 25
        echo gettext("Inbox");
        echo " (<span class=\"js-count-unread\"></span>)</a>
            \t\t\t";
        // line 27
        echo "            \t\t</div>
            \t\t<div class=\"user-box-search\" id=\"user-box-search\">
            \t\t\t<input type=\"text\" class=\"message-search\" id=\"message-search\" placeholder=\"";
        // line 29
        echo gettext("Search");
        echo " ...\" />
                        <span class=\"mesage-search-loader\"><i class=\"icon-spinner icon-spin\"></i></span>
            \t\t</div>
            \t\t<div class=\"user-box-users\">
            \t\t\t<div class=\"user-box-scroll\">
            \t\t\t\t<ul class=\"js-mess-user-list\">
            \t\t\t\t\t";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["messages"]) ? $context["messages"] : null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 36
            echo "                                    ";
            $context["user"] = $this->getAttribute((isset($context["users"]) ? $context["users"] : null), $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "object_id"), array(), "array");
            // line 37
            echo "\t            \t\t\t\t<li class=\"user-message-li js-mess-user-item ";
            if (($this->getAttribute((isset($context["message"]) ? $context["message"] : null), "is_sender") == true)) {
                echo "sent-box";
            } else {
                echo "inbox";
            }
            echo " ";
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index") == 1)) {
                echo "active read";
            } elseif (($this->getAttribute((isset($context["message"]) ? $context["message"] : null), "read") == false)) {
                echo "unread";
            } else {
                echo "read";
            }
            echo "\" data-user-slug=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug"), "html", null, true);
            echo "\" data-username=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
            echo "\">
\t            \t\t\t\t\t<a href=\"#\" class=\"user-message-link js-mess-user-link\">
\t            \t\t\t\t\t\t<img src=\"";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
            echo "\">
\t            \t\t\t\t\t\t<span class=\"user-message-info js-mess-user-info\">
\t            \t\t\t\t\t\t\t<strong class=\"user-name\">";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
            echo "</strong>
\t            \t\t\t\t\t\t\t<span class=\"message-overview\">
                                                <i class=\"icon-mail-reply\"></i>
                                                <i class=\"icon-ok\"></i>
                                                <span class=\"js-mess-user-content\">";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["message"]) ? $context["message"] : null), "content"), "html", null, true);
            echo "</span>
                                            </span>
\t            \t\t\t\t\t\t\t<span class=\"message-time timeago js-mess-user-time\" title=\"";
            // line 47
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('date_format')->getCallable(), array($this->getAttribute((isset($context["message"]) ? $context["message"] : null), "created"))), "html", null, true);
            echo "\"></span>
\t            \t\t\t\t\t\t</span>
\t            \t\t\t\t\t</a>
\t            \t\t\t\t</li>
\t            \t\t\t\t";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "\t            \t\t\t</ul>
            \t\t\t</div>
            \t\t</div>
            \t</div>
            \t<div class=\"message-box-list js-mess-box\">
            \t\t<div class=\"mesasage-box-header\">
            \t\t\t<h3 class=\"message-box-name js-mess-username\"></h3>
            \t\t\t<div class=\"message-box-tools dropdown\">
            \t\t\t\t<a class=\"btn btn-yes dropdown-toggle tool-item\" data-toggle=\"dropdown\">
                                <i class=\"icon-gear\"></i>";
        // line 61
        echo gettext("Action");
        echo " <i class=\"icon-caret-down\"></i>
                           </a>
                           <a href=\"#\" data-mfp-src=\"#new-message-form\" class=\"btn btn-yes tool-item link-popup\">
                           \t\t<i class=\"icon-plus-sign\"></i> ";
        // line 64
        echo gettext("New Message");
        // line 65
        echo "                           \t</a>
                           <ul class=\"dropdown-menu\">
                                <li>
                                    <a href=\"#\"><i class=\"icon-remove\"></i> ";
        // line 68
        echo gettext("Remove");
        echo "</a>
                                </li>
                            </ul>
            \t\t\t</div>
            \t\t\t<div class=\"clear\"></div>
            \t\t</div>
            \t\t<div class=\"mesasage-box-body\">
            \t\t\t<div class=\"mesasage-box-container\">                            
            \t\t\t\t<ul class=\"js-mess-list-content\"></ul>
            \t\t\t</div>
                        <div class=\"message-waiting js-mess-loading hidden\">
                            <div class=\"waiting-bg\"><i class=\"icon-spinner icon-spin\"></i></div>
                        </div>                        
            \t\t</div>
          \t  \t\t<div class=\"mesasage-box-footer\">
            \t\t\t<textarea class=\"message-editor js-message-content\" placeholder=\"";
        // line 83
        echo gettext("Write a message");
        echo " ...\"></textarea>
            \t\t\t<div class=\"new-message-footer\">
            \t\t\t\t<a href=\"\" class=\"btn btn-yes btn-send btn-send-msg js-btn-message-send\">";
        // line 85
        echo gettext("Send");
        echo "</a>
            \t\t\t\t<label class=\"enter-option\">
            \t\t\t\t\t<input type=\"checkbox\" class=\"enter-check\" checked=\"checked\"> ";
        // line 87
        echo gettext("Press enter to send");
        // line 88
        echo "            \t\t\t\t</label>            \t\t\t\t
            \t\t\t</div>
            \t\t</div>
            \t</div>
            </div>
        </div>
\t</div>
</div>
";
    }

    // line 98
    public function block_template($context, array $blocks = array())
    {
        // line 99
        echo "    ";
        $this->displayBlock("common_html_block_message_detail_item", $context, $blocks);
        echo "
    ";
        // line 100
        $this->displayBlock("common_html_block_new_message_form", $context, $blocks);
        echo "
    ";
        // line 101
        $this->displayBlock("common_html_block_message_user_item", $context, $blocks);
        echo "
";
    }

    // line 104
    public function block_javascript($context, array $blocks = array())
    {
        // line 105
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("message.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
\$(document).ready(function() {
    \$(document).bind('LOAD_ROUTING_COMPLETE', function(e) {
        \$('.js-mess-user-list').find('.js-mess-user-item:first-child > .js-mess-user-link').trigger('click');
    });
});
</script>
";
    }

    public function getTemplateName()
    {
        return "default/template/account/message.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  269 => 105,  266 => 104,  260 => 101,  256 => 100,  251 => 99,  248 => 98,  236 => 88,  234 => 87,  229 => 85,  224 => 83,  206 => 68,  201 => 65,  199 => 64,  193 => 61,  182 => 52,  163 => 47,  158 => 45,  151 => 41,  144 => 39,  122 => 37,  119 => 36,  102 => 35,  93 => 29,  89 => 27,  85 => 25,  74 => 17,  68 => 13,  66 => 12,  63 => 11,  56 => 8,  53 => 7,  47 => 3,  14 => 5,);
    }
}
