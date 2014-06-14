{% block post_common_ko_post_item_small %}
	<div class="feed post post-item-small">
		<!-- ko if: $data.isLiked() || $data.isEdit || $data.isDelete -->
		<div class="yes-dropdown">
            <div class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-caret-down"></i>
               </a>
               <ul class="dropdown-menu">
               		<!-- ko if: $data.isLiked() -->
               		<li class="unlike-post">
                        <a data-bind="click: $data.likePost" title="{% trans %}Like{% endtrans %}"><i class="icon-thumbs-down medium-icon"></i> {% trans %}Unlike{% endtrans %}</a>
                    </li>
                    <!-- /ko -->
                    <!-- ko if: $data.isEdit -->
                    <li class="post-edit-btn">
                        <a data-bind="click: $parent.startEditPost" title="Edit" class="link-popup"><i class="icon-edit"></i>{% trans %}Edit{% endtrans %}</a>
                    </li>
                    <!-- /ko -->
                    <!-- ko if: $data.isDelete -->
                    <li class="post-delete-btn">
                        <a data-bind="click: $parent.deletePost" title="Delete"><i class="icon-trash"></i>{% trans %}Delete{% endtrans %}</a>
                    </li>
                    <!-- /ko -->
                </ul>
            </div>
        </div>
        <!-- /ko -->
        <div class="row-fluid">
        	<!-- ko if: $data.image().length > 0 -->
        	<div class="span2">
        		<div class="post_image">
					<a class="news-link" data-bind="zoomInitImage: $data.thumb">
						<img class="news-img" data-bind="attr: { src : $data.image(), alt : $data.title() } ">
					</a>
				</div>
        	</div>
        	<div class="span10">
        		<div class="post_meta">
					<span class="post_time fl" data-bind="timeAgo: $data.created"></span>
					<span class="post_like fr">
						<!-- ko if: !$data.isLiked() -->
						<a style="cursor: pointer;" data-bind="click: $data.likePost" title="{% trans %}Like{% endtrans %}">
							<i class="icon-thumbs-up"></i>	
						</a>
						<!-- /ko -->
						<!-- ko if: $data.isLiked() -->
						<span>{% trans %}Liked{% endtrans %}</span>
						<!-- /ko -->
						<a data-bind="click: showLikers" title="{% trans %}See users liked{% endtrans %}">
							<d class="counter" data-bind="text: $data.likeCount"></d>
						</a>
					</span>
					<span class="post_cm fr">
						<a data-bind="click: showComment" title="{% trans %}Comment{% endtrans %}">
							<i class="icon-comments"></i>
						</a>
						<d class="counter" data-bind="text: $data.commentCount"></d>
					</span>
					<span class="post_view fr">
                        <i class="icon-eye-open"></i>
					<d class="counter" data-bind="text: $data.countViewer"></d>
                    </span>
				</div>
				<div class="post_overview">
					<!-- ko if: $data.title().length > 0 -->
					<h4 class="post_title">
						<a data-bind="link: { text: $data.title(), title: $data.title(), route: 'PostPage', params: { post_type : $data.type, post_slug: $data.slug } }"></a>
					</h4>
					<!-- /ko -->
					<!-- ko if: $data.title().length == 0 -->
					<div data-bind="html: $data.content()"></div>
					<!-- /ko -->
				</div>
        	</div>
        	<!--/ko -->
        	<!-- ko if: $data.image().length == 0 -->
        	<div class="span12">
        		<div class="post_meta">
					<span class="post_time fl" data-bind="timeAgo: $data.created"></span>
					<span class="post_like fr">
						<!-- ko if: !$data.isLiked() -->
						<a style="cursor: pointer;" data-bind="click: $data.likePost" title="{% trans %}Like{% endtrans %}">
							<i class="icon-thumbs-up"></i>	
						</a>
						<!-- /ko -->
						<!-- ko if: $data.isLiked() -->
						<span>{% trans %}Liked{% endtrans %}</span>
						<!-- /ko -->
						<a data-bind="click: showLikers" title="{% trans %}See users liked{% endtrans %}">
							<d class="counter" data-bind="text: $data.likeCount"></d>
						</a>
					</span>
					<span class="post_cm fr">
						<a data-bind="click: showComment" title="{% trans %}Comment{% endtrans %}">
							<i class="icon-comments"></i>
						</a>
						<d class="counter" data-bind="text: $data.commentCount"></d>
					</span>
					<span class="post_view fr">
                        <i class="icon-eye-open"></i>
					<d class="counter" data-bind="text: $data.countViewer"></d>
                    </span>
				</div>
				<div class="post_overview">
					<!-- ko if: $data.title().length > 0 -->
					<h4 class="post_title">
						<a data-bind="link: { text: $data.title(), title: $data.title(), route: 'PostPage', params: { post_type : $data.type, post_slug: $data.slug } }"></a>
					</h4>
					<!-- /ko -->
					<!-- ko if: $data.title().length == 0 -->
					<div data-bind="html: $data.content()"></div>
					<!-- /ko -->
				</div>
        	</div>
        	<!--/ko -->
        </div>
	</div>
{% endblock %}