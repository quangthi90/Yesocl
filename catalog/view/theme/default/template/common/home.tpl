{% extends '@template/default/template/common/layout_feed.tpl' %}

{% block title %}Yesocl - Social Network{% endblock %}

{% block stylesheet %}
    <link href="catalog/view/theme/default/stylesheet/home.css" rel="stylesheet" media="screen" />
{% endblock %}

{% block body %}
<div id="y-content" class="y-sub-container-1">
	<div id="y-main-content"> 		           
        <ul class="list-content columns">
        	<li class="feed-item">
				<div class="post post_new">
					<div class="row-fluid txt_editor">
						<textarea class="post_input" placeholder="What's in your mind ..."></textarea>
					</div>
					<div class="row-fluid"> 
						<div class="span10 post_new_control">
							<a href="#" title="Chèn hình">
								<i class="icon-camera-retro big-icon"></i>
							</a>
						</div>
						<div class="span2">
							<a href="#" class="btn  btn-success">Post</a>
						</div>
					</div>
				</div>
			</li>
        	{% for post in posts %}
        	<li class="feed-item">
				<div class="post">
					<div class="row-fluid post_header">
						<div class="span2 avatar_thumb">
							<a href="#">
								<img src="{{ post.avatar }}" alt="user">
							</a>
						</div>
						<div class="span10">
							<div class="row-fluid">
								<div class="span8 post_user">
									<a href="#">{{ post.author }}</a>
								</div>
								<div class="span4 post_time">
									<i class="icon-time icon-2x"></i> 1 minute ago
								</div>
							</div>
							<h6 class="post_title">{{ post.title }}</h4>
						</div>
					</div>
					<div class="post_body">{{ post.content|raw }}</div>
					<div class="row-fluid post_footer">
						<div class="span10 post_action">
							<a href="#"><i class="icon-thumbs-up medium-icon"></i> Like</a>
							<a href="#"><i class="icon-comments medium-icon"></i> Comment</a>
						</div>
						<div class="span2">
							<a href="#"><i class="icon-eye-open medium-icon"></i> More</a>
						</div>
					</div>
				</div>
			</li>
			{% endfor %}
			<li class="feed-item" id="feed-end"></li>							
		</ul>
	</div>
</div>
{% endblock %}

{% block javascript %}
<script type="text/javascript">
	$(document).ready(function() {
		//MakeScroll:
		makeScroll('y-content');	
	});	
	window.onresize=function() {
		makeScroll('y-content');	
	};
</script>
{% endblock %}