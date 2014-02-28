{% block post_common_post_item_wall %}
	{% if post.type is defined %}
		{% set post_type = post.type %}
	{% endif %}
	<div class="feed post post_status post-item js-post-item" data-url="{{ path('PostLike', {post_slug: post.slug, post_type: post_type}) }}" data-is-liked="{{ post.isUserLiked }}"data-post-type="{{ post_type }}" data-post-slug="{{ post_slug }}">
		<div class="yes-dropdown">
            <div class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-caret-down"></i>
               </a>
               <ul class="dropdown-menu">
               		<li class="unlike-post{% if post.isUserLiked == 0 %} hidden{% endif %}">
                        <a href="#"><i class="icon-thumbs-down medium-icon"></i> {% trans %}Unlike{% endtrans %}</a>
                    </li>
                    {% if post.is_edit is defined and post.is_edit == true %}
                    <li class="divider"></li>
                    <li class="post-edit-btn">
                        <a href="#" class="link-popup" data-mfp-src=".js-advance-post"><i class="icon-edit"></i>{% trans %}Edit{% endtrans %}</a>
                    </li>
                    {% endif %}
                    {% if post.is_del is defined and post.is_del == true %}
                    <li class="divider"></li>
                    <li class="post-delete-btn">
                        <a href="#"><i class="icon-trash"></i>{% trans %}Delete{% endtrans %}</a>
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
					{% if post.owner_id is defined and post.owner_id != null and post.owner_id != user.id %}
					<span><i class="icon-caret-right"></i></span>
					<a href="{{ path('WallPage', {user_slug: users[post.owner_id].slug}) }}">{{ users[post.owner_id].username }}</a>
					{% endif %}
					{% if post.category_slug is defined %}
					<span><i class="icon-caret-right"></i></span>
					<a href="{{ path('BranchCategory', {category_slug: post.category_slug}) }}">{{ post.category_name }}</a>
					{% endif %}
				</div>
				<div class="post_meta">
					<span class="post_time fl">
						<i class="icon-calendar"></i>
						{% set date_timeago = get_datetime_from_now(-2) %}
						{% if post.created >= date_timeago %}
                        <d class="timeago" title="{{ post.created|date('c') }}"></d>
                        {% else %}
                        <d title="{{ post.created|localizeddate('full', 'short', get_cookie('language'), null, "cccc, d MMMM yyyy '" ~ 'at'|trans ~ "' hh:ss") }}">{{ post.created|localizeddate('full', 'none', get_cookie('language'), null, "d MMMM '" ~ 'at'|trans ~ "' hh:ss") }}</d>
                        {% endif %}
					</span>
					<span class="post_like fr">
						<a class="like-post {% if post.isUserLiked == 1 %}hidden{% endif %}" href="#">
							<i class="icon-thumbs-up medium-icon"></i>
                        </a>
                        <d class="liked-post {% if post.isUserLiked == 0 %}hidden{% endif %}">
                            {% trans %}Liked{% endtrans %}
						</d>
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
			{% if post.title != null %}
			<h4 class="post_title">
				<a href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}">{{ post.title }}</a>
			</h4>
			{% endif %}
			{% if post.image != null %}
				<div class="post_image">
					<img src="{{ post.image }}" />
				</div>
			{% endif %}
			<div class="post_text_raw">
				{{ post.content|raw }}
			</div>
			<div class="post_text_editable" style="display: none;">
				{{ post.content|raw }}
			</div>
		</div>
		{% if post.content|length > 200 %}
			<a class="yes-see-more" href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}">See more <i class=" icon-double-angle-right"></i></a> 
		{% endif %}
	</div>
{% endblock %}