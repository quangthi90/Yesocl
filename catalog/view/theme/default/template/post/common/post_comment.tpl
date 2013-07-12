{% block post_common_post_comment_style %}
<link href="catalog/view/theme/default/stylesheet/comment.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block post_common_post_comment %}
	<div id="comment-box" class="y-box">
		<div class="comment-container"> 
			<div class="y-box-header">
				Comment box (<span>{% if post.comment_count is defined %}{{ post.comment_count }}{% endif %}</span>)
				<a href="#" class="close">X</a>
			</div>
			<div class="y-box-content comment-body">
			{% if post.comments is defined %}
				{% for comment in post.comments %}
				<div class="comment-item">
					<div class="row-fluid">
						<div class="span2 avatar_thumb">
							<a href="{{ comment.href_user|raw }}">
								<img src="{{ comment.avatar }}" alt="user">
							</a>
						</div>
						<div class="span10">
							<div class="comment-info">
								<a href="{{ comment.href_user|raw }}">{{ comment.author}}</a> - <span class="comment-time">{{ comment.created|date('h:i A d/m/Y') }}</span>
							</div>
							<div class="comment-content">
								{{ comment.content|raw }}
							</div>
						</div>
					</div>
					<div class="comment-footer">
						<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like (10)</a>
					</div>
				</div>
				{% endfor %}
				<div id="add-more-item"></div>
			{% endif %}
			</div>		
			</div>	
			<form class="y-comment-reply post post_new comment-form" data-post-id="{% if post.id is defined %}{{ post.id }}{% endif %}" data-url="{{ action.comment }}">
				<div class="row-fluid txt_editor">
					<textarea class="post_input" placeholder="What's in your mind ..."></textarea>
				</div>
				<div class="row-fluid"> 
					<div class="span8 post_new_control">
						<a href="#" title="Chèn hình">
							<i class="icon-camera-retro big-icon"></i>
						</a>
					</div>
					<div class="span4 btn-wrapper">
						<a href="#" class="btn btn-success btn-comment">Post</a>
					</div>
				</div>
			</form>		
		</div>			
	</div>
	{% raw %}
	<div id="item-template" class="hidden">
		<div>
			<div class="comment-item">
				<div class="row-fluid">
					<div class="span2 avatar_thumb">
						<a href="${href_user}">
							<img src="${avatar}" alt="user">
						</a>
					</div>
					<div class="span10">
						<div class="comment-info">
							<a href="${href_user}">${author}</a> - <span class="comment-time">${created}</span>
						</div>
						<div class="comment-content">
							{{html content}}
						</div>
					</div>
				</div>
				<div class="comment-footer">
					<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like (10)</a>
				</div>
			</div>
		</div>
	</div>
	{% endraw %}
{% endblock %}

{% block post_common_post_comment_javascript %}
<script type="text/javascript" src="catalog/view/javascript/post.js"></script>
{% endblock %}