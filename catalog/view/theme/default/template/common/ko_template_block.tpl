{% block common_ko_template_style %}
<link href="{{ asset_css('comment.css') }}" rel="stylesheet" media="screen" />
{% endblock %}
{% block common_ko_template_comment %}
<div class="y-control" data-bind="with: $root.commentBoxModel">
	<div class="y-box comment-box" data-bind="attr:{ 'id' : controlId }, style: { 'width' : widthControl() + 'px' } ">
		<div class="comment-container"> 
			<div class="y-box-header">
				{% trans %}Comment box{% endtrans %} (<span class="counter"><d data-bind="text: commentList().length"><d></span>)
				<div class="y-box-expand">
					<!-- ko if: canExpand() -->
					<a data-bind="click: expandCommentBox" class="btn-expand">
						<i class="icon-arrow-left"></i>
					</a>
					<!-- /ko -->
					<!-- ko if: !canExpand() -->
					<a data-bind="click: expandCommentBox" class="btn-expand">
						<i class="icon-arrow-right"></i>
					</a>
					<!-- /ko -->
					<a data-bind="click: closeCommentBox" class="btn-close">
						<i class="icon-remove"></i>
					</a>
				</div>				
			</div>
			<div class="y-box-content comment-body">
				<ul class="comment-list" data-bind="foreach: { data: commentList, beforeRemove: makeDeleteEffect, afterAdd: makeAddEffect }">
					<li class="comment-item">
				        <div class="avatar_thumb">
				            <a data-bind="link: { title: user.author, route: 'WallPage', params: { user_slug: user.slug } }">
				                <img data-bind="attr : { 'src' : user.avatar, alt : user.username, title : user.username }">
				            </a>
				        </div>
				        <div class="comment-meta">
				            <div class="comment-info">
				                <a data-bind="link: { text: user.username, title: user.username, route: 'WallPage', params: { user_slug: user.slug } }"></a> 
				                <span class="comment-time" data-bind="timeAgo: created">
				                </span>
				                <span class="like-container">
				                	<!-- ko if: isLiked() -->
				                	<strong class="liked-label">{% trans %}Liked{% endtrans %}</strong>
				                	<!-- /ko -->
				                	<!-- ko if: !isLiked() -->
				                	<a data-bind="click: $parent.likeComment" class="like-comment"><i class="icon-thumbs-up"></i></a>
				                	<!-- /ko -->				                	
				                	&nbsp;(<a class="like-count" data-bind="text: likeCount"></a>)
				                </span>
				            </div>
				            <div class="comment-content" data-bind="html: content, seeMore: true">	                
				            </div>
				        </div>
				        <!-- ko if: isLiked() || canEdit || canDelete -->
				        <div class="yes-dropdown option-dropdown">
				            <div class="dropdown">
				                <a class="dropdown-toggle" data-toggle="dropdown"><i class="icon-reorder"></i></a>
				                <ul class="dropdown-menu">
				                	<!-- ko if: isLiked() -->
				                    <li class="un-like-btn">
				                    	<a data-bind="click: $parent.likeComment"><i class="icon-thumbs-down"></i>{% trans %}Unlike{% endtrans %}</a>
				                    </li>
				                    <!-- /ko -->
				                    <!-- ko if: canEdit -->				                    
				                    <li class="edit-comment-btn">
								     	<a><i class="icon-edit"></i>{% trans %}Edit{% endtrans %}</a>
							     	</li>
							     	<!-- /ko -->
							     	<!-- ko if: canDelete -->
								    <li class="delete-comment-btn">
								    	<a data-bind="click: $parent.deleteComment"><i class="icon-trash"></i>{% trans %}Delete{% endtrans %}</a>
								    </li>
								    <!-- /ko -->
				                </ul>
				            </div>
				        </div>
				        <!-- /ko -->
				    </li>
				</ul>
			</div>
		</div>
		<div class="y-comment-reply post post_new comment-form" data-bind="with: initComment">
			<div class="txt_editor">
				<textarea required data-bind="mention: content, executeOnEnter: $parent.addCommentByEnter, attr:{ 'readonly' : $parent.isProcessing() }" class="post_input" placeholder="comment ..."></textarea>
			</div>
			<div class="comment-action">
				<!-- ko if: !$parent.enterToSend() -->
				<a data-bind="click: $parent.addComment" class="btn btn-yes fr btn-comment">{% trans %}Post{% endtrans %}</a>
				<!-- /ko -->
                <div class="fr comment-press-enter checkbox">  
                	<label style="font-size: 12px; display: inline-flex;">
                		{% trans %}Press Enter to send{% endtrans %}
                		<input type="checkbox" class="checkbox" style="margin: 0px 10px 0px 5px;" data-bind="checked: $parent.enterToSend" data-no-uniform="true" />
                	</label>  
                </div>
			</div>
		</div>
	</div>
</div>
{% endblock %}
{% block common_ko_template_user_box %}
<div class="y-control hidden" data-bind="with: $root.userBoxModel">
	<div data-bind="attr:{ 'id' : controlId }">
		<!-- ko if: userList().length > 0 -->
		<ul class="user-list-box" data-bind="foreach: userList">
			<li class="user-item">
				<div class="user-item-info">
					<a data-bind="link: { title: username, route: 'WallPage', params: { user_slug: slug } }">
		                <img data-bind="attr : { 'src' : avatar, alt : username, title : username }">
		            </a>
					<div class="user-item-overview">
						<a data-bind="link: { text: user.username, title: user.username, route: 'WallPage', params: { user_slug: user.slug } }"></a> 					
						<span data-bind="attr : { title: current }, text: current"></span>
					</div>
				</div>
				<div class="user-actions friend-actions">
					<!-- ko if: friendStatus() == 2 -->
					<div class="dropdown friend-group">
						<a class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Friend{% endtrans %}</a>
	                    <ul class="dropdown-menu" role="menu">
	                        <li><a data-bind="click: unFriend">{% trans %}Unfriend{% endtrans %}</a></li>
	                    </ul>
	                </div>
					<!-- /ko -->
					<!-- ko if: friendStatus() == 3 -->
					<div class="dropdown friend-group">
						<a class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Sent Request{% endtrans %}</a>
	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                            <a data-bind="click: cancelRequest">{% trans %}Cancel Request{% endtrans %}</a>
	                        </li>
	                    </ul>
	                </div>
					<!-- /ko -->
					<!-- ko if: friendStatus() == 3 -->
					<button class="btn btn-yes friend-group" data-bind="click: makeFriend">
						<i class="icon-plus-sign"></i> {% trans %}Make Friend{% endtrans %}
					</button>
					<!-- /ko -->
					<!-- ko if: followStatus() == 3 -->
					<div class="dropdown follow-group">
						<a class="btn btn-yes dropdown-toggle" role="button" data-toggle="dropdown"><i class="icon-ok"></i> {% trans %}Following{% endtrans %}</a>
	                    <ul class="dropdown-menu" role="menu">
	                        <li>
	                            <a class="btn-unfollow" data-bind="click: unFollow">{% trans %}Unfollow{% endtrans %}</a>
	                        </li>
	                    </ul>
	                </div>
	                <!-- /ko -->
	                <!-- ko if: followStatus() == 3 -->
	                <button class="btn btn-yes btn-friend follow-group" data-bind="click: follow">
						<i class="icon-rss"></i> {% trans %}Follow{% endtrans %}
					</button>
					<!-- /ko -->
				</div>
			</li>
		</ul>
		<!-- /ko -->
		<!-- ko if: userList().length == 0 -->
		<p>No users found !</p>
		<!-- /ko -->
	</div>
</div>
{% endblock %} }