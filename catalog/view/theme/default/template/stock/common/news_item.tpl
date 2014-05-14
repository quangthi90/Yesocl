{% block stock_common_news_item %}
	<div class="news-item feed post post_status">
		{#<div class="yes-dropdown">
            <div class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-caret-down"></i>
               </a>
               <ul class="dropdown-menu">
               		<li class="unlike-post{% if post.isUserLiked == 0 %} hidden{% endif %}">
                        <a href="#"><i class="icon-thumbs-down medium-icon"></i> {% trans %}Unlike{% endtrans %}</a>
                    </li>
                    {% if post.is_edit is defined and post.is_edit == true %}
                    <li class="divider"></li>
                    <li class="post-edit-btn">
                        <a href="#" class="link-popup" data-mfp-src=".js-advance-post"><i class="icon-edit"></i>{% trans %}Edit{% endtrans %}</a>
                    </li>
                    {% endif %}
                    {% if post.is_del is defined and post.is_del == true %}
                    <li class="divider"></li>
                    <li class="post-delete-btn">
                        <a href="#"><i class="icon-trash"></i>{% trans %}Delete{% endtrans %}</a>
                    </li>
                    {% endif %}
                </ul>
            </div>
        </div>#}
		<div class="post_header">
			<div class="avatar_thumb">
				<a data-bind="link: { title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }">
					<img class="news-owner-img" data-bind="attr: {src: $data.user.avatar, alt: $data.user.username}">
				</a>
			</div>
			<div class="post_meta_info">
				<div class="post_user">
					<a class="news-owner" data-bind="link: { text: $data.user.username, title: $data.user.username, route: 'WallPage', params: { user_slug: $data.user.slug } }"></a>
					{#% if post.owner_id is defined and post.owner_id != null and post.owner_id != user.id %}
					<span><i class="icon-caret-right"></i></span>
					<a href="{{ path('WallPage', {user_slug: users[post.owner_id].slug}) }}">{{ users[post.owner_id].username }}</a>
					{% endif %}
					{% if post.category_slug is defined %}
					<span><i class="icon-caret-right"></i></span>
					<a href="{{ path('BranchCategory', {category_slug: post.category_slug}) }}">{{ post.category_name }}</a>
					{% endif %#}
				</div>
				<div class="post_meta">
					<span class="news-time post_time fl" data-bind="timeAgo: $data.created"></span>
					<span class="post_like fr">
						<!-- ko if: !$data.isLiked() -->
						<a style="cursor: pointer;" data-bind="click: $data.likePost" title="{% trans %}Like{% endtrans %}">
							<i class="icon-thumbs-up"></i>	
						</a>
						<!-- /ko -->
						<!-- ko if: $data.isLiked() -->
						<a style="cursor: pointer;" data-bind="click: $data.likePost" title="{% trans %}Unlike{% endtrans %}">
							<i class="icon-thumbs-down"></i>	
						</a>
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
			</div>
		</div>
		<div class="post_body">
			<h4 class="post_title"><a data-bind="link: { text: $data.title, title: $data.title, route: 'PostPage', params: { post_type : $data.type, post_slug: $data.slug } }"></a></h4>
			<div class="post_image">
				<a class="news-link" data-bind="link: { title: $data.title, route: 'PostPage', params: { post_type :  'branch', post_slug: $data.slug } }">
					<img class="news-img" data-bind="attr: { src : $data.image, alt : $data.title } ">
				</a>
			</div>
			{#<div class="news-short-content" data-bind="text: $data.description">#}
		</div>
		{#<a class="yes-see-more" data-bind="link: { text: 'See more', route: 'PostPage', params: { post_type : $data.type, post_slug: $data.slug } }"> <i class=" icon-double-angle-right"></i></a>#}
	</div>
{% endblock %}