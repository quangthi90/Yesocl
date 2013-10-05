{% block post_common_post_block_list %}
	<div class="feed-block">
        <div class="block-header">
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
                <div class="feed-container feed{{ loop.index }}">
                    <div class="feed post post_in_block">
                        <div class="post_header">
                            <h4 class="post_title">
                                <a href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}">{{ post.title }}</a>
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
                                <div class="post_remove">
                                    <a href="#" title="Delete"><i class="icon-remove"></i></a>
                                </div>
                                <div class="post_action">
                                    <div class="action_tool">
                                        <a class="like-post" href="#" title="{% if post.isUserLiked == 0 %}Like{% else %}Unlike{% endif %}"
                                            data-url="{{ path('PostLike', {post_slug: post.slug, post_type: post_type}) }}"
                                            data-post-liked="{{ post.isUserLiked }}"
                                        >
                                            {% if post.isUserLiked == 0 %}
                                                <i class="icon-thumbs-up medium-icon"></i>
                                            {% else %}
                                                <i class="icon-thumbs-down medium-icon"></i>
                                            {% endif %}
                                        </a>
                                        <a href="#" title="Comment ({{ post.comment_count }})" class="open-comment" 
                                            data-url="{{ path('CommentList', {post_slug: post.slug, post_type: post_type}) }}"
                                            data-comment-count="{{ post.comment_count }}"
                                            data-comment-url="{{ path('CommentAdd', {post_slug: post.slug, post_type: post_type}) }}"
                                        >
                                            <i class="icon-comments medium-icon"></i>
                                        </a>
                                        <a href="{{ path('PostPage', {post_type: post_type, post_slug: post.slug}) }}" title="View"><i class="icon-eye-open medium-icon"></i></a>
                                    </div>
                                    <div class="who-action">
                                        <a href="#" class="view-list-liker" 
                                            data-view-title="People like this post" 
                                            data-view-type="like" 
                                            data-post-slug="{{ post.slug }}" 
                                            data-post-type="{{ post_type }}">
                                            <d>{{ post.like_count }}</d>
                                        </a>
                                        <a href="#" class="view-list-commenter" 
                                            data-view-title="People comment on this post"  
                                            data-view-type="comment" 
                                            data-post-slug="{{ post.slug }}" 
                                            data-post-type="{{ post_type }}"
                                            data-type-slug="{{ branch.slug }}">
                                            {{ post.comment_count }}
                                        </a>
                                        <a href="#" class="view-list-viewer" 
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