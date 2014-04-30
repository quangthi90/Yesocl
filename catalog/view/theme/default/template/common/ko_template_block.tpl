{% block common_ko_template_style %}
<link href="{{ asset_css('comment.css') }}" rel="stylesheet" media="screen" />
{% endblock %}
{% block common_ko_template_comment %}
<div class="y-control" data-bind="with: $root.commentBoxModel">
	<div class="y-box comment-box" data-bind="attr:{ 'id' : controlId }">
		<div class="comment-container"> 
			<div class="y-box-header">
				{% trans %}Comment box{% endtrans %} (<span class="counter"><d data-bind="text: commentList().length"><d></span>)
				<div class="y-box-expand">
					<a href="#" class="btn-expand" title="Expand">
						<i class="icon-arrow-left"></i>
					</a>
					<a data-bind="click: closeCommentBox" class="btn-close" title="Hide">
						<i class="icon-remove"></i>
					</a>
				</div>				
			</div>
			<div class="y-box-content comment-body">
				<ul class="comment-list" data-bind="foreach: commentList">
					<li class="comment-item">
				        <div class="avatar_thumb">
				            <a data-bind="link: { title: author, route: 'WallPage', params: { user_slug: authorSlug } }">
				                <img data-bind="attr : { 'src' : authorAvatar, alt : author, title : author }">
				            </a>
				        </div>
				        <div class="comment-meta">
				            <div class="comment-info">
				                <a data-bind="link: { text: author, title: author, route: 'WallPage', params: { user_slug: authorSlug } }"></a> 
				                <span class="comment-time" data-bind="text: created">
				                </span>
				                <span class="like-container">
				                	<!-- ko if: isLiked() -->
				                	<strong class="liked-label">{% trans %}Liked{% endtrans %}</strong>
				                	<!-- /ko -->
				                	<!-- ko if: !isLiked() -->
				                	<a class="like-comment"><i class="icon-thumbs-up"></i></a>
				                	<!-- /ko -->				                	
				                	&nbsp;(<a class="like-count" data-bind="text: likeCount"></a>)
				                </span>
				            </div>
				            <div class="comment-content" data-bind="html: content">		                
				            </div>
				        </div>
				        <div class="clear">
				        </div>
				        <div class="yes-dropdown option-dropdown">
				            <div class="dropdown">
				                <a class="dropdown-toggle" data-toggle="dropdown"><i class="icon-reorder"></i></a>
				                <ul class="dropdown-menu">
				                	<!-- ko if: isLiked() -->
				                    <li class="un-like-btn">
				                    	<a><i class="icon-thumbs-down"></i>{% trans %}Unlike{% endtrans %}</a>
				                    </li>
				                    <li class="divider"></li>
				                    <!-- /ko -->
				                    <!-- ko if: isLiked() -->				                    
				                    <li class="edit-comment-btn">
								     	<a class="link-popup" data-mfp-src="#comment-advance-edit-popup"><i class="icon-edit"></i>{% trans %}Edit{% endtrans %}</a>
							     	</li>
							     	<li class="divider"></li>
								    <li class="delete-comment-btn">
								    	<a><i class="icon-trash"></i>{% trans %}Delete{% endtrans %}</a>
								    </li>
								    <!-- /ko -->
								    {% endif %}
				                </ul>
				            </div>
				        </div>
				    </li>
				</ul>
			</div>
		</div>
	</div>
</div>
{% endblock %}