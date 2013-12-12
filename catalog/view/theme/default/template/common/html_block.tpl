{# -- Comment -- #}
{% block common_html_block_comment_quick_form %}
	<form class="y-comment-reply post post_new comment-form" id="comment-form"{% if add_comment_url is defined %} data-url="{{ add_comment_url }}"{% endif %}>
		<div class="txt_editor">
			<textarea class="post_input mention" placeholder="Your comment ..."></textarea>
		</div>
		<div class="comment-action"> 
			<a class="fl comment-tool link-popup" data-mfp-src="#comment-advance-add-popup" href="#" title="Advance comment">
				<i class="icon-external-link"></i>
			</a>
			<a href="#" class="btn btn-yes fr btn-comment">Post</a>	
            <div class="fr comment-press-enter">Press Enter to send  
            	<input type="checkbox" class="cb-press-enter" />
            </div>
		</div>
	</form>
{% endblock %}

{% block common_html_block_comment_advance_form %}
	{% if advance_comment_id is not defined %}
		{% set advance_comment_id = 'comment-advance-add-popup' %}
	{% endif %}
	<div class="mfp-hide y-dlg-container" id="{{ advance_comment_id }}">
		<div class="y-dlg">
			<form autocomplete="off" class="form-status full-post">
				<div class="dlg-title">
			        <i class="icon-yes"></i> Advanced comment
			    </div>
			    <div class="dlg-content">
			    	<div class="dlg-column fr" style="width:100%;">
						<div class="alert alert-error top-warning hidden">Warning!!</div>
				    	<div class="control-group">
			    			<label class="control-label">Comment</label>
					    	<div class="y-editor post-advance-content"></div>
				    	</div>
					</div>
			    </div>
			    <div class="dlg-footer">
			    	<div class="controls">
		                <button type="submit" class="btn btn-yes btn-post-advance">Post</button>
		            </div>
			    </div>		
			</form>
		</div>
	</div>
{% endblock %}

{% block common_html_block_comment_item_template %}
	{% raw %}
		<div id="item-template" class="hidden">
			<div>
				<div class="comment-item">
					<div class="avatar_thumb">
						<a href="${href_user}">
							<img src="${avatar}" alt="${author}">
						</a>
					</div>
					<div class="comment-meta">
						<div class="comment-info"
							data-url="${href_like}"
							data-comment-liked="${is_liked}"
							data-id="${id}"
							data-like-count="${like_count}"
							data-url-edit="${href_edit}"
							data-url-delete="${href_delete}">
							<a href="${href_user}">${author}</a>
							<span class="comment-time">
								<d class="timeago" title="${created}"></d>
							</span>
							<span class="like-container">
								<a href="#" class="like-comment{{if is_liked == true}} hidden{{/if}}">
									<i class="icon-thumbs-up medium-icon"></i> Like
								</a>
								<strong class="liked-label{{if is_liked != true}} hidden{{/if}}">Liked
								</strong>
								&nbsp;(<a class="like-count" data-url="${href_liked_user}" href="#">${like_count}</a>)
							</span>		
						</div>
						<div class="comment-content">
							{{html content}}
						</div>
					</div>
					<div class="clear"></div>
					<div class="yes-dropdown option-dropdown">
						<div class="dropdown">
						   	<a class="dropdown-toggle" data-toggle="dropdown">
						    	<i class="icon-reorder"></i>
						   	</a>
						   	<ul class="dropdown-menu">
						   		<li class="un-like-btn{{if is_liked != true}} hidden{{/if}}">
							     	<a href="#"><i class="icon-thumbs-down"></i>Unlike</a>
						     	</li>
						     	{{if is_owner == true }}
						     	<li class="divider"></li>
							    <li class="edit-comment-btn">
							     	<a class="link-popup" href="#" data-mfp-src="#comment-advance-edit-popup"><i class="icon-edit"></i>Edit</a>
						     	</li>
						     	<li class="divider"></li>
							    <li class="delete-comment-btn">
							    	<a href="#"><i class="icon-trash"></i>Delete</a>
							    </li>
							    {{/if}}
						    </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	{% endraw %}
{% endblock %}
{# -- End Comment -- #}

{# -- Comment -- #}
{% block common_html_block_post_advance_form %}
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
{% endblock %}

{% block common_html_block_post_item_template %}
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
		                    <li>
		                        <a href="#"><i class="icon-edit"></i>Edit</a>
		                    </li>
		                    <li class="divider"></li>
		                    <li>
		                        <a href="#"><i class="icon-trash"></i>Delete</a>
		                    </li>
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
								<d class="number-counter">0</d>
							</span>
							<span class="post_like fr">
								<a class="like-post " href="#">
									<i class="icon-thumbs-up medium-icon"></i>
		                        </a>
		                        <span class="liked-post hidden">
		                            Liked
								</span>
								<a class="post-liked-list" href="#" data-url="${href.post_get_liked}" data-like-count="0">
									<d class="number-counter">0</d>
								</a>
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
	{% endraw %}
{% endblock %}

{% block common_html_block_upload_image_template %}
	{% raw %}
		<div class="hidden" id="uploaded-image-template">
			<div class="post_image_item">
				<a href="#" class="image"><img src="${thumbnailUrl}"/></a>
				<a href="#" class="close"><i class="icon-remove"></i></a>
			</div>
		</div>
	{% endraw %}
{% endblock %}
{# -- End Comment -- #}