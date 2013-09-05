{% block post_common_post_comment_style %}
<link href="{{ asset_css('comment.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block post_common_post_comment %}
	<div id="comment-box" class="y-box">
		<div class="comment-container"> 
			<div class="y-box-header">
				Comment box (<span class="counter"></span>)
				<a href="#" class="close">X</a>
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
					<a class="fl comment-tool" href="#" title="Chèn hình">
						<i class="icon-camera icon-2x"></i>
					</a>
					<a href="#" class="btn btn-yes fr btn-comment">Post</a>					
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
							<a href="${href_user}">${author}</a> - <span class="comment-time"><d class="timeago" title="${created}"></d></span>
						</div>
						<div class="comment-content">
							{{html content}}
						</div>
					</div>
				</div>
				<div class="comment-footer">
					<a href="#" class="like-comment"
						data-url="${href_like}"
						data-comment-liked="${is_liked}"
					><i class="icon-thumbs-up medium-icon"></i> Like (<d>${like_count}</d>)</a>
				</div>
			</div>
		</div>
	</div>
	{% endraw %}
{% endblock %}

{% block post_common_post_comment_javascript %}
<script type="text/javascript" src="{{ asset_js('post.js') }}"></script>
{% endblock %}