{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('post-detail.css') }}" rel="stylesheet" media="screen" />
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content">
	<div id="post-detail">
		<div class="goback-link fl">
			<a href="#" class="btn-link-round" onclick="history.go(-1); return false;" > 
				<i class="icon-arrow-left medium-icon"></i> Back					
			</a>
		</div>	
		<div id="post-detail-header">
			<div class="post-title-container">				
				<h2 class="post-title" title="{{ post.title }}">{{ post.title }}</h2>
				<div class="post-detail-meta">
					<div class="post-user-time fl">
						<i class="icon-bookmark"></i>
						<a href="{{ path('WallPage', {user_slug: post.user_slug}) }}">
							{{ post.author }}
						</a> - 
						<span class="post-time timeago">
							{{ post.created|date(date_format) }}
						</span>
					</div>
					<ul class="post-actions fr">
						<li>
							<a class="like-post" href="#"
							data-url="{{ path('PostLike', {post_slug: post.slug, post_type: post_type}) }}" data-post-liked="{{ post.isUserLiked }}" title="{{ post.like_count }}">
							{% if post.isUserLiked == 0 %}
		                        <i class="icon-thumbs-up medium-icon"></i>
		                    {% else %}
		                        <i class="icon-thumbs-down medium-icon"></i>
		                    {% endif %}
							</a>
						</li>
						<li>
							<a href="#" class="open-comment" data-url="{{ path('CommentList', {post_slug: post.slug, post_type: post_type}) }}" data-comment-count="{{ post.comment_count }}" data-comment-url="{{ path('CommentAdd', {post_slug: post.slug, post_type: post_type}) }}" title="{{ post.comment_count }}">
		                        <i class="icon-comments medium-icon"></i>
		                    </a>
						</li>
						<li>
							<a href="#" class="" title="1k">
								<i class="icon-eye-open medium-icon"></i>
							</a>
						</li>			
					</ul>			
					<div class="clear"></div>	
				</div>
			</div>				
		</div>	
		<div id="post-content">
			{{ post.content|raw }}
			{{ post.content|raw }}
			{{ post.content|raw }}
		</div>
	</div>
	{{ block('post_common_post_comment') }}
</div>
{% endblock %}

{% block javascript %}
{{ block('post_common_post_comment_javascript') }}
{% endblock %}