{% block post_common_post_status_wall_style %}
{% endblock %}

{% block post_common_post_status_wall %}
	<div class="form-status upload-container js-post-form" data-post-type="{{ post_type }}" data-is-add-form="1" data-user-slug="{{ user.slug }}">
		<div class="post_new drop-zone">
			<div class="row-fluid txt_editor">
				<textarea class="post_input js-post-content mention js-post-status" style="resize: none;" placeholder="{% trans %}What's in your mind{% endtrans %}? ..." maxlength="1000"></textarea>
				<input type="hidden" name="img-url" class="img-url" value="" />
			</div>
			<div class="img-previewer-container">
			</div>
			<div class="y-progress">
				<div class="bar" style="width: 0%;"></div>
			</div>
			<div class="post_tool">
				<div class="row-fluid">
					<div class="span8 post_new_control">
						<a href="#" id="insert-new-img" onclick="$('#img-upload').trigger('click'); return false;">
							<i class="icon-camera icon-2x"></i>							
						</a>
						<input type="file" data-no-uniform="true" class="img-upload" title="{% trans %}Choose image to upload{% endtrans %}" name="files[]" data-url="{{ path('UploadFile') }}" id="img-upload" />
						<a href="#" title="{% trans %}Advance post{% endtrans %}" data-mfp-src="#js-advance-post" class="link-popup js-show-popup-btn">
							<i class="icon-external-link-sign icon-2x"></i>
						</a>
					</div>
					<div class="span4 text-right">
						<a href="#" class="btn btn-yes js-post-submit-btn">{% trans %}Submit{% endtrans %}</a>
					</div>
				</div>
 			</div>
		</div>
	</div>
{% endblock %}

{% block post_common_post_status_wall_html_template %}
	{{ block('common_html_block_post_advance_form') }}
	{{ block('common_html_block_upload_image_template') }}
    {{ block('common_html_block_post_item_template') }}
{% endblock %}

{% block post_common_post_status_wall_html_datascript %}
	<script type="text/javascript">
	var sEditPost = "{% trans %}Edit Post{% endtrans %}",
		sAddPost = "{% trans %}Add Post{% endtrans %}",
		sNoteDragImage = '{% trans %}Drag an image here{% endtrans %}';
	</script>
{% endblock %}

{% block post_common_post_status_wall_javascript %}
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