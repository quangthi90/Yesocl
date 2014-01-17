<?php

/* default/template/common/search.tpl */
class __TwigTemplate_0c13a9a50862b2feb23ea9d7e6a354173f526ea7bf48f858174053761a81008a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("@template/default/template/common/layout.tpl");

        $_trait_0 = $this->env->loadTemplate("@template/default/template/common/html_block.tpl");
        // line 3
        if (!$_trait_0->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/common/html_block.tpl".'" cannot be used as a trait.');
        }
        $_trait_0_blocks = $_trait_0->getBlocks();

        $_trait_1 = $this->env->loadTemplate("@template/default/template/friend/common/friend_list.tpl");
        // line 4
        if (!$_trait_1->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/friend/common/friend_list.tpl".'" cannot be used as a trait.');
        }
        $_trait_1_blocks = $_trait_1->getBlocks();

        $_trait_2 = $this->env->loadTemplate("@template/default/template/friend/common/friend_button.tpl");
        // line 5
        if (!$_trait_2->isTraitable()) {
            throw new Twig_Error_Runtime('Template "'."@template/default/template/friend/common/friend_button.tpl".'" cannot be used as a trait.');
        }
        $_trait_2_blocks = $_trait_2->getBlocks();

        $this->traits = array_merge(
            $_trait_0_blocks,
            $_trait_1_blocks,
            $_trait_2_blocks
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

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["users"]) ? $context["users"] : null), (isset($context["current_user_id"]) ? $context["current_user_id"] : null), array(), "array"), "username"), "html", null, true);
        echo " | Search ";
    }

    // line 9
    public function block_stylesheet($context, array $blocks = array())
    {
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo "<div id=\"y-content\">
    <div id=\"y-main-content\" class=\"has-horizontal search-page\">
        <div class=\"feed-block\" style=\"width: 100%;\">
            <div class=\"block-header\">
                <a class=\"block-title fl\" href=\"#\">Search</a>  
                <a class=\"block-seemore fl\" href=\"#\"> 
                    <i class=\"icon-angle-right\"></i>
                </a>
            </div>
            ";
        // line 22
        $context["numCategoryHasResult"] = 2;
        // line 23
        echo "            <div class=\"block-content search-container-";
        echo twig_escape_filter($this->env, (isset($context["numCategoryHasResult"]) ? $context["numCategoryHasResult"] : null), "html", null, true);
        echo "\">
                <div class=\"column search-category\">
                    <h3>People (";
        // line 25
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["users"]) ? $context["users"] : null)), "html", null, true);
        echo ")</h3>
                    <div class=\"search-result-container\">
                        ";
        // line 27
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 28
            echo "                            ";
            $context["friend"] = (isset($context["user"]) ? $context["user"] : null);
            // line 29
            echo "                            ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 31
        echo "                        ";
        $this->displayBlock("friend_common_friend_button_template", $context, $blocks);
        echo "
                    </div>
                </div>
                <div class=\"column search-category\">
                    <h3>Post (";
        // line 35
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["posts"]) ? $context["posts"] : null)), "html", null, true);
        echo ")</h3>
                    <div class=\"search-result-container\">
                        <ul>
                            ";
        // line 38
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 39
            echo "                            <li>
                                <a href=\"";
            // line 40
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostPage", array("post_type" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "type"), "post_slug" => $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "slug")))), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title"), "html", null, true);
            echo "\" class=\"data-detail\">
                                    <img src=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "image"), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title"), "html", null, true);
            echo "\" />
                                    <div class=\"data-meta-info\">
                                      <div class=\"data-name\">";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "title"), "html", null, true);
            echo "</div>
                                      <div class=\"data-more\">";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["post"]) ? $context["post"] : null), "metaInfo"), "html", null, true);
            echo "</div>
                                    </div>
                                </a>
                            </li>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "  
                        </ul>
                    </div>
                </div>
                ";
        // line 70
        echo "            </div>
        </div>
    </div>
</div>
";
    }

    // line 76
    public function block_javascript($context, array $blocks = array())
    {
        // line 77
        echo "    
";
    }

    public function getTemplateName()
    {
        return "default/template/common/search.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 77,  203 => 76,  195 => 70,  189 => 48,  178 => 44,  174 => 43,  167 => 41,  161 => 40,  158 => 39,  154 => 38,  148 => 35,  140 => 31,  123 => 29,  120 => 28,  103 => 27,  98 => 25,  92 => 23,  90 => 22,  79 => 13,  76 => 12,  71 => 9,  64 => 7,  28 => 5,  21 => 4,  14 => 3,);
    }
}
