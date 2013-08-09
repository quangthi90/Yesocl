{% block post_common_post_block_ex1 %}
	{% set special = random([2, 3]) %}
	{% set column_special = random(['column-special', '']) %}
	{% if special == 3 %}
		{% set first = true %}
	{% else %}
		{% set first = false %}
	{% endif %}
	<div class="block-content">
    	<div class="column {% if special == 3 %}column-special bommer-column-special{% endif %}">
    		{% for post in posts|slice(0, 5) %}
			<div class="feed-container feed{{ loop.index }}">
				<div class="feed post post_in_block">
					<div class="post_header">
						<h4 class="post_title"><a href="{{ post.href_post|raw }}">{{ post.title }}</a></h4>	
					</div>
					<div class="post_body">
						{% if (special == 3 and first == true and loop.index == 1) or (first == false and loop.index == 3 and special == 6) %}
						<div class="post_image text-center">
							<img src="{{ post.image }}">
						</div>
						{% else %}
							{% set random = random([1, 2]) %}
							{% if random % 2 == 0 %}
						<div class="post_text_raw">
							<p>{{ post.description }}</p>
						</div>
							{% else %}
						<div class="post_image text-center">
							<img src="{{ post.image }}">
						</div>
							{% endif %}
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
			{% if loop.index % special == 0 and loop.index != 5 %}
			{% if special == 2 %}
				{% set special = 3 %}
			{% else %}
				{% set special = 6 %}
			{% endif %}
		</div>
		<div class="column {% if special == 3 %}column-special bommer-column-special{% endif %}">
			{% set special = 6 %}
			{% endif %}
			{% endfor %}
		</div>
	</div>
{% endblock %}