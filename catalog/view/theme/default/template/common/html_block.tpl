{# -- Comment -- #}
	{% block common_html_block_comment_quick_form %}
		<form class="y-comment-reply post post_new comment-form" id="comment-form"{% if add_comment_url is defined %} data-url="{{ add_comment_url }}"{% endif %}>
			<div class="txt_editor">
				<textarea class="post_input mention" placeholder="{% trans %}Your comment{% endtrans %} ..."></textarea>
			</div>
			<div class="comment-action"> 
				<a class="fl comment-tool link-popup" data-mfp-src="#comment-advance-add-popup" href="#" title="Advance comment">
					<i class="icon-external-link"></i>
				</a>
				<a href="#" class="btn btn-yes fr btn-comment">{% trans %}Submit{% endtrans %}</a>	
	            <div class="fr comment-press-enter">{% trans %}Press Enter to send{% endtrans %}  
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
				        <i class="icon-yes"></i> {% trans %}Advanced comment{% endtrans %}
				    </div>
				    <div class="dlg-content">
				    	<div class="dlg-column fr" style="width:100%;">
							<div class="alert alert-error top-warning hidden">{% trans %}Warning{% endtrans %}!!</div>
					    	<div class="control-group">
				    			<label class="control-label">{% trans %}Comment{% endtrans %}</label>
						    	<div class="y-editor post-advance-content"></div>
					    	</div>
						</div>
				    </div>
				    <div class="dlg-footer">
				    	<div class="controls">
			                <a href="#" class="btn btn-yes btn-post-advance">{% trans %}Submit{% endtrans %}</a>
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
										<i class="icon-thumbs-up medium-icon"></i> {% endraw %}{% trans %}Like{% endtrans %}{% raw %}
									</a>
									<strong class="liked-label{{if is_liked != true}} hidden{{/if}}">{% endraw %}{% trans %}Liked{% endtrans %}{% raw %}
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
								     	<a href="#"><i class="icon-thumbs-down"></i>{% endraw %}{% trans %}Unlike{% endtrans %}{% raw %}</a>
							     	</li>
							     	{{if is_owner == true }}
							     	<li class="divider"></li>
								    <li class="edit-comment-btn">
								     	<a class="link-popup" href="#" data-mfp-src="#comment-advance-edit-popup"><i class="icon-edit"></i>{% endraw %}{% trans %}Edit{% endtrans %}</a>
							     	</li>
							     	<li class="divider"></li>
								    <li class="delete-comment-btn">
								    	<a href="#"><i class="icon-trash"></i>{% trans %}Delete{% endtrans %}{% raw %}</a>
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

{# -- Post -- #}
	{% block common_html_block_post_advance_form %}
		{% if post_popup_id is not defined %}
			{% set post_popup_id = 'post-advance-add-popup' %}
		{% endif %}
		<div class="mfp-hide y-dlg-container" id="{{ post_popup_id }}">
			<div class="y-dlg">
				<form autocomplete="off" class="form-status full-post">
					<div class="dlg-title">
				        <i class="icon-yes"></i> 
				        {% if post_popup_id == 'post-advance-add-popup' %}
				        {% trans %}New post{% endtrans %}
				        {% else %}
				        {% trans %}Edit post{% endtrans %}
				        {% endif %}
				    </div>
				    <div class="dlg-content">
				    	<div class="dlg-column upload-container fl" style="width:28%;">
				    		<label class="control-label">{% trans %}Choose an image for new post{% endtrans %}</label>
				    		<input type="hidden" name="img-url" class="img-url" value="" />
				    		<div class="img-previewer-container" placeholder="Drag an photo here">
				    			<p class="drop-zone-show">{% trans %}Drag an image here{% endtrans %}</p>
				    		</div>
				    		<div class="y-progress">
								<div class="bar" style="width: 0%;"></div>
							</div>
				    		<div class="drag-img-upload">			    			
				    			<a href="#" class="btn btn-yes">
				    				<span><i class="icon-upload"></i> {% trans %}Choose image{% endtrans %}</span>
				    				<input type="file" data-no-uniform="true" class="img-upload" title="Choose image to upload" name="files[]" data-url="{{ path('UploadFile') }}" />
				    			</a>
				    		</div>
						</div>
						<div class="dlg-column fr" style="width:68%;">
							<div class="alert alert-error top-warning hidden">{% trans %}Warning{% endtrans %}!!</div>
					    	<div class="control-group">
					    		<label for="title" class="control-label">{% trans %}Title{% endtrans %}</label>
					    		<div class="controls">
					    			<input class="post-advance-title" placeholder="Your title" type="text" name="title" id="title"
					    				style="width: 98%;" />
					    		</div>
				    		</div>
				    		<div class="control-group">
				    			<label class="control-label">{% trans %}Content{% endtrans %}</label>
						    	<div class="y-editor post-advance-content" id="post-adv-editor"></div>
					    	</div>
						</div>
				    </div>
				    <div class="dlg-footer">
				    	<div class="controls">
				    		<a href="#" class="btn btn-yes btn-post-advance">{% trans %}Submit{% endtrans %}</a>
				    		<button type="reset" class="btn btn-yes btn-reset">{% trans %}Reset{% endtrans %}</button>
			            </div>
				    </div>		
				</form>
			</div>
		</div>
	{% endblock %}

	{% block common_html_block_post_item_template %}
		{% raw %}
			<div class="hidden" id="post-item-template">
				<div class="feed post post_status post-item js-post-item" data-url="${href.post_like}" data-is-liked="0" data-url-edit="${href.edit}" data-url-delete="${href.delete}">{% endraw %}
					<div class="yes-dropdown">
			            <div class="dropdown">
			               <a class="dropdown-toggle" data-toggle="dropdown">
			                    <i class="icon-caret-down"></i>
			               </a>
			               <ul class="dropdown-menu">
			               		<li class="unlike-post hidden">
			                        <a href="#"><i class="icon-thumbs-down medium-icon"></i> {% trans %}Unlike{% endtrans %}</a>
			                    </li>
			                    <li class="divider"></li>
			                    <li class="post-edit-btn">
			                        <a href="#" class="link-popup" data-mfp-src="#post-advance-edit-popup"><i class="icon-edit"></i>{% trans %}Edit{% endtrans %}</a>
			                    </li>
			                    <li class="divider"></li>
			                    <li class="post-delete-btn">
			                        <a href="#"><i class="icon-trash"></i>{% trans %}Delete{% endtrans %}</a>
			                    </li>
			                </ul>
			            </div>
			        </div>{% raw %}
					<div class="post_header">
						<div class="avatar_thumb">
							<a href="${href.user_info}">
								<img src="${post.user.avatar}" alt="user" />
							</a>
						</div>
						<div class="post_meta_info">
							<div class="post_user">
								<a href="${href.user_info}">${post.user.username}</a>
								{{if is_owner == false}}
								<span><i class="icon-caret-right"></i></span>
								<a href="${owner.href}">${owner.username}</a>
								{{/if}}
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
			                            {% endraw %}{% trans %}Liked{% endtrans %}{% raw %}
									</span>
									<a class="post-liked-list" href="#" data-url="${href.post_get_liked}" data-like-count="0">
										<d class="number-counter">0</d>
									</a>
								</span>
							</div>
						</div>
					</div>
					<div class="post_body">
						{{if post.title != null}}
						<h4 class="post_title">
							<a href="${href.post_detail}">${post.title}</a>
						</h4>
						{{/if}}
						{{if post.image != null}}
						<div class="post_image">
							<img src="${post.image}" alt="${post.title}" />
						</div>
						{{/if}}
						<div class="post_text_raw">
							{{html post.content}}
						</div>
						{{if post.see_more == 1}}
						<a class="yes-see-more" href="${href.post_detail}">{% endraw %}{% trans %}See more{% endtrans %}{% raw %} <i class=" icon-double-angle-right"></i></a>
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
{# -- End Post -- #}

{# -- Message -- #}
	{% block common_html_block_new_message_form %}
		<div class="mfp-hide y-dlg-container" id="new-message-form">
			<div class="y-dlg">
				<form autocomplete="off" class="new-message-form">
					<div class="dlg-title">
				        <i class="icon-yes"></i> {% trans %}New Message{% endtrans %}
				    </div>
				    <div class="dlg-content tag-user-wrapper">
				    	<div class="control-group">
				    		<label for="sent-user" class="control-label">{% trans %}Send to{% endtrans %}</label>
				    		<div class="controls tags-group">
				    			<span class="tags-container">		    			
			    				</span>
				    			<input type="text" class="sent-user tagText js-message-to" id="sent-user">
				    		</div>
			    		</div>		    		
			    		<div class="control-group">
			    			<label for="sent-user" class="control-label">{% trans %}Content{% endtrans %}</label>
				    		<textarea class="message-editor js-message-content" placeholder="{% trans %}Write a message{% endtrans %} ..."></textarea>
			    		</div>			    	
				    </div>	
				    <div class="dlg-footer">
				    	<div class="controls">
				    		<a href="#" class="btn btn-yes btn-send-msg js-btn-message-send">{% trans %}Send{% endtrans %}</a>
							<label class="enter-option">
								<input type="checkbox" class="enter-check js-mess-check" checked="checked"> {% trans %}Press enter to send{% endtrans %}
							</label>           
			            </div>
				    </div>			    	
				</form>
			</div>
		</div>
	{% endblock %}

	{% block common_html_block_message_detail_item %}
		{% raw %}
		<div id="message-detail-item">
			<li class="message-item">
				<a href="${user.href}">
					<img src="${user.avatar}" alt="${user.username}">
				</a>
				<div class="message-body">
					<h6 class="sender-name">${user.username}</h6>
					<span class="sender-time"><i class="icon-calendar"></i> <span class="js-mess-date">${created}</span></span>
					<div class="message-content js-mess-content">${content}</div>
				</div>
				<div class="yes-dropdown">
		            <div class="dropdown">
		               <a class="dropdown-toggle" data-toggle="dropdown">
		                    <i class="icon-caret-down"></i>
		               </a>
		               <ul class="dropdown-menu">
		                    <li>
		                        <a href="#"><i class="icon-remove"></i> {% endraw %}{% trans %}Delete{% endtrans %}{% raw %}</a>
		                    </li>
		                </ul>
		            </div>
		        </div>
			</li>
		</div>
		{% endraw %}
	{% endblock %}

	{% block common_html_block_message_user_item %}
		{% raw %}
		<div id="message-user-item">
			<li class="user-message-li js-mess-user-item sent-box read" data-user-slug="${slug}" data-username="${username}">
				<a href="#" class="user-message-link js-mess-user-link">
					<img src="${avatar}" alt="${username}">
					<span class="user-message-info js-mess-user-info">
						<strong class="user-name">${username}</strong>
						<span class="message-overview">
                            <i class="icon-mail-reply"></i>
                            <i class="icon-ok"></i>
                            ${content}
                        </span>
						<span class="message-time timeago js-mess-user-time" title="${created}"></span>
					</span>
				</a>
			</li>
		</div>
		{% endraw %}
	{% endblock %}
{# -- End Message -- #}
