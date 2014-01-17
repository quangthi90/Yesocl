<?php

/* @template/default/template/common/html_block.tpl */
class __TwigTemplate_a731847cf9c7e17b99e9c9a34c71d790fac9e21f22b3c4b0cf604358354f20a8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'common_html_block_comment_quick_form' => array($this, 'block_common_html_block_comment_quick_form'),
            'common_html_block_comment_advance_form' => array($this, 'block_common_html_block_comment_advance_form'),
            'common_html_block_comment_item_template' => array($this, 'block_common_html_block_comment_item_template'),
            'common_html_block_post_advance_form' => array($this, 'block_common_html_block_post_advance_form'),
            'common_html_block_post_item_template' => array($this, 'block_common_html_block_post_item_template'),
            'common_html_block_upload_image_template' => array($this, 'block_common_html_block_upload_image_template'),
            'common_html_block_new_message_form' => array($this, 'block_common_html_block_new_message_form'),
            'common_html_block_message_detail_item' => array($this, 'block_common_html_block_message_detail_item'),
            'common_html_block_message_user_item' => array($this, 'block_common_html_block_message_user_item'),
        );

        $this->macros = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "\t";
        $this->displayBlock('common_html_block_comment_quick_form', $context, $blocks);
        // line 18
        echo "
\t";
        // line 19
        $this->displayBlock('common_html_block_comment_advance_form', $context, $blocks);
        // line 47
        echo "
\t";
        // line 48
        $this->displayBlock('common_html_block_comment_item_template', $context, $blocks);
        // line 112
        echo "
";
        // line 114
        echo "\t";
        $this->displayBlock('common_html_block_post_advance_form', $context, $blocks);
        // line 171
        echo "
\t";
        // line 172
        $this->displayBlock('common_html_block_post_item_template', $context, $blocks);
        // line 253
        echo "
\t";
        // line 254
        $this->displayBlock('common_html_block_upload_image_template', $context, $blocks);
        // line 265
        echo "
";
        // line 267
        echo "\t";
        $this->displayBlock('common_html_block_new_message_form', $context, $blocks);
        // line 300
        echo "
\t";
        // line 301
        $this->displayBlock('common_html_block_message_detail_item', $context, $blocks);
        // line 329
        echo "
