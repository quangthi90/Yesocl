{% block post_common_post_form_status_style %}
{% endblock %}

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
	<div class="mfp-hide y-dlg-container" id="post-advance-popup">
		<div class="y-dlg">
			<form autocomplete="off" class="form-status full-post">
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
					<div class="dlg-column fr" style="width:68%;">
						<div class="alert alert-error top-warning hidden">Warning!!</div>
				    	<div class="control-group">
				    		<label for="title" class="control-label">Title</label>
				    		<div class="controls">
				    			<input class="post-advance-title" placeholder="Your title" type="text" name="title" id="title"
				    				style="width: 98%;" />
				    		</div>
			    		</div>
			    		<div class="control-group">
			    			<label class="control-label">Content</label>
					    	<div class="y-editor post-advance-content" id="post-adv-editor"></div>
				    	</div>
					</div>
			    </div>
			    <div class="dlg-footer">
			    	<div class="controls">
			    		<button type="reset" class="btn btn-yes btn-reset">Reset</button>
		                <button type="submit" class="btn btn-yes btn-post-advance">Post</button>
		            </div>
			    </div>		
			</form>
		</div>
	</div>
	{% raw %}
	<div class="hidden" id="post-item-template">
		<div class="feed post post_status post-item" data-url="${href.post_like}" data-is-liked="0">
			<div class="yes-dropdown">
	            <div class="dropdown">
	               <a class="dropdown-toggle" data-toggle="dropdown">
	                    <i class="icon-caret-down"></i>
	               </a>
	               <ul class="dropdown-menu">
	               		<li class="unlike-post hidden">
	                        <a href="#"><i class="icon-thumbs-down medium-icon"></i> Unlike</a>
	                    </li>
	                    <!--li>
	                        <a href="#"><i class="icon-edit"></i>Edit</a>
	                    </li>
	                    <li class="divider"></li>
	                    <li>
	                        <a href="#"><i class="icon-trash"></i>Delete</a>
	                    </li-->
	                </ul>
	            </div>
	        </div>
			<div class="post_header">
				<div class="avatar_thumb">
					<a href="${href.user_info}">
						<img src="${post.user.avatar}" alt="user" />
					</a>
				</div>
				<div class="post_meta_info">
					<div class="post_user">
						<a href="${href.user_info}">${post.user.username}</a>
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
							<a class="like-post " href="#">
								<i class="icon-thumbs-up medium-icon"></i>
	                        </a>
	                        <span class="liked-post hidden">
	                            Liked
							</span>
							<a class="post-liked-list" href="#" data-url="${href.post_get_liked}" data-like-count="0">0</a>
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
				{{if post.see_more == 1}}
				<a class="yes-see-more" href="${href.post_detail}">See more <i class=" icon-double-angle-right"></i></a>
				{{/if}}
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
<script type="text/javascript" src="{{ asset_js('status.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('libs/upload/upload-app.js') }}"></script>
{% endblock %}