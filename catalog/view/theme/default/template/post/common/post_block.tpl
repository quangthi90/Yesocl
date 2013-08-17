{% block post_common_post_block %}
	<div class="feed post post_in_singleblock">
		<div class="row-fluid post_header">
			<div class="span2 avatar_thumb">
				<a href="{{ post.href_user|raw }}">
					<img src="{{ post.avatar }}" alt="user">
				</a>
			</div>
			<div class="span10">
				<div class="row-fluid">
					<div class="span8 post_user">
						<a href="{{ post.href_user|raw }}">{{ post.author }}</a>
					</div>
					<div class="span4 post_time">
						<i class="icon-time icon-2x"></i> {{ post.created|date('d/m/Y') }}
					</div>
				</div>
				<h4 class="post_title"><a href="{{ post.href_post|raw }}">{{ post.title }}</a></h4>
			</div>
		</div>
		<div class="post_body">
			{% if post.image != null %}
			<div class="post_image text-center">
				<img src="{{ post.image }}" />
			</div>
			{% endif %}
			{{ post.content|raw }}
		</div>
		<div class="row-fluid post_footer">
			<div class="span11 post_action">
				<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like</a>
				<a href="#" class="open-comment" data-url="{{ post.href_status|raw }}" data-comment-count="{{ post.comment_count }}" data-post-id="{{ post.id }}" data-post-type="{{ post.type }}"><i class="icon-comments medium-icon"></i> Comment (<span class="counter{{ post.id }}">{{ post.comment_count }}</span>)</a>
			</div>
		</div>
	</div>
{% endblock %}

{% block post_common_post_block_javascript %}
{% endblock %}