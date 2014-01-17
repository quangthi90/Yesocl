<?php

/* @template/default/template/account/common/profile_column.tpl */
class __TwigTemplate_cbb20d70bda2797d987d7bae0601804604d4eaaeb52968677b4c9817c7c6684c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $_trait_0 = $this->env->loadTemplate("@template/default/template/friend/common/friend_button.tpl");
        // line 1
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/friend/common/friend_button.tpl".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $this->traits = $_trait_0_blocks;

        $this->blocks = array_merge(
            $this->traits,
            array(
                'common_profile_column' => array($this, 'block_common_profile_column'),
            )
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "
";
        // line 3
        $this->displayBlock('common_profile_column', $context, $blocks);
    }

    public function block_common_profile_column($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"free-block fl\" style=\"width: 180px;\">
        <div class=\"free-block-content\">
            <div class=\"user_info_overview\">
                <a href=\"";
        // line 7
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
        echo "\" class=\"user_info_avatar\">
                    <img src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "avatar"), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
        echo "\" />
                </a>
                <a href=\"";
        // line 10
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("WallPage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
        echo "\" class=\"user_info_name\"><i class=\"icon-";
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "gender") == 1)) {
            echo "male";
        } else {
            echo "female";
        }
        echo "\"></i> ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
        echo "</a>
                <div class=\"user_relationship\">
                    ";
        // line 12
        $context["fr_status"] = $this->getAttribute($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "fr_status"), "status");
        // line 13
        echo "                    ";
        $context["fr_slug"] = $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug");
        // line 14
        echo "                    ";
        $this->displayBlock("friend_common_friend_button", $context, $blocks);
        echo "
                    ";
        // line 15
        $this->displayBlock("friend_common_friend_button_template", $context, $blocks);
        echo "
                    <a href=\"#\" class=\"btn btn-yes\">
                        <i class=\"icon-random\"></i> ";
        // line 17
        echo gettext("Follow");
        // line 18
        echo "                    </a>
                    <a href=\"#\" class=\"btn btn-yes\">
                        <i class=\"icon-share-alt\"></i> ";
        // line 20
        echo gettext("Message");
        // line 21
        echo "                    </a>
                </div>                    
            </div>
            <ul class=\"user_actions\">
                <li>
                    <i class=\"icon-list-alt\"></i><a href=\"";
        // line 26
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfilePage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
        echo "\">";
        echo gettext("Profile");
        echo "</a>
                </li>
                <li>
                    <i class=\"icon-fire\"></i><a href=\"";
        // line 29
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("FriendPage", array("user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
        echo "\">";
        echo gettext("Friends");
        echo "</a>
                </li>
                <li>
                    <i class=\"icon-file-alt\"></i><a href=\"#\">";
        // line 32
        echo gettext("Posts");
        echo "</a>
                </li>
                <li>
                    <i class=\"icon-group\"></i><a href=\"#\">";
        // line 35
        echo gettext("Groups");
        echo "</a>
                </li>
                <li>
                    <i class=\"icon-tasks\"></i><a href=\"#\">";
        // line 38
        echo gettext("Activities");
        echo "</a>
                </li> 
            </ul>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/common/profile_column.tpl";
    }

    public function getDebugInfo()
    {
        return array (  131 => 38,  125 => 35,  119 => 32,  111 => 29,  103 => 26,  94 => 20,  90 => 18,  88 => 17,  78 => 14,  75 => 13,  53 => 8,  49 => 7,  38 => 3,  185 => 49,  182 => 48,  173 => 43,  170 => 42,  168 => 41,  161 => 38,  155 => 34,  152 => 33,  135 => 31,  114 => 29,  112 => 28,  102 => 20,  96 => 21,  91 => 16,  87 => 14,  84 => 13,  79 => 10,  72 => 8,  35 => 2,  28 => 5,  21 => 4,  14 => 1,  142 => 45,  138 => 44,  132 => 30,  126 => 40,  122 => 39,  116 => 38,  110 => 35,  106 => 34,  99 => 33,  93 => 17,  89 => 24,  83 => 15,  77 => 20,  73 => 12,  66 => 18,  63 => 17,  60 => 10,  46 => 49,  44 => 4,  34 => 8,  32 => 7,  25 => 2,  23 => 1,);
    }
}
