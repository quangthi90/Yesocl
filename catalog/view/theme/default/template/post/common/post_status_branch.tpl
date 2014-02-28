{% block post_common_post_status_branch_style %}
{% endblock %}

{% block post_common_post_status_branch %}
	<div class="branch-overview">
        <img class="branch-logo" src="{{ branch.logo }}">
        <h3 class="branch-name">{{ branch.name }}</h3>
    </div>
    <div class="branch-tool">
        <a href="#" class="branch-function link-popup" data-mfp-src="#post-advance-branch-add-popup">
            <i class="icon-pencil"></i>
            <span>{% trans %}New post{% endtrans %}</span>
        </a>
        <a href="#" style="width: 30%;" class="branch-function">
            <i class="icon-group"></i>
            <span>{% trans %}Members{% endtrans %} ({{ branch.member_count }})</span>
        </a>
        {#% set isMember = true %}
        {% if isMember == true %#}
        <a href="{{ path('BranchList') }}" class="branch-function">
            <i class="icon-signout"></i>
            <span>{% trans %}Leave branch{% endtrans %}</span>
        </a>
        {#% else %}
        <a href="#" class="branch-function">
            <i class="icon-signin"></i>
            <span>{% trans %}Join branch{% endtrans %}</span>
        </a>
        {% endif %#}
    </div>
{% endblock %}

{% block post_common_post_status_branch_html_template %}
	{{ block('common_html_block_post_advance_branch_form') }}
	{% set is_add_form = false %}
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