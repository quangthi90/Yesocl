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
				<textarea class="post_input" placeholder="What's in your mind ..."></textarea>
			</div>
			<div class="comment-action"> 
				<a class="fl comment-tool" href="#" title="Add photo">
					<i class="icon-camera icon-2x"></i>
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
						<img src="${avatar}" alt="user">
					</a>
				</div>
				<div class="comment-meta">
					<div class="comment-info">
						<a href="${href_user}">${author}</a>
						<span class="comment-time">
							<d class="timeago" title="${created}"></d>
						</span>
						<a href="#" class="like-comment" data-url="${href_like}" 
						data-comment-liked="${is_liked}">
						{{if is_liked == true}}
							<i class="icon-thumbs-down medium-icon"></i> 
						{{else}}
							<i class="icon-thumbs-up medium-icon"></i> 
						{{/if}}
							Like (<d>${like_count}</d>)
						</a>
					</div>
					<div class="comment-content">
						{{html content}}							
					</div>												
				</div>
				<div class="clear"></div>
				<div class="yes-dropdown">
					<div class="dropdown">
					   <a class="dropdown-toggle" data-toggle="dropdown" title="Action">
					    	<i class="icon-reorder"></i>
					   </a>
					   <ul class="dropdown-menu">
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
			</div>
		</div>
	</div>
{% endraw %}
{% endblock %}

{% block post_common_post_comment_javascript %}
<script type="text/javascript" src="{{ asset_js('post.js') }}"></script>
{% endblock %}