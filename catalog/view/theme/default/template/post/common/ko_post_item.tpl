{% block post_common_ko_post_item %}
<div class="column">
	<div class="feed post post_status post-item js-post-item">
            	<!-- ko if: $data.isLiked() || $data.isEdit || $data.isDelete -->
		<div class="yes-dropdown">
            <div class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-caret-down"></i>
               </a>
               <ul class="dropdown-menu">
            	<!-- ko if: $data.isLiked() -->
               		<li class="unlike-post">
                        <a href="#"><i class="icon-thumbs-down medium-icon"></i> {% trans %}Unlike{% endtrans %}</a>
                    </li>
                    <!-- /ko -->
            	<!-- ko if: $data.isEdit -->
                    <li class="divider"></li>
                    <li class="post-edit-btn">
                        <a href="#" class="link-popup" data-mfp-src=".js-advance-post"><i class="icon-edit"></i>{% trans %}Edit{% endtrans %}</a>
                    </li>
                    <!-- /ko -->
            	<!-- ko if: $data.isDelete -->
                    <li class="divider"></li>
                    <li class="post-delete-btn">
                        <a href="#"><i class="icon-trash"></i>{% trans %}Delete{% endtrans %}</a>
                    </li>
                    <!-- /ko -->
                </ul>
            </div>
        </div>
               <!-- /ko -->
		<div class="post_header">
			<div class="avatar_thumb">
				<a data-bind="link: { title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }">
					<img data-bind="attr: {src: $data.user.avatar, alt: $data.user.username}" />
				</a>
			</div>
			<div class="post_meta_info">
				<div class="post_user">
					<a data-bind="link: { text: $data.user.username, title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }"></a>
            	<!-- ko if: $data.isOwner -->
					<span><i class="icon-caret-right"></i></span>
					<a data-bind="attr: { href: $data.owner.href, title : $data.owner.username }, text: $data.owner.username"></a>
            	<!-- /ko -->
            	<!-- ko if: $data.category_slug -->
					<span><i class="icon-caret-right"></i></span>
					<a data-bind="link: { text: $data.category_name, title: $data.category_name, route: 'BranchCategory', params: { category_slug: $data.category_slug } }"></a>
            	<!-- /ko -->
				</div>
				<div class="post_meta">
					<span class="post_time fl">
						<i class="icon-calendar"></i>
                        <d  data-bind="timeAgo: $data.created"></d>
					</span>
					<span class="post_like fr">
						<!-- ko if: !$data.isLiked() -->
						<a class="like-post" href="#">
							<i class="icon-thumbs-up medium-icon"></i>
                        </a>
                        <!-- /ko -->
						<!-- ko if: $data.isLiked() -->
                        <d class="liked-post">
                            {% trans %}Liked{% endtrans %}
						</d>
                        <!-- /ko -->
						<a class="post-liked-list" data-bind="click: showLikers" title="{% trans %}See users liked{% endtrans %}">
							<d class="number-counter" data-bind="text: $data.likeCount"></d>
						</a>
					</span>
					<span class="post_cm fr">
						<a data-bind="click: showComment" class="open-comment" title="{% trans %}Comment{% endtrans %}">
							<i class="icon-comments-alt"></i>
						</a>
						<d class="number-counter" data-bind="text: $data.commentCount"></d>
					</span>
					<span class="post_view fr">
                        <i class="icon-eye-open"></i>
					<d class="number-counter" data-bind="text: $data.countViewer"></d>
                    </span>
				</div>
			</div>
		</div>
		<div class="post_body">
			<!-- ko if: $data.title -->
			<h4 class="post_title">
				<a data-bind="link: { text: $data.title(), title: $data.title(), route: 'PostPage', params: { post_type : $data.type, post_slug: $data.slug } }"></a>
			</h4>
			<!-- /ko -->
			<!-- ko if: $data.image -->
			<div class="post_image">
				<a class="img-link-popup" data-bind="zoomInitImage: $data.thumb">
					<img data-bind="attr: { src : $data.image(), alt : $data.title() } "/>
				</a>
			</div>
			<!-- /ko -->
			<div class="post_text_raw" style="font-weight: normal" data-bind="html: $data.description"></div>
			<div class="post_text_editable" style="display: none;" data-bind="html: $data.content()"></div>
		</div>
		<a class="yes-see-more" data-bind="link: { title: $data.title(), route: 'PostPage', params: { post_type : $data.type, post_slug: $data.slug } }">See more <i class=" icon-double-angle-right"></i></a>
	</div>
</div>
{% endblock %}