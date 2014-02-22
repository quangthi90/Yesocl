{% block post_common_post_status_branch_style %}
{% endblock %}

{% block post_common_post_status_branch %}
	<div class="branch-overview">
        <img class="branch-logo" src="http://events.oasis-open.org/home/sites/events.oasis-open.org.home/files/u5/GREEN-IT-3.gif">
        <h3 class="branch-name">Information Technology</h3>
    </div>
    <div class="branch-tool">
        <a href="#" class="branch-function link-popup" data-mfp-src="#post-advance-branch-add-popup">
            <i class="icon-pencil"></i>
            <span>New post</span>
        </a>
        <a href="#" style="width: 30%;" class="branch-function">
            <i class="icon-group"></i>
            <span>Members (1)</span>
        </a>
        {% set isMember = true %}
        {% if isMember == true %}
        <a href="#" class="branch-function">
            <i class="icon-signout"></i>
            <span>Leave branch</span>
        </a>
        {% else %}
        <a href="#" class="branch-function">
            <i class="icon-signin"></i>
            <span>Join branch</span>
        </a>
        {% endif %}
    </div>
{% endblock %}

{% block post_common_post_status_branch_html_template %}
	{{ block('common_html_block_post_advance_branch_form') }}
	{% set post_popup_id = 'post-advance-edit-popup' %}
	{{ block('common_html_block_post_advance_branch_form') }}
	{{ block('common_html_block_upload_image_template') }}
    {{ block('common_html_block_post_item_template') }}
{% endblock %}

{% block post_common_post_status_branch_javascript %}
	<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.ui.widget.js') }}"></script>
	<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.load-image.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.canvas-to-blob.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.iframe-transport.js') }}"></script>
	<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload.js') }}"></script>
	<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload-process.js') }}"></script>
	<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload-image.js') }}"></script>
	<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload-validate.js') }}"></script>
	<script type="text/javascript" src="{{ asset_js('libs/upload/upload-app.js') }}"></script>
{% endblock %}