{% block post_common_post_status_wall_style %}
{% endblock %}

{% block post_common_post_status_wall %}
	<div class="form-status upload-container" data-url="{{ path('PostAdd', {post_type: post_type, user_slug: user.slug}) }}">
		<div class="post_new drop-zone">
			<div class="row-fluid txt_editor">
				<textarea class="post_input status-content" style="resize: none;" placeholder="What's in your mind ..." maxlength="1000"></textarea>
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
						<a href="#" id="insert-new-img">
							<i class="icon-camera icon-2x"></i>
							<input type="file" data-no-uniform="true" class="img-upload" title="Choose image to upload" name="files[]" data-url="{{ path('UploadFile') }}" id="img-upload" />
						</a>
						<a href="#" title="Advance post" data-mfp-src="#post-advance-popup" class="link-popup">
							<i class="icon-external-link-sign icon-2x"></i>
						</a>
					</div>
					<div class="span4 text-right">
						<button type="button" class="btn btn-yes btn-status">Post</button>
					</div>
				</div>
 			</div>
		</div>
	</div>
	{{ block('common_html_block_post_advance_form') }}
	{{ block('common_html_block_post_item_template') }}
	{{ block('common_html_block_upload_image_template') }}
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
	<script type="text/javascript" src="{{ asset_js('status.js') }}"></script>
	<script type="text/javascript" src="{{ asset_js('libs/upload/upload-app.js') }}"></script>
{% endblock %}