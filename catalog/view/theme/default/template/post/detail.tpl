{% extends '@template/default/template/common/layout.tpl' %}

{% use '@template/default/template/post/common/post_comment_in_page.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
	<link href="{{ asset_css('libs/jquery-ui-1.10.3.custom.min.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ asset_css('post-detail.css') }}" rel="stylesheet" media="screen" />
    {{ block('post_common_post_comment_in_page_style') }}
{% endblock %}

{% block body %}
<div id="y-content" class="no-scroll">
	<div id="post-detail">
		<div id="detail-header">
			<div class="goback-link fl">
				<a href="#" class="btn-link-round btn-goback" title="Go back" > 
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
						<span class="post-time timeago">
							{{ post.created|date(date_format) }}
						</span>
					</div>
					<ul class="post-actions fr">
						<li>
							<a class="like-post" href="#"
							data-url="{{ path('PostLike', {post_slug: post.slug, post_type: post_type}) }}" data-post-liked="{{ post.isUserLiked }}">
							{% if post.isUserLiked == 0 %}
		                        <i class="icon-thumbs-up medium-icon"></i>
		                    {% else %}
		                        <i class="icon-thumbs-down medium-icon"></i>
		                    {% endif %}
							</a>
							<span class="number">
								<a href="#">{{ post.like_count }}</a>
							</span>
						</li>
						<li>
							<a class="">
								<i class="icon-eye-open medium-icon"></i>
							</a>
							<span class="number">1k</span>
						</li>			
					</ul>			
					<div class="clear"></div>	
				</div>
			</div>
		</div>		
		<div id="detail-content">
			<div id="post-content">
				{{ post.content|raw }}
				{{ post.content|raw }}
				{{ post.content|raw }}
			</div>
			{{ block('post_common_post_comment_in_page') }}
		</div>
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript" src="{{ asset_js('jquery/jquery-ui-1.10.3.custom.min.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('detail.js') }}"></script>
{{ block('post_common_post_comment_in_page_javascript') }}
{% endblock %}