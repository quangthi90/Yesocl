{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('post-detail.css') }}" rel="stylesheet" media="screen" />
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content">
	<div id="post-detail" class="post">
		<div id="post-detail-header">				
			<div class="post-title-container">
				<h2 class="post-title" title="{{ post.title }}">{{ post.title }}</h2>
				<div class="post-user-time">
					<i class="icon-bookmark"></i>
					<a href="{{ path('WallPage', {user_slug: post.user_slug}) }}">
						{{ post.author }}
					</a> - 
					<span class="post-time timeago">
						{{ post.created|date(date_format) }}
					</span>
				</div>
			</div>				
		</div>
		<div class="post-detail-meta">
			<div class="post-actions left">
				<a href="#" class="btn-link-round " onclick="history.go(-1); return false;" > 
					<i class="icon-undo medium-icon"></i>						
				</a>					
				<a href="#">
					<span class="action-text">Go back</span>
				</a>
			</div>				
			<ul class="post-actions">
				<li>
					<a class="btn-link-round like-post" href="#"
					data-url="{{ path('PostLike', {post_slug: post.slug, post_type: post_type}) }}" data-post-liked="{{ post.isUserLiked }}">
					{% if post.isUserLiked == 0 %}
                        <i class="icon-thumbs-up medium-icon"></i>
                    {% else %}
                        <i class="icon-thumbs-down medium-icon"></i>
                    {% endif %}
					</a>
					<div class="number-viewer action-text">
						<span><i class="icon-caret-up"></i></span>
						<d>{{ post.like_count }}</d>
					</div>
				</li>
				<li>
					<a href="#" class="btn-link-round open-comment" data-url="{{ path('CommentList', {post_slug: post.slug, post_type: post_type}) }}" data-comment-count="{{ post.comment_count }}" data-comment-url="{{ path('CommentAdd', {post_slug: post.slug, post_type: post_type}) }}">
                        <i class="icon-comments medium-icon"></i>
                    </a>
					<div class="number-viewer action-text">
						<span><i class="icon-caret-up"></i></span>
						<d>{{ post.comment_count }}</d>
					</div>
				</li>
				<li>
					<a href="#" class="btn-link-round "><i class="icon-eye-open medium-icon"></i></a>
					<div class="number-viewer action-text">
						<span><i class="icon-caret-up"></i></span>
						<d>1000</d>
					</div>
				</li>					
			</ul>
			<div class="post-actions right">					
				<a href="#">
					<span class="action-text">More posts</span>
				</a>
				<a href="#" class="btn-link-round "> 						
					<i class="icon-th medium-icon"></i>
				</a>					
			</div>
			<div class="clear"></div>			
		</div>		
		<div id="post-content">
			{{ post.content|raw }}
		</div>
	</div>
	{{ block('post_common_post_comment') }}
</div>
{% endblock %}

{% block javascript %}
{{ block('post_common_post_comment_javascript') }}
{% endblock %}