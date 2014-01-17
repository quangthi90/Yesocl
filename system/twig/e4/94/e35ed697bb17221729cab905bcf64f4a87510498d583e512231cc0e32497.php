<?php

/* @template/default/template/account/profiles/tabs/information.tpl */
class __TwigTemplate_e494e35ed697bb17221729cab905bcf64f4a87510498d583e512231cc0e32497 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'profiles_tabs_information' => array($this, 'block_profiles_tabs_information'),
            'profiles_tabs_information_javascript' => array($this, 'block_profiles_tabs_information_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('profiles_tabs_information', $context, $blocks);
        // line 466
        echo "
";
        // line 467
        $this->displayBlock('profiles_tabs_information_javascript', $context, $blocks);
    }

    // line 1
    public function block_profiles_tabs_information($context, array $blocks = array())
    {
        // line 2
        echo "<div id=\"profiles-tabs-information\" class=\"profiles-tabs\" data-url=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileEditInfo")), "html", null, true);
        echo "\">
\t<div class=\"profiles-tabs-header\">
\t\t<div class=\"profiles-tabs-title\"><i class=\"icon-list\"></i> ";
        // line 4
        echo gettext("Basic Information");
        echo "</div>
\t</div>
\t<div class=\"profiles-tabs-main\">
\t\t<div class=\"row-fluid profile-label\">
\t\t\t<div class=\"profiles-tabs-main-header\">
\t\t\t\t<a class=\"profiles-btn-edit viewers btn profiles-btn pull-right\"><i class=\"icon-pencil\"></i></a>
\t\t\t\t<div class=\"clear\"></div>
\t\t\t</div>
\t\t\t<div class=\"profiles-tabs-main-body\">
\t\t\t\t<div class=\"basic-profiles-item\">
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 15
        echo gettext("Username");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9\"><span class=\"profiles-tabs-value viewers\">";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
        echo "</span></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 19
        echo gettext("Fullname");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9\"><span class=\"profiles-tabs-value viewers\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "fullname"), "html", null, true);
        echo "</span></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 23
        echo gettext("Email");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t\t";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "emails"));
        foreach ($context['_seq'] as $context["_key"] => $context["email"]) {
            // line 27
            echo "\t\t\t\t\t\t\t\t<div class=\"email-item ";
            if ($this->getAttribute((isset($context["email"]) ? $context["email"] : null), "primary")) {
                echo "email-primary";
            }
            echo "\">
\t\t\t\t\t\t\t\t<span class=\"label ";
            // line 28
            if ($this->getAttribute((isset($context["email"]) ? $context["email"] : null), "primary")) {
                echo "label-success";
            }
            echo "\"><i class=\"icon-envelope\"></i></span>
\t\t\t\t\t\t\t\t<span class=\"profiles-tabs-value viewers\">";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["email"]) ? $context["email"] : null), "email"), "html", null, true);
            echo "</span> 
\t\t\t\t\t\t\t\t</div>
\t\t\t        \t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['email'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 36
        echo gettext("Phone");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t\t";
        // line 39
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "phones"));
        foreach ($context['_seq'] as $context["_key"] => $context["phone"]) {
            // line 40
            echo "\t\t\t\t\t\t\t\t<div class=\"phones-item\">
\t\t\t\t\t\t\t\t\t<span><i class=\"icon-phone\"></i></span>
\t\t\t\t\t\t\t\t\t<span>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phone"]) ? $context["phone"] : null), "phone"), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t        \t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['phone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 49
        echo gettext("Gender");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9\"><span class=\"profiles-tabs-value viewers\">";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "sext"), "html", null, true);
        echo "</span></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 53
        echo gettext("Birthday");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9\"><span class=\"profiles-tabs-value viewers\">";
        // line 54
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "birthday") != null)) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "birthday"), "d/m/Y"), "html", null, true);
        }
        echo "</span></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 57
        echo gettext("Address");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9\"><span class=\"profiles-tabs-value viewers\">";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "address"), "html", null, true);
        echo "</span></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 61
        echo gettext("Living");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9\"><span class=\"profiles-tabs-value viewers\">";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "location"), "html", null, true);
        echo "</span></div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 65
        echo gettext("Industry");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9\"><span class=\"profiles-tabs-value viewers\">";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "industry"), "html", null, true);
        echo "</span></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"row-fluid profile-form hidden\" data-url=\"";
        // line 71
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileEditInfo")), "html", null, true);
        echo "\">
