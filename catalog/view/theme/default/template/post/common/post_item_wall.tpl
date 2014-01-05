{% block post_common_post_item_wall %}
	{% if post.type is defined %}
		{% set post_type = post.type %}
	{% endif %}
	<div class="feed post post_status post-item js-post-item" data-url="{{ path('PostLike', {post_slug: post.slug, post_type: post_type}) }}" data-is-liked="{{ post.isUserLiked }}" data-url-edit="{{ path('PostEdit', {post_slug: post.slug, post_type: post_type}) }}" data-url-delete="{{ path('PostDelete', {post_slug: post.slug, post_type: post_type}) }}">
		<div class="yes-dropdown">
            <div class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-caret-down"></i>
               </a>
               <ul class="dropdown-menu">
               		<li class="unlike-post{% if post.isUserLiked == 0 %} hidden{% endif %}">
                        <a href="#"><i class="icon-thumbs-down medium-icon"></i> Unlike</a>
                    </li>
                    {% if post.is_edit is defined and post.is_edit == true %}
                    <li class="divider"></li>
                    <li class="post-edit-btn">
                        <a href="#" class="link-popup" data-mfp-src="#post-advance-edit-popup"><i class="icon-edit"></i>Edit</a>
                    </li>
                    {% endif %}
                    {% if post.is_del is defined and post.is_del == true %}
                    <li class="divider"></li>
                    <li class="post-delete-btn">
                        <a href="#"><i class="icon-trash"></i>Delete</a>
                    </li>
                    {% endif %}
                </ul>
            </div>
        </div>
		<div class="post_header">
			<div class="avatar_thumb">
				<a href="{{ path('WallPage', {user_slug: user.slug}) }}">
					<img src="{{ user.avatar }}" alt="user" />
				</a>
			</div>
			<div class="post_meta_info">
				<div class="post_user">
					<a href="{{ path('WallPage', {user_slug: user.slug}) }}">{{ user.username }}</a>
				</div>
				<div class="post_meta">
					<span class="post_time fl">
						<i class="icon-calendar"></i>
						<d class="timeago" title="{{ date_format(post.created) }}"></d>
					</span>
					<span class="post_like fr">
						<a class="like-post {% if post.isUserLiked == 1 %}hidden{% endif %}" href="#">
							<i class="icon-thumbs-up medium-icon"></i>
                        </a>
                        <span class="liked-post {% if post.isUserLiked == 0 %}hidden{% endif %}">
                            Liked
						</span>
						<a class="post-liked-list" href="#" data-url="{{ path('PostGetLiker', {post_type: post_type, post_slug: post.slug}) }}" data-like-count="{{ post.like_count }}">
							<d class="number-counter">{{ post.like_count }}</d>
						</a>
					</span>
					<span class="post_cm fr">
						<a href="#" class="open-comment"
							data-url="{{ path('CommentList', {post_slug: post.slug, post_type: post_type}) }}"
							data-comment-count="{{ post.comment_count }}"
							data-comment-url="{{ path('CommentAdd', {post_slug: post.slug, post_type: post_type}) }}">
							<i class="icon-comments-alt"></i>
						</a>
						<d class="number-counter">{{ post.comment_count }}</d>
					</span>	
					{% if post_type != 'user' %}
					<span class="post_view fr">
                        <i class="icon-eye-open"></i>
                        <d class="number-counter">{{ post.count_viewer }}</d>
                    </span>
                    {% endif %}
				</div>
			</div>
		</div>
		<div class="post_body">
			<h4 class="post_title">
				<a href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}">{{ post.title }}</a>
			</h4>
			{% if post.image != null %}
				<div class="post_image">
					<img src="{{ post.image }}" />
				</div>
			{% endif %}
			<div class="post_text_raw">
				{{ post.content|raw }}
			</div>
		</div>
		{% if post.content|length > 200 %}
			<a class="yes-see-more" href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}">See more <i class=" icon-double-angle-right"></i></a> 
		{% endif %}
	</div>
{% endblock %}