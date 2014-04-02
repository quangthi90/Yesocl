{% block template_post_item_single %}
	<div id="js-list-post" data-bind="foreach: single_posts">
		<div class="column">
			<div class="feed post post_status js-post-item" data-bind="attr: {'post-slug': slug}">
				<div class="yes-dropdown">
		            <div class="dropdown">
		               	<a class="dropdown-toggle" data-toggle="dropdown">
		                    <i class="icon-caret-down"></i>
		               	</a>
		               	<ul class="dropdown-menu">
		               		<!-- ko if: isUserLiked() -->
		               		<li class="js-unlike-post">
		                        <a href="#" data-bind="click: likePost"><i class="icon-thumbs-down medium-icon"></i> {% trans %}Unlike{% endtrans %}</a>
		                    </li>
		                    <!-- /ko -->
		                    <!-- ko if: is_edit -->
		                    <li class="post-edit-btn">
		                        <a href="#" class="link-popup" data-mfp-src=".js-advance-post"><i class="icon-edit"></i>{% trans %}Edit{% endtrans %}</a>
		                    </li>
		                    <!-- /ko -->
		                    <!-- ko if: is_del -->
		                    <li class="post-delete-btn">
		                        <a href="#"><i class="icon-trash"></i>{% trans %}Delete{% endtrans %}</a>
		                    </li>
		                    <!-- /ko -->
		                </ul>
		            </div>
		        </div>
				<div class="post_header">
					<div class="avatar_thumb">
						<a data-bind="attr: { href: user.href, title: user.username }">
							<img data-bind="attr: { src: user.avatar, alt: user.username }" />
						</a>
					</div>
					<div class="post_meta_info">
						<div class="post_user">
							<a data-bind="attr: { href: user.href, title: user.username }, text: user.username"></a>
							<!-- ko if: object -->
							<span><i class="icon-caret-right"></i></span>
							<a data-bind="attr: { href: object.href, title: object.name }, text: object.name"></a>
							<!-- /ko -->
						</div>
						<div class="post_meta">
							<span class="post_time fl">
								<i class="icon-calendar"></i>
								<!-- ko if: timeago() -->
		                        <d class="timeago" data-bind="attr: { title: created }"></d>
		                        <!-- /ko -->
		                        <!-- ko if: !timeago() -->
		                        <d  data-bind="attr: { title: created_full }, text: created_short"></d>
		                        <!-- /ko -->
							</span>
							<span class="post_like fr">
								<!-- ko if: !isUserLiked() -->
								<a class="js-like-post" href="#" data-bind="click: likePost">
									<i class="icon-thumbs-up medium-icon"></i>
		                        </a>
		                        <!-- /ko -->
		                        <!-- ko if: isUserLiked() -->
		                        <d>
		                            {% trans %}Liked{% endtrans %}
								</d>
								<!-- /ko -->
								<a class="post-liked-list" href="#" data-bind="click: showLikers">
									<d class="number-counter" data-bind="text: like_count"></d>
								</a>
							</span>
							<span class="post_cm fr">
								<a href="#" class="open-comment" data-bind="click: showComments">
									<i class="icon-comments-alt"></i>
								</a>
								<d class="number-counter" data-bind="text: comment_count"></d>
							</span>	
							<!-- ko if: show_count_view -->
							<span class="post_view fr">
		                        <i class="icon-eye-open"></i>
		                        <d class="number-counter" data-bind="text: count_viewer"></d>
		                    </span>
		                    <!-- /ko -->
						</div>
					</div>
				</div>
				<div class="post_body">
					<!-- ko if: title -->
					<h4 class="post_title">
						<a data-bind="attr: {href: href}, text: title"></a>
					</h4>
					<!-- /ko -->
					<!-- ko if: image -->
					<div class="post_image">
						<a class="img-link-popup" data-bind="attr: {href: thumb}">
							<img data-bind="attr: {src: image}" />
						</a>				
					</div>
					<!-- /ko -->
					<div class="post_text_raw" data-bind="text: content"></div>
					<div class="post_text_editable" style="display: none;" data-bind="text: content"></div>
				</div>
				<!-- ko if: see_more -->
				<a class="yes-see-more" data-bind="attr: {href: href}">{% trans %}See more{% endtrans %} <i class=" icon-double-angle-right"></i></a> 
				<!-- /ko -->
			</div>
		</div>
	</div>
{% endblock %}