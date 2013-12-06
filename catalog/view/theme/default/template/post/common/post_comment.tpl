{% block post_common_post_comment_style %}
<link href="{{ asset_css('comment.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block post_common_post_comment %}
	<div id="comment-box" class="y-box">
		<div class="comment-container"> 
			<div class="y-box-header">				
				Comment box (<span class="counter"></span>)
				<div class="y-box-expand">
					<a href="#" class="btn-expand" title="Expand">
						<i class="icon-indent-left"></i>
					</a>
					<a href="#" class="btn-restore" title="Restore" style="display: none;">
						<i class="icon-indent-right"></i>
					</a>
					<a href="#" class="btn-close" title="Close">
						<i class="icon-remove"></i>
					</a>
				</div>				
			</div>
			<div class="y-box-content comment-body">
				<div id="add-more-item"></div>
			</div>		
		</div>	
		<form class="y-comment-reply post post_new comment-form">
			<div class="txt_editor">
				<textarea class="post_input" placeholder="Your comment ..."></textarea>
			</div>
			<div class="comment-action"> 
				<a class="fl comment-tool" href="#" title="Advance comment">
					<i class="icon-resize-full"></i>
				</a>
				<a href="#" class="btn btn-yes fr btn-comment">Post</a>	
                <div class="fr comment-press-enter">Press Enter to send  
                	<input type="checkbox" class="cb-press-enter" />
                </div>				
			</div>
		</form>		
	</div>
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
						     	<a href="#"><i class="icon-edit"></i>Edit</a>
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

{% block post_common_post_comment_javascript %}
<script type="text/javascript" src="{{ asset_js('post.js') }}"></script>
{% endblock %}