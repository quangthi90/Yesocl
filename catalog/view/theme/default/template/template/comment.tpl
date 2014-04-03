{% block template_comment_post_list %}
	<div id="comment-box" class="y-box comment-box">
		<div class="comment-container"> 
			<div class="y-box-header">				
				{% trans %}Comment box{% endtrans %} (<span class="counter" data-bind="text: comment_count"></span>)
				<div class="y-box-expand">
					<a href="#" id="btn-expand" class="btn-expand" title="Expand">
						<i class="icon-indent-left"></i>
					</a>
					<a href="#" id="btn-restore" class="btn-restore" title="Restore" style="display: none;">
						<i class="icon-indent-right"></i>
					</a>
					<a href="#" id="btn-close" class="btn-close" title="Close">
						<i class="icon-remove"></i>
					</a>
				</div>
			</div>
			<div class="y-box-content comment-body" data-bind="foreach: comments">
				<div class="comment-item">
					<div class="avatar_thumb">
						<a data-bind="attr: {href: user.href}">
							<img data-bind="attr: {src: user.avatar, alt: author}">
						</a>
					</div>
					<div class="comment-meta">
						<div class="comment-info">
							<a data-bind="attr: {href: user.href}, text: author"></a>
							<span class="comment-time">
								<!--  if: timeago() -->
		                        <!-- <d class="timeago" data-bind="attr: { title: created }"></d> -->
		                        <!-- / -->
		                        <!--  if: !timeago() -->
		                        <!-- <d  data-bind="attr: { title: created_full }, text: created_short"></d> -->
		                        <!-- / -->
							</span>
							<span class="like-container">
								<!-- ko if: !is_liked() -->
								<a href="#" class="like-comment" data-bind="click: likeComment">
									<i class="icon-thumbs-up medium-icon"></i> {% trans %}Like{% endtrans %}
								</a>
								<!-- /ko -->
								<!-- ko if: is_liked() -->
								<strong class="liked-label">{% trans %}Liked{% endtrans %}
								</strong>
								<!-- /ko -->
								&nbsp;(<a class="like-count" href="#" data-bind="text: like_count, click: showLikers"></a>)
							</span>		
						</div>
						<div class="comment-content" data-bind="text: content"></div>
					</div>
					<div class="clear"></div>
					<div class="yes-dropdown option-dropdown">
						<div class="dropdown">
						   	<a class="dropdown-toggle" data-toggle="dropdown">
						    	<i class="icon-reorder"></i>
						   	</a>
						   	<ul class="dropdown-menu">
						   		<!-- ko if: is_liked() -->
						   		<li class="un-like-btn">
							     	<a href="#" data-bind="click: likeComment"><i class="icon-thumbs-down"></i>{% trans %}Unlike{% endtrans %}</a>
						     	</li>
						     	<!-- /ko -->
						     	<!-- ko if: is_edit() -->
							    <li class="edit-comment-btn">
							     	<a class="link-popup" href="#" data-mfp-src="#comment-advance-edit-popup"><i class="icon-edit"></i>{% trans %}Edit{% endtrans %}</a>
						     	</li>
						     	<!-- /ko -->
						     	<!-- ko if: is_del() -->
							    <li class="delete-comment-btn">
							    	<a href="#"><i class="icon-trash"></i>{% trans %}Delete{% endtrans %}</a>
							    </li>
							    <!-- /ko -->
						    </ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{ block('common_html_block_comment_quick_form') }}
	</div>
{% endblock %}