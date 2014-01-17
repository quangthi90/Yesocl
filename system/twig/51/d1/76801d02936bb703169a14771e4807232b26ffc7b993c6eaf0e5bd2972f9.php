<?php

/* @template/default/template/post/common/post_status_wall.tpl */
class __TwigTemplate_51d176801d02936bb703169a14771e4807232b26ffc7b993c6eaf0e5bd2972f9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'post_common_post_status_wall_style' => array($this, 'block_post_common_post_status_wall_style'),
            'post_common_post_status_wall' => array($this, 'block_post_common_post_status_wall'),
            'post_common_post_status_wall_html_template' => array($this, 'block_post_common_post_status_wall_html_template'),
            'post_common_post_status_wall_javascript' => array($this, 'block_post_common_post_status_wall_javascript'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('post_common_post_status_wall_style', $context, $blocks);
        // line 3
        echo "
";
        // line 4
        $this->displayBlock('post_common_post_status_wall', $context, $blocks);
        // line 35
        echo "
";
        // line 36
        $this->displayBlock('post_common_post_status_wall_html_template', $context, $blocks);
        // line 43
        echo "
";
        // line 44
        $this->displayBlock('post_common_post_status_wall_javascript', $context, $blocks);
    }

    // line 1
    public function block_post_common_post_status_wall_style($context, array $blocks = array())
    {
    }

    // line 4
    public function block_post_common_post_status_wall($context, array $blocks = array())
    {
        // line 5
        echo "\t<div class=\"form-status upload-container\" data-url=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("PostAdd", array("post_type" => (isset($context["post_type"]) ? $context["post_type"] : null), "user_slug" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "slug")))), "html", null, true);
        echo "\">
\t\t<div class=\"post_new drop-zone\">
\t\t\t<div class=\"row-fluid txt_editor\">
\t\t\t\t<textarea class=\"post_input status-content mention\" style=\"resize: none;\" placeholder=\"";
        // line 8
        echo gettext("What's in your mind");
        echo " ...\" maxlength=\"1000\"></textarea>
\t\t\t\t<input type=\"hidden\" name=\"img-url\" class=\"img-url\" value=\"\" />
\t\t\t</div>
\t\t\t<div class=\"img-previewer-container\">
\t\t\t</div>
\t\t\t<div class=\"y-progress\">
\t\t\t\t<div class=\"bar\" style=\"width: 0%;\"></div>
\t\t\t</div>
\t\t\t<div class=\"post_tool\">
\t\t\t\t<div class=\"row-fluid\">
\t\t\t\t\t<div class=\"span8 post_new_control\">
\t\t\t\t\t\t<a href=\"#\" id=\"insert-new-img\" onclick=\"\$('#img-upload').trigger('click'); return false;\">
\t\t\t\t\t\t\t<i class=\"icon-camera icon-2x\"></i>\t\t\t\t\t\t\t
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<input type=\"file\" data-no-uniform=\"true\" class=\"img-upload\" title=\"";
        // line 22
        echo gettext("Choose image to upload");
        echo "\" name=\"files[]\" data-url=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("UploadFile")), "html", null, true);
        echo "\" id=\"img-upload\" />
\t\t\t\t\t\t<a href=\"#\" title=\"Advance post\" data-mfp-src=\"#post-advance-add-popup\" class=\"link-popup\">
\t\t\t\t\t\t\t<i class=\"icon-external-link-sign icon-2x\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"span4 text-right\">
\t\t\t\t\t\t<a href=\"#\" class=\"btn btn-yes btn-status\">";
        // line 28
        echo gettext("Post");
        echo "</a>
\t\t\t\t\t</div>
\t\t\t\t</div>
 \t\t\t</div>
\t\t</div>
\t</div>
";
    }

    // line 36
    public function block_post_common_post_status_wall_html_template($context, array $blocks = array())
    {
        // line 37
        echo "\t";
        $this->displayBlock("common_html_block_post_advance_form", $context, $blocks);
        echo "
\t";
        // line 38
        $context["post_popup_id"] = "post-advance-edit-popup";
        // line 39
        echo "\t";
        $this->displayBlock("common_html_block_post_advance_form", $context, $blocks);
        echo "
\t";
        // line 40
        $this->displayBlock("common_html_block_upload_image_template", $context, $blocks);
        echo "
    ";
        // line 41
        $this->displayBlock("common_html_block_post_item_template", $context, $blocks);
        echo "
";
    }

    // line 44
    public function block_post_common_post_status_wall_javascript($context, array $blocks = array())
    {
        // line 45
        echo "\t<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.ui.widget.js")), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 46
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.load-image.min.js")), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 47
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.canvas-to-blob.min.js")), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 48
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.iframe-transport.js")), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 49
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.fileupload.js")), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 50
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.fileupload-process.js")), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 51
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.fileupload-image.js")), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 52
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.fileupload-validate.js")), "html", null, true);
        echo "\"></script>
\t<script type=\"text/javascript\" src=\"";
        // line 53
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/upload-app.js")), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@template/default/template/post/common/post_status_wall.tpl";
    }

    public function getDebugInfo()
    {
        return array (  160 => 53,  156 => 52,  152 => 51,  148 => 50,  144 => 49,  140 => 48,  136 => 47,  132 => 46,  127 => 45,  124 => 44,  118 => 41,  114 => 40,  109 => 39,  107 => 38,  102 => 37,  99 => 36,  88 => 28,  77 => 22,  60 => 8,  53 => 5,  50 => 4,  45 => 1,  41 => 44,  38 => 43,  36 => 36,  33 => 35,  31 => 4,  28 => 3,  26 => 1,);
    }
}
