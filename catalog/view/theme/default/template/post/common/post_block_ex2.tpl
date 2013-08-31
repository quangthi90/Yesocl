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
								<div class="action_tool">
									{% set isUserLiked = random([0, 1]) %}
									<a class="like-post" href="#" title="Like/Unlike"
										data-post-slug="{{ post.slug }}" 
										data-post-type="{{ post_type }}"
										data-post-liked="{{ isUserLiked }}">
										{% if isUserLiked == 0 %}
											<i class="icon-thumbs-up medium-icon"></i>
										{% else %}
											<i class="icon-thumbs-down medium-icon"></i>
										{% endif %}									
									</a>
									<a href="#" class="open-comment"
										title="Comment ({{ post.comment_count }})"
										data-url="{{ post.href_status|raw }}"
										data-comment-count="{{ post.comment_count }}" 
										data-post-slug="{{ post.slug }}" 
										data-post-type="{{ post_type }}"
										data-type-slug="{{ branch.slug }}"
									>
										<i class="icon-comments medium-icon"></i>
									</a>
									<a href="{{ post.href_post|raw }}" title="View">
										<i class="icon-eye-open medium-icon"></i>
									</a>
								</div>
								<div class="who-action">
									<a href="#" class="view-list-user" 
										data-view-title="People like this post" 
										data-view-type="like" 
										data-post-slug="{{ post.slug }}" 
										data-post-type="{{ post_type }}">
										{{ post.like_count }}
									</a>
									<a href="#" class="view-list-user" 
										data-view-title="People comment on this post"  
										data-view-type="comment" 
										data-post-slug="{{ post.slug }}" 
										data-post-type="{{ post_type }}"
										data-type-slug="{{ branch.slug }}">
										{{ post.comment_count }}
									</a>
									<a href="#" class="view-list-user" 
										data-view-title="People view this post"  
										data-view-type="view"
										data-post-slug="{{ post.slug }}" 
										data-post-type="{{ post_type }}"
										data-type-slug="{{ branch.slug }}">
										1k
									</a>
								</div>	
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