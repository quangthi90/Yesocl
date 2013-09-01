{% block post_common_post_block_ex2 %}
	<div class="block-content">
		{% set special = random(['column-special', '']) %}
    	<div class="column {{ special }}">
    		{% for post in posts|slice(0, 6) %}
			<div class="feed-container feed{{ loop.index }}">
				<div class="feed post post_in_block">					
					<div class="post_header">
						<h4 class="post_title">
							<a href="#">{{ post.title }}</a>
						</h4>		
						<div class="post_meta">
							<span class="post_time fl">
								<i class="icon-calendar"></i> <d class="timeago" title="{{ post.created|date(date_format) }}"></d>
							</span>
							<span class="post_cm fr">
								<i class="icon-comments-alt"></i> <d>{{ post.comment_count }}</d>
							</span>
							<span class="post_like fr">
								<i class="icon-thumbs-up"></i> <d>{{ post.like_count }}</d>
							</span>
						</div>
					</div>
					<div class="post_body">
						<div class="post_image">
							<img src="{{ post.image }}" alt="title">
						</div>
						<div class="post_text_raw">{{ post.description }}</div>	
					</div>
					<div class="hover post_overlay">
						<div class="post_virtual_overlay">
						</div>
						<div class="post_overlay_wrapper">
							<div class="post_action">
								<a class="like-post" href="#" title="Like"
									data-post-slug="{{ post.slug }}" 
									data-post-type="{{ post_type }}"
								><i class="icon-thumbs-up medium-icon"></i></a>
								<a href="#" class="open-comment"
									title="Comment ({{ post.comment_count }})"
									data-url="{{ path('CommentList', {post_slug: post.slug, post_type: post_type}) }}"
									data-comment-count="{{ post.comment_count }}"
								>
									<i class="icon-comments medium-icon"></i>
								</a>
								<a href="{{ post.href_post|raw }}" title="View (1k)"><i class="icon-eye-open medium-icon"></i></a>
							</div>														
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