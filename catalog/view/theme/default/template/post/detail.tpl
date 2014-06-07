{% extends '@template/default/template/common/layout.tpl' %}
{% use '@template/default/template/common/ko_template_block.tpl' %}

{% block title %}{{ post.title }}{% endblock %}

{% block stylesheet %}
	{{ block('common_ko_template_style') }}
    <link href="{{ asset_css('post-detail.css') }}" rel="stylesheet" media="screen" />    
{% endblock %}

{% block body %}
<div id="y-content" class="no-scroll">
	<div id="post-detail" data-bind="with: detailModel">
		<div id="detail-header">
			<div class="goback-link fl">
				<a class="tooltip-bottom btn-goback" title="Go back" > 
					<i class="icon-arrow-left medium-icon"></i>					
				</a>
			</div>
			<div class="post-title-container">				
				<h2 class="post-title" title="{{ post.title }}">{{ post.title }}</h2>
				<div class="post-detail-meta">
					<div class="post-user-time fl">
						<a href="{{ path('WallPage', {user_slug: post.user_slug}) }}">
							<img class="small-avatar" src="{{ post.user.avatar }}" alt="{{ post.author }}">
						</a>
						<a href="{{ path('WallPage', {user_slug: post.user_slug}) }}">
							{{ post.author }}
						</a>
						<span style="color: #CCC;">&nbsp;|&nbsp;</span>
						<span class="post-time" data-bind="timeAgo: {{ post.created }}"></span>
						{% if post.is_owner == false %}
							<span style="color: #CCC;">&nbsp;|&nbsp;</span>
							<a href="{{ post.owner.href }}">{{ post.owner.username }}</a>
						{% endif  %}					
					</div>
					<ul class="post-actions fr post-item">
						{% if is_logged() == true %}
						<li>
							<!-- ko if: !postData.isLiked() -->
							<a class="like-post" title="{% trans %}Like{% endtrans %}" data-bind="click: likePost">
								<i class="icon-thumbs-up medium-icon"></i>
		                    </a>
		                    <!-- /ko -->
		                    <!-- ko if: postData.isLiked() -->
		                    <span class="unlike-post" data-bind="click: likePost">
			                    <a title="{% trans %}Unlike{% endtrans %}">
			                        <i class="icon-thumbs-down"></i>
								</a>
							</span>
							<!-- /ko -->
							<span class="number">
								<a class="post-liked-list" title="View who liked" data-bind="click: showLikers">
									<d data-bind="text: postData.likeCount">{{ post.like_count }}</d>
								</a>
							</span>
						</li>
						<li class="toggle-comment">
							<a class="open-comment" data-bind="click: showComment" title="{% trans %}Open comment box{% endtrans %}">
								<i class="icon-comments-alt"></i>
							</a>
							<span class="number">
								<d data-bind="text: postData.commentCount">{{ post.comment_count }}</d>
							</span>
						</li>
						{% else %}
						<li>
							<a class="disabled">
								<i class="icon-thumbs-up medium-icon"></i>
		                    </a>
							<span class="number">
								<d>{{ post.like_count }}</d>
							</span>
						</li>
						<li class="toggle-comment">
							<a class="disabled">
								<i class="icon-comments-alt"></i>
							</a>
							<span class="number">
								<d>{{ post.comment_count }}</d>
							</span>
						</li>
						{% endif  %}
						<li>
							<a class="disabled">
								<i class="icon-eye-open"></i>
							</a>
							<span class="number">
								<d>{{ post.count_viewer }}</d>
							</span>
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
				<a class="btn-link-round fl" id="detail-first" style="display: none;">
					<i class="icon-arrow-left"></i>
				</a>
			</div>
		</div>
	</div>
	{{ block('common_ko_template_comment') }}
    {{ block('common_ko_template_user_box') }}
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript" src="{{ asset_js('ko-vms.js') }}"></script>
<script type="text/javascript" src="{{ asset_js('ko-detail.js') }}"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var detailInfo = {
			isLogged : {{ is_logged() }},
			postData : {
				id: '{{ post.id|raw }}',
				slug: '{{ post.slug|raw }}',
				type: '{{ post.type|raw }}',
				created: '{{ post.created|raw }}',
				comment_count: {{ post.comment_count }},
				like_count: {{ post.like_count }},
				count_viewer: {{ post.count_viewer }},
				isLiked: '{{ post.isLiked|raw }}' === '1',
				category_id: '{{ post.category_id|raw }}',
				category_slug: '{{ post.category_slug|raw }}',
				category_name: '{{ post.category_name|raw }}'
			}
		};
		var commentBoxOptions = {
            Id : "comment-box"
        };
        var userBoxOptions = {
        };
		var viewModel = {
			detailModel: new DetailFormView(detailInfo),
			commentBoxModel : new CommentBoxViewModel(commentBoxOptions),
            userBoxModel : new UserBoxViewModel(userBoxOptions)
		};
		ko.applyBindings(viewModel, document.getElementById(YesGlobal.Configs.defaultBindingElement));
	});
</script>
{% endblock %}