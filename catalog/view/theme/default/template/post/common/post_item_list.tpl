{% block post_common_post_item_list %}
	<div class="feed-block">
        <div class="block-header">
        {% if block_info is defined %}
        {% if is_back_btn is defined and is_back_btn == true %}
            <a class="block-back fl" href="#" onclick="history.go(-1); return false;"> 
                <i class="icon-arrow-left"></i>
            </a>
            <a class="block-title fl" href="{{ block_href }}">{{ block_info.name }}</a>
        {% else %}
            <a class="block-title fl" href="{{ block_href }}">{{ block_info.name }}</a>
            <a class="block-seemore fl" href="{{ block_href }}"> 
                <i class="icon-arrow-right"></i>
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

            {% set date_timeago = get_datetime_from_now(-2) %}
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
                                        <a href="#"><i class="icon-thumbs-down"></i> {% trans %}Unlike{% endtrans %}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="post_header">
                            {% if post.title is empty %}
                            <div class="post_user">
                                <a class="image" href="{{ path('WallPage', {user_slug: user.slug}) }}">
                                    <img class="small-avatar" src="{{ user.avatar }}" alt="{{ user.username }}" />
                                </a>
                                <a href="{{ path('WallPage', {user_slug: user.slug}) }}" class="name">{{ user.username }}
                                </a>
                                {% if post.owner_id is defined and post.owner_id != null and post.owner_id != user.id %}
                                <span><i class="icon-caret-right"></i></span>
                                <a href="{{ path('WallPage', {user_slug: users[post.owner_id].slug}) }}" class="name">{{ users[post.owner_id].username }}
                                </a>
                                {% endif %}
                            </div> 
                            {% else %}
                            <h4 class="post_title" title="{{ post.title }}">
                                <a href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}">{{ post.title }}</a>
                            </h4>
                            {% endif %}
                            <div class="post_meta">
                                {% if post.title is not empty %}
                                <span class="user_info fl">
                                    <a class="image" href="{{ path('WallPage', {user_slug: user.slug}) }}">
                                        <img class="small-avatar" src="{{ user.avatar }}" alt="{{ user.username }}" />
                                    </a>
                                    <a class="name" href="{{ path('WallPage', {user_slug: user.slug}) }}">
                                        {{ user.username }}
                                    </a>
                                </span>
                                {% endif %}
                                <span class="post_time fl">
                                    <i class="icon-calendar"></i>
                                    {% if post.created >= date_timeago %}
                                    <d class="timeago" title="{{ post.created|date() }}"></d>
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
                                        <d class="number-counter">{{ post.comment_count }}</d>
                                    </a>
                                </span>
                                <span class="post_view fr">
                                    <i class="icon-eye-open"></i>
                                    <d class="number-counter">{{ post.count_viewer }}</d>
                                </span>
                            </div>
                        </div>
                        <div class="post_body">
                            <div class="post_image">
                                <a href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}">
                                    <img src="{{ post.image }}" alt="{{ post.title }}">
                                </a>                                
                            </div>
                            <div class="post_text_raw">
                                <a href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}">
                                    {{ post.description|raw }}
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