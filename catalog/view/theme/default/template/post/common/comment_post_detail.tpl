{% block post_common_comment_post_detail_style %}
<link href="{{ asset_css('comment.css') }}" rel="stylesheet" media="screen" />
{% endblock %}

{% block post_common_comment_post_detail %}
	<div id="comment-box" class="y-box comment-wrapper">
		<div class="comment-container"> 
			<div class="y-box-header">
				Comment box (<span class="counter"><d>{{ comments|length }}<d></span>)
				<div class="y-box-expand">
					<a href="#" class="btn-expand" title="Expand">
						<i class="icon-arrow-left"></i>
					</a>
					<a href="#" class="btn-restore" title="Restore" style="display: none;">
						<i class="icon-arrow-right"></i>
					</a>
					<a href="#" class="btn-close" title="Hide">
						<i class="icon-remove"></i>
					</a>
				</div>				
			</div>
			<div class="y-box-content comment-body">
				{% for comment in comments %}
				<div class="comment-item">
			        <div class="avatar_thumb">
			            <a href="{{ comment.href_user }}">
			                <img src="{{ comment.avatar }}" alt="{{ comment.author }}">
			            </a>
			        </div>
			        <div class="comment-meta">
			            <div class="comment-info" data-url="{{ comment.href_like }}"
			                data-comment-liked="{{ comment.is_liked }}" data-id="{{ comment.id }}" data-like-count="{{ comment.like_count }}" data-url-edit="{{ comment.href_edit }}" data-url-delete="{{ comment.href_delete }}">
			                <a href="{{ comment.href_user }}">{{ comment.author }}</a> 
			                <span class="comment-time">
			                    <d class="timeago" title="{{ comment.created }}"></d>
			                </span>
			                <span class="like-container">
			                	<a href="#" class="like-comment{% if comment.is_liked == 1 %} hidden{% endif %}"><i class="icon-thumbs-up medium-icon"></i> Like </a>
			                	<strong class="liked-label{% if comment.is_liked == 0 %} hidden{% endif %}">Liked </strong>
			                	&nbsp;(<a class="like-count"
			                    data-url="{{ comment.href_liked_user }}"
			                    href="#">{{ comment.like_count }}</a>) </span>
			            </div>
			            <div class="comment-content">
			                {{ comment.content|raw }}
			            </div>
			        </div>
			        <div class="clear">
			        </div>
			        <div class="yes-dropdown option-dropdown">
			            <div class="dropdown">
			                <a class="dropdown-toggle" data-toggle="dropdown"><i class="icon-reorder"></i></a>
			                <ul class="dropdown-menu">
			                    <li class="un-like-btn{% if comment.is_liked == 0 %} hidden{% endif %}"><a href="#"><i class="icon-thumbs-down"></i>Unlike</a> </li>
			                    {% if comment.is_owner == true %}
			                    <li class="divider"></li>
			                    <li class="edit-comment-btn">
							     	<a class="link-popup" href="#" data-mfp-src="#comment-advance-edit-popup"><i class="icon-edit"></i>Edit</a>
						     	</li>
						     	<li class="divider"></li>
							    <li class="delete-comment-btn">
							    	<a href="#"><i class="icon-trash"></i>Delete</a>
							    </li>
							    {% endif %}
			                </ul>
			            </div>
			        </div>
			    </div>
			    {% endfor %}
				<div id="add-more-item"></div>
			</div>
			{% if post is defined %}
				{% set add_comment_url = path('CommentAdd', {post_slug: post.slug, post_type: post_type}) %}
			{% endif %}
			{{ block('common_html_block_comment_quick_form') }}
			{{ block('common_html_block_comment_advance_form') }}
			{% set advance_comment_id = 'comment-advance-edit-popup' %}
			{{ block('common_html_block_comment_advance_form') }}
		</div>
	</div>
	{{ block('common_html_block_comment_item_template') }}
{% endblock %}

{% block post_common_comment_post_detail_javascript %}
<script type="text/javascript" src="{{ asset_js('post.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('comment.js') }}"></script>
{% endblock %}