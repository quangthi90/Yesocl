{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_comment.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('post-detail.css') }}" rel="stylesheet" media="screen" />
    {{ block('post_common_post_comment_style') }}
{% endblock %}

{% block body %}
<div id="y-content">
	<div id="y-main-content"> 
		<div id="post-detail">
			<div id="post-detail-header" class="post">
				<div class="group-header">
					<div class="row-fluid">
						<div class="span2">
							<a class="link-btn" onclick="history.go(-1); return false;" href="#" title="Go back"> 
								<i class="icon-chevron-sign-left icon-2x fl"></i> 
								<span>Back</span>
							</a>
						</div>						
						<div class="span6 post-category">
							<a href="#" title="View post in this category">{{ post.category }}</a>
						</div>
						<div class="span4 post-action post_action">
							<a href="#"><i class="icon-eye-open medium-icon"></i> View (1000)</a>
							<span>
								<a class="like-post" href="#"
									data-url="{{ path('PostLike', {post_slug: post.slug, post_type: post_type}) }}"
	                                data-post-liked="{{ post.isUserLiked }}"
								>
									{% if post.isUserLiked == 0 %}
	                                    <i class="icon-thumbs-up medium-icon"></i>
	                                {% else %}
	                                    <i class="icon-thumbs-down medium-icon"></i>
	                                {% endif %}
								</a>
								Like (<d>{{ post.like_count }}</d>)
							</span>
							<span>
								<a href="#" class="open-comment"
									data-url="{{ path('CommentList', {post_slug: post.slug, post_type: post_type}) }}"
	                                data-comment-count="{{ post.comment_count }}"
	                                data-comment-url="{{ path('CommentAdd', {post_slug: post.slug, post_type: post_type}) }}"
								><i class="icon-comments medium-icon"></i></a>
								Comment (<d>{{ post.comment_count }}</d>)
							</span>
						</div>
					</div>
				</div>
				<div class="post-metadata">
					<div class="row-fluid">
						<div class="span1 avatar-thumb">
							<a href="{{ path('WallPage', {user_slug: post.user_slug}) }}">
								<img src="{{ post.avatar }}" alt="user">
							</a>
						</div>
						<div class="span11 post-info">
							<div class="post-user-time">
								<a href="{{ path('WallPage', {user_slug: post.user_slug}) }}">{{ post.author }}</a> - <span class="post-time timeago" title="{{ post.created|date(date_format) }}"></span>
							</div>
							<h4 class="post_title">
								{{ post.title }}
							</h4>
						</div>	
					</div>									
				</div>
			</div>			
			<div id="post-content">{{ post.content|raw }}</div>
		</div>
		{{ block('post_common_post_comment') }}
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
$(document).ready(function() {
	$('#y-main-content').makeScrollWithoutCalResize();
});
</script>
{{ block('post_common_post_comment_javascript') }}
{% endblock %}