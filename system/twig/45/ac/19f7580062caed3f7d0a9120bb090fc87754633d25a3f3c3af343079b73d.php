<?php

/* default/template/friend/friend.tpl */
class __TwigTemplate_45ac19f7580062caed3f7d0a9120bb090fc87754633d25a3f3c3af343079b73d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@template/default/template/common/layout.tpl");

        $_trait_0 = $this->env->loadTemplate("@template/default/template/account/common/profile_column.tpl");
        // line 3
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/account/common/profile_column.tpl".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->env->loadTemplate("@template/default/template/friend/common/friend_list.tpl");
        // line 4
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/friend/common/friend_list.tpl".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $_trait_2 = $this->env->loadTemplate("@template/default/template/friend/common/friend_filter.tpl");
        // line 5
        if (!$_trait_2->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/friend/common/friend_filter.tpl".'" cannot be used as a trait.');
        }
        $_trait_2_blocks = $_trait_2->getBlocks();

        $_trait_3 = $this->env->loadTemplate("@template/default/template/friend/common/friend_button.tpl");
        // line 6
        if (!$_trait_3->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/friend/common/friend_button.tpl".'" cannot be used as a trait.');
        }
        $_trait_3_blocks = $_trait_3->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks,
            $_trait_2_blocks,
            $_trait_3_blocks
        );

        $this->blocks = array_merge(
            $this->traits,
            array(
                'title' => array($this, 'block_title'),
                'stylesheet' => array($this, 'block_stylesheet'),
                'body' => array($this, 'block_body'),
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

    // line 8
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["users"]) ? $context["users"] : null), (isset($context["current_user_id"]) ? $context["current_user_id"] : null), array(), "array"), "username"), "html", null, true);
        echo " | ";
        echo gettext("Friend Page");
        echo " ";
    }

    // line 10
    public function block_stylesheet($context, array $blocks = array())
    {
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "<div id=\"y-content\">
    <div id=\"y-main-content\" class=\"has-horizontal account-friend\">
        ";
        // line 16
        if (((isset($context["current_user_id"]) ? $context["current_user_id"] : null) != $this->getAttribute(call_user_func_array($this->env->getFunction('get_current_user')->getCallable(), array()), "id"))) {
            // line 17
            echo "            ";
            $context["user"] = $this->getAttribute((isset($context["users"]) ? $context["users"] : null), (isset($context["current_user_id"]) ? $context["current_user_id"] : null), array(), "array");
            // line 18
            echo "            ";
            $this->displayBlock("common_profile_column", $context, $blocks);
            echo "
        ";
        }
        // line 20
        echo "        <div class=\"feed-block\">
            <div class=\"block-header\">
                <a class=\"block-title fl\" href=\"#\">";
        // line 22
        echo gettext("Friend");
        echo "</a>  
                <a class=\"block-seemore fl\" href=\"#\"> 
                    <i class=\"icon-angle-right\"></i>
                </a>
            </div>
            <div class=\"block-content user-container\">
                ";
        // line 28
        if ((twig_length_filter($this->env, (isset($context["friend_ids"]) ? $context["friend_ids"] : null)) > 0)) {
            // line 29
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["friend_ids"]) ? $context["friend_ids"] : null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["friend_id"]) {
                // line 30
                echo "                        ";
                $context["friend"] = $this->getAttribute((isset($context["users"]) ? $context["users"] : null), (isset($context["friend_id"]) ? $context["friend_id"] : null), array(), "array");
                // line 31
                echo "                        ";
                $this->displayBlock("friend_common_friend_list", $context, $blocks);
                echo "
                    ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['friend_id'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "                ";
        } else {
            // line 34
            echo "                    <div class=\"empty-data\">
                        ";
            // line 35
            echo gettext("No friends found");
            // line 36
            echo "                    </div>
                ";
        }
        // line 38
        echo "                ";
        $this->displayBlock("friend_common_friend_button_template", $context, $blocks);
        echo "            
            </div>
        </div>
        ";
        // line 41
        $context["friend_count"] = twig_length_filter($this->env, (isset($context["friend_ids"]) ? $context["friend_ids"] : null));
        // line 42
        echo "        ";
        $context["user"] = $this->getAttribute((isset($context["users"]) ? $context["users"] : null), (isset($context["current_user_id"]) ? $context["current_user_id"] : null), array(), "array");
        // line 43
        echo "        ";
        $this->displayBlock("friend_common_friend_filter", $context, $blocks);
        echo "
    </div>
</div>
";
    }

    // line 48
    public function block_javascript($context, array $blocks = array())
    {
        // line 49
        echo "    ";
        $this->displayBlock("friend_common_friend_list_javascript", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/template/friend/friend.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  193 => 49,  190 => 48,  181 => 43,  178 => 42,  176 => 41,  169 => 38,  165 => 36,  163 => 35,  160 => 34,  157 => 33,  140 => 31,  137 => 30,  119 => 29,  117 => 28,  108 => 22,  104 => 20,  98 => 18,  95 => 17,  93 => 16,  89 => 14,  86 => 13,  81 => 10,  72 => 8,  35 => 6,  28 => 5,  21 => 4,  14 => 3,);
    }
}
