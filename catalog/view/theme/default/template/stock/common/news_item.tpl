{% block stock_common_news_item %}
<div class="news-item">
	<a class="news-link" data-bind="link: { title: $data.title, route: 'PostPage', params: { post_type :  'branch', post_slug: $data.slug } }">
		<img class="news-img" data-bind="attr: { src : $data.image, alt : $data.title } ">
	</a>
	<a class="news-title" data-bind="link: { text: $data.title, title: $data.title, route: 'PostPage', params: { post_type : 'branch', post_slug: $data.slug } }">
	</a>
	<div class="news-meta">
		<a data-bind="link: { title: $data.username, route: 'WallPage', params: { user_slug: $data.authorSlug } }">
			<img class="news-owner-img" data-bind="attr: {src: $data.avatar, alt: $data.username}">
		</a>
		<div class="fl">
			<a class="news-owner" data-bind="link: { text: $data.username, title: $data.username, route: 'WallPage', params: { user_slug: $data.authorSlug } }"></a>
			<span class="news-time">6 hours ago</span>
		</div>
	</div>
	<div class="news-short-content" data-bind="text: $data.description">		
	</div>
	<div class="news-actions">
		<div class="row-fluid">
			<div class="span4">
				<span class="news-action">
					<a href="">
						<i class="icon-eye-open"></i>
					</a>
					<d class="counter" data-bind="text: $data.likeCount"></d>
				</span>
			</div>
			<div class="span4">
				<span href="" class="news-action">
					<a href="">
						<i class="icon-comments"></i>
					</a>
					<d class="counter" data-bind="text: $data.commentCount"></d>
				</span>
			</div>
			<div class="span4">
				<span href="" class="news-action">
					<!-- ko if: !$data.isLiked() -->
					<a style="cursor: pointer;" data-bind="click: $data.likePost">
						<i class="icon-thumbs-up"></i>	
					</a>
					<!-- /ko -->
					<!-- ko if: $data.isLiked() -->
					<a style="cursor: pointer;" data-bind="click: $data.likePost">
						<i class="icon-thumbs-down"></i>	
					</a>
					<!-- /ko -->
					<a href="#">
						<d class="counter" data-bind="text: $data.likeCount"></d>
					</a>
				</span>
			</div>
		</div>
	</div>
</div>
{% endblock %}