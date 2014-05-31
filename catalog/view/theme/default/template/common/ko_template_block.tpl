{% block common_ko_template_style %}
<link href="{{ asset_css('comment.css') }}" rel="stylesheet" media="screen" />
{% endblock %}
{% block common_ko_template_comment %}
<div class="y-control" data-bind="with: $root.commentBoxModel">
	<div class="y-box comment-box" data-bind="attr:{ 'id' : controlId }, style: { 'width' : widthControl() + 'px' } ">
		<div class="comment-container"> 
			<div class="y-box-header">
				{% trans %}Comment box{% endtrans %} (<span class="counter" data-bind="text: commentList().length + '/' + currentTotalComment()"></span>)
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
				<!-- ko if: isLoadingMore() -->
				<p style="background-color: rgb(240, 240, 240); padding: 5px 10px; text-align: center;"><i class="icon-spin icon-spinner"></i> {% trans %}Loading{% endtrans %} ... </p>
				<!-- /ko -->				
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
				                	&nbsp;(<a title="{% trans %}See users liked{% endtrans %}" class="like-count" data-bind="text: likeCount, click: $parent.showLikers"></a>)
				                </span>
				            </div>
				            <div class="comment-content" data-bind="html: content, seeMore: true, zoomImage: content">
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
								     	<a data-bind="click: $parent.editComment"><i class="icon-edit"></i>{% trans %}Edit{% endtrans %}</a>
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
				<textarea required data-bind="mention: content, executeOnEnter: $parent.addCommentByEnter, attr:{ 'readonly' : $parent.isProcessing() }" class="post_input" placeholder="comment ..." style="font-size: 12px;"></textarea>
			</div>
			<div class="comment-action">
				<a data-bind="click: $parent.startAdvanceComment" class="fl btn-comment"><i class="icon-external-link"></i></a>
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
	<div class="mfp-hide y-dlg-container" id="comment-advance-form">
		<div class="y-dlg">
			<div class="dlg-title">
		        <i class="icon-yes"></i> {% trans %}Advanced comment{% endtrans %}
		    </div>
		    <div class="dlg-content">
		    	<div class="control-group">
	    			<label class="control-label">{% trans %}Comment{% endtrans %}</label>
			    	<div class="y-editor post-advance-content"></div>
		    	</div>
		    </div>
		    <div class="dlg-footer">
		    	<div class="controls">
		    		<a class="btn btn-yes" data-bind="click: saveComment">{% trans %}Submit{% endtrans %}</a>
	                <button class="btn btn-yes" data-bind="click: closeAdvanceBox">{% trans %}Close{% endtrans %}</button>
	            </div>
		    </div>
		</div>
	</div>
</div>
{% endblock %}
{% block common_ko_template_user_box %}
<div class="y-control hidden">
	<div class="y-dlg-container" data-bind="with: $root.userBoxModel, attr:{ 'id' : $root.userBoxModel.controlId }" style="width: 600px;">
		<div class="y-dlg">
			<div class="dlg-title">
		        <i class="icon-yes"></i> 
		        <span class="js-advance-post-title">{% trans %}Who liked{% endtrans %}</span>
		    </div>
		    <div class="dlg-content" style="min-height: 300px;max-height: 450px;overflow-y: auto;">
		    	<!-- ko if: userList().length > 0 -->
				<ul class="user-viewer" data-bind="foreach: userList">
					<li class="user-item">
						<div class="user-item-info">
							<a class="user-item-avatar fl" data-bind="link: { title: username, route: 'WallPage', params: { user_slug: slug } }">
				                <img data-bind="attr : { 'src' : avatar, alt : username, title : username }">
				            </a>
							<div class="user-item-overview">
								<a class="user-item-name" data-bind="link: { text: username, title: username, route: 'WallPage', params: { user_slug: slug } }"></a> 					
								<span data-bind="attr : { title: current }, text: current"></span>
							</div>
						</div>
						<div class="user-actions" style="display: block;">
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
							<!-- ko if: friendStatus() == 4 -->
							<a class="btn btn-yes friend-group" data-bind="click: makeFriend">
								<i class="icon-plus-sign"></i> {% trans %}Make Friend{% endtrans %}
							</a>
							<!-- /ko -->
							<!-- ko if: followStatus() == 2 -->
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
			                <a class="btn btn-yes follow-group" data-bind="click: follow">
								<i class="icon-rss"></i> {% trans %}Follow{% endtrans %}
							</a>
							<!-- /ko -->
						</div>
					</li>
				</ul>
				<!-- /ko -->
				<!-- ko if: userList().length == 0 -->
				<p>No users found !</p>
				<!-- /ko -->
		    </div>
		    <div class="dlg-footer" style="display: none;">
		    	<div class="controls">
		    		<button class="btn btn-yes">{% trans %}Close{% endtrans %}</button>
	            </div>
		    </div>
		</div>
	</div>
</div>
{% endblock %} }
