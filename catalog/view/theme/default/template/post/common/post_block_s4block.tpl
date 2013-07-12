{% block post_common_post_block_s4block %}
	<div class="feed post post_in_block">
		<div class="post_header">
			<h4 class="post_title"><a href="{{ post.href_post|raw }}">{{ post.title }}</a></h4>				
		</div>
		<div class="post_body">
			{% if post.image != null %}
			<div class="post_image text-center">
				<img src="{{ post.image }}" />
			</div>
			{% else %}
			<div class="post_text_raw">
				{{ post.content|raw }}
			</div>	
			{% endif %}
		</div>
		<div class="row-fluid post_footer">
			<div class="span8 post_action">
				<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like</a>
				<a href="#" class="open-comment" data-url="{{ post.href_status|raw }}" data-comment-count="{{ post.comment_count }}" data-post-id="{{ post.id }}" data-post-type="{{ post.type }}"><i class="icon-comments medium-icon"></i> Comment ({{ post.comment_count }})</a>
			</div>
			<div class="span4 post_date">
				{{ post.created|date('d/m/Y') }}
			</div>
		</div>
	</div>
{% endblock %}

{% block post_common_post_block_s4block_javascript %}
{% endblock %}