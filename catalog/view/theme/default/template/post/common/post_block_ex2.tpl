{% block post_common_post_block_ex2 %}
	<div class="block-content">
		{% set special = random(['column-special', '']) %}
    	<div class="column {{ special }}">
    		{% for post in posts|slice(0, 6) %}
			<div class="feed-container feed{{ loop.index }}">
				<div class="feed post post_in_block">
					<div class="post_header">
						<h4 class="post_title"><a href="{{ post.href_post|raw }}">{{ post.title }}</a></h4>
					</div>
					<div class="post_body">
						{% if special != '' and loop.index % 2 != 0 %}
						<div class="post_image text-center">
							<img src="{{ post.image }}">
						</div>
						<div class="post_text_raw">
							<p>{{ post.description }}</p>
						</div>
						{% elseif special != '' and loop.index % 2 == 0 %}
						<div class="post_text_raw">
							<p>{{ post.description }}</p>
						</div>
						{% else %}
						<div class="post_image text-center">
							<img src="{{ post.image }}">
						</div>
						{% endif %}
					</div>
					<div class="row-fluid post_footer">
						<div class="span8 post_action">
							<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like</a>
							<a href="#" class="open-comment" data-url="{{ post.href_status|raw }}" data-comment-count="{{ post.comment_count }}" data-post-id="{{ post.id }}" data-post-type="{{ post_type }}"><i class="icon-comments medium-icon"></i> Comment (<span class="counter{{ post.id }}">{{ post.comment_count }}</span>)</a>
						</div>
						<div class="span4 post_date">
							{{ post.created|date(date_format) }}
						</div>
					</div>
				</div>   			
			</div>
			{% if loop.index % 2 == 0 and loop.index != 6 %}
			{% set special = random(['column-special', '']) %}
		</div>
		<div class="column {{ special }}">
			{% endif %}
			{% endfor %}
		</div>
	</div>
{% endblock %}