\t\t\t<div class=\"profiles-tabs-main-header\">
\t\t\t\t<a class=\"profiles-btn-cancel btn profiles-btn pull-right\">
\t\t\t\t\t<i class=\"icon-mail-forward\"></i>
\t\t\t\t</a>
\t\t\t\t<a class=\"profiles-btn-save btn profiles-btn pull-right\">
\t\t\t\t\t<i class=\"icon-save\"></i>
\t\t\t\t</a>
\t\t\t\t<div class=\"clear\"></div>
\t\t\t</div>
\t\t\t<div class=\"profiles-tabs-main-body\">
\t\t\t\t<div class=\"basic-profiles-form\" 
\t\t\t\t\tdata-url=\"";
        // line 83
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileEditInfo")), "html", null, true);
        echo "\">
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 85
        echo gettext("Username");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9 control-group\" data-url=\"";
        // line 86
        echo twig_escape_filter($this->env, (isset($context["link_validate_username"]) ? $context["link_validate_username"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t<input class=\"span5\" type=\"text\" placeholder=\"Username\" name=\"username\" value=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username"), "html", null, true);
        echo "\" required=\"required\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 91
        echo gettext("Fullname");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t\t<span class=\"control-group\" data-url=\"";
        // line 93
        echo twig_escape_filter($this->env, (isset($context["link_validate_firstname"]) ? $context["link_validate_firstname"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t<input class=\"span3\" type=\"text\" placeholder=\"Firstname\" name=\"firstname\" value=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "firstname"), "html", null, true);
        echo "\" required=\"required\" />
\t\t\t\t\t\t\t</span> 
\t\t\t\t\t\t\t<span class=\"control-group\" data-url=\"";
        // line 96
        echo twig_escape_filter($this->env, (isset($context["link_validate_lastname"]) ? $context["link_validate_lastname"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t<input class=\"span2\" type=\"text\" placeholder=\"Lastname\" name=\"lastname\" value=\"";
        // line 97
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "lastname"), "html", null, true);
        echo "\" required=\"required\" />
\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid profile-content-set\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 102
        echo gettext("Email");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t\t";
        // line 105
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "emails"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["email"]) {
            // line 106
            echo "\t\t\t\t\t\t\t\t<div class=\"emails-form control-group ";
            if (($this->getAttribute((isset($context["email"]) ? $context["email"] : null), "primary") == 1)) {
                echo "email-primary";
            }
            echo "\" 
\t\t\t\t\t\t\t\t\tdata-primary=\"";
            // line 107
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["email"]) ? $context["email"] : null), "primary"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t<input class=\"span5 email\" type=\"text\" placeholder=\"Email\" name=\"emails[";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0"), "html", null, true);
            echo "][email]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["email"]) ? $context["email"] : null), "email"), "html", null, true);
            echo "\" />
\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"emails[";
            // line 109
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0"), "html", null, true);
            echo "][primary]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["email"]) ? $context["email"] : null), "primary"), "html", null, true);
            echo "\" class=\"primary\" /> 
\t\t\t\t\t\t\t\t\t<span class=\"label primary-email-btn ";
            // line 110
            if (($this->getAttribute((isset($context["email"]) ? $context["email"] : null), "primary") == 1)) {
                echo "label-success";
            }
            echo "\">primary</span> 
\t\t\t\t\t\t\t\t\t<a class=\"btn btn-danger btn-remove emails-btn-remove\" href=\"#\"><i class=\"icon-trash\"></i></a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['email'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 114
        echo "\t\t\t\t\t\t\t\t<a class=\"btn btn-add emails-btn-add\" href=\"#\" data-index=\"";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "emails")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t<i class=\"icon-plus\"></i> <i class=\"icon-envelope\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid profile-content-set\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 121
        echo gettext("Phone");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t\t";
        // line 124
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "phones"));
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
        foreach ($context['_seq'] as $context["_key"] => $context["phone"]) {
            // line 125
            echo "\t\t\t\t\t\t\t\t<div class=\"phones-form control-group\" 
\t\t\t\t\t\t\t\t\tdata-id=\"";
            // line 126
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phone"]) ? $context["phone"] : null), "id"), "html", null, true);
            echo "\" 
\t\t\t\t\t\t\t\t\tdata-type=\"";
            // line 127
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phone"]) ? $context["phone"] : null), "type"), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t<input class=\"span5 phone\" type=\"text\" placeholder=\"Input Text\" name=\"phones[";
            // line 128
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0"), "html", null, true);
            echo "][phone]\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phone"]) ? $context["phone"] : null), "phone"), "html", null, true);
            echo "\" required=\"required\" data-format=\"+84 dddd ddd dddd\" /> 
