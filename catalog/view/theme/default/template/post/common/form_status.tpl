{% use '@template/default/template/post/common/post_editor.tpl' %}
{% block post_common_form_status %}
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
						<a href="#" title="Insert images" id="insert-new-img">
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
	<div class="mfp-hide y-dlg-container" id="post-advance-popup">
		<div class="y-dlg">
			<form autocomplete="off" class="form-status full-post" data-url="{{ path('PostAdd', {post_type: post_type, user_slug: user.slug}) }}">	
				<div class="dlg-title">
			        <i class="icon-yes"></i> New post  
			    </div>
			    <div class="dlg-content">
			    	<div class="dlg-column upload-container fl" style="width:28%;">
			    		<label class="control-label">Choose an image for new post</label>
			    		<input type="hidden" name="img-url" class="img-url" value="" />
			    		<div class="img-previewer-container" placeholder="Drag an photo here">
			    			<p class="drop-zone-show">Drag an image here</p>
			    		</div>
			    		<div class="y-progress">
							<div class="bar" style="width: 0%;"></div>
						</div>
			    		<div class="drag-img-upload">			    			
			    			<a href="#" class="btn btn-yes">
			    				<span><i class="icon-upload"></i> Choose image</span>
			    				<input type="file" data-no-uniform="true" class="img-upload" title="Choose image to upload" name="files[]" data-url="{{ path('UploadFile') }}" />
			    			</a>
			    		</div>
					</div>
					<div class="dlg-column fr" style="width:70%;">
						<div class="alert alert-error top-warning hidden">Warning!!</div>
				    	<div class="control-group">
				    		<label for="title" class="control-label">Title</label>
				    		<div class="controls">
				    			<input class="status-title" placeholder="Your title" type="text" name="title" id="title">
				    		</div>
			    		</div>
			    		<div class="control-group">
			    			<label class="control-label">Content</label>
					    	{{ block('post_common_post_editor') }}
					    	<div class="y-editor status-content" id="post-adv-editor"></div>
				    	</div>
					</div>				    	
			    </div>
			    <div class="dlg-footer">
			    	<div class="controls">
			    		<button type="reset" class="btn btn-yes btn-reset">Reset</button>
		                <button type="submit" class="btn btn-yes btn-status">Post</button>
		            </div>
			    </div>		
			</form>
		</div>
	</div>
	{% raw %}
	<div class="hidden" id="post-item-template">
		<div class="feed post post_status">
			<div class="post_header">
				<div class="avatar_thumb">
					<a href="#">
						<img src="${post.user.avatar}" alt="user" />
					</a>
				</div>
				<div class="post_meta_info">
					<div class="post_user">
						<a href="#">${post.user.username}</a>
					</div>
					<div class="post_meta">
						<span class="post_time fl">
							<i class="icon-calendar"></i> 
							<d class="timeago" title="${post.created}"></d>
						</span>
						<span class="post_cm fr">
							<a href="#" class="open-comment"
								data-url="${href.comment_list}"
								data-comment-count="0"
								data-comment-url="${href.comment_add}"
							>
								<i class="icon-comments-alt"></i>
							</a>
							<d>0</d>
						</span>
						<span class="post_like fr">
							<a class="like-post" href="#"
	                            data-url="${href.post_like}"
	                            data-post-liked="false"
	                        >
	                            <i class="icon-thumbs-up medium-icon"></i>
							</a>
							<d>0</d>
						</span>
					</div>
				</div>
			</div>
			<div class="post_body">
				<h4 class="post_title">
					<a href="${href.post_detail}">${post.title}</a>
				</h4>
				<div class="post_image">
					<img src="${post.image}" />
				</div>
				<div class="post_text_raw">
					{{html post.content}}
				</div>
			</div>
		</div>
	</div>
	<div class="hidden" id="uploaded-image-template">
		<div class="post_image_item">
			<a href="#" class="image"><img src="${thumbnailUrl}"/></a>
			<a href="#" class="close"><i class="icon-remove"></i></a>
		</div>
	</div>
	{% endraw %}
{% endblock %}

{% block post_common_form_status_javascript %}
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.ui.widget.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.load-image.min.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.canvas-to-blob.min.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.iframe-transport.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload-process.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload-image.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/jquery.fileupload-validate.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/jquery.hotkeys.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/bootstrap-wysiwyg.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('status.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/upload-app.js') }}"></script>
<script type="text/javascript">	    
	$('button.btn-reset').click(function() {
		var form = $(this).parents('form').first(); 
		if(form.length > 0) {
			var editor = form.find('.y-editor');
			editor.html('');
			editor.focus();
		}
	});	   
</script>
{% endblock %}