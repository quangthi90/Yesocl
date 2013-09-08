{% block post_common_post_block %}
	<div class="feed post post_status">
		<div class="post_header">
			<div class="avatar_thumb">
				<a href="#">
					<img src="{{ user.avatar }}" alt="user" />
				</a>
			</div>
			<div class="post_meta_info">
				<div class="post_user">
					<a href="#">{{ user.username }}</a>
				</div>
				<div class="post_meta">
					<span class="post_time fl">
						<i class="icon-calendar"></i> 
						<d class="timeago" title="{{ post.created|date(date_format) }}"></d>
					</span>
					<span class="post_cm fr">
						<a href="#" class="open-comment"
							data-url="{{ path('CommentList', {post_slug: post.slug, post_type: post_type}) }}"
							data-comment-count="{{ post.comment_count }}"
							data-comment-url="{{ path('CommentAdd', {post_slug: post.slug, post_type: post_type}) }}"
						>
							<i class="icon-comments-alt"></i>
						</a>
						<d>{{ post.comment_count }}</d>
					</span>
					<span class="post_like fr">
						<i class="icon-thumbs-up"></i> {{ post.like_count }}
					</span>
				</div>
			</div>
		</div>
		<div class="post_body">
			<h4 class="post_title">
				<a href="#">{{ post.title }}</a>
			</h4>
			{% if post.image != null %}
				<div class="post_image">
					<img src="{{ post.image }}" />
				</div>
			{% endif %}
			<div class="post_text_raw">
			{% if post.content|length > 200 %}
				{% set content = post.content|slice(0, 200) ~ ' [...]' %}
			{% else %}
				{% set content = post.content %}
			{% endif %}
				{{ content|raw }}
			</div>
		</div>
	</div>
{% endblock %}

{% block post_common_post_block_javascript %}
{% endblock %}