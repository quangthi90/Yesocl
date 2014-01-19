<?php

/* default/template/account/avatar.tpl */
class __TwigTemplate_7eec2cf6a1cb1713f5faec77331a000b9d2a0b41f703f1440d6ebeca3ccff3a9 extends Twig_Template
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
        echo gettext("Change Avatar");
    }

    // line 5
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 6
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_css')->getCallable(), array("libs/jquery.jcrop.min.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\" />
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "<div id=\"y-content\" class=\"no-header-fixed\">
  <div id=\"y-main-content\">
    <div class=\"y-frm\" id=\"y-frm-avatar\">
        <div class=\"frm-title\">";
        // line 13
        echo gettext("Change avatar");
        echo "</div>
        <div class=\"alert alert-success ";
        // line 14
        if ((!array_key_exists("success", $context))) {
            echo "hidden";
        }
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["success"]) ? $context["success"] : null), "html", null, true);
        echo "</div>
        <div class=\"alert alert-error ";
        // line 15
        if ((!array_key_exists("warning", $context))) {
            echo "hidden";
        }
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["warning"]) ? $context["warning"] : null), "html", null, true);
        echo "</div>
        <div class=\"frm-content\">            
            <div class=\"avatar-step upload-container\" id=\"avatar-choose-image\">
                <input type=\"hidden\" name=\"img-url\" class=\"img-url\" value=\"\" />
                <div class=\"img-previewer-container\" placeholder=\"Drag an photo here\">
                    <p class=\"drop-zone-show\">
                        <span>Drag an image here or </span>
                        <span class=\"drag-img-upload\">
                            <a href=\"\" class=\"btn btn-yes btn-upload\" onclick=\"\$('#avatar-upload-img').trigger('click'); return false;\">
                                <span><i class=\"icon-upload\"></i> Choose image</span>
                            </a>
                            <input type=\"file\" data-no-uniform=\"true\" class=\"hidden img-upload\" id=\"avatar-upload-img\" name=\"files[]\" data-url=\"";
        // line 26
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("UploadFile")), "html", null, true);
        echo "\" />
                        </span>
                    </p>
                </div>
                <div class=\"y-progress\">
                    <div class=\"bar\" style=\"width: 0%;\"></div>
                </div>                
            </div>
            <div class=\"avatar-step image-cropper\" id=\"avatar-edit-image\">
                <div class=\"uploaded-image\">
                    <img id=\"uploaded-image\">                    
                </div>
                <div class=\"previewed-image\">
                    <label>Preview avatar</label>
                    <div class=\"previewed-image-container\">
                        <div class=\"none-image\"></div>
                        <img id=\"previewed-image\">
                    </div>
                    <div class=\"preview-tools\">
                        <a href=\"#\" class=\"preview-tool-item\" id=\"make-circle-btn\" title=\"Make circle\"><i class=\"icon-circle-blank\"></i></a>
                        <a href=\"#\" class=\"preview-tool-item\" id=\"make-clear-btn\"  title=\"Clear\"><i class=\"icon-eraser\"></i></a>
                    </div>  
                </div>
                <div class=\"image-buttons\">
                    <a href=\"#\" class=\"btn btn-yes\" data-has-image=\"false\" data- id=\"avatar-save\">Save avatar</a>
                    <a href=\"#\" class=\"btn btn-yes\" id=\"avatar-re-choose-image\">Choose another image</a>
                    <a href=\"#\" class=\"btn btn-yes\">Cancel</a>
                </div>
            </div>
        </div>
        <div class=\"frm-footer\">            
        </div>
    </div>
  </div>
</div>
";
    }

    // line 63
    public function block_javascript($context, array $blocks = array())
    {
        // line 64
        echo "<script type=\"text/javascript\" src=\"";
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.ui.widget.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 65
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.load-image.min.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 66
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.canvas-to-blob.min.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 67
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.iframe-transport.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 68
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.fileupload.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 69
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.fileupload-process.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 70
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.fileupload-image.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 71
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/upload/jquery.fileupload-validate.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 72
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("libs/jquery.jcrop.min.js")), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 73
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('asset_js')->getCallable(), array("avatar.js")), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "default/template/account/avatar.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 73,  164 => 72,  160 => 71,  156 => 70,  152 => 69,  148 => 68,  144 => 67,  140 => 66,  136 => 65,  131 => 64,  128 => 63,  88 => 26,  70 => 15,  62 => 14,  58 => 13,  53 => 10,  50 => 9,  43 => 6,  40 => 5,  34 => 3,);
    }
}