\t";
        // line 330
        $this->displayBlock('common_html_block_message_user_item', $context, $blocks);
    }

    // line 2
    public function block_common_html_block_comment_quick_form($context, array $blocks = array())
    {
        // line 3
        echo "\t\t<form class=\"y-comment-reply post post_new comment-form\" id=\"comment-form\"";
        if (array_key_exists("add_comment_url", $context)) {
            echo " data-url=\"";
            echo twig_escape_filter($this->env, (isset($context["add_comment_url"]) ? $context["add_comment_url"] : null), "html", null, true);
            echo "\"";
        }
        echo ">
\t\t\t<div class=\"txt_editor\">
\t\t\t\t<textarea class=\"post_input mention\" placeholder=\"Your comment ...\"></textarea>
\t\t\t</div>
\t\t\t<div class=\"comment-action\"> 
\t\t\t\t<a class=\"fl comment-tool link-popup\" data-mfp-src=\"#comment-advance-add-popup\" href=\"#\" title=\"Advance comment\">
\t\t\t\t\t<i class=\"icon-external-link\"></i>
\t\t\t\t</a>
\t\t\t\t<a href=\"#\" class=\"btn btn-yes fr btn-comment\">";
        // line 11
        echo gettext("Post");
        echo "</a>\t
\t            <div class=\"fr comment-press-enter\">";
        // line 12
        echo gettext("Press Enter to send");
        echo "  
\t            \t<input type=\"checkbox\" class=\"cb-press-enter\" />
\t            </div>
\t\t\t</div>
\t\t</form>
\t";
    }

    // line 19
    public function block_common_html_block_comment_advance_form($context, array $blocks = array())
    {
        // line 20
        echo "\t\t";
        if ((!array_key_exists("advance_comment_id", $context))) {
            // line 21
            echo "\t\t\t";
            $context["advance_comment_id"] = "comment-advance-add-popup";
            // line 22
            echo "\t\t";
        }
        // line 23
        echo "\t\t<div class=\"mfp-hide y-dlg-container\" id=\"";
        echo twig_escape_filter($this->env, (isset($context["advance_comment_id"]) ? $context["advance_comment_id"] : null), "html", null, true);
        echo "\">
\t\t\t<div class=\"y-dlg\">
\t\t\t\t<form autocomplete=\"off\" class=\"form-status full-post\">
\t\t\t\t\t<div class=\"dlg-title\">
\t\t\t\t        <i class=\"icon-yes\"></i> ";
        // line 27
        echo gettext("Advanced comment");
        // line 28
        echo "\t\t\t\t    </div>
\t\t\t\t    <div class=\"dlg-content\">
\t\t\t\t    \t<div class=\"dlg-column fr\" style=\"width:100%;\">
\t\t\t\t\t\t\t<div class=\"alert alert-error top-warning hidden\">";
        // line 31
        echo gettext("Warning");
        echo "!!</div>
\t\t\t\t\t    \t<div class=\"control-group\">
\t\t\t\t    \t\t\t<label class=\"control-label\">";
        // line 33
        echo gettext("Comment");
        echo "</label>
\t\t\t\t\t\t    \t<div class=\"y-editor post-advance-content\"></div>
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t    </div>
\t\t\t\t    <div class=\"dlg-footer\">
\t\t\t\t    \t<div class=\"controls\">
\t\t\t                <a href=\"#\" class=\"btn btn-yes btn-post-advance\">";
        // line 40
        echo gettext("Post");
        echo "</a>
\t\t\t            </div>
\t\t\t\t    </div>\t\t
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t";
    }

    // line 48
    public function block_common_html_block_comment_item_template($context, array $blocks = array())
    {
        // line 49
        echo "\t\t";
        // line 72
        echo "
\t\t\t<div id=\"item-template\" class=\"hidden\">
\t\t\t\t<div>
\t\t\t\t\t<div class=\"comment-item\">
\t\t\t\t\t\t<div class=\"avatar_thumb\">
\t\t\t\t\t\t\t<a href=\"\${href_user}\">
\t\t\t\t\t\t\t\t<img src=\"\${avatar}\" alt=\"\${author}\">
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"comment-meta\">
\t\t\t\t\t\t\t<div class=\"comment-info\"
\t\t\t\t\t\t\t\tdata-url=\"\${href_like}\"
\t\t\t\t\t\t\t\tdata-comment-liked=\"\${is_liked}\"
\t\t\t\t\t\t\t\tdata-id=\"\${id}\"
\t\t\t\t\t\t\t\tdata-like-count=\"\${like_count}\"
\t\t\t\t\t\t\t\tdata-url-edit=\"\${href_edit}\"
\t\t\t\t\t\t\t\tdata-url-delete=\"\${href_delete}\">
\t\t\t\t\t\t\t\t<a href=\"\${href_user}\">\${author}</a>
\t\t\t\t\t\t\t\t<span class=\"comment-time\">
\t\t\t\t\t\t\t\t\t<d class=\"timeago\" title=\"\${created}\"></d>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<span class=\"like-container\">
\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"like-comment{{if is_liked == true}} hidden{{/if}}\">
\t\t\t\t\t\t\t\t\t\t<i class=\"icon-thumbs-up medium-icon\"></i> ";
        echo gettext("Like");
        // line 74
        echo "
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t<strong class=\"liked-label{{if is_liked != true}} hidden{{/if}}\">";
        echo gettext("Liked");
        // line 91
        echo "
\t\t\t\t\t\t\t\t\t</strong>
\t\t\t\t\t\t\t\t\t&nbsp;(<a class=\"like-count\" data-url=\"\${href_liked_user}\" href=\"#\">\${like_count}</a>)
\t\t\t\t\t\t\t\t</span>\t\t
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"comment-content\">
\t\t\t\t\t\t\t\t{{html content}}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"clear\"></div>
\t\t\t\t\t\t<div class=\"yes-dropdown option-dropdown\">
\t\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t   \t<a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t    \t<i class=\"icon-reorder\"></i>
\t\t\t\t\t\t\t   \t</a>
\t\t\t\t\t\t\t   \t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t   \t\t<li class=\"un-like-btn{{if is_liked != true}} hidden{{/if}}\">
\t\t\t\t\t\t\t\t     \t<a href=\"#\"><i class=\"icon-thumbs-down\"></i>";
        echo gettext("Unlike");
        // line 96
        echo "</a>
\t\t\t\t\t\t\t     \t</li>
\t\t\t\t\t\t\t     \t{{if is_owner == true }}
\t\t\t\t\t\t\t     \t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t    <li class=\"edit-comment-btn\">
\t\t\t\t\t\t\t\t     \t<a class=\"link-popup\" href=\"#\" data-mfp-src=\"#comment-advance-edit-popup\"><i class=\"icon-edit\"></i>";
        echo gettext("Edit");
        echo "</a>
\t\t\t\t\t\t\t     \t</li>
\t\t\t\t\t\t\t     \t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t    <li class=\"delete-comment-btn\">
\t\t\t\t\t\t\t\t    \t<a href=\"#\"><i class=\"icon-trash\"></i>";
        // line 100
        echo gettext("Delete");
        // line 109
        echo "</a>
\t\t\t\t\t\t\t\t    </li>
\t\t\t\t\t\t\t\t    {{/if}}
\t\t\t\t\t\t\t    </ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        echo "
\t";
    }

    // line 114
    public function block_common_html_block_post_advance_form($context, array $blocks = array())
    {
        // line 115
        echo "\t\t";
        if ((!array_key_exists("post_popup_id", $context))) {
            // line 116
            echo "\t\t\t";
            $context["post_popup_id"] = "post-advance-add-popup";
            // line 117
            echo "\t\t";
        }
        // line 118
        echo "\t\t<div class=\"mfp-hide y-dlg-container\" id=\"";
        echo twig_escape_filter($this->env, (isset($context["post_popup_id"]) ? $context["post_popup_id"] : null), "html", null, true);
        echo "\">
\t\t\t<div class=\"y-dlg\">
\t\t\t\t<form autocomplete=\"off\" class=\"form-status full-post\">
\t\t\t\t\t<div class=\"dlg-title\">
\t\t\t\t        <i class=\"icon-yes\"></i> 
\t\t\t\t        ";
        // line 123
        if (((isset($context["post_popup_id"]) ? $context["post_popup_id"] : null) == "post-advance-add-popup")) {
            // line 124
            echo "\t\t\t\t        ";
            echo gettext("New post");
            // line 125
            echo "\t\t\t\t        ";
        } else {
            // line 126
            echo "\t\t\t\t        ";
            echo gettext("Edit post");
            // line 127
            echo "\t\t\t\t        ";
        }
        // line 128
        echo "\t\t\t\t    </div>
\t\t\t\t    <div class=\"dlg-content\">
\t\t\t\t    \t<div class=\"dlg-column upload-container fl\" style=\"width:28%;\">
\t\t\t\t    \t\t<label class=\"control-label\">";
        // line 131
        echo gettext("Choose an image for new post");
        echo "</label>
\t\t\t\t    \t\t<input type=\"hidden\" name=\"img-url\" class=\"img-url\" value=\"\" />
\t\t\t\t    \t\t<div class=\"img-previewer-container\" placeholder=\"Drag an photo here\">
\t\t\t\t    \t\t\t<p class=\"drop-zone-show\">";
        // line 134
        echo gettext("Drag an image here");
        echo "</p>
\t\t\t\t    \t\t</div>
\t\t\t\t    \t\t<div class=\"y-progress\">
\t\t\t\t\t\t\t\t<div class=\"bar\" style=\"width: 0%;\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t    \t\t<div class=\"drag-img-upload\">\t\t\t    \t\t\t
\t\t\t\t    \t\t\t<a href=\"#\" class=\"btn btn-yes\">
\t\t\t\t    \t\t\t\t<span><i class=\"icon-upload\"></i> ";
        // line 141
        echo gettext("Choose image");
        echo "</span>
\t\t\t\t    \t\t\t\t<input type=\"file\" data-no-uniform=\"true\" class=\"img-upload\" title=\"Choose image to upload\" name=\"files[]\" data-url=\"";
        // line 142
        echo twig_escape_filter($this->env, call_user_func_array($this->env->getFunction('path')->getCallable(), array("UploadFile")), "html", null, true);
        echo "\" />
\t\t\t\t    \t\t\t</a>
\t\t\t\t    \t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"dlg-column fr\" style=\"width:68%;\">
\t\t\t\t\t\t\t<div class=\"alert alert-error top-warning hidden\">";
        // line 147
        echo gettext("Warning");
        echo "!!</div>
\t\t\t\t\t    \t<div class=\"control-group\">
\t\t\t\t\t    \t\t<label for=\"title\" class=\"control-label\">";
        // line 149
        echo gettext("Title");
        echo "</label>
\t\t\t\t\t    \t\t<div class=\"controls\">
\t\t\t\t\t    \t\t\t<input class=\"post-advance-title\" placeholder=\"Your title\" type=\"text\" name=\"title\" id=\"title\"
\t\t\t\t\t    \t\t\t\tstyle=\"width: 98%;\" />
\t\t\t\t\t    \t\t</div>
\t\t\t\t    \t\t</div>
\t\t\t\t    \t\t<div class=\"control-group\">
\t\t\t\t    \t\t\t<label class=\"control-label\">";
        // line 156
        echo gettext("Content");
        echo "</label>
\t\t\t\t\t\t    \t<div class=\"y-editor post-advance-content\" id=\"post-adv-editor\"></div>
\t\t\t\t\t    \t</div>
\t\t\t\t\t\t</div>
\t\t\t\t    </div>
\t\t\t\t    <div class=\"dlg-footer\">
\t\t\t\t    \t<div class=\"controls\">
\t\t\t\t    \t\t<a href=\"#\" class=\"btn btn-yes btn-post-advance\">";
        // line 163
        echo gettext("Post");
        echo "</a>
\t\t\t\t    \t\t<button type=\"reset\" class=\"btn btn-yes btn-reset\">";
        // line 164
        echo gettext("Reset");
        echo "</button>
\t\t\t            </div>
\t\t\t\t    </div>\t\t
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t";
    }

    // line 172
    public function block_common_html_block_post_item_template($context, array $blocks = array())
    {
        // line 173
        echo "\t\t";
        // line 175
        echo "
\t\t\t<div class=\"hidden\" id=\"post-item-template\">
\t\t\t\t<div class=\"feed post post_status post-item js-post-item\" data-url=\"\${href.post_like}\" data-is-liked=\"0\" data-url-edit=\"\${href.edit}\" data-url-delete=\"\${href.delete}\">";
        echo "
\t\t\t\t\t<div class=\"yes-dropdown\">
\t\t\t            <div class=\"dropdown\">
\t\t\t               <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t                    <i class=\"icon-caret-down\"></i>
\t\t\t               </a>
\t\t\t               <ul class=\"dropdown-menu\">
\t\t\t               \t\t<li class=\"unlike-post hidden\">
\t\t\t                        <a href=\"#\"><i class=\"icon-thumbs-down medium-icon\"></i> ";
        // line 183
        echo gettext("Unlike");
        echo "</a>
\t\t\t                    </li>
\t\t\t                    <li class=\"divider\"></li>
\t\t\t                    <li class=\"post-edit-btn\">
\t\t\t                        <a href=\"#\" class=\"link-popup\" data-mfp-src=\"#post-advance-edit-popup\"><i class=\"icon-edit\"></i>";
        // line 187
        echo gettext("Edit");
        echo "</a>
\t\t\t                    </li>
\t\t\t                    <li class=\"divider\"></li>
\t\t\t                    <li class=\"post-delete-btn\">
\t\t\t                        <a href=\"#\"><i class=\"icon-trash\"></i>";
        // line 191
        echo gettext("Delete");
        echo "</a>
\t\t\t                    </li>
\t\t\t                </ul>
\t\t\t            </div>
\t\t\t        </div>";
        // line 226
        echo "
\t\t\t\t\t<div class=\"post_header\">
\t\t\t\t\t\t<div class=\"avatar_thumb\">
\t\t\t\t\t\t\t<a href=\"\${href.user_info}\">
\t\t\t\t\t\t\t\t<img src=\"\${post.user.avatar}\" alt=\"user\" />
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"post_meta_info\">
\t\t\t\t\t\t\t<div class=\"post_user\">
\t\t\t\t\t\t\t\t<a href=\"\${href.user_info}\">\${post.user.username}</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"post_meta\">
\t\t\t\t\t\t\t\t<span class=\"post_time fl\">
\t\t\t\t\t\t\t\t\t<i class=\"icon-calendar\"></i> 
\t\t\t\t\t\t\t\t\t<d class=\"timeago\" title=\"\${post.created}\"></d>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<span class=\"post_cm fr\">
\t\t\t\t\t\t\t\t\t<a href=\"#\" class=\"open-comment\"
\t\t\t\t\t\t\t\t\t\tdata-url=\"\${href.comment_list}\"
\t\t\t\t\t\t\t\t\t\tdata-comment-count=\"0\"
\t\t\t\t\t\t\t\t\t\tdata-comment-url=\"\${href.comment_add}\"
\t\t\t\t\t\t\t\t\t>
\t\t\t\t\t\t\t\t\t\t<i class=\"icon-comments-alt\"></i>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t<d class=\"number-counter\">0</d>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t<span class=\"post_like fr\">
\t\t\t\t\t\t\t\t\t<a class=\"like-post \" href=\"#\">
\t\t\t\t\t\t\t\t\t\t<i class=\"icon-thumbs-up medium-icon\"></i>
\t\t\t                        </a>
\t\t\t                        <span class=\"liked-post hidden\">
\t\t\t                            ";
        echo gettext("Liked");
        // line 246
        echo "
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t<a class=\"post-liked-list\" href=\"#\" data-url=\"\${href.post_get_liked}\" data-like-count=\"0\">
\t\t\t\t\t\t\t\t\t\t<d class=\"number-counter\">0</d>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"post_body\">
\t\t\t\t\t\t<h4 class=\"post_title\">
\t\t\t\t\t\t\t<a href=\"\${href.post_detail}\">\${post.title}</a>
\t\t\t\t\t\t</h4>
\t\t\t\t\t\t<div class=\"post_image\">
\t\t\t\t\t\t\t<img src=\"\${post.image}\" alt=\"\${post.title}\" />
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"post_text_raw\">
\t\t\t\t\t\t\t{{html post.content}}
\t\t\t\t\t\t</div>
\t\t\t\t\t\t{{if post.see_more == 1}}
\t\t\t\t\t\t<a class=\"yes-see-more\" href=\"\${href.post_detail}\">";
        echo gettext("See more");
        // line 251
        echo " <i class=\" icon-double-angle-right\"></i></a>
\t\t\t\t\t\t{{/if}}
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        echo "
\t";
    }

    // line 254
    public function block_common_html_block_upload_image_template($context, array $blocks = array())
    {
        // line 255
        echo "\t\t";
        // line 262
        echo "
\t\t\t<div class=\"hidden\" id=\"uploaded-image-template\">
\t\t\t\t<div class=\"post_image_item\">
\t\t\t\t\t<a href=\"#\" class=\"image\"><img src=\"\${thumbnailUrl}\"/></a>
\t\t\t\t\t<a href=\"#\" class=\"close\"><i class=\"icon-remove\"></i></a>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        echo "
\t";
    }

    // line 267
    public function block_common_html_block_new_message_form($context, array $blocks = array())
    {
        // line 268
        echo "\t\t<div class=\"mfp-hide y-dlg-container\" id=\"new-message-form\">
\t\t\t<div class=\"y-dlg\">
\t\t\t\t<form autocomplete=\"off\" class=\"new-message-form\">
\t\t\t\t\t<div class=\"dlg-title\">
\t\t\t\t        <i class=\"icon-yes\"></i> ";
        // line 272
        echo gettext("New Message");
        // line 273
        echo "\t\t\t\t    </div>
\t\t\t\t    <div class=\"dlg-content tag-user-wrapper\">
\t\t\t\t    \t<div class=\"control-group\">
\t\t\t\t    \t\t<label for=\"sent-user\" class=\"control-label\">";
        // line 276
        echo gettext("Send to");
        echo "</label>
\t\t\t\t    \t\t<div class=\"controls tags-group\">
\t\t\t\t    \t\t\t<span class=\"tags-container\">\t\t    \t\t\t
\t\t\t    \t\t\t\t</span>
\t\t\t\t    \t\t\t<input type=\"text\" class=\"sent-user tagText js-message-to\" id=\"sent-user\">
\t\t\t\t    \t\t</div>
\t\t\t    \t\t</div>\t\t    \t\t
\t\t\t    \t\t<div class=\"control-group\">
\t\t\t    \t\t\t<label for=\"sent-user\" class=\"control-label\">";
        // line 284
        echo gettext("Content");
        echo "</label>
\t\t\t\t    \t\t<textarea class=\"message-editor js-message-content\" placeholder=\"";
        // line 285
        echo gettext("Write a message");
        echo " ...\"></textarea>
\t\t\t    \t\t</div>\t\t\t    \t
\t\t\t\t    </div>\t
\t\t\t\t    <div class=\"dlg-footer\">
\t\t\t\t    \t<div class=\"controls\">
\t\t\t\t    \t\t<a href=\"#\" class=\"btn btn-yes btn-send-msg js-btn-message-send\">";
        // line 290
        echo gettext("Send");
        echo "</a>
\t\t\t\t\t\t\t<label class=\"enter-option\">
\t\t\t\t\t\t\t\t<input type=\"checkbox\" class=\"enter-check js-mess-check\" checked=\"checked\"> ";
        // line 292
        echo gettext("Press enter to send");
        // line 293
        echo "\t\t\t\t\t\t\t</label>           
\t\t\t            </div>
\t\t\t\t    </div>\t\t\t    \t
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t";
    }

    // line 301
    public function block_common_html_block_message_detail_item($context, array $blocks = array())
    {
        // line 302
        echo "\t\t";
        // line 320
        echo "
\t\t<div id=\"message-detail-item\">
\t\t\t<li class=\"message-item\">
\t\t\t\t<a href=\"\${user.href}\">
\t\t\t\t\t<img src=\"\${user.avatar}\" alt=\"\${user.username}\">
\t\t\t\t</a>
\t\t\t\t<div class=\"message-body\">
\t\t\t\t\t<h6 class=\"sender-name\">\${user.username}</h6>
\t\t\t\t\t<span class=\"sender-time\"><i class=\"icon-calendar\"></i> <span class=\"js-mess-date\">\${created}</span></span>
\t\t\t\t\t<div class=\"message-content js-mess-content\">\${content}</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"yes-dropdown\">
\t\t            <div class=\"dropdown\">
\t\t               <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t                    <i class=\"icon-caret-down\"></i>
\t\t               </a>
\t\t               <ul class=\"dropdown-menu\">
\t\t                    <li>
\t\t                        <a href=\"#\"><i class=\"icon-remove\"></i> ";
        echo gettext("Delete");
        // line 327
        echo "</a>
\t\t                    </li>
\t\t                </ul>
\t\t            </div>
\t\t        </div>
\t\t\t</li>
\t\t</div>
\t\t";
        echo "
\t";
    }

    // line 330
    public function block_common_html_block_message_user_item($context, array $blocks = array())
    {
        // line 331
        echo "\t\t";
        // line 348
        echo "
\t\t<div id=\"message-user-item\">
\t\t\t<li class=\"user-message-li js-mess-user-item sent-box read\" data-user-slug=\"\${slug}\" data-username=\"\${username}\">
\t\t\t\t<a href=\"#\" class=\"user-message-link js-mess-user-link\">
\t\t\t\t\t<img src=\"\${avatar}\" alt=\"\${username}\">
\t\t\t\t\t<span class=\"user-message-info js-mess-user-info\">
\t\t\t\t\t\t<strong class=\"user-name\">\${username}</strong>
\t\t\t\t\t\t<span class=\"message-overview\">
                            <i class=\"icon-mail-reply\"></i>
                            <i class=\"icon-ok\"></i>
                            \${content}
                        </span>
\t\t\t\t\t\t<span class=\"message-time timeago js-mess-user-time\" title=\"\${created}\"></span>
\t\t\t\t\t</span>
\t\t\t\t</a>
\t\t\t</li>
\t\t</div>
\t\t";
        echo "
\t";
    }

    public function getTemplateName()
    {
        return "@template/default/template/common/html_block.tpl";
    }

    public function getDebugInfo()
    {
        return array (  583 => 348,  581 => 331,  578 => 330,  565 => 327,  544 => 320,  542 => 302,  539 => 301,  529 => 293,  527 => 292,  522 => 290,  514 => 285,  510 => 284,  499 => 276,  494 => 273,  492 => 272,  486 => 268,  483 => 267,  470 => 262,  468 => 255,  465 => 254,  454 => 251,  431 => 246,  397 => 226,  390 => 191,  383 => 187,  376 => 183,  363 => 175,  361 => 173,  358 => 172,  347 => 164,  343 => 163,  333 => 156,  323 => 149,  318 => 147,  310 => 142,  306 => 141,  296 => 134,  290 => 131,  285 => 128,  282 => 127,  279 => 126,  276 => 125,  273 => 124,  271 => 123,  262 => 118,  259 => 117,  256 => 116,  253 => 115,  250 => 114,  235 => 109,  233 => 100,  220 => 96,  195 => 74,  169 => 72,  164 => 48,  153 => 40,  143 => 33,  138 => 31,  133 => 28,  131 => 27,  123 => 23,  120 => 22,  117 => 21,  114 => 20,  111 => 19,  101 => 12,  78 => 2,  74 => 330,  71 => 329,  69 => 301,  66 => 300,  63 => 267,  60 => 265,  58 => 254,  55 => 253,  53 => 172,  50 => 171,  47 => 114,  44 => 112,  39 => 47,  37 => 19,  34 => 18,  31 => 2,  221 => 61,  217 => 60,  210 => 55,  207 => 54,  200 => 91,  197 => 50,  189 => 45,  185 => 43,  167 => 49,  165 => 39,  162 => 38,  145 => 37,  139 => 35,  137 => 34,  126 => 26,  121 => 23,  115 => 21,  112 => 20,  110 => 19,  106 => 17,  103 => 16,  97 => 11,  92 => 12,  89 => 11,  81 => 3,  42 => 48,  35 => 6,  28 => 5,  21 => 4,  14 => 3,);
    }
}
