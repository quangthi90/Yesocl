{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/common/html_block.tpl' %}
{% use '@template/default/template/post/common/comment_post_detail.tpl' %}

{% block title %}{{ post.title }}{% endblock %}

{% block stylesheet %}
    <link href="{{ asset_css('post-detail.css') }}" rel="stylesheet" media="screen" />
    {{ block('post_common_comment_post_detail_style') }}
{% endblock %}

{% block body %}
<div id="y-content" class="no-scroll">
	<div id="post-detail">
		<div id="detail-header">
			<div class="goback-link fl">
				<a href="#" class="tooltip-bottom btn-goback" title="Go back" > 
					<i class="icon-arrow-left medium-icon"></i>					
				</a>
			</div>
			<div class="post-title-container">				
				<h2 class="post-title" title="{{ post.title }}">{{ post.title }}</h2>
				<div class="post-detail-meta">
					<div class="post-user-time fl">
						<a href="{{ path('WallPage', {user_slug: post.user_slug}) }}">
							<img class="small-avatar" src="{{ post.avatar }}" alt="{{ post.author }}">
						</a>
						<a href="{{ path('WallPage', {user_slug: post.user_slug}) }}">
							{{ post.author }}
						</a> - 
						<span class="post-time">
							{% set date_timeago = get_datetime_from_now(-2) %}
							{% if post.created >= date_timeago %}
                            <d class="timeago" title="{{ post.created|date('c') }}"></d>
                            {% else %}
                            <d title="{{ post.created|localizeddate('full', 'none', get_cookie('language'), null, "cccc, d MMMM yyyy '" ~ 'at'|trans ~ "' hh:ss") }}">{{ post.created|localizeddate('full', 'none', get_cookie('language'), null, "d MMMM '" ~ 'at'|trans ~ "' hh:ss") }}</d>
                            {% endif %}
						</span>
					</div>
					<ul class="post-actions fr post-item" data-url="{{ path('PostLike', {post_slug: post.slug, post_type: post_type}) }}" data-is-liked="{{ post.isUserLiked }}">
						<li>
							<a class="like-post{% if post.isUserLiked == 1 %} hidden{% endif %}" href="#" title="{% trans %}Like{% endtrans %}">
								<i class="icon-thumbs-up medium-icon"></i>
		                    </a>
		                    <span class="unlike-post{% if post.isUserLiked == 0 %} hidden{% endif %}">
			                    <a href="#" title="{% trans %}Unlike{% endtrans %}">
			                        <i class="icon-thumbs-down medium-icon"></i>
								</a>
							</span>
							<span class="number">
								<a class="post-liked-list" href="#" 
									data-url="{{ path('PostGetLiker', {post_type: post_type, post_slug: post.slug}) }}" 
									data-like-count="{{ post.like_count }}" 
									title="View who liked">
									<d>{{ post.like_count }}</d>
								</a>
							</span>
						</li>
						<li style="display: none;" class="toggle-comment">
							<a class="open-comment disabled" href="#" title="{% trans %}Open comment box{% endtrans %}">
								<i class="icon-comments-alt medium-icon"></i>
							</a>
							<span class="number" id="post-detail-comment-number">{{ comments|length }}</span>
						</li>
						<li>
							<a class="">
								<i class="icon-eye-open medium-icon"></i>
							</a>
							<span class="number">{{ post.count_viewer }}</span>
						</li>			
					</ul>			
					<div class="clear"></div>	
				</div>
			</div>
		</div>		
		<div id="detail-content">
			<div id="post-content">
				{{ post.content|raw }}
			</div>
			<div id="detail-scroll">
				<a class="btn-link-round fl" id="detail-first" href="#" style="display: none;">
					<i class="icon-arrow-left"></i>
				</a>
			</div>
			{{ block('post_common_comment_post_detail') }}
		</div>
	</div>
</div>
{% endblock %}

{% block template %}
    {{ block('post_common_comment_post_detail_template') }}
{% endblock %}

{% block javascript %}
<script type="text/javascript" src="{{ asset_js('detail.js') }}"></script>
{{ block('post_common_comment_post_detail_javascript') }}
{% endblock %}