\t\t\t\t\t\t\t\t\t<select class=\"span3 type\" name=\"phones[";
            // line 129
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["loop"]) ? $context["loop"] : null), "index0"), "html", null, true);
            echo "][type]\">
\t\t\t\t\t\t\t\t\t";
            // line 130
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["phone_types"]) ? $context["phone_types"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["phonetype"]) {
                // line 131
                echo "\t\t\t\t\t\t\t\t\t\t<option ";
                if (($this->getAttribute((isset($context["phone"]) ? $context["phone"] : null), "type") == $this->getAttribute((isset($context["phonetype"]) ? $context["phonetype"] : null), "code"))) {
                    echo "selected=\"selected\"";
                }
                echo " value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonetype"]) ? $context["phonetype"] : null), "code"), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonetype"]) ? $context["phonetype"] : null), "text"), "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['phonetype'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 133
            echo "\t\t\t\t\t\t\t\t\t</select> 
\t\t\t\t\t\t\t\t\t<a class=\"btn btn-danger btn-remove phones-btn-remove\" href=\"#\"><i class=\"icon-trash\"></i></a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['phone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        echo "\t\t\t\t\t\t\t\t<a class=\"btn btn-add phones-btn-add\" href=\"#\" data-index=\"";
        echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "phones")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t<i class=\"icon-plus\"></i> <i class=\"icon-phone\"></i>
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 144
        echo gettext("Address");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9 control-group\">
\t\t\t\t\t\t\t<input class=\"span5\" type=\"text\" placeholder=\"Address\" name=\"address\" value=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "address"), "html", null, true);
        echo "\" required=\"required\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 150
        echo gettext("Living");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9 control-group\" data-autocomplete=\"";
        // line 151
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("LocationAutoComplete")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t<input class=\"span5\" type=\"text\" placeholder=\"Living\" name=\"location\" value=\"";
        // line 152
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "location"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"cityid\" value=\"";
        // line 153
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "cityid"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 157
        echo gettext("Industry");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9 control-group\" data-autocomplete=\"";
        // line 158
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("IndustryAutoComplete")), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t<input class=\"span5\" type=\"text\" placeholder=\"Industry\" name=\"industry\" value=\"";
        // line 159
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "industry"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t\t<input type=\"hidden\" name=\"industryid\" value=\"";
        // line 160
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "industryid"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>\t\t\t\t\t
\t\t\t\t\t<div class=\"row-fluid inputBirthday\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 164
        echo gettext("Birthday");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9 bfh-datepicker\" data-format=\"d/m/y\" data-date=\"";
        // line 165
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "birthday"), "d/m/Y"), "html", null, true);
        echo "\">
\t\t\t\t\t\t  \t<div class=\"input-prepend bfh-datepicker-toggle control-group\" data-toggle=\"bfh-datepicker\">
\t\t\t\t\t\t    \t<span class=\"add-on btn\"><i class=\"icon-calendar\"></i></span>
\t\t\t\t\t\t    \t<input type=\"text\" name=\"birthday\" class=\"input-medium\" value=\"";
        // line 168
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "birthday") != null)) {
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "birthday"), "d/m/Y"), "html", null, true);
        }
        echo "\" readonly />
\t\t\t\t\t\t  \t</div>
\t\t\t\t\t\t  \t<div class=\"bfh-datepicker-calendar\">
\t\t\t\t\t\t    \t<table class=\"calendar table table-bordered\">
\t\t\t\t\t\t      \t\t<thead>
\t\t\t\t\t\t\t\t        <tr class=\"months-header\">
\t\t\t\t\t\t\t\t          \t<th class=\"month\" colspan=\"4\">
\t\t\t\t\t\t\t\t            \t<a class=\"previous\" href=\"#\"><i class=\"icon-chevron-left\"></i></a>
\t\t\t\t\t\t\t\t            \t<span></span>
\t\t\t\t\t\t\t\t            \t<a class=\"next\" href=\"#\"><i class=\"icon-chevron-right\"></i></a>
\t\t\t\t\t\t\t\t          \t</th>
\t\t\t\t\t\t\t\t          \t<th class=\"year\" colspan=\"3\">
\t\t\t\t\t\t\t\t            \t<a class=\"previous\" href=\"#\"><i class=\"icon-chevron-left\"></i></a>
\t\t\t\t\t\t\t\t            \t<span></span>
\t\t\t\t\t\t\t\t            \t<a class=\"next\" href=\"#\"><i class=\"icon-chevron-right\"></i></a>
\t\t\t\t\t\t\t\t          \t</th>
\t\t\t\t\t\t\t\t        </tr>
\t\t\t\t\t\t\t\t        <tr class=\"days-header\">
\t\t\t\t\t\t\t\t        </tr>
\t\t\t\t\t\t      \t\t</thead>
\t\t\t\t\t\t      \t\t<tbody>
\t\t\t\t\t\t      \t\t</tbody>
\t\t\t\t\t\t    \t</table>
\t\t\t\t\t\t  \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 195
        echo gettext("Gender");
        echo "</div>
\t\t\t\t\t\t<div class=\"span9 control-group\">
\t\t\t\t\t\t\t<select class=\"span5\" name=\"gender\">
\t\t\t\t\t\t\t\t";
        // line 198
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "sex") == 1)) {
            // line 199
            echo "\t\t\t\t\t\t\t\t<option value=\"1\" selected=\"selected\">";
            echo gettext("Male");
            echo "</option>
\t\t\t\t\t\t\t\t<option value=\"0\">";
            // line 200
            echo gettext("Female");
            echo "</option>
\t\t\t\t\t\t\t\t";
        } else {
            // line 202
            echo "\t\t\t\t\t\t\t\t<option value=\"1\">";
            echo gettext("Male");
            echo "</option>
\t\t\t\t\t\t\t\t<option value=\"0\" selected=\"selected\">";
            // line 203
            echo gettext("Female");
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        // line 205
        echo "\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"clear\"></div>
\t</div>
</div>
<script id=\"profiles-form\" type=\"text/x-jquery-tmpl\">
\t<div class=\"row-fluid profile-form hidden\" data-url=\"";
        // line 215
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("ProfileEditInfo")), "html", null, true);
        echo "\">
\t\t<div class=\"profiles-tabs-main-header\">
\t\t\t<a class=\"profiles-btn-cancel btn profiles-btn pull-right\">
\t\t\t\t<i class=\"icon-mail-forward\"></i>
\t\t\t</a>
\t\t\t<a class=\"profiles-btn-save btn profiles-btn pull-right\">
\t\t\t\t<i class=\"icon-save\"></i>
\t\t\t</a>
\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t\t<div class=\"profiles-tabs-main-body\">
\t\t\t<div class=\"basic-profiles-form\">
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 228
        echo gettext("Username");
        echo "</div>
\t\t\t\t\t<div class=\"span9 control-group\" data-url=\"";
        // line 229
        echo twig_escape_filter($this->env, (isset($context["link_validate_username"]) ? $context["link_validate_username"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t<input class=\"span5\" type=\"text\" placeholder=\"Input Text\" name=\"username\" value=\"\${ username }\" required=\"required\" />
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 234
        echo gettext("Fullname");
        echo "</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<span class=\"control-group\" data-url=\"";
        // line 236
        echo twig_escape_filter($this->env, (isset($context["link_validate_firstname"]) ? $context["link_validate_firstname"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t<input class=\"span3\" type=\"text\" placeholder=\"Input Text\" name=\"firstname\" value=\"\${ firstname }\" required=\"required\" />
\t\t\t\t\t\t</span> 
\t\t\t\t\t\t<span class=\"control-group\" data-url=\"";
        // line 239
        echo twig_escape_filter($this->env, (isset($context["link_validate_lastname"]) ? $context["link_validate_lastname"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t<input class=\"span2\" type=\"text\" placeholder=\"Input Text\" name=\"lastname\" value=\"\${ lastname }\" required=\"required\" />
\t\t\t\t\t\t</span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid profile-content-set\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 245
        echo gettext("Email");
        echo "</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t";
        // line 248
        $context["email_loop"] = "{{each emails}}";
        // line 249
        echo "\t\t\t\t\t\t\t";
        $context["email_loop_end"] = "{{/each}}";
        // line 250
        echo "\t\t\t\t\t\t\t";
        $context["primary_if"] = "{{if \$value.primary == 1}}";
        // line 251
        echo "\t\t\t\t\t\t\t";
        $context["primary_if_end"] = "{{/if}}";
        // line 252
        echo "\t\t\t\t\t\t\t";
        echo twig_escape_filter($this->env, (isset($context["email_loop"]) ? $context["email_loop"] : null), "html", null, true);
        echo "
\t\t\t\t\t\t\t<div class=\"emails-form control-group ";
        // line 253
        echo twig_escape_filter($this->env, (isset($context["primary_if"]) ? $context["primary_if"] : null), "html", null, true);
        echo "email-primary";
        echo twig_escape_filter($this->env, (isset($context["primary_if_end"]) ? $context["primary_if_end"] : null), "html", null, true);
        echo "\" 
\t\t\t\t\t\t\t\tdata-primary=\"\${ \$value.primary }\" 
\t\t\t\t\t\t\t\tdata-url=\"";
        // line 255
        echo twig_escape_filter($this->env, (isset($context["link_validate_email"]) ? $context["link_validate_email"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t<input class=\"span5 email\" type=\"text\" placeholder=\"Input Text\" name=\"emails[\${ \$index }][email]\" value=\"\${ \$value.email }\" />
\t\t\t\t\t\t\t\t<input class=\"primary\" type=\"hidden\" name=\"emails[\${ \$index }][primary]\" value=\"\${ \$value.primary }\" required=\"required\" /> 
\t\t\t\t\t\t\t\t<span class=\"label primary-email-btn ";
        // line 258
        echo twig_escape_filter($this->env, (isset($context["primary_if"]) ? $context["primary_if"] : null), "html", null, true);
        echo "label-success";
        echo twig_escape_filter($this->env, (isset($context["primary_if_end"]) ? $context["primary_if_end"] : null), "html", null, true);
        echo "\">primary</span> 
\t\t\t\t\t\t\t\t<a class=\"btn btn-danger btn-remove emails-btn-remove\" href=\"#\"><i class=\"icon-trash\"></i></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        // line 261
        echo twig_escape_filter($this->env, (isset($context["email_loop_end"]) ? $context["email_loop_end"] : null), "html", null, true);
        echo "
\t\t\t\t\t\t\t<a class=\"btn btn-add emails-btn-add \" href=\"#\" data-index=\"\${ Object.keys(emails).length }\">
\t\t\t\t\t\t\t\t<i class=\"icon-plus\"></i> <i class=\"icon-envelope\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid profile-content-set\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 269
        echo gettext("Phone");
        echo "</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t";
        // line 272
        $context["phone_loop"] = "{{each phones}}";
        // line 273
        echo "\t\t\t\t\t\t\t";
        $context["phone_loop_end"] = "{{/each}}";
        // line 274
        echo "\t\t\t\t\t\t\t";
        echo twig_escape_filter($this->env, (isset($context["phone_loop"]) ? $context["phone_loop"] : null), "html", null, true);
        echo "
\t\t\t\t\t\t\t<div class=\"phones-form control-group\" 
\t\t\t\t\t\t\t\tdata-id=\"\${ \$value.id }\" 
\t\t\t\t\t\t\t\tdata-type=\"\${ \$value.type }\" 
\t\t\t\t\t\t\t\tdata-url=\"";
        // line 278
        echo twig_escape_filter($this->env, (isset($context["link_validate_phone"]) ? $context["link_validate_phone"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t<input class=\"span5 phone\" type=\"text\" placeholder=\"Input Text\" name=\"phones[\${ \$index }][phone]\" value=\"\${ \$value.phone }\" required=\"required\" /> 
\t\t\t\t\t\t\t\t<select class=\"span3 type\" name=\"phones[\${ \$index }][type]\">
\t\t\t\t\t\t\t\t";
        // line 281
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["phone_types"]) ? $context["phone_types"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["phonetype"]) {
            // line 282
            echo "\t\t\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonetype"]) ? $context["phonetype"] : null), "code"), "html", null, true);
            echo "\" ";
            echo "{{if \$value.type == '";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonetype"]) ? $context["phonetype"] : null), "code"), "html", null, true);
            echo "'}}";
            echo "selected=\"selected\"";
            echo "{{/if}}";
            echo ">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonetype"]) ? $context["phonetype"] : null), "text"), "html", null, true);
            echo "</option>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['phonetype'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 284
        echo "\t\t\t\t\t\t\t\t</select> 
\t\t\t\t\t\t\t\t<a class=\"btn btn-danger btn-remove phones-btn-remove\" href=\"#\"><i class=\"icon-trash\"></i></a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        // line 287
        echo twig_escape_filter($this->env, (isset($context["phone_loop_end"]) ? $context["phone_loop_end"] : null), "html", null, true);
        echo "
\t\t\t\t\t\t\t<a class=\"btn btn-add phones-btn-add\" href=\"#\" data-index=\"\${ Object.keys(phones).length }\">
\t\t\t\t\t\t\t\t<i class=\"icon-plus\"></i> <i class=\"icon-phone\"></i>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 295
        echo gettext("Gender");
        echo "</div>
\t\t\t\t\t<div class=\"span9 control-group\" data-url=\"";
        // line 296
        echo twig_escape_filter($this->env, (isset($context["link_validate_sex"]) ? $context["link_validate_sex"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t<select class=\"span5\" name=\"sex\">
\t\t\t\t\t\t\t<option value=\"1\">Male</option>
\t\t\t\t\t\t\t<option value=\"0\">Female</option>
\t\t\t\t\t\t</select>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid inputBirthday\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 304
        echo gettext("Birthday");
        echo "</div>
\t\t\t\t\t<div class=\"span9 bfh-datepicker\" data-format=\"d/m/y\" data-date=\"\${ birthday }\">
\t\t\t\t\t  \t<div class=\"input-prepend bfh-datepicker-toggle control-group\" data-toggle=\"bfh-datepicker\" data-url=\"";
        // line 306
        echo twig_escape_filter($this->env, (isset($context["link_validate_birthday"]) ? $context["link_validate_birthday"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t    \t<span class=\"add-on btn\"><i class=\"icon-calendar\"></i></span>
\t\t\t\t\t    \t<input type=\"text\" name=\"birthday\" class=\"input-medium\" value=\"\${ birthday }\" readonly />
\t\t\t\t\t  \t</div>
\t\t\t\t\t  \t<div class=\"bfh-datepicker-calendar\">
\t\t\t\t\t    \t<table class=\"calendar table table-bordered\">
\t\t\t\t\t      \t\t<thead>
\t\t\t\t\t\t\t        <tr class=\"months-header\">
\t\t\t\t\t\t\t          \t<th class=\"month\" colspan=\"4\">
\t\t\t\t\t\t\t            \t<a class=\"previous\" href=\"#\"><i class=\"icon-chevron-left\"></i></a>
\t\t\t\t\t\t\t            \t<span></span>
\t\t\t\t\t\t\t            \t<a class=\"next\" href=\"#\"><i class=\"icon-chevron-right\"></i></a>
\t\t\t\t\t\t\t          \t</th>
\t\t\t\t\t\t\t          \t<th class=\"year\" colspan=\"3\">
\t\t\t\t\t\t\t            \t<a class=\"previous\" href=\"#\"><i class=\"icon-chevron-left\"></i></a>
\t\t\t\t\t\t\t            \t<span></span>
\t\t\t\t\t\t\t            \t<a class=\"next\" href=\"#\"><i class=\"icon-chevron-right\"></i></a>
\t\t\t\t\t\t\t          \t</th>
\t\t\t\t\t\t\t        </tr>
\t\t\t\t\t\t\t        <tr class=\"days-header\">
\t\t\t\t\t\t\t        </tr>
\t\t\t\t\t      \t\t</thead>
\t\t\t\t\t      \t\t<tbody>
\t\t\t\t\t      \t\t</tbody>
\t\t\t\t\t    \t</table>
\t\t\t\t\t  \t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 335
        echo gettext("Address");
        echo "</div>
\t\t\t\t\t<div class=\"span9 control-group\" data-url=\"";
        // line 336
        echo twig_escape_filter($this->env, (isset($context["link_validate_address"]) ? $context["link_validate_address"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t<input class=\"span5\" type=\"text\" placeholder=\"Input Text\" name=\"address\" value=\"\${ address }\" required=\"required\" />
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 341
        echo gettext("Living");
        echo "</div>
\t\t\t\t\t<div class=\"span9 control-group\" data-autocomplete=\"";
        // line 342
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("LocationAutoComplete")), "html", null, true);
        echo "\">
\t\t\t\t\t\t<input class=\"span5\" type=\"text\" placeholder=\"Input Text\" name=\"location\" value=\"\${ location }\" />
\t\t\t\t\t\t<input type=\"hidden\" name=\"cityid\" value=\"\${ cityid }\" />
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 348
        echo gettext("Industry");
        echo "</div>
\t\t\t\t\t<div class=\"span9 control-group\" data-autocomplete=\"";
        // line 349
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("IndustryAutoComplete")), "html", null, true);
        echo "\">
\t\t\t\t\t\t<input class=\"span5\" type=\"text\" placeholder=\"Input Text\" name=\"industry\" value=\"\${ industry }\" />
\t\t\t\t\t\t<input type=\"hidden\" name=\"industryid\" value=\"\${ industryid }\" />
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</script>
<script id=\"profiles-phone-form\" type=\"text/x-jquery-tmpl\">
    <div class=\"phones-form control-group\" data-url=\"";
        // line 359
        echo twig_escape_filter($this->env, (isset($context["link_validate_phone"]) ? $context["link_validate_phone"] : null), "html", null, true);
        echo "\">
    \t<input class=\"span5 phone\" type=\"text\" placeholder=\"Input Text\" name=\"phones[\${ index }][phone]\"/> 
    \t<select class=\"span3 type\" name=\"phones[\${ index }][type]\">
    \t";
        // line 362
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["phone_types"]) ? $context["phone_types"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["phonetype"]) {
            // line 363
            echo "    \t\t<option value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonetype"]) ? $context["phonetype"] : null), "code"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["phonetype"]) ? $context["phonetype"] : null), "text"), "html", null, true);
            echo "</option>
    \t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['phonetype'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 365
        echo "    \t</select> 
    \t<a class=\"btn btn-danger btn-remove phones-btn-remove\" href=\"#\"><i class=\"icon-trash\"></i></a>
    </div>
</script>
<script id=\"profiles-email-form\" type=\"text/x-jquery-tmpl\">
    <div class=\"emails-form control-group\" data-url=\"";
        // line 370
        echo twig_escape_filter($this->env, (isset($context["link_validate_email"]) ? $context["link_validate_email"] : null), "html", null, true);
        echo "\">
    \t<input class=\"span5 email\" type=\"text\" placeholder=\"Input Text\" name=\"emails[\${ index }][email]\" value=\"\" />
    \t<input class=\"primary\" type=\"hidden\" name=\"emails[\${ index }][primary]\" value=\"0\" /> 
    \t<span class=\"label primary-email-btn\">";
        // line 373
        echo gettext("primary");
        echo "</span> 
    \t<a class=\"btn btn-danger btn-remove emails-btn-remove\" href=\"#\"><i class=\"icon-trash\"></i></a>
    </div>
</script>
<script id=\"profiles-label\" type=\"text/x-jquery-tmpl\">
\t<div class=\"row-fluid profile-label\">
\t\t<div class=\"profiles-tabs-main-header\">
\t\t\t<a class=\"profiles-btn-edit viewers btn profiles-btn pull-right\"><i class=\"icon-pencil\"></i></a>
\t\t\t<div class=\"clear\"></div>
\t\t</div>
\t\t<div class=\"profiles-tabs-main-body\">
\t\t\t<div class=\"basic-profiles-item\">
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 386
        echo gettext("Username");
        echo "</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<span class=\"profiles-tabs-value viewers\">\${ username }</span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 392
        echo gettext("Fullname");
        echo "</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<span class=\"profiles-tabs-value viewers\">\${ fullname }</span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 398
        echo gettext("Email");
        echo "</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t";
        // line 401
        $context["email_loop"] = "{{each emails}}";
        // line 402
        echo "\t\t\t\t\t\t\t";
        $context["email_loop_end"] = "{{/each}}";
        // line 403
        echo "\t\t\t\t\t\t\t";
        $context["primary_if"] = "{{if \$value.primary == 1}}";
        // line 404
        echo "\t\t\t\t\t\t\t";
        $context["primary_if_end"] = "{{/if}}";
        // line 405
        echo "\t\t\t\t\t\t\t";
        echo twig_escape_filter($this->env, (isset($context["email_loop"]) ? $context["email_loop"] : null), "html", null, true);
        echo "
\t\t\t\t\t\t\t<div class=\"email-item ";
        // line 406
        echo twig_escape_filter($this->env, (isset($context["primary_if"]) ? $context["primary_if"] : null), "html", null, true);
        echo "email-primary";
        echo twig_escape_filter($this->env, (isset($context["primary_if_end"]) ? $context["primary_if_end"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t<span class=\"label ";
        // line 407
        echo twig_escape_filter($this->env, (isset($context["primary_if"]) ? $context["primary_if"] : null), "html", null, true);
        echo "label-success";
        echo twig_escape_filter($this->env, (isset($context["primary_if_end"]) ? $context["primary_if_end"] : null), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t<i class=\"icon-envelope\"></i>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<span class=\"profiles-tabs-value viewers\">\${ \$value.email }</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        // line 412
        echo twig_escape_filter($this->env, (isset($context["email_loop_end"]) ? $context["email_loop_end"] : null), "html", null, true);
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 417
        echo gettext("Phone");
        echo "</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t\t\t";
        // line 420
        $context["phone_loop"] = "{{each phones}}";
        // line 421
        echo "\t\t\t\t\t\t\t";
        $context["phone_loop_end"] = "{{/each}}";
        // line 422
        echo "\t\t\t\t\t\t\t";
        echo twig_escape_filter($this->env, (isset($context["phone_loop"]) ? $context["phone_loop"] : null), "html", null, true);
        echo "\t\t\t\t\t
\t\t\t\t\t\t\t<div class=\"phones-item\">
\t\t\t\t\t\t\t\t<span><i class=\"icon-phone\"></i></span>
\t\t\t\t\t\t\t\t<span>\${ \$value.phone }</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        // line 427
        echo twig_escape_filter($this->env, (isset($context["phone_loop_end"]) ? $context["phone_loop_end"] : null), "html", null, true);
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 432
        echo gettext("Gender");
        echo "</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<span class=\"profiles-tabs-value viewers\">\${ sext }</span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 438
        echo gettext("Birthday");
        echo "</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<span class=\"profiles-tabs-value viewers\">\${ birthdayt }</span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 444
        echo gettext("Address");
        echo "</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<span class=\"profiles-tabs-value viewers\">\${ address }</span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 450
        echo gettext("Living");
        echo "</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<span class=\"profiles-tabs-value viewers\">\${ location }</span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span2 offset1\">";
        // line 456
        echo gettext("Industry");
        echo "</div>
\t\t\t\t\t<div class=\"span9\">
\t\t\t\t\t\t<span class=\"profiles-tabs-value viewers\">\${ industry }</span>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</script>
";
    }

    // line 467
    public function block_profiles_tabs_information_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "@template/default/template/account/profiles/tabs/information.tpl";
    }

    public function getDebugInfo()
    {
        return array (  1008 => 467,  994 => 456,  985 => 450,  976 => 444,  967 => 438,  958 => 432,  950 => 427,  941 => 422,  938 => 421,  936 => 420,  930 => 417,  922 => 412,  912 => 407,  906 => 406,  901 => 405,  898 => 404,  895 => 403,  892 => 402,  890 => 401,  884 => 398,  875 => 392,  866 => 386,  850 => 373,  844 => 370,  837 => 365,  826 => 363,  822 => 362,  816 => 359,  803 => 349,  799 => 348,  790 => 342,  786 => 341,  778 => 336,  774 => 335,  742 => 306,  737 => 304,  726 => 296,  722 => 295,  711 => 287,  706 => 284,  689 => 282,  685 => 281,  679 => 278,  671 => 274,  668 => 273,  666 => 272,  660 => 269,  649 => 261,  641 => 258,  635 => 255,  628 => 253,  623 => 252,  620 => 251,  617 => 250,  614 => 249,  612 => 248,  606 => 245,  597 => 239,  591 => 236,  586 => 234,  578 => 229,  574 => 228,  558 => 215,  546 => 205,  541 => 203,  536 => 202,  531 => 200,  526 => 199,  524 => 198,  518 => 195,  486 => 168,  480 => 165,  476 => 164,  469 => 160,  465 => 159,  461 => 158,  457 => 157,  450 => 153,  446 => 152,  442 => 151,  438 => 150,  431 => 146,  426 => 144,  415 => 137,  398 => 133,  383 => 131,  379 => 130,  375 => 129,  369 => 128,  365 => 127,  361 => 126,  358 => 125,  341 => 124,  335 => 121,  324 => 114,  304 => 110,  298 => 109,  292 => 108,  288 => 107,  281 => 106,  264 => 105,  258 => 102,  250 => 97,  246 => 96,  241 => 94,  237 => 93,  232 => 91,  225 => 87,  221 => 86,  217 => 85,  212 => 83,  197 => 71,  189 => 66,  185 => 65,  179 => 62,  175 => 61,  169 => 58,  165 => 57,  157 => 54,  153 => 53,  147 => 50,  143 => 49,  137 => 45,  128 => 42,  114 => 36,  108 => 32,  99 => 29,  93 => 28,  86 => 27,  82 => 26,  76 => 23,  70 => 20,  66 => 19,  60 => 16,  56 => 15,  42 => 4,  36 => 2,  33 => 1,  29 => 467,  26 => 466,  24 => 1,  124 => 40,  120 => 39,  116 => 26,  112 => 25,  107 => 24,  104 => 23,  96 => 18,  92 => 17,  88 => 15,  85 => 14,  79 => 11,  74 => 10,  71 => 9,  64 => 7,  28 => 5,  21 => 4,  14 => 3,);
    }
}
