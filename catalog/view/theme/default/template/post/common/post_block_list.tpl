{% block post_common_post_block_list %}
	<div class="feed-block">
        <div class="block-header">
        {% if block_info is defined %}
        {% if is_back_btn is defined and is_back_btn == true %}
            <a class="block-seemore fl" href="#" onclick="history.go(-1); return false;"> 
                <i class="icon-angle-left"></i>
            </a>
            <a class="block-title fl" href="{{ block_href }}">{{ block_info.name }}</a>
        {% else %}
            <a class="block-title fl" href="{{ block_href }}">{{ block_info.name }}</a>
            <a class="block-seemore fl" href="{{ block_href }}"> 
                <i class="icon-angle-right"></i>
            </a>
        {% endif %}
        {% endif %}
        </div>
        <div class="block-content">
            {% if style == 1 %}
                {% set special = random([2, 3]) %}
                {% set limit = 5 %}
            <div class="column {% if special == 3 %}column-special{% endif %}">
            {% else %}
                {% set special = random(['column-special', '']) %}
                {% set limit = 6 %}
            <div class="column {{ special }}">
            {% endif %}

            {% for post in posts|slice(0, limit) %}
                {% set user = users[post.user_id] %}
                <div class="feed-container feed{{ loop.index }}">
                    <div class="feed post post_in_block post-item" data-url="{{ path('PostLike', {post_slug: post.slug, post_type: post_type}) }}" data-is-liked="{{ post.isUserLiked }}">
                        <div class="yes-dropdown">
                            <div class="dropdown">
                               <a class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-caret-down"></i>
                               </a>
                               <ul class="dropdown-menu">
                                    <li class="unlike-post {% if post.isUserLiked == 0 %}hidden{% endif %}">
                                        <a href="#"><i class="icon-thumbs-down"></i> Unlike</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="post_header">
                            <h4 class="post_title" title="{{ post.title }}">
                                <a href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}">{{ post.title }}</a>
                            </h4>
                            <div class="post_meta">
                                <span class="user_info fl">
                                    <a class="image" href="{{ path('WallPage', {user_slug: user.slug}) }}">
                                        <img src="{{ user.avatar }}" alt="{{ user.username }}" />
                                    </a>
                                    <a class="name" href="{{ path('WallPage', {user_slug: user.slug}) }}">
                                        {{ user.username }}
                                    </a>
                                </span>
                                <span class="post_time fl">
                                    <i class="icon-calendar"></i> 
                                    <d class="timeago" title="{{ post.created|date(date_format) }}"></d>
                                </span>
                                <span class="post_cm fr">
                                    <a href="#" title="Comment ({{ post.comment_count }})" class="open-comment" 
                                        data-url="{{ path('CommentList', {post_slug: post.slug, post_type: post_type}) }}"
                                        data-comment-count="{{ post.comment_count }}"
                                        data-comment-url="{{ path('CommentAdd', {post_slug: post.slug, post_type: post_type}) }}">
                                        <i class="icon-comments medium-icon"></i>
                                    </a>
                                    <a href="#" class="view-list-user" 
                                        data-view-title="People comment on this post"  
                                        data-view-type="comment" 
                                        data-post-slug="{{ post.slug }}" 
                                        data-post-type="{{ post_type }}"
                                        data-type-slug="{{ branch.slug }}">
                                        <d>{{ post.comment_count }}</d>
                                    </a>
                                </span>
                                <span class="post_like fr">
                                    <a class="like-post {% if post.isUserLiked == 1 %}hidden{% endif %}" href="#">
                                        <i class="icon-thumbs-up medium-icon"></i>
                                    </a>
                                    <span class="liked-post {% if post.isUserLiked == 0 %}hidden{% endif %}">
                                        Liked
                                    </span>
                                    <a class="post-liked-list" href="#" data-url="{{ path('PostGetLiker', {post_type: post_type, post_slug: post.slug}) }}" data-like-count="{{ post.like_count }}">{{ post.like_count }}</a>
                                </span>
                            </div>
                        </div>
                        <div class="post_body">
                            <div class="post_image">
                                <a href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}">
                                    <img src="{{ post.image }}" alt="title">
                                </a>                                
                            </div>
                            <div class="post_text_raw">
                                <a href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}">
                                    {{ post.description }}
                                </a>
                            </div> 
                        </div>
                    </div>
                </div>
                {% if style == 1 and loop.index % special == 0 and loop.index != 5 %}
                    {% if special == 2 %}
                        {% set special = 3 %}
                    {% else %}
                        {% set special = 6 %}
                    {% endif %}
            </div>
            <div class="column {% if special == 3 %}column-special{% endif %}">
                    {% set special = 6 %}
                {% elseif style == 2 and loop.index % 2 == 0 and loop.index != 6 %}
                    {% set special = random(['column-special', '']) %}
            </div>
            <div class="column {{ special }}">
                {% endif %}
            {% endfor %}
            </div>
        </div>
	</div>
{% endblock